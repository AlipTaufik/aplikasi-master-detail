<?php
/*
 Nama file: App/Models/PenjualandetailModel.php
 Tools : LaravelGhost v1
 Created By : Freddy Wicaksono, M.Kom
 Tanggal : 17-Jun-2024
*/
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PenjualandetailModel extends Model
{
    use HasFactory;
    protected $table = 'penjualandetail';
    public $timestamps = false;
    protected $fillable = ['penjualan_id','kode_barang','qty','harga','subtotal'];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'kode_barang','kode_barang');
    }
    public function penjualan()
    {
        return $this->belongsTo(PenjualanModel::class, 'penjualan_id','id');
    }
}
