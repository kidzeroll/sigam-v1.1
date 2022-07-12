<?php

namespace App\Http\Controllers;

use App\Models\ProfilGampong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilGampongController extends Controller
{
    public function index()
    {

        $gampong = ProfilGampong::find(1);

        return view('backend.profil-gampong', compact('gampong'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_gampong' => 'required',
            'nama_kecamatan' => 'required',
            'nama_kabupaten' => 'required',
            'nama_provinsi' => 'required',
            'kode_pos' => 'required',
            'alamat_gampong' => 'required',
            'nama_keuchik' => 'required',
            'alamat_keuchik' => 'required',
        ]);

        $gampong = ProfilGampong::find($id);

        $logo = $request->file('logo');

        if ($logo) {
            if (
                $gampong->logo && file_exists(storage_path('app/public/' . $gampong->logo))
            ) {
                Storage::delete('public/' . $gampong->logo);
            }

            $logo_path = $logo->store('images/logo', 'public');

            $gampong->logo = $logo_path;
        }

        $gampong->nama_gampong = $request->nama_gampong;
        $gampong->nama_kecamatan = $request->nama_kecamatan;
        $gampong->nama_kabupaten = $request->nama_kabupaten;
        $gampong->nama_provinsi = $request->nama_provinsi;
        $gampong->kode_pos = $request->kode_pos;
        $gampong->kode_gampong = $request->kode_gampong;
        $gampong->alamat_gampong = $request->alamat_gampong;
        $gampong->nama_keuchik = $request->nama_keuchik;
        $gampong->alamat_keuchik = $request->alamat_keuchik;
        $gampong->twitter = $request->twitter;
        $gampong->facebook = $request->facebook;
        $gampong->whatsapp = $request->whatsapp;
        $gampong->instagram = $request->instagram;
        $gampong->map = $request->map;
        $gampong->save();

        return redirect()->back()->with('success', 'Profil gampong berhasil diupdate');
    }
}
