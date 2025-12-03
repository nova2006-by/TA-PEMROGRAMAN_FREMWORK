<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam_m extends Model
{
    use HasFactory;

    protected $table = 'mst_pinjam';
    protected $primaryKey = 'ID_Pinjam';
    public $timestamps = false;

    protected $fillable = [
        'ID_Anggota',
        'ID_Buku',
        'tgl_pinjam',
        'tgl_kembali'
    ];
}
