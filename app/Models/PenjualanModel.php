<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    public $timestamps = false;
    protected $fillable = ['nomor_bukti','tanggal','total_pembelian','status_pembayaran'];
}
