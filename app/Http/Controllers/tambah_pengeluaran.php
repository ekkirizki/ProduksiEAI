<?php

namespace App\Http\Controllers;

use App\Models\pengeluaran as ModelsPengeluaran;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tambah_pengeluaran extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $url_hrd = 'https://eai-api-hrd.herokuapp.com/';

    // $url_hrd = 'yukcetak-absensi.herokuapp.com/api/';

    $client_hrd = new Client([
        'base_uri' => $url_hrd,
    ]);

    $response_hrd = $client_hrd->request('GET', 'karyawan')->getbody();
    $hasil_hrd = json_decode($response_hrd);
        return view('tambah_pengeluaran', ['karyawan' => $hasil_hrd]);
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
        // dd($request, date('d-m-Y', strtotime($request->Tanggal)));
        $validasi = $request->validate([
            'Id_Karyawan' => 'required',
            'Nama_Karyawan' => 'required',
            'Keperluan' => 'required',
            'Total' => 'required',
            'Tanggal' => 'required'
        ]);
        try{

            // DB::table('pengeluaran')->insert([
            //     'id_karyawan' => $request->Id_Karyawan,
            //     'nama_karyawan' => $request->Nama_Karyawan,
            //     'divisi' => $request->Divisi,
            //     'keperluan' => $request->Keperluan,
            //     'total_harga' => $request->Total,
            //     'tanggal_permintaan' => date('d-m-Y', strtotime($request->Tanggal))
            // ]); 

            $pengeluaran = new ModelsPengeluaran;
            // satu-satu input
            // $pengeluaran->id_karyawan = $request->Id_Karyawan;
            // $pengeluaran->nama_karyawan = $request->Nama_Karyawan;
            // $pengeluaran->divisi = $request->divisi;

            // Ramean
            $pengeluaran::create([
                'id_karyawan' => $request->Id_Karyawan,
                'nama_karyawan' => $request->Nama_Karyawan,
                'divisi' => $request->Divisi,
                'keperluan' => $request->Keperluan,
                'total_harga' => $request->Total,
                'tanggal_permintaan' => $request->Tanggal
            ]);            
            return redirect()->route('pengeluaran.index')->with('Berhasil', "Berhasil");
        }        
        catch (Exception $e){
            return redirect()->route('pengeluaran.index')->with('Gagal', $e->getMessage());
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
