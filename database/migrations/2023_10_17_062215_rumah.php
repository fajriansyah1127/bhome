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
        Schema::create('rumah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('type_id');
            $table->foreignId('kode_rumah');
            $table->string('alamat');
            $table->string('pdam');
            $table->string('pln');
            $table->string('latitude');
            $table->string('longtitude');
            $table->date('jatuh_ tempo');
            $table->string('foto');
            $table->string('jumlah_penghuni');
            $table->timestamps();
        });

        Schema::table('type', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('type')->ondelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->ondelete('restrict');
            // $table->foreign('produk_id')->references('id')->on('asuransis')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
