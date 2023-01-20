<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class kriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::get();
        return view('admin.kriteria.index', compact('kriteria'));
    }

    public function create()
    {
        return view('admin.kriteria.create');
    }

    public function store(Request $request)
    {
        $kriteria = Kriteria::create($request->all());

        return redirect('/kriteria')->with('success', 'Berhasil menambahkan kriteria');
    }

    public function show($id)
    {
        $kriteria = Kriteria::find($id);

        return view('admin.kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->update($request->all());

        return redirect('/kriteria')->with('success', 'Berhasil mengupdate kriteria');
    }

    public function delete($id)
    {
        $kriteria = Kriteria::find($id);

        $kriteria->delete();

        return redirect('/kriteria')->with('success', 'Berhasil menghapus kriteria');
    }
}
