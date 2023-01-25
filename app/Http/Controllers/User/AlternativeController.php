<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Models\Fasilitas;
use App\Models\Harga;
use App\Models\Jarak;
use App\Models\Kost;
use App\Models\LuasKamar;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    public function index()
    {
        $alternative = Alternative::with(['kost', 'harga', 'fasilitas', 'jarak', 'luas'])->where('user_id', auth()->user()->id)->get();
        return view('user.alternative.index', compact('alternative'));
    }

    public function create()
    {
        $kost = Kost::get();
        $fasilitas = Fasilitas::get();
        $harga = Harga::get();
        $jarak = Jarak::get();
        $luas = LuasKamar::get();
        return view('user.alternative.create', compact(['kost', 'fasilitas', 'harga', 'jarak', 'luas']));
    }

    public function store(Request $request)
    {
        $alternative = Alternative::create([
            'user_id' => auth()->user()->id,
            'kost_id' => $request->kost_id,
            'harga_id' => $request->harga_id,
            'jarak_id' => $request->jarak_id,
            'fasilitas_id' => $request->fasilitas_id,
            'luas_kamar_id' => $request->luas_kamar_id
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
