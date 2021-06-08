@extends('layouts.dasar')
@section('Judul', 'Absensi')
@section('Konten')


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var baseurl = "http://penilaian-performa.herokuapp.com/api/performa";
            console.log(baseurl);
            var nilai_a = 0;
            var nilai_b = 0;
            var nilai_c = 0;
            var nilai_d = 0;
            var nilai_e = 0;

            $.ajax({
                type: "get",
                url: baseurl,
                success: function(data) {
                    var json = data;
                    var key;
                    console.log(data[0].nilai_performa.toUpperCase() == "A");
                    for (key in data) {
                        if (data[key].nilai_performa.toUpperCase() == "A" &&
                            data[key].divisi.toUpperCase() == "PRODUKSI") {
                            nilai_a = nilai_a + 1;
                            // i++;
                        } else if (data[key].nilai_performa.toUpperCase() == "B" &&
                            data[key].divisi.toUpperCase() == "PRODUKSI") {
                            nilai_b = nilai_b + 1;
                            // i++;
                        } else if (data[key].nilai_performa.toUpperCase() == "C" &&
                            data[key].divisi.toUpperCase() == "PRODUKSI") {
                            nilai_c = nilai_c + 1;
                            // i++;
                        } else if (data[key].nilai_performa.toUpperCase() == "D" &&
                            data[key].divisi.toUpperCase() == "PRODUKSI") {
                            nilai_d = nilai_d + 1;
                            // i++;
                        } else if (data[key].nilai_performa.toUpperCase() == "E" &&
                            data[key].divisi.toUpperCase() == "PRODUKSI") {
                            nilai_e = nilai_e + 1;
                            // i++;
                        }
                    }

                    console.log(nilai_a);
                    var data = google.visualization.arrayToDataTable([
                        ['Penilaian', 'Performa'],
                        ['A', nilai_a],
                        ['B', nilai_b],
                        ['C', nilai_c],
                        ['D', nilai_d],
                        ['E', nilai_e]
                    ]);

                    var options = {
                        pieHole: 0.5,
                        pieSliceTextStyle: {
                            color: 'black',
                        },
                        title: "Performa Keseluruhan Karyawan",
                        titlePosition: "none"
                    };

                    var chart = new google.visualization.PieChart(document.getElementById(
                        'donut_single'));
                    chart.draw(data, options);

                    // var chart = new google.visualization.PieChart(document.getElementById(
                    //     'nilai_b'));
                    // chart.draw(dataB, options);

                    // var chart = new google.visualization.PieChart(document.getElementById(
                    //     'nilai_c'));
                    // chart.draw(dataC, options);

                    // var chart = new google.visualization.PieChart(document.getElementById(
                    //     'nilai_d'));
                    // chart.draw(dataD, options);

                    // var chart = new google.visualization.PieChart(document.getElementById(
                    //     'nilai_e'));
                    // chart.draw(dataE, options);
                }
            });
        }
        // console.log(data.length);
        // console.log(nilai_b);

    </script>

    <div class="row">
        <div class="col text-center">
            <h2>Performa Karyawan</h2>
        </div>
    </div>
    <div class="row">

        <div class="col">

            <div id="donut_single" style="min-height: 350px; border: 1px solid;">
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col" style="margin-top: 1em;">
            <a href="{{ route('laporan_karyawan.index') }}" class="btn btn-primary btn-block"> Laporan Karyawan</a>
        </div>
    </div>
    </div>

@endsection
