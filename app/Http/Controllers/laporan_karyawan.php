<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class laporan_karyawan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $url_lp = "yukcetak-absensi.herokuapp.com/api/";

        $client_lp = new Client([
        'base_uri' => $url_lp
        ]);
        $response_lp = $client_lp->request('GET','karyawan')->getBody();
        $lp = json_decode($response_lp);
        
        $url_lk = "https://eai-api-hrd.herokuapp.com/";

        $client_lk = new Client([
        'base_uri' => $url_lk
        ]);

        $response_lk = $client_lk->request('GET','karyawan')->getBody();
        $lk = json_decode($response_lk);
        

        return view('laporan_karyawan', 
        ['lp' => $lp],
        ['lk' => $lk]
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $url_lp = "penilaian-performa.herokuapp.com/api/";

        $client_lp = new Client([
        'base_uri' => $url_lp
        ]);
        // dd(gettype($request), $request->nama, $request->nama[2], count($request->nama));
        try {
            for($i = 0; $i < count($request->nama); $i++){

                $insert_lp = $client_lp->request('POST', 'performa', [
                    'form_params' => [
                        'nama' => $request->nama[$i],
                        'divisi' => 'PRODUKSI',
                        'jumlah_absen' => $request->jml[$i],
                        'nilai_performa' => $request->nilai[$i]
                    ]
                ])->getBody();

            }
            // $pesan = json_decode($insert_lp);
            // dd($pesan);
            for($i = 0; $i < count($request->nama); $i++){
            DB::table('laporan_karyawan')->insert([
                'nama_karyawan' => $request->nama[$i],
                'jumlah_absensi' => $request->jml[$i],
                'nilai_performa' => $request->nilai[$i]
            ]);            
            }
            return redirect()->route('laporan_karyawan.index')->with('Berhasil', "Berhasil");
        } catch (Exception $e) {
            return redirect()->route('laporan_karyawan.index')->with('Gagal', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
