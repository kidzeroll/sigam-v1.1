<?php

namespace App\Http\Controllers;

use App\DataTables\AgamaDataTable;
use App\Models\Agama;
use Illuminate\Http\Request;

class AgamaController extends Controller
{

    public function index(AgamaDataTable $dataTable)
    {
        return $dataTable->render('backend.agama');
    }

    public function create()
    {
        $model = new Agama();
        return view('backend.form.form-agama', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $agama = new Agama();

        $agama->name = $request->name;
        $agama->save();

        return response()->json(['status' => 'success', 'message' => 'Agama berhasil ditambah',]);
    }

    public function show($id)
    {
        $model = Agama::findOrFail($id);
        return view('backend.show.show-agama', compact('model'));
    }

    public function edit($id)
    {
        $model = Agama::findOrFail($id);
        return view('backend.form.form-agama', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $agama = Agama::findOrFail($id);

        $agama->name = $request->name;
        $agama->save();

        return response()->json(['status' => 'success', 'message' => 'Agama berhasil diupdate',]);
    }

    public function destroy($id)
    {
        Agama::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Agama berhasil dihapus',]);
    }
}
