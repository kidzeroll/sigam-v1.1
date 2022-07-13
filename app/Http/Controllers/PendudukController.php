<?php

namespace App\Http\Controllers;

use App\DataTables\PendudukDataTable;
use App\Models\Agama;
use App\Models\Dusun;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendudukController extends Controller
{

    public function index(PendudukDataTable $dataTable)
    {
        return $dataTable->render('backend.penduduk');
    }

    public function create()
    {
        $model = new Penduduk();
        $agamas = Agama::all(['id', 'name']);
        $dusuns = Dusun::all(['id', 'name']);
        $pekerjaans = Pekerjaan::all(['id', 'name']);
        $pendidikans = Pendidikan::all(['id', 'name']);

        return view('backend.form.form-penduduk', compact('model', 'agamas', 'dusuns', 'pekerjaans', 'pendidikans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'agama_id' => 'required',
            'pendidikan_id' => 'required',
            'pekerjaan_id' => 'required',
            'dusun_id' => 'required',

            'no_kk' => 'required',
            'nik' => 'required|unique:tb_penduduk,nik',
            'name' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'status_perkawinan' => 'required',
            'hubungan' => 'required',
            'kewarganegaraan' => 'required',
            'ktp' => 'mimes:jpeg,png,pdf',
        ]);

        $penduduk = new Penduduk();

        $ktp = $request->file('ktp');
        if ($ktp) {
            $ktp_path     = $ktp->store('images/ktp', 'public');
            $penduduk->ktp    = $ktp_path;
        }

        $penduduk->agama_id  = $request->agama_id;
        $penduduk->pendidikan_id  = $request->pendidikan_id;
        $penduduk->pekerjaan_id  = $request->pekerjaan_id;
        $penduduk->dusun_id  = $request->dusun_id;
        $penduduk->no_kk  = $request->no_kk;
        $penduduk->nik  = $request->nik;
        $penduduk->name  = $request->name;
        $penduduk->alamat  = $request->alamat;
        $penduduk->jenis_kelamin  = $request->jenis_kelamin;
        $penduduk->tanggal_lahir  = $request->tanggal_lahir;
        $penduduk->tempat_lahir  = $request->tempat_lahir;
        $penduduk->kewarganegaraan  = $request->kewarganegaraan;
        $penduduk->no_pasport  = $request->no_pasport;
        $penduduk->no_kitas_kitap  = $request->no_kitas_kitap;
        $penduduk->status_perkawinan  = $request->status_perkawinan;
        $penduduk->hubungan  = $request->hubungan;
        $penduduk->golongan_darah  = $request->golongan_darah;
        $penduduk->penghasilan  = $request->penghasilan;
        $penduduk->nama_ayah  = $request->nama_ayah;
        $penduduk->nama_ibu  = $request->nama_ibu;

        $penduduk->save();

        return response()->json(['status' => 'success', 'message' => 'Penduduk berhasil ditambah',]);
    }

    public function show($id)
    {
        $model = Penduduk::findOrFail($id);
        return view('backend.show.show-penduduk', compact('model'));
    }

    public function edit($id)
    {
        $model = Penduduk::findOrFail($id);
        $agamas = Agama::all(['id', 'name']);
        $dusuns = Dusun::all(['id', 'name']);
        $pekerjaans = Pekerjaan::all(['id', 'name']);
        $pendidikans = Pendidikan::all(['id', 'name']);

        return view('backend.form.form-penduduk', compact('model', 'agamas', 'dusuns', 'pekerjaans', 'pendidikans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'agama_id' => 'required',
            'pendidikan_id' => 'required',
            'pekerjaan_id' => 'required',
            'dusun_id' => 'required',

            'no_kk' => 'required',
            'nik' => 'required|unique:tb_penduduk,nik,' . $id,
            'name' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'status_perkawinan' => 'required',
            'hubungan' => 'required',
            'kewarganegaraan' => 'required',
            'ktp' => 'mimes:jpeg,png,pdf',
        ]);

        $penduduk = Penduduk::findOrFail($id);

        $new_ktp = $request->file('ktp');

        if ($new_ktp) {
            if ($penduduk->ktp && file_exists(storage_path('app/public/' . $penduduk->ktp))) {
                Storage::delete('public/' . $penduduk->ktp);
            }

            $new_ktp_path = $new_ktp->store('images/ktp', 'public');

            $penduduk->ktp = $new_ktp_path;
        }

        $penduduk->agama_id  = $request->agama_id;
        $penduduk->pendidikan_id  = $request->pendidikan_id;
        $penduduk->pekerjaan_id  = $request->pekerjaan_id;
        $penduduk->dusun_id  = $request->dusun_id;
        $penduduk->no_kk  = $request->no_kk;
        $penduduk->nik  = $request->nik;
        $penduduk->name  = $request->name;
        $penduduk->alamat  = $request->alamat;
        $penduduk->jenis_kelamin  = $request->jenis_kelamin;
        $penduduk->tanggal_lahir  = $request->tanggal_lahir;
        $penduduk->tempat_lahir  = $request->tempat_lahir;
        $penduduk->kewarganegaraan  = $request->kewarganegaraan;
        $penduduk->no_pasport  = $request->no_pasport;
        $penduduk->no_kitas_kitap  = $request->no_kitas_kitap;
        $penduduk->status_perkawinan  = $request->status_perkawinan;
        $penduduk->hubungan  = $request->hubungan;
        $penduduk->golongan_darah  = $request->golongan_darah;
        $penduduk->penghasilan  = $request->penghasilan;
        $penduduk->nama_ayah  = $request->nama_ayah;
        $penduduk->nama_ibu  = $request->nama_ibu;

        $penduduk->save();

        return response()->json(['status' => 'success', 'message' => 'Penduduk berhasil diupdate',]);
    }

    public function destroy($id)
    {
        Penduduk::destroy($id);

        return response()->json(['status' => 'success', 'message' => 'Penduduk berhasil dihapus',]);
    }
}
