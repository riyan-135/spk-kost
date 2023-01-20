<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    public function index()
    {
        $alternative = Alternative::where('user_id', auth()->user()->id)->get();
        return view('user.alternative.index', compact('alternative'));
    }

    public function create()
    {
        return view('user.alternative.create');
    }

    public function store(Request $request)
    {
        $alternative = Alternative::create([
            'user_id' => auth()->user()->id,
            'nama_alternative' => $request->nama_alternative,
            'hasil_alternative' => $request->hasil_alternative,
            'harga' => $request->harga,
            'alamat' => $request->alamat,
            'fasilitas' => $request->fasilitas,
            'dekat_lokasi' => $request->dekat_lokasi,
            'luas_kamar' => $request->luas_kamar
        ]);

        return redirect('/alternative')->with('success', "Berhasil menambahkan data");
    }

    public function show($id)
    {
        $alternative = Alternative::find($id);
        return view('user.alternative.edit', compact('alternative'));
    }

    public function update(Request $request, $id)
    {
        $alternative = Alternative::find($id);
        $alternative->update($request->all());

        return redirect('/alternative')->with('success', 'Berhasil update data');
    }

    public function delete($id)
    {
        $alternative = Alternative::find($id);
        $alternative->delete();

        return redirect('/alternative')->with('success', 'Berhasil menghapus data');
    }
}
