<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    protected $table = 'wishlists';
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
