@extends('layouts.dasar')
@section('Judul', 'Produksi')
@section('Konten')

    <div class="row align-items-center h-100">
        <div class="col mx-auto">
            {{-- validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $errors)
                            <li>
                                {{ $errors }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($message = Session::get('Berhasil'))
                <div class="alert alert-success text-center">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @if ($message = Session::get('Gagal'))
                <div class="alert alert-danger text-center">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form action="{{ route('produksi.store') }}" method="POST">

                <div class="form-group row">
                    <label for="NoProduksi" class="col-sm-2 col-form-label">Nomor Produksi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="NoProduksi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="NamaProduksi" class="col-sm-2 col-form-label">Nama Produksi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="NamaProduksi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="NamaProduksi" class="col-sm-2 col-form-label">Tanggal Produksi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="NamaProduksi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="NamaProduksi" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="NamaProduksi">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary form-control">Ok</button>
                    </div>
                </div>
            </form>

        @endsection
