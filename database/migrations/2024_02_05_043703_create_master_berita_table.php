<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_berita', function (Blueprint $table) {
            $table->increments('id_berita');
            $table->string('token_berita', 30);
            $table->text('judul_berita');
            $table->date('tgl_berita');
            $table->string('foto_berita', 50);
            $table->text('isi_berita');
            $table->integer('kategori_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_berita');
    }
};
