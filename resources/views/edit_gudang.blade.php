@extends('layouts.dasar')
@section('Judul', 'Gudang')
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

            @foreach ($edit as $edt)
                
            <form action="{{ route('gudang.update', $edt->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label for="Id_Barang" class="col-sm-2 col-form-label">Id Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Id_Barang" name="Id_Barang" value="{{$edt->id_barang}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nama_Barang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Nama_Barang" name="Nama_Barang" value="{{$edt->nama_barang}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Total_Barang" class="col-sm-2 col-form-label">Total Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Total_Barang" name="Total_Barang" value="{{$edt->total_barang}}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </div>
                </div>
            </form>
            
            @endforeach
        @endsection
