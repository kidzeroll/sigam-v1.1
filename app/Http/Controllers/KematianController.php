<?php

namespace App\Http\Controllers;

use App\DataTables\KematianDataTable;
use App\Models\Kematian;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class KematianController extends Controller
{

    public function index(KematianDataTable $dataTable)
    {
        return $dataTable->render('backend.kematian');
    }

    public function create()
    {
        $model = new Kematian();
        $penduduks = Penduduk::all(['id', 'nik', 'name']);
        return view('backend.form.form-kematian', compact('model', 'penduduks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penduduk_id' => 'required',
            'tanggal_kematian' => 'required',
        ]);

        $kematian = new Kematian();

        $kematian->penduduk_id = $request->penduduk_id;
        $kematian->tanggal_kematian = $request->tanggal_kematian;
        $kematian->keterangan = $request->keterangan;
        $kematian->save();

        $penduduk = Penduduk::where('id', $kematian->penduduk_id)->first();
        $penduduk->status = 'meninggal';
        $penduduk->save();

        return response()->json(['status' => 'success', 'message' => 'Data kematian berhasil ditambah',]);
    }

    public function show($id)
    {
        $model = Kematian::findOrFail($id);

        return view('backend.show.show-kematian', compact('model'));
    }

    public function edit($id)
    {
        $model = Kematian::findOrFail($id);
        $penduduks = Penduduk::all(['id', 'nik', 'name']);

        return view('backend.form.form-kematian', compact('model', 'penduduks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penduduk_id' => 'required',
            'tanggal_kematian' => 'required',
        ]);

        $kematian = Kematian::findOrFail($id);

        $kematian->penduduk_id = $request->penduduk_id;
        $kematian->tanggal_kematian = $request->tanggal_kematian;
        $kematian->keterangan = $request->keterangan;
        $kematian->save();

        $penduduk = Penduduk::where('id', $id)->first();
        $penduduk->status = 'meninggal';
        $penduduk->save();

        return response()->json(['status' => 'success', 'message' => 'Data kematian berhasil diupdate',]);
    }

    public function destroy($id)
    {
        Kematian::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Data kematian berhasil dihapus',]);
    }
}
