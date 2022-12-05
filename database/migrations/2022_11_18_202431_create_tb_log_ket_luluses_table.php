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
        Schema::create('tb_log_ket_luluses', function (Blueprint $table) {
            $table->id();

            $table->string('kode_judul_surat',10)->nullable();
            
            $table->string('npm',9)->nullable();
            $table->double('ipk',4)->nullable();

            $table->enum('status_koor_fak', ['Y','N','belum diverifikasi'])->default('belum diverifikasi');
            $table->text('catatan_status_koor_fak')->nullable();
            $table->timestamp('time_acc_koor_fak')->nullable();

            $table->enum('status_persetujuan', ['Y','N','belum diverifikasi'])->default('belum diverifikasi');
            $table->text('catatan_persetujuan')->nullable();
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
        Schema::dropIfExists('tb_log_ket_luluses');
    }
};
