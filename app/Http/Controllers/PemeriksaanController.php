<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nomor  = 1;
        $periksa = Pemeriksaan::all();
        return view('page.pemeriksaan.index', compact('periksa', 'nomor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();
        return view('page.pemeriksaan.form',compact('pasien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $periksa = new Pemeriksaan;

        $periksa->tgl_periksa = $request->tgl;
        $periksa->pasiens_id = $request->nama;
        $periksa->keluhan = $request->keluhan;
        $periksa->diagnosis = $request->diagnosis;
        $periksa->save();

        return redirect('/pemeriksaan');
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
        $pasien = Pasien::all();
        $periksa = Pemeriksaan::find($id);
        return view('page.pemeriksaan.edit',compact('periksa','pasien'));
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
        $periksa = Pemeriksaan::find($id);

        $periksa->tgl_periksa = $request->tgl;
        $periksa->pasiens_id = $request->nama;
        $periksa->keluhan = $request->keluhan;
        $periksa->diagnosis = $request->diagnosis;
        $periksa->save();

        return redirect('/pemeriksaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periksa = Pemeriksaan::find($id);
        $periksa->delete();

        return redirect('/pemeriksaan');
    }
}
