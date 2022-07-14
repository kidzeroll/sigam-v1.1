<?php

namespace App\Http\Controllers;

use App\DataTables\PindahDataTable;
use App\Models\Penduduk;
use App\Models\Pindah;
use Illuminate\Http\Request;

class PindahController extends Controller
{

    public function index(PindahDataTable $dataTable)
    {
        return $dataTable->render('backend.pindah');
    }

    public function create()
    {
        $model = new Pindah();
        $penduduks = Penduduk::all(['id', 'nik', 'name', 'alamat', 'jenis_kelamin']);
        return view('backend.form.form-pindah', compact('model', 'penduduks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penduduk_id' => 'required',
            'tanggal_pindah' => 'required',
            'tujuan_pindah' => 'required',
        ]);

        $pindah = new Pindah();

        $pindah->penduduk_id = $request->penduduk_id;
        $pindah->tanggal_pindah = $request->tanggal_pindah;
        $pindah->tujuan_pindah = $request->tujuan_pindah;
        $pindah->keterangan = $request->keterangan;
        $pindah->save();

        $penduduk = Penduduk::where('id', $pindah->penduduk_id)->first();
        $penduduk->status = 'pindah';
        $penduduk->save();

        return response()->json(['status' => 'success', 'message' => 'Data perpindahan berhasil ditambah',]);
    }

    public function show($id)
    {
        $model = Pindah::findOrFail($id);
        return view('backend.show.show-pindah', compact('model'));
    }

    public function edit($id)
    {
        $model = Pindah::findOrFail($id);
        $penduduks = Penduduk::all(['id', 'nik', 'name', 'alamat', 'jenis_kelamin']);
        return view('backend.form.form-pindah', compact('model', 'penduduks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penduduk_id' => 'required',
            'tanggal_pindah' => 'required',
            'tujuan_pindah' => 'required',
        ]);

        $pindah = Pindah::findOrFail($id);

        $pindah->penduduk_id = $request->penduduk_id;
        $pindah->tanggal_pindah = $request->tanggal_pindah;
        $pindah->tujuan_pindah = $request->tujuan_pindah;
        $pindah->keterangan = $request->keterangan;
        $pindah->save();

        $penduduk = Penduduk::where('id', $id)->first();
        $penduduk->status = 'pindah';
        $penduduk->save();

        return response()->json(['status' => 'success', 'message' => 'Data perpindahan berhasil diupdate',]);
    }

    public function destroy($id)
    {
        Pindah::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Data perpindahan berhasil dihapus',]);
    }
}
