<?php

namespace App\Http\Controllers;

use App\DataTables\DusunDataTable;
use App\Models\Dusun;
use Illuminate\Http\Request;

class DusunController extends Controller
{

    public function index(DusunDataTable $dataTable)
    {
        return $dataTable->render('backend.dusun');
    }

    public function create()
    {
        $model = new Dusun();
        return view('backend.form.form-dusun', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $dusun = new Dusun();

        $dusun->name = $request->name;
        $dusun->rt = $request->rt;
        $dusun->rw = $request->rw;
        $dusun->save();

        return response()->json(['status' => 'success', 'message' => 'Dusun berhasil ditambah',]);
    }

    public function show($id)
    {
        $model = Dusun::findOrFail($id);
        return view('backend.show.show-dusun', compact('model'));
    }

    public function edit($id)
    {
        $model = Dusun::findOrFail($id);
        return view('backend.form.form-dusun', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $dusun = Dusun::findOrFail($id);

        $dusun->name = $request->name;
        $dusun->rt = $request->rt;
        $dusun->rw = $request->rw;
        $dusun->save();

        return response()->json(['status' => 'success', 'message' => 'Dusun berhasil diupdate',]);
    }

    public function destroy($id)
    {
        Dusun::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Dusun berhasil dihapus',]);
    }
}
