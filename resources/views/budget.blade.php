@extends('layouts.dasar')
@section('Judul', 'Budget')
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

            <form action="{{ route('budget.store') }}" method="POST">
                <div class="container" style="justify-content: center;">
                    @csrf
                    <input id=" Hari" value="{{ date('Y-m-d') }}" hidden>
                    <input type="text" name="Nama_Divisi" id="Nama_Divisi" hidden value="PRODUKSI">
                    <table class="table">                        
                        <tr>
                            <td scope="row">
                                <label for="Budget">Budget</label>
                            </td>
                            <td>
                                <input type="text" name="Budget" id="Budget" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">
                                <label for="Kuartal"> Kuartal </label>
                            </td>
                            <td>
                                <select name="Kuartal" id="Kuartal" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection