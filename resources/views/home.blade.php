@extends('layouts.dasar')
@section('Judul', 'Home')
@section('Konten')
    <div class="row align-items-center h-100">
        <div class="col mx-auto">
            <div class="card-deck h-100 border-primary justify-content-center" style="margin-bottom: 1em;">
                <div class="card" style="width: 5em;">
                    <img src="{{ asset('assets/gambar/produksi.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> Produksi </h5>
                        <a href="{{ route('produksi.index') }}" class="stretched-link"></a>
                    </div>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/gambar/orang.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Absensi</h5>
                        <a href="{{ route('absensi.index') }}" class="stretched-link"></a>
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
        </div>
    </div>

@endsection
