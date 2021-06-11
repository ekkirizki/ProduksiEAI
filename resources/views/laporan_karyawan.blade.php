@extends('layouts.dasar')
@section('Judul', 'Laporan Karyawan')
@section('Konten')

    @php
    $banyaknya_absen = 0;
    $absen = [];
    $nama = [];
    @endphp
    @foreach ($lp as $lapk)

        @php
            if (strtoupper($lapk->divisi) == "PRODUKSI" && strcasecmp($lapk->divisi, 'PRODUKSI') == 0) {
                $banyaknya_absen = $banyaknya_absen + 1;
                // $pr = array_count_values($item);
                if (isset($lapk->nama) && substr($lapk->created_at,0,7) == date('Y-m')) {
                    $namas = strtoupper($lapk->nama);
                    array_push($nama, $namas);
                    if (!isset($absen[$namas])) {
                        $absen[$namas] = 0;
                    }
                    $absen[$namas]++;
                }
            }
        @endphp
    @endforeach    
    {{-- {{ gettype($lapk) }} <br>
    {{ $banyaknya_absen }} <br>
    {{ gettype($absen) }} <br>
    {{ print_r($absen) }} <br>
    {{ $absen['JAJANG'] }} <br>
    @foreach ($nama as $key => $item)
        {{ $item }}<br>
    @endforeach
    {{ $nama[0] }} <br>
    {{ count($lk) }} <br>
    {{ $lk[1]->name }}<br>
    @php
    for ($i = 0; $i < count($lk); $i++) {
        echo $lk[$i]->name;
        echo '<br>';
    }
    @endphp --}}
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
<h1 class="text-center">
    Laporan Karyawan Bulan {{date("M Y")}}
</h1>
    <form action="{{ route('laporan_karyawan.store') }}" method="POST">
        @csrf
        <table class="table table-borderless text-center">
            <thead>
                <tr>
                    <th scope="col">
                        Nama
                    </th>
                    <th scope="col">
                        Total Absensi
                    </th>
                    <th>
                        Performa
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absen as $kunci => $value)
                
                    <tr>
                        <td>
                            {{ $kunci }}
                            <input type="text" name="nama[]" id="nama" hidden value="{{$kunci}}">
                        </td>
                        <td>
                            {{ $value }}
                            <input type="text" name="jml[]" id="jml" hidden value="{{$value}}">
                        </td>
                        <td>
                            <input type="text" name="nilai[]" id="nilai" hidden value="
                            @if ($value >= 25)
                                A                                
                        @elseif ($value >=20 && $value < 25) B 
                        @elseif ($value>=15 && $value < 20) C 
                        @elseif ($value>=10 && $value < 15) D 
                        @elseif ($value<10) E 
                        @endif
">
@if ($value >= 25)
                                A                                
                        @elseif ($value >=20 && $value < 25) B 
                        @elseif ($value>=15 && $value < 20) C 
                        @elseif ($value>=10 && $value < 15) D 
                        @elseif ($value<10) E 
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary btn-block">Lapor</button>
</form>
@endsection
