<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KostController extends Controller
{
    public function index()
    {
        $kost = Kost::get();
        return view('admin.kost.index', compact('kost'));
    }

    public function create()
    {
        return view('admin.kost.create');
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            "upload_image"      => "required",
            "upload_image.*"    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($validator->fails()) {
            return response("Err PR-SP(Val) : " . implode(" - ", $validator->messages()->all()));
        }

        $images = $request->file('upload_image');
        $pathFile = Storage::putFile("public/images/products", $images);

        $kost = new Kost();
        $kost->name = $request['name'];
        $kost->address = $request['address'];
        $kost->price = $request['price'];
        $kost->image = $pathFile;
        $kost->description = $request['description'];
        $kost->save();

        return redirect('/kost')->with('success', 'Berhasil menambahkan Kost');
    }

    public function show($id)
    {
        $kost = Kost::find($id);
        return view('admin.kost.edit', compact('kost'));
    }

    public function update(Request $request, $id)
    {

        $kost = Kost::find($id);
        $kost->name = $request['name'];
        $kost->address = $request['address'];
        $kost->price = $request['price'];
        if ($request->file('upload_image')) {
            $images = $request->file('upload_image');
            $pathFile = Storage::putFile("public/images/products", $images);
            $kost->image = $pathFile;
        }
        $kost->description = $request['description'];
        $kost->update();

        return redirect('/kost')->with('success', 'Berhasil update Kost');
    }

    public function delete($id)
    {
        $kost = Kost::find($id);

        $kost->delete();
        return redirect('/kost')->with('success', 'Berhasil hapus Kost');
    }
}
