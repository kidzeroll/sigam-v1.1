<?php

namespace App\Http\Controllers;

use App\DataTables\KelahiranDataTable;
use App\Models\Kelahiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelahiranController extends Controller
{

    public function index(KelahiranDataTable $dataTable)
    {
        return $dataTable->render('backend.kelahiran');
    }

    public function create()
    {
        $model = new Kelahiran();
        return view('backend.form.form-kelahiran', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'akte' => 'mimes:jpeg,png,pdf',
        ]);


        $kelahiran = new Kelahiran();

        $akte = $request->file('akte');
        if ($akte) {
            $akte_path     = $akte->store('images/akte', 'public');
            $kelahiran->akte    = $akte_path;
        }

        $kelahiran->name = $request->name;
        $kelahiran->jenis_kelamin = $request->jenis_kelamin;
        $kelahiran->tanggal_lahir = $request->tanggal_lahir;
        $kelahiran->tempat_lahir = $request->tempat_lahir;
        $kelahiran->nama_ayah = $request->nama_ayah;
        $kelahiran->nama_ibu = $request->nama_ibu;
        $kelahiran->keterangan = $request->keterangan;
        $kelahiran->save();

        return response()->json(['status' => 'success', 'message' => 'Data kelahiran berhasil ditambah',]);
    }

    public function show($id)
    {
        $model = Kelahiran::findOrFail($id);
        return view('backend.show.show-kelahiran', compact('model'));
    }

    public function edit($id)
    {
        $model = Kelahiran::findOrFail($id);
        return view('backend.form.form-kelahiran', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'akte' => 'mimes:jpeg,png,pdf',
        ]);

        $kelahiran = Kelahiran::findOrFail($id);

        $new_akte = $request->file('akte');

        if ($new_akte) {
            if ($kelahiran->akte && file_exists(storage_path('app/public/' . $kelahiran->akte))) {
                Storage::delete('public/' . $kelahiran->akte);
            }

            $new_akte_path = $new_akte->store('images/akte', 'public');

            $kelahiran->akte = $new_akte_path;
        }

        $kelahiran->name = $request->name;
        $kelahiran->jenis_kelamin = $request->jenis_kelamin;
        $kelahiran->tanggal_lahir = $request->tanggal_lahir;
        $kelahiran->tempat_lahir = $request->tempat_lahir;
        $kelahiran->nama_ayah = $request->nama_ayah;
        $kelahiran->nama_ibu = $request->nama_ibu;
        $kelahiran->keterangan = $request->keterangan;
        $kelahiran->save();

        return response()->json(['status' => 'success', 'message' => 'Data kelahiran berhasil diupdate',]);
    }

    public function destroy($id)
    {
        $kelahiran = Kelahiran::findOrFail($id);

        if ($kelahiran->akte && file_exists(storage_path('app/public/' . $kelahiran->akte))) {
            Storage::delete('public/' . $kelahiran->akte);
        }

        Kelahiran::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Data kelahiran berhasil dihapus',]);
    }
}
