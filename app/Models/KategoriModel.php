<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KategoriModel extends Model
{
    use HasFactory;
    protected $table = "master_kategori";
    protected $guarded = [];

    public static function getInformasiByKategori($id)
    {
        $query = DB::table('master_berita')->where('kategori_id', $id);
        return $query;
    }
}
