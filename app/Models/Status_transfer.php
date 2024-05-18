<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_transfer extends Model
{
    use HasFactory;

    protected $table = 'status_transfer';

    protected $fillable = ['status_transfer']; 
   
}
