<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'Jam_Masuk' => 'required',
            'Jam_Keluar' => 'required'
        ]);
        // $pesan = "berhasil";
        
        try{
        DB::table('absensi')->insert([
                'id_karyawan' => $request->Id_Karyawan,
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
