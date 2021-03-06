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
            <form action="{{ route('tambah_produksi.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="IdProduksi" class="col-sm-2 col-form-label">Id Produksi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="IdProduksi" name="IdProduksi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="NamaProduksi" class="col-sm-2 col-form-label">Nama Produksi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="NamaProduksi" name="NamaProduksi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="TotalProduksi" class="col-sm-2 col-form-label">Total Produksi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="TotalProduksi" name="TotalProduksi">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Ukuran" class="col-sm-2 col-form-label">Ukuran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Ukuran" name="Ukuran">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="PJ" class="col-sm-2 col-form-label">Penanggung Jawab</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="PJ" name="PJ">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Pabrik" class="col-sm-2 col-form-label">Pabrik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Pabrik" name="Pabrik">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Status" name="Status">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </div>
                </div>
            </form>

        @endsection
