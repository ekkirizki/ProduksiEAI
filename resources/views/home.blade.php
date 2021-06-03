@extends('layouts.dasar')
@section('Judul', 'Home')
@section('Konten')
    <div class="card-deck" style="margin-bottom: 1em;">
        <div class="card" style="width: 5em;">
            <img src="{{ asset('assets/gambar/produksi.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> Produksi </h5>
                <a href="{{ route('produksi') }}" class="stretched-link"></a>
            </div>
        </div>
        <div class="card">
            <img src="{{ asset('assets/gambar/orang.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Absensi</h5>
                <a href="{{ route('absensi') }}" class="stretched-link"></a>
            </div>
        </div>
        {{-- <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <a href="{{ route('') }}" class="stretched-link"></a>
            </div>
        </div> --}}
    </div>

@endsection
