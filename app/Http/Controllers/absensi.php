<?php

namespace App\Http\Controllers;

use ArrayObject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use PhpParser\Node\Stmt\Foreach_;

class absensi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('absensi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'Id_Karyawan' => 'required',
            'Nama_Karyawan' => 'required',
            'Jam_Masuk' => 'required',
            'Jam_Keluar' => 'required'
        ]);
        // $pesan = "berhasil";

        $url_absen = 'yukcetak-absensi.herokuapp.com/api/';
        
        $client_absensi = new Client([
            'base_uri' => $url_absen
        ]);        
        $response_id = $client_absensi->request('GET', 'karyawan')->getBody();
        $get_id = json_decode($response_id);
        $jajal = $get_id;
        arsort($jajal);
        $last_id = $jajal[array_key_first($jajal)]->id + 1;
        // $id_kar = $jajal[$last_id]->id+1;
        // dd($id_kar);
        // for($i = 0; $i < count($get_id); $i++){
        //     if($get_id[$i])
        // }        
        // dd(gettype($get_id), $jajal, $jajal[array_key_first($jajal)], $last_id);        
        try{

            $create_absensi = $client_absensi->request('POST', 'karyawan', [
                'form_params' => [
                    'id' => $last_id,
                    'nama' => $request->Nama_Karyawan,
                    'divisi' => 'PRODUKSI',
                    'jam_masuk' => $request->Jam_Masuk,
                    'jam_pulang' => $request->Jam_Keluar,
                    'tanggal_absensi' => $request->Tanggal
                ]
            ])->getBody();
            // $pesan = json_decode($create_absensi);
            // dd($create_absensi);

        DB::table('absensi')->insert([
                'id_karyawan' => $request->Id_Karyawan,
                'nama_karyawan' => $request->Nama_Karyawan,
                'jam_masuk' => $request->Jam_Masuk,
                'jam_keluar' => $request->Jam_Keluar,
                'tanggal_absensi' => $request->Tanggal
            ]);
            return redirect()->route('absensi.index')->with('Berhasil', "Berhasil");
            // $pesan->message);
        } catch (Exception $e) {
            return redirect()->route('absensi.index')->with('Gagal', $e->getMessage());
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
