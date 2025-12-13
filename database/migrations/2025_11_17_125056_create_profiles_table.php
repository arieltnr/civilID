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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_profil');
            $table->string('alamat_profil')->nullable();
            $table->string('nama_kontak_profil')->nullable();
            $table->string('no_kontak_profil')->nullable();
            $table->text('latar_belakang')->nullable();
            $table->text('tujuan')->nullable();
            $table->text('visi_misi')->nullable();
            $table->text('motto')->nullable();
            $table->integer('tahun')->nullable();
            $table->text('logo')->nullable();
            $table->text('banner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
