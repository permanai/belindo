<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perabot_dapur extends Model
{
    protected $table = 'perabot_dapurs';
    protected $fillable = ['nama','id_produk', 'foto','kategori_id', 'harga', 'jumlah', 'tglbeli','deskripsi','berat'];
    protected $dates = ['tglbeli'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
