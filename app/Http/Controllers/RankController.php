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

        // duplicate scores object to get rating value later,
        // because any call to $scores object is pass by reference
        // clone, replica, tobase didnt work
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

        $alternatives = Alternative::get();

        $criteriaweights = CriteriaWeight::get();

        // Normalization
        foreach ($alternatives as $a) {
            // Get all scores for each alternative id
            $afilter = $scores->where('ida', $a->id)->values()->all();
            // Loop each criteria
            foreach ($criteriaweights as $icw => $cw) {
                // Get all rating value for each criteria
                $rates = $cscores->map(function ($val) use ($cw) {
                    if ($cw->id == $val->idw) {
                        return $val->rating;
                    }
                })->toArray();

                // array_filter for removing null value caused by map,
                // array_values for reindexing the array
                $rates = array_values(array_filter($rates));

                $total = 0;
                foreach ($rates as $value) {
                    $total += pow($value, 2);
                }
                $sqrt = sqrt($total);
                $normalisasi = $afilter[$icw]->rating / $sqrt;

                // MENGHITUNG NILAI DISTANCE SCORE
                $a = $normalisasi;
                $r = $cw->id;
                $distance = pow(pow(0.5 * $a, 3) + pow(0.5 * $r, 3), 1/3);

                // MENGHITUNG NILAI PREFERENSI DAN NILAI DISTANCE SCORE
                $pref = $distance * $cw->weight;
                $result = round($pref, 6);
                $afilter[$icw]->rating = number_format($result, 6, '.', '');
            }
        }
        return view('rank', compact('scores', 'alternatives', 'criteriaweights'))->with('i', 0);
    }
}
