<?php

namespace App\Http\Controllers;

use App\Models\Jarak;
use Illuminate\Http\Request;

class JarakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jarak = Jarak::get();
        return view('admin.jarak.index', compact('jarak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jarak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jarak::create($request->all());

        return redirect('/jarak')->with('success', 'success menambahkan jarak');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jarak  $jarak
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jarak = Jarak::find($id);

        return view('admin.jarak.edit', compact('jarak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jarak  $jarak
     * @return \Illuminate\Http\Response
     */
    public function edit(Jarak $jarak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jarak  $jarak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jarak = Jarak::find($id);

        $jarak->update($request->all());

        return redirect('/jarak')->with('success', 'success update jarak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jarak  $jarak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jarak = Jarak::find($id);

        $jarak->delete();

        return redirect('/jarak')->with('success', 'success menghapus jarak');
    }
}
