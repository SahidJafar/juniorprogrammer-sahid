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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ekstrakulikuler_id');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('no_hp');
            $table->string('no_induk_siswa');
            $table->string('alamat');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('foto');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('siswa', function(Blueprint $table){
            $table->foreign('ekstrakulikuler_id')->references('id')->on('ekstrakulikuler');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
