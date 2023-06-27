<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\CriteriaWeight;
use Illuminate\Http\Request;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil skor-skor dari model AlternativeScore dengan melakukan join terhadap tabel-tabel terkait
        $scores = AlternativeScore::select(
            'alternativescores.id as id',
            'alternatives.id as ida',
            'criteriaweights.id as idw',
            'criteriaratings.id as idr',
            'alternatives.name as name',
            'criteriaweights.name as criteria',
            'criteriaratings.rating as rating',
            'criteriaratings.description as description'
        )
            ->leftJoin('alternatives', 'alternatives.id', '=', 'alternativescores.alternative_id')
            ->leftJoin('criteriaweights', 'criteriaweights.id', '=', 'alternativescores.criteria_id')
            ->leftJoin('criteriaratings', 'criteriaratings.id', '=', 'alternativescores.rating_id')
            ->get();

        // Menduplikasi objek $scores untuk mendapatkan nilai rating nanti,
        // karena setiap panggilan objek $scores adalah pass by reference
        // clone, replica, dan tobase tidak berhasil
        $cscores = AlternativeScore::select(
            'alternativescores.id as id',
            'alternatives.id as ida',
            'criteriaweights.id as idw',
            'criteriaratings.id as idr',
            'alternatives.name as name',
            'criteriaweights.name as criteria',
            'criteriaratings.rating as rating',
            'criteriaratings.description as description'
        )
            ->leftJoin('alternatives', 'alternatives.id', '=', 'alternativescores.alternative_id')
            ->leftJoin('criteriaweights', 'criteriaweights.id', '=', 'alternativescores.criteria_id')
            ->leftJoin('criteriaratings', 'criteriaratings.id', '=', 'alternativescores.rating_id')
            ->get();

        // Mengambil data alternatif dari model Alternative
        $alternatives = Alternative::get();

        // Mengambil data bobot kriteria dari model CriteriaWeight
        $criteriaweights = CriteriaWeight::get();

        // Inisialisasi array untuk menyimpan total nilai per baris
        $totalPerRow = [];

        // Normalisasi
        foreach ($alternatives as $a) {
            // Mendapatkan semua skor untuk setiap id alternatif
            $afilter = $scores->where('ida', $a->id)->values()->all();
            // Melakukan loop pada setiap kriteria
            foreach ($criteriaweights as $icw => $cw) {
                // Mendapatkan semua nilai rating untuk setiap kriteria
                $rates = $cscores->map(function ($val) use ($cw) {
                    if ($cw->id == $val->idw) {
                        return $val->rating;
                    }
                })->toArray();

                // array_filter digunakan untuk menghapus nilai null yang disebabkan oleh map,
                // array_values digunakan untuk mengindeks kembali array
                $rates = array_values(array_filter($rates));

                $total = 0;
                foreach ($rates as $value) {
                    $total += pow($value, 2);
                }
                $sqrt = sqrt($total);
                $normalisasi = $afilter[$icw]->rating / $sqrt;

                // Menghitung Nilai Distance Score
                $r1 = $normalisasi;
                $r2 = $cw->id;
                $distance = pow(pow(0.5 * $r1, 3) + pow(0.5 * $r2, 3), 1/3);

                // Mengghitung Nilai Preferensi dan Nilai Distance Score
                $pref = $distance * $cw->weight;
                $result = round($pref, 15);
                $afilter[$icw]->rating = number_format($result, 2, '.', '');

                // Tambahkan total ke dalam array total per baris
                if (!isset($totalPerRow[$a->id])) {
                    $totalPerRow[$a->id] = $result;
                } else {
                    $totalPerRow[$a->id] += $result;
                }
            }
        }

        // Melakukan perangkingan berdasarkan total nilai per baris
        $ranking = $totalPerRow;
        arsort($ranking);

        // Menghitung peringkat (rank)
        $rank = 1;
        foreach ($ranking as $key => $value) {
            $ranking[$key] = $rank++;
        }

        return view('rank', compact('scores', 'alternatives', 'criteriaweights', 'totalPerRow', 'ranking'))->with('i', 0);
    }
}