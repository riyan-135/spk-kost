<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::get();
        $alternative = Alternative::with(['user'])->where('user_id', auth()->user()->id)->get();
        $nilai = Nilai::with(['alternatif'])->where('user_id', auth()->user()->id)->get();
        // dd($nilai[0]);
        $normalisasi = Nilai::with([]);


        // $price = [];
        foreach ($nilai as $item) {
            $normal = $item->harga / $normalisasi->max('harga');
        }

        return view('user.nilai.index', compact(['kriteria', 'alternative', 'nilai', ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $alternative = Alternative::find($id);
        return view('user.nilai.create', compact('alternative'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $alternative = Alternative::find($id);

        Nilai::create([
            'alternatif_id' => $alternative->id,
            'harga' => $request->harga,
            'jarak' => $request->jarak,
            'fasilitas' => $request->fasilitas,
            'luas_kamar' => $request->luas_kamar,
        ]);

        return redirect('/alternative')->with('success', "Berhasil menambahkan nilai");
    }

    public function pembobotan()
    {
        $nilai = Nilai::with(['alternatif', 'user'])->where('user_id', auth()->user()->id)->get();
    }
}
