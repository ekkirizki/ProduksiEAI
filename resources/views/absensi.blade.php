@extends('layouts.dasar')
@section('Judul', 'Absensi')
@section('Konten')
    {{-- validasi --}}
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

            <form action="{{ route('absensi.store') }}" method="POST">
                <div class="container" style="justify-content: center;">
                    @csrf
                    <input id=" Hari" value="{{ date('Y-m-d') }}" hidden>
                    <table class="table">
                        <tr>
                            <td scope="row" style="width: 15%;">
                                <label for="Id_Karyawan" class="col-sm-1-12 col-form-label">
                                    Id Karyawan</label>
                            </td>
                            <td>
                                <input list="list_karyawan" name="Id_Karyawan" autocomplete="off" id="Id_Karyawan"
                                    class="form-control">
                                {{-- <datalist id="list_karyawan">
                        @foreach ($hasil_hrd as $hrd)

                            <option value="{{ $hrd->id }}">

                        @endforeach
                    </datalist> --}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Jam_Masuk" class="col-sm-1-12 col-form-label">
                                    Jam Masuk</label>
                            </td>
                            <td>
                                <input type="text" name="Jam_Masuk" id="Jam_Masuk" class="form-control" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Jam_Keluar" class="col-sm-1-12 col-form-label">
                                    Jam Keluar</label>
                            </td>
                            <td>
                                <input type="text" name="Jam_Keluar" id="Jam_Keluar" class="form-control"
                                    autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="2">
                                <button type="submit" class="btn btn-primary" id="tombol" style="width: 100%;">
                                    Absen
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="Tanggal" id="Tanggal">
                </div>
            </form>

        </div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#Jam_Masuk').timepicker({
                timeFormat: 'HH:mm'
            });

            $('#Jam_Keluar').timepicker({
                timeFormat: 'HH:mm'
            });

            var date = (new Date()).toISOString().split('T')[0];
            document.getElementById("Tanggal").value = date;
        });

    </script>
@endsection
