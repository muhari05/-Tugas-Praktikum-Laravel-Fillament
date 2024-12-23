<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'jenis_kelamin',
        'jurusan',
        'fakultas',
        'kode_makul',
    ];

    public function makul()
{
    return $this->belongsTo(Makul::class, 'kode_makul');
}

}
