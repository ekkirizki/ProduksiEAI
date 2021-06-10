@extends('layouts.dasar')
@section('Judul', 'Tambah Pengeluaran')
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
            <form action="{{ route('tambah_pengeluaran.store') }}" method="POST">
                @csrf
                <div class="form-group row">                       
                                <label for="Nama_Karyawan" class="col-sm-2 col-form-label">
                                    Id Karyawan</label>                            
                            <div class="col-sm-10">
                                <input list="list_Id_karyawan" name="Id_Karyawan" autocomplete="off" id="Id_Karyawan"
                                    class="form-control" onkeyup="Nama_Kar()">
                                <datalist id="list_Id_karyawan">
                                    @foreach ($karyawan as $hrd)
                                    
                                    @if (strtoupper($hrd->department) == "PRODUKSI")
                                    <option value="{{ $hrd->id }}">
                                    @endif                                                                            

                                    @endforeach
                                </datalist>    
                            </div>                        
                </div>
                <div class="form-group row">
                    <label for="Nama_Karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Nama_Karyawan" readonly onkeyup="Nama_Kar()"
                        name="Nama_Karyawan">
                    </div>
                </div>
                <input type="text" name="Divisi" id="Divisi" value="Produksi" hidden>
                <div class="form-group row">
                    <label for="Keperluan" class="col-sm-2 col-form-label">Keperluan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Keperluan" name="Keperluan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Total" class="col-sm-2 col-form-label">Total Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Total" name="Total">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Tanggal" class="col-sm-2 col-form-label">Tanggal Permintaan</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="Tanggal" name="Tanggal">                        
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </div>
                </div>
            </form>

             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
            <script>
                function Nama_Kar() {
            var Id_Karyawan = document.getElementById('Id_Karyawan').value;
            var baseurl = "https://eai-api-hrd.herokuapp.com/karyawan/" + Id_Karyawan;
            console.log(Id_Karyawan);
            console.log(baseurl);

            $.ajax({
                type: "get",
                url: baseurl,
                success: function(data) {
                    var json = data;
                    var nama = json.name;
                    if (Id_Karyawan == "") {
                        document.getElementById("Nama_Karyawan").value = "";
                    } else {
                        document.getElementById("Nama_Karyawan").value = nama;
                    }
                    console.log(json.name);
                }
            });
        }
            </script>
@endsection