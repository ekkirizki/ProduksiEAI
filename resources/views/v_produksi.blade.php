@extends('layouts.dasar')
@section('Judul', 'Absensi')
@section('Konten')

<div class="row align-items-center h-100">
        <div class="col mx-auto">
            <div class="card-deck h-100 border-primary justify-content-center" style="margin-bottom: 1em;">
                <div class="card" style="width: 5em;">
                    <img src="{{ asset('assets/gambar/produksi.png') }}" class="card-img-top" alt="Produksi">
                    <div class="card-body">
                        <h5 class="card-title"> Produksi </h5>
                        <a href="{{ route('produksi.index') }}" class="stretched-link"></a>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/gambar/note.png') }}" class="card-img-top" alt="Keuangan">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Produksi</h5>
                        <a href="{{ route('laporan_produksi.index') }}" class="stretched-link"></a>
                    </div>
                </div>
                    <div class="card">
                        <img src="{{ asset('assets/gambar/gudang.png') }}" class="card-img-top" alt="Karyawan">
                        <div class="card-body">
                            <h5 class="card-title">Gudang</h5>
                            <a href="{{ route('gudang.index') }}" class="stretched-link"></a>
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection