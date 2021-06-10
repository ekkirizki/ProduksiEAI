<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class budget extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $url_budget = 'https://eai-api.herokuapp.com/api/';

    // $url_hrd = 'yukcetak-absensi.herokuapp.com/api/';

    $client_budget = new Client([
        'base_uri' => $url_budget,
    ]);

    $response_budget = $client_budget->request('GET', 'budgeting')->getbody();
    $hasil_budget = json_decode($response_budget);        
        return view('budget', ['budget' => $hasil_budget]);
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
        $url_budget = "https://eai-api.herokuapp.com/api/budgeting";

        $client_budget = new Client([
        'base_uri' => $url_budget
        ]);

        $validasi = $request->validate([
            'Nama_Divisi' => 'required',
            'Budget' => 'required',
            'Kuartal' => 'required'            
        ]);

        try{
            $insert_budget = $client_budget->request('POST', 'budgeting', [
                    'form_params' => [
                        'nama_divisi' => $request->Nama_Divisi,
                        'evaluasi_budget' => $request->Budget,
                        'quartal' => $request->Kuartal
                    ]
                    ]);
                    return redirect()->route('budget.index')->with('Berhasil', "Berhasil");
        }
        catch (Exception $e) {
            return redirect()->route('budget.index')->with('Gagal', $e->getMessage());
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
