<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
   
    protected $table = 'kategori';
    protected $fillable = ['kategori_id','kategori']; 
    public function produks()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
    public function alat_kebersihans()
    {
        return $this->hasMany(alat_kebersihan::class, 'kategori_id');
    }
    public function alat_kecantikans()
    {
        return $this->hasMany(alat_kecantikan::class, 'kategori_id');
    }
    public function alat_tulis_kantors()
    {
        return $this->hasMany(alat_tulis_kantor::class, 'kategori_id');
    }
    public function barang_uniks()
    {
        return $this->hasMany(barang_unik::class, 'kategori_id');
    }
    public function elektroniks()
    {
        return $this->hasMany(elektronik::class, 'kategori_id');
    }
    public function fashions()
    {
        return $this->hasMany(fashion::class, 'kategori_id');
    }
    public function ibu_anaks()
    {
        return $this->hasMany(ibu_anak::class, 'kategori_id');
    }
    public function perabot_dapurs()
    {
        return $this->hasMany(perabot_dapur::class, 'kategori_id');
    }
    public function perabot_rumahs()
    {
        return $this->hasMany(perabot_rumah::class, 'kategori_id');
    }
    public function produk_kesehatans()
    {
        return $this->hasMany(produk_kesehatan::class, 'kategori_id');
    }

}
