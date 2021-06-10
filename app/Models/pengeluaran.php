<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    use HasFactory;
    protected $table = "pengeluaran";
    protected $fillable = [
         'id_karyawan',
                'nama_karyawan',
                'divisi',
                'keperluan',
                'total_harga',
                'tanggal_permintaan'
    ];    
}
