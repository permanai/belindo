<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

    protected $table = 'produks';
    protected $fillable = ['nama','id_produk', 'foto','kategori_id', 'harga_retail','harga_reseller', 'jumlah', 'tglbeli','deskripsi','berat'];
    protected $dates = ['tglbeli'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function getRouteKeyName()
    {
        return 'id_produk';
    }
    public function wishlishs()
    {
        return $this->hasMany(wishlist::class, 'id_produk');
    }
    public function keranjangs()
    {
        return $this->hasMany(keranjang::class, 'id_produk');
    }
    
    
}
