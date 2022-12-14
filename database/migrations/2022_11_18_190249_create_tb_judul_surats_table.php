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
        Schema::create('tb_judul_surats', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jenis_surat', 4)->nullable();
            $table->string('slug', 4)->nullable();
            $table->string('judul_surat', 200)->nullable();
            $table->string('masa_aktif', 10)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('tb_judul_surats');
    }
};
