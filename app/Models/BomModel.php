<?php

namespace App\Models;

use App\Models\BomListModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BomModel extends Model
{
    use HasFactory;
    protected $table = "t_bom";
    protected $primaryKey = 'kode_bom';
    public $incrementing = false;
    protected $fillable = ['kode_bom','kode_produk','tanggal','total_harga'];
    public $timestamps = false;

}

