<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the table exists before creating it
        // if (!Schema::hasTable('produks')) {
            Schema::create('produks', function (Blueprint $table) {
                $table->id();
                $table->integer('id_produk'); 
                $table->string('nama'); 
                $table->string('foto'); 
                $table->unsignedBigInteger('kategori_id');
                $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
                $table->integer('harga_retail');
                $table->integer('harga_reseller'); 
                $table->integer('jumlah');
                $table->date('tglbeli');
                $table->text('deskripsi');
                $table->decimal('berat',10,2);
                
                $table->timestamps();
            });
        // }
    }

   
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};