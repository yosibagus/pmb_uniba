<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = $this->getKategori_();
        $no = 1;
        return view('admin.kategori.kategori_view', compact('kategori', 'no'));
    }

    private function getKategori_()
    {
        $kategori = KategoriModel::all();

        foreach ($kategori as $get) {
            $informasi = KategoriModel::getInformasiByKategori($get->id_kategori)->count();
            $data[] = [
                'id_kategori' => $get->id_kategori,
                'nama_kategori' => $get->nama_kategori,
                'created_at' => $get->created_at,
                'jumlah' => $informasi
            ];
        }

        return $data;
    }

    public function tambah_action(Request $request)
    {
        $data = [
            'nama_kategori' => $request->nama_kategori
        ];

        KategoriModel::create($data);
        return redirect('/kategori')->with('success', 'Data Berhasil Disimpan');
    }

    public function hapus($id)
    {
        KategoriModel::where('id_kategori', $id)->delete();
        return redirect('/kategori')->with('success', 'Data Berhasil Dihapus');
    }

    public function edit_action(Request $request, $id)
    { 
        $data = [
            'nama_kategori' => $request->nama_kategori
        ];

        KategoriModel::where('id_kategori', $id)->update($data);
        return redirect('/kategori')->with('success', 'Perubahan Berhasil Disimpan');
    }
}
