<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $harga = Harga::get();

        return view('admin.harga.index', compact('harga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.harga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Harga::create($request->all());

        return redirect('/harga')->with('success', 'success menambahkan fasilitas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Harga  $harga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $harga = Harga::find($id);

        return view('admin.harga.edit', compact('harga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Harga  $harga
     * @return \Illuminate\Http\Response
     */
    public function edit(Harga $harga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Harga  $harga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $harga = Harga::find($id);

        $harga->update($request->all());

        return redirect('/harga')->with('success', 'success update harga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Harga  $harga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $harga = Harga::find($id);

        $harga->delete();

        return redirect('/harga')->with('success', 'success menghapus fasilitas');
    }
}
