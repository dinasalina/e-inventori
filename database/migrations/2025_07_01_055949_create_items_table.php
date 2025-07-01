<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('items', function (Blueprint $table) {
        $table->id();
        $table->string('nama_barang');
        $table->string('kod_barang')->unique();
        $table->integer('kuantiti');
        $table->string('lokasi_simpanan');
        $table->integer('paras_minimum')->default(0);
        $table->text('catatan')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
