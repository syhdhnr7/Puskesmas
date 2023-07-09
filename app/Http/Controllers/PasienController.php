<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien/index', [
            "pasiens" => $pasiens
        ]);
    }

    public function create()
    {
        $dokters = Dokter::all();
        return view('pasien/create', [
            'dokters' => $dokters
        ]);
    }

    //method untuk menyimpan data ke database
    public function store(Request $request)
    {

        //validasi data
        $request->validate([
            'nama' => 'required|min:3',
            'jk' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'telp' => 'required|numeric',
            'dokter_id' => 'required',
        ]);

        Pasien::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'dokter_id' => $request->dokter_id,
        ]);

        return redirect('/pasien');
    }

    public function edit($id)
    {
        //cari pasien berdasarkan id
        $pasien = Pasien::find($id);

        return view('pasien.edit', [
            'pasien' => $pasien,
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

        //cari pasien berdasarkan id
        $pasien = Pasien::find($id);

        // Simpan perubahan
        $pasien->update([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ]);

        return redirect('/pasien')->with('success', 'Data pasien berhasil diubah');
    }

    //method untuk menghapus
    public function destroy(Request $request)
    {
        Pasien::destroy($request->id);

        return redirect('/pasien')->with('success', 'Data berhasil dihapus');
    }
}
