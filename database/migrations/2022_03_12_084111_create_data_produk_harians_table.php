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
        Schema::create('data_produk_harians', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_produk_varian');
            $table->foreign('id_produk_varian')->references('id')
            ->on('produk_varians')->onDelete('cascade');

            $table->date('date');
            $table->double('nilai_realisasi');
            $table->double('nilai_rencana');
            $table->double('persentase');
            
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
        Schema::dropIfExists('data_produk_harians');
    }
};
