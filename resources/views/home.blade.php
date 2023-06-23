@extends('template.index')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Home</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h2 class="card-title">Selamat Datang di Sistem Pendukung Keputusan</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            Sistem ini dapat membantu seseorang untuk mengambil keputusan dengan menggunakan Metode MOORA dan ORESTE.
                            <br> Cara Penggunaan:
                            <ol>
                                <li>Masuk ke menu "Kriteria & Bobot" untuk menambahkan kriteria beserta bobotnya.</li>
                                <li>Kemudian masuk ke menu "Rating Kriteria" untuk memberikan pilihan rating pada masing-masing kriteria.</li>
                                <li>Gunakan menu "Alternatif & Skor" untuk menambahkan alternatif dan ratingnya.</li>
                                <li>Cek menu "Ranking" untuk melihat hasilnya, klik kolom Total pada tabel untuk mengurutkannya berdasarkan nilai totalnya.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection