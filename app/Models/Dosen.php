<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nidn',
        'email',
        'kode_makul',
    ];

    public function makul()
    {
        return $this->belongsTo(Makul::class, 'kode_makul', 'id');
    }
}
