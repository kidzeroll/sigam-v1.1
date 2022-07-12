<?php

namespace App\Http\Controllers;

use App\DataTables\PendidikanDataTable;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function index(PendidikanDataTable $dataTable)
    {
        return $dataTable->render('backend.pendidikan');
    }

    public function create()
    {
        $model = new Pendidikan();
        return view('backend.form.form-pendidikan', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $pendidikan = new Pendidikan();

        $pendidikan->name = $request->name;
        $pendidikan->save();

        return response()->json(['status' => 'success', 'message' => 'Pendidikan berhasil ditambah',]);
    }

    public function show($id)
    {
        $model = Pendidikan::findOrFail($id);
        return view('backend.show.show-pendidikan', compact('model'));
    }

    public function edit($id)
    {
        $model = Pendidikan::findOrFail($id);
        return view('backend.form.form-pendidikan', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $pendidikan = Pendidikan::findOrFail($id);

        $pendidikan->name = $request->name;
        $pendidikan->save();

        return response()->json(['status' => 'success', 'message' => 'Pendidikan berhasil diupdate',]);
    }

    public function destroy($id)
    {
        Pendidikan::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Pendidikan berhasil dihapus',]);
    }
}
