<?php

namespace App\Http\Controllers;

use App\Models\Analog;
use Illuminate\Http\Request;


class AnalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analogs = Analog::all();
    return view('analogs.index', [
        'analogs' => $analogs
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view('analogs.create');
}


public function store(Request $request)
{
    $request->validate([
        'nama_film' => 'required|unique:analogs,nama_film',
        'keterangan_cuci' => 'required',
        'total_harga' => 'required',
        'link_album' => 'required'

    ]);

    $array = $request->only([
        'nama_film', 'keterangan_cuci', 'total_harga', 'link_album'
    ]);

    $analogs = Analog::create($array);
    return redirect()->route('analogs.index')
        ->with('success_message', 'Berhasil menambah data baru');

}

    public function edit($id)
{
    $analogs = Analog::find($id);
    if (!$analogs) return redirect()->route('analogs.index')
        ->with('error_message', 'Data dengan id'.$id.' tidak ditemukan');

    return view('analogs.edit', [
        'analogs' => $analogs
    ]);
}


public function update(Request $request, $id)
{
    $analogs = Analog::find($id);
    $analogs->nama_film = $request->nama_film;
    $analogs->keterangan_cuci = $request->keterangan_cuci;
    $analogs->total_harga = $request->total_harga;
    $analogs->link_album = $request->link_album;

    $analogs->save();

    return redirect()->route('analogs.index')
        ->with('success_message', 'Berhasil mengubah Data');
}
public function destroy(Request $request, $id)
{
    $analogs = Analog::find($id);

    if ($analogs) $analogs->delete();

    return redirect()->route('analogs.index')
        ->with('success_message', 'Berhasil menghapus Data');

}
}
