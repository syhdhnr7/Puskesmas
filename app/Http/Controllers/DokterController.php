<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('dokter/index', [
            "dokters" => $dokters
        ]);
    }

    public function create()
    {
        return view('dokter/create');
    }

    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'nama' => 'required|min:3',
            'jk' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'telp' => 'required|numeric',
        ]);

        Dokter::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ]);

        return redirect('/dokter');
    }

    public function edit($id)
    {
        $dokter = Dokter::find($id);

        return view('dokter.edit', [
            'dokter' => $dokter,
        ]);
    }

    public function update($id, Request $request)
    {
        //validasi data
        $request->validate([
            'nama' => 'required|min:3',
            'jk' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'telp' => 'required|numeric',
        ]);

        //cari dokter berdasarkan id
        $dokter = Dokter::find($id);

        // Simpan perubahan
        $dokter->update([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ]);

        return redirect('/dokter')->with('success', 'Data dokter berhasil diubah');
    }
    
    public function destroy(Request $request){
        Dokter::destroy($request->id);

        return redirect('/dokter')->with('success', 'Data berhasil dihapus');
    }
}
