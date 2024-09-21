<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    public $table = "siswa";

    protected $fillable = [
        'ekstrakulikuler_id',
        'nama_depan',
        'nama_belakang',
        'no_hp',
        'no_induk_siswa',
        'alamat',
        'jenis_kelamin',
        'foto',
    ];

    public function ekstrakulikuler(){
        return $this->belongsTo(Ekstrakulikuler::class,'ekstrakulikuler_id', 'id');
    }
}
