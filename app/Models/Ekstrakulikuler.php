<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    use HasFactory;

    public $table = 'ekstrakulikuler';

    protected $fillable = [
        'nama_ekstrakulikuler',
        'tahun_mulai',
    ];

    public function siswa(){
        return $this->hasMany(Siswa::class,'ekstrakulikuler_id', 'id');
    }
}
