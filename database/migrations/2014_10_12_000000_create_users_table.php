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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('username', 50)->nullable();
            $table->string('password', 100)->nullable();
            $table->enum('roles', ['VERIF_PRODI','OPERATOR_PRODI', 'KEPALA_OPERATOR', 'VERIF_PERSETUJUAN' , 'KOOR_TU' ])->nullable();
            $table->enum('status_aktif', ['Y', 'N'])->default('N');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
