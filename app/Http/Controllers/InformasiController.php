<?php

namespace App\Http\Controllers;

use App\Models\InformasiModel;
use App\Models\KategoriModel;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class InformasiController extends Controller
{
    public function index()
    {
        $informasi = InformasiModel::getAllBerita()->get();
        $no = 1;
        return view('admin.informasi.informasi_view', compact('informasi', 'no'));
    }

    public function tambah()
    {
        $kategori = KategoriModel::all();
        return view('admin.informasi.informasi_create', compact('kategori'));
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            $token = Str::random(12);

            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $token . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    public function tambah_action(Request $request)
    {
        $token = uniqid();
        $token_berita = Str::random('13');
        $file = $request->file('foto_berita');
        $judul_berita = $request->judul_berita;
        $kategori_id = $request->kategori_id;
        $tgl_berita = $request->tgl_berita == '' ? date('Y-m-d') : $request->tgl_berita;
        $isi_berita = $request->isi_berita;
        $status = $request->status;

        $file_name = $token . '.' . $file->getClientOriginalExtension();

        $data = [
            'token_berita' => $token_berita,
            'judul_berita' => $judul_berita,
            'kategori_id' => $kategori_id,
            'tgl_berita' => $tgl_berita,
            'isi_berita' => $isi_berita,
            'foto_berita' => $file_name,
            'status_post' => $status
        ];

        $file->move('informasi', $file_name);
        InformasiModel::create($data);
        return redirect('/info')->with('success', 'Informasi berhasil di Simpan');
    }

    public function detail($id)
    {
        $detail = InformasiModel::getDetailBerita($id)->first();
        return view('admin.informasi.informasi_detail', compact('detail'));
    }

    public function hapus($id)
    {
        $file = InformasiModel::where('token_berita', $id);
        $img = $file->first();

        File::delete('informasi/' . $img->foto_berita);
        $file->delete();

        redirect('/info')->with('success', 'Informasi Berhasil di Hapus');
    }
}
