<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';

    protected $fillable = [
        'nama_perusahaan',
        'email',
        'contact_person',
        'deskripsi_perusahaan',
        'syarat_ketentuan',
        'gambar_perusahaan',
        'alamat_perusahaan'
    ];

   
}

