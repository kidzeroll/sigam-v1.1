<?php

namespace App\Http\Controllers;

use App\DataTables\PengaduanDataTable;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index(PengaduanDataTable $dataTable)
    {
        return $dataTable->render('backend.pengaduan.pengaduan');
    }

    public function create()
    {
        return view('frontend.pengaduan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'no_hp' => 'required',
            'laporan' => 'mimes:png,jpg',
        ]);

        $pengaduan = new Pengaduan();

        $laporan = $request->file('laporan');
        if ($laporan) {
            $laporan_path     = $laporan->store('images/laporan', 'public');
            $pengaduan->laporan    = $laporan_path;
        }

        $pengaduan->name = $request->name;
        $pengaduan->judul = $request->judul;
        $pengaduan->isi = $request->isi;
        $pengaduan->no_hp = $request->no_hp;
        $pengaduan->save();

        return redirect()->route('pengaduan.create')->with('success', 'Pengaduan Berhasil Diajukan');
    }

    public function show($id)
    {
        $model = Pengaduan::findOrFail($id);
        return view('backend.pengaduan.show-pengaduan', compact('model'));
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        if ($pengaduan->laporan && file_exists(storage_path('app/public/' . $pengaduan->laporan))) {
            Storage::delete('public/' . $pengaduan->laporan);
        }
        $pengaduan->delete();
        return response()->json(['status' => 'success', 'message' => 'Pengaduan berhasil dihapus',]);
    }


    public function tanggapi($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->status = 'ditanggapi';
        $pengaduan->save();

        return response()->json(['status' => 'success', 'message' => 'Pengaduan berhasil ditanggapi',]);
    }

    public function beritahukan($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->status = 'selesai';
        $pengaduan->save();

        $key = 'test-arifapp-1234567890';
        $phone = $pengaduan->no_hp;
        $judul = $pengaduan->judul;
        $name = $pengaduan->name;

        $message = "Halo " . $name . "\nPengaduan anda : " . $judul . "\n\nTelah kami tanggapi.\nTerimakasih sudah melapor kepada kami^\n\n\n\nSIGAM TEAM";

        $response = Http::post('https://api.arif.app/api/send', ['key' => $key, 'no' => $phone, 'pesan' => $message]);
        return $response->successful();
    }
}
