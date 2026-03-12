<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;


class KelolaPaketController extends Controller
{
    public function create(){
    return view('admin.kelolapaket');
}

    public function getPaket(){
     $dataPaketAdmin = Paket::all();
        return view('admin.kelolapaket',compact('dataPaketAdmin'));

    }


    public function store(Request $request)
    {
        Paket::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'durasi' => $request->durasi
        ]);

        return redirect()->back();
    }
    
public function edit($id)
{
    $paket = Paket::findOrFail($id);
    return view('admin.paket.edit', compact('paket'));
}

public function update(Request $request, $id)
{
    $paket = Paket::findOrFail($id);

    $paket->update([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'durasi' => $request->durasi
    ]);

    return redirect()->route('admin.paket.index');
}

public function destroy($id)
{
    $paket = Paket::findOrFail($id);
    $paket->delete();

    return redirect()->back();
}
    
}
