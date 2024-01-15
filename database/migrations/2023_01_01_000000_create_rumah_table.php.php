<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Haruncpi\LaravelIdGenerator\IdGenerator;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rumah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengajuan_id')->nullable();
            $table->foreignId('type_id');
            $table->string('kode_rumah');
            $table->string('alamat');
            $table->string('pdam');
            $table->string('pln');
            $table->string('latitude');
            $table->string('longtitude');
            $table->date('jatuh_tempo')->nullable();
            $table->string('foto')->nullable();
            $table->string('jumlah_penghuni')->nullable();
            $table->timestamps();
        });


        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('rumah_id')->nullable();
            $table->string('kode_pengajuan');
            $table->string('foto');
            $table->string('catatan');
            $table->string('jumlah_penghuni');
            $table->string('status_pengajuan');
            $table->string('status_pembayaran');
            $table->timestamps();
        });

        Schema::table('rumah', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('type')->ondelete('restrict');
            $table->foreign('pengajuan_id')->references('id')->on('pengajuan')->onDelete('restrict');
            // $table->foreign('produk_id')->references('id')->on('asuransis')->ondelete('cascade');
        });

        Schema::table('pengajuan', function (Blueprint $table) {
            $table->foreign('rumah_id')->references('id')->on('rumah')->ondelete('restrict');
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
