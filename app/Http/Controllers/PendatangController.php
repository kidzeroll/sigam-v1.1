<?php

namespace App\Http\Controllers;

use App\DataTables\PendatangDataTable;
use App\Models\Pendatang;
use Illuminate\Http\Request;

class PendatangController extends Controller
{

    public function index(PendatangDataTable $dataTable)
    {
        return $dataTable->render('backend.pendatang');
    }

    public function create()
    {
        $model = new Pendatang();
        return view('backend.form.form-pendatang', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:tb_pendatang,nik',
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_datang' => 'required',
            'alamat_asal' => 'required',
        ]);

        $pendatang = new Pendatang();

        $pendatang->nik = $request->nik;
        $pendatang->name = $request->name;
        $pendatang->jenis_kelamin = $request->jenis_kelamin;
        $pendatang->tanggal_datang = $request->tanggal_datang;
        $pendatang->alamat_asal = $request->alamat_asal;
        $pendatang->nomor_hp = $request->nomor_hp;
        $pendatang->keterangan = $request->keterangan;
        $pendatang->save();

        return response()->json(['status' => 'success', 'message' => 'Data pendatang berhasil ditambah',]);
    }

    public function show($id)
    {
        $model = Pendatang::findOrFail($id);
        return view('backend.show.show-pendatang', compact('model'));
    }

    public function edit($id)
    {
        $model = Pendatang::findOrFail($id);
        return view('backend.form.form-pendatang', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|unique:tb_penduduk,nik,' . $id,
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_datang' => 'required',
            'alamat_asal' => 'required',
        ]);

        $pendatang = Pendatang::findOrFail($id);

        $pendatang->nik = $request->nik;
        $pendatang->name = $request->name;
        $pendatang->jenis_kelamin = $request->jenis_kelamin;
        $pendatang->tanggal_datang = $request->tanggal_datang;
        $pendatang->alamat_asal = $request->alamat_asal;
        $pendatang->nomor_hp = $request->nomor_hp;
        $pendatang->keterangan = $request->keterangan;
        $pendatang->save();

        return response()->json(['status' => 'success', 'message' => 'Data pendatang berhasil diupdate',]);
    }

    public function destroy($id)
    {
        Pendatang::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Data pendatang berhasil dihapus',]);
    }
}
