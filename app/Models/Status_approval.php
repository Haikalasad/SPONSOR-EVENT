<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_approval extends Model
{
    use HasFactory;

    protected $table = 'status_approval'; // Menentukan nama tabel secara eksplisit

    protected $fillable = ['status_approve']; 
   
}
