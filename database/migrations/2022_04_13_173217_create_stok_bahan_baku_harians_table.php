<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_bahan_baku_harians', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_bahan_baku');
            $table->foreign('id_bahan_baku')->references('id')
            ->on('bahan_bakus')->onDelete('cascade');
            $table->date('date');
            $table->double('stok');
            $table->enum('tipe',['prediksi','realisasi']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_bahan_baku_harians');
    }
};
