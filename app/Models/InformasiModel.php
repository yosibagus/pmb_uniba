<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InformasiModel extends Model
{
    use HasFactory;
    protected $table = "master_berita";
    protected $guarded = [];

    public static function getAllBerita()
    {
        $query = DB::table('master_berita')
            ->join('master_kategori', 'master_berita.kategori_id', '=', 'master_kategori.id_kategori');
        return $query;
    }

    public static function getDetailBerita($token)
    {
        $query = DB::table('master_berita')
            ->join('master_kategori', 'master_berita.kategori_id', '=', 'master_kategori.id_kategori')
            ->where('master_berita.token_berita', $token);
        return $query;
    }
}
