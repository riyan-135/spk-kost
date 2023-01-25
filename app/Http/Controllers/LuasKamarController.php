<?php

namespace App\Http\Controllers;

use App\Models\LuasKamar;
use Illuminate\Http\Request;

class LuasKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $luas = LuasKamar::get();
        return view('admin.luas_kamar.index', compact('luas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.luas_kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $luas = LuasKamar::create($request->all());

        return redirect('/luas')->with('success', 'success menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LuasKamar  $luasKamar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $luas = LuasKamar::find($id);
        return view('admin.luas_kamar.edit', compact('luas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LuasKamar  $luasKamar
     * @return \Illuminate\Http\Response
     */
    public function edit(LuasKamar $luasKamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LuasKamar  $luasKamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $luas = LuasKamar::find($id);

        $luas->update();

        return redirect('/luas')->with('success', 'success update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LuasKamar  $luasKamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $luas = LuasKamar::find($id);

        $luas->delete();
        return redirect('/luas')->with('success', 'success menghapus data');
    }
}
