<?php

namespace App\Http\Controllers;

use App\DataTables\PekerjaanDataTable;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{

    public function index(PekerjaanDataTable $dataTable)
    {
        return $dataTable->render('backend.pekerjaan');
    }

    public function create()
    {
        $model = new Pekerjaan();
        return view('backend.form.form-pekerjaan', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $pekerjaan = new Pekerjaan();

        $pekerjaan->name = $request->name;
        $pekerjaan->save();

        return response()->json(['status' => 'success', 'message' => 'Pekerjaan berhasil ditambah',]);
    }

    public function show($id)
    {
        $model = Pekerjaan::findOrFail($id);
        return view('backend.show.show-pekerjaan', compact('model'));
    }

    public function edit($id)
    {
        $model = Pekerjaan::findOrFail($id);
        return view('backend.form.form-pekerjaan', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $pekerjaan = Pekerjaan::findOrFail($id);

        $pekerjaan->name = $request->name;
        $pekerjaan->save();

        return response()->json(['status' => 'success', 'message' => 'Pekerjaan berhasil diupdate',]);
    }

    public function destroy($id)
    {
        Pekerjaan::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Pekerjaan berhasil dihapus',]);
    }
}
