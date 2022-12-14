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
        Schema::create('tb_data_mahasiswas', function (Blueprint $table) {
            $table->string('npm', 9)->primary();
            $table->string('angkatan',4)->nullable();
            $table->string('nama',200)->nullable();
            $table->string('email',100)->unique()->nullable();
            $table->enum('jenkel', ['L', 'P'])->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('kode_prodi',4)->nullable();
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
        Schema::dropIfExists('tb_data_mahasiswas');
    }
};
