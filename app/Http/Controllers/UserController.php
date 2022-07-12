<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('backend.user');
    }

    public function create()
    {
        $model = new User();
        return view('backend.form.form-user', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:tb_user,email',
            'password' => 'required',
            'gender' => 'required',
            'role' => 'required',
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->role = $request->role;

        $user->save();

        return response()->json(['status' => 'success', 'message' => 'User berhasil ditambah',]);
    }

    public function show($id)
    {
        $model = User::findOrFail($id);
        return view('backend.show.show-user', compact('model'));
    }

    public function edit($id)
    {
        $model = User::findOrFail($id);
        return view('backend.form.form-user', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:tb_user,email,' . $id,
            'gender' => 'required',
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);

        if (request('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->role = $request->role;

        $user->save();

        return response()->json(['status' => 'success', 'message' => 'User berhasil diupdate',]);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'User berhasil dihapus',]);
    }
}
