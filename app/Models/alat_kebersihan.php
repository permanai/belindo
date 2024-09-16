<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alat_kebersihan extends Model
{
    protected $table = 'alat_kebersihans';
    protected $fillable = ['nama','id_produk', 'foto','kategori_id', 'harga_retail','harga_reseller', 'jumlah', 'tglbeli','deskripsi','berat'];
    protected $dates = ['tglbeli'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
