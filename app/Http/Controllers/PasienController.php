<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nomor  = 1;
        $pasien = Pasien::all();
        return view('page.pasien.index', compact('pasien', 'nomor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.pasien.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Pasien::class);
        $pasien = new Pasien;

        $pasien->nik = $request->nik;
        $pasien->nm_pasien = $request->nama;
        $pasien->tmpt_lahir = $request->tmpt;
        $pasien->tgl_lahir = $request->tgl;
        $pasien->alamat = $request->alamat;
        $pasien->no_hp = $request->hp;
        $pasien->save();

        return redirect('/pasien');
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
        $pasien = Pasien::find($id);
        return view('page.pasien.edit', compact('pasien'));
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
        $pasien = Pasien::find($id); 

        $pasien->nik = $request->nik;
        $pasien->nm_pasien = $request->nama;
        $pasien->tmpt_lahir = $request->tmpt;
        $pasien->tgl_lahir = $request->tgl;
        $pasien->alamat = $request->alamat;
        $pasien->no_hp = $request->hp;
        $pasien->save();

        return redirect('/pasien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();
        
        return redirect('/pasien');
    }
}
