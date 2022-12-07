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
        Schema::create('tb_log_srt_ket_msh_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat',10)->nullable();
            $table->string('kode_judul_surat',10)->nullable();

            $table->string('npm',9)->nullable();
            $table->string('angkatan',4)->nullable();
            $table->string('kode_prodi',4)->nullable();
            $table->string('semester',50)->nullable();
            $table->string('masa_studi',50)->nullable();
        

            $table->string('nama_ortu',100)->nullable();
            $table->string('pekerjaan',100)->nullable();
            $table->string('nip',50)->nullable();
            $table->string('golongan',50)->nullable();
            $table->text('alamat')->nullable();

            
            $table->enum('operator_prodi', ['Y','N','belum diverifikasi'])->default('belum diverifikasi');
            $table->text('catatan_operator_prodi')->nullable();
            $table->foreignId('id_operator')->nullable();
            $table->timestamp('time_acc_operator_prodi')->nullable();
            

            $table->enum('kepala_operator', ['Y','N','belum diverifikasi'])->default('belum diverifikasi');
            $table->text('catatan_kepala_operator')->nullable();
            $table->foreignId('id_kepala_operator')->nullable();
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
        Schema::dropIfExists('tb_log_srt_ket_msh_kuliahs');
    }
};
