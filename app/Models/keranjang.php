<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    protected $table = 'keranjangs';
    protected $fillable = ['id_user','id_produk', 'nama','foto', 'harga_retail','harga_reseller'];
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
