@extends('layouts.dasar')
@section('Judul', 'Pengeluaran')
@section('Konten')

<div class="row align-items-center h-100">
        <div class="col mx-auto">   
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
            
            @foreach ($edit as $peng)
            <form action="{{route('pengeluaran.update', $peng->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="id_karyawan" class="col-sm-2 col-form-label"> NIP </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="{{$peng->id_karyawan}}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nama_karyawan" class="col-sm-2 col-form-label"> Nama </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="{{$peng->nama_karyawan}}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="keperluan" class="col-sm-2 col-form-label"> Keperluan </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keperluan" name="keperluan" value="{{$peng->keperluan}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="total" class="col-sm-2 col-form-label">Total </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="total" name="total" value="{{$peng->total_harga}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label"> Tanggal Permintaan </label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{$peng->tanggal_permintaan}}">
                    </div>
                </div>

                   
    @endforeach    
<button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>

</div>
</div>

@endsection