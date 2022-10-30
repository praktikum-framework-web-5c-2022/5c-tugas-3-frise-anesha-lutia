<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    
    protected $table = "dosen";
    protected $fillable = [
    	'nidn',
        'nama' ,
        'jenis_kelamin',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'photo',
        'created_at',
        'updated_at'
    ];
}
