<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;
    protected $table = 'barang';
    public $timestamps = false;
    protected $fillable = ['kode_barang','nama_barang','harga','kategori'];
}
