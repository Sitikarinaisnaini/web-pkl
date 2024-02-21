<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkl extends Model
{
    use HasFactory;
    protected $table ='pkl';
    protected $fillable =[
        'siswa_id',
        'dudi_id',
        'tgl_masuk',
        'tgl_keluar'
    ];

    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'siswa_id' );
    }

    public function dudi()
    {
        return $this->belongsTo(dudi::class, 'dudi_id' );
    }
}
