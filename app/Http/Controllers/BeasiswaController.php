<?php

namespace App\Http\Controllers;

use App\Models\BeasiswaModel;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function index()
    {
        return view('admin.beasiswa.beasiswa_view');
    }

    public function tambah()
    {
        return view('admin.beasiswa.beasiswa_create');
    }

    public function tambah_action(Request $request)
    {
        $token = uniqid();
        $file = $request->file('foto_beasiswa');
        $nama_beasiswa = $request->nama_beasiswa;
        $deskripsi_beasiswa = $request->deskripsi_beasiswa;

        $file_name = $token . '.' . $file->getClientOriginalExtension();

        $data = [
            'nama_beasiswa' => $nama_beasiswa,
            'deskripsi_beasiswa' => $deskripsi_beasiswa,
            'foto_beasiswa' => $file_name
        ];

        $file->move('berita', $file_name);
        BeasiswaModel::create($data);
        return redirect('/beasiswa')->with('success', 'Beasiswa Berhasil di Tambahkan');
    }
}
