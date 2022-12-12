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
        Schema::create('tb_loghistory_surat_umums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable();
            $table->string('kode_prodi',4)->nullable();
            $table->string('nomor_surat',200)->nullable();
            $table->foreignId('id_lampiran')->nullable();
            $table->foreignId('id_perihal')->nullable();
            $table->foreignId('id_tujuan')->nullable();
            $table->text('isi_surat')->nullable();
            $table->text('tembusan')->nullable();
            $table->enum('kepala_operator', ['Y','N','belum diverifikasi'])->default('belum diverifikasi');
            $table->text('catatan_kepala_operator')->nullable();
            $table->timestamp('time_acc_kep_operator')->nullable();
            $table->enum('status_persetujuan', ['Y','N','belum diverifikasi'])->default('belum diverifikasi');
            $table->foreignId('id_persetujuan')->nullable();
            $table->timestamp('time_acc_ttd')->nullable();
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
        Schema::dropIfExists('tb_loghistory_surat_umums');
    }
};
