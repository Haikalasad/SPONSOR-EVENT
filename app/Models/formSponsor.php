<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formSponsor extends Model
{

    protected $table = 'pengajuan_sponsor';
    protected $fillable = [
        'id_user',
        'id_perusahaan',
        'nama_acara',
        'tanggal_mulai',
        'tanggal_berakhir',
        'nama_penerima',
        'nominal',
        'rekening',
        'proposal_kegiatan',
        'surat_pengantar',
        'proposal_sponsor',
        'status_approval',
        'status_transfer'
        
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class,'id_perusahaan');
                   
    }

    public function status_approval()
    {
        return $this->belongsTo(Status_approval::class,'status_approve');
                   
    }
    
    public function status_transfer()
    {
        return $this->belongsTo(Status_transfer::class,'status_transfer');
                   
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

