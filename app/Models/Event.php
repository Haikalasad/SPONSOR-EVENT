<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'nama_acara',
        'penyelenggara',
        'waktu_pelaksanaan',
        'lokasi',
        'deskripsi',
        'syarat_ketentuan',
        'gambar_acara',
        'id_user',
        'id_kategori'
    ];

    public function categories()
    {
        return $this->belongsTo(Kategori::class,'id_kategori');
                   
    }
    

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

