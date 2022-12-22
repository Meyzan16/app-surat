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
        Schema::create('tb_log_surat_mhs_umums', function (Blueprint $table) {
            $table->id();
            $table->string('npm',9)->nullable();
            $table->string('kode_prodi',4)->nullable();
            $table->string('nomor_surat',200)->nullable();
            $table->foreignId('id_judul_surat')->nullable();
            $table->string('tujuan_surat',200)->nullable();
            $table->string('sub_tujuan',200)->nullable();
            $table->string('judul_penelitian',200)->nullable();
            $table->text('isi_surat')->nullable();
            $table->text('tembusan')->nullable();

            $table->enum('operator_prodi', ['Y','N','belum diverifikasi'])->default('belum diverifikasi');
            $table->text('catatan_operator_prodi')->nullable();
            $table->foreignId('id_operator')->nullable();
            $table->datetime('time_acc_operator_prodi')->nullable();
            

            $table->enum('kepala_operator', ['Y','N','belum diverifikasi'])->default('belum diverifikasi');
            $table->foreignId('id_kepala_operator')->nullable();
            $table->datetime('time_acc_kep_operator')->nullable();

            $table->enum('status_persetujuan', ['Y','belum diverifikasi'])->default('belum diverifikasi');
            $table->foreignId('id_persetujuan')->nullable();
            $table->datetime('time_acc_ttd')->nullable();

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
        Schema::dropIfExists('tb_log_surat_mhs_umums');
    }
};
