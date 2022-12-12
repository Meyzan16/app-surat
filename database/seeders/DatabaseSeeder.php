<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tb_jenis_surat;
use App\Models\tb_judul_surat;
use App\Models\tb_persetujuan;
use App\Models\tb_prodi;
use App\Models\tb_tujuan_surat;
use App\Models\tb_perihal_surat;
use App\Models\tb_lampiran;
use App\Models\user;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        tb_prodi::create([
            'kode_prodi' => 'G1A0',
            'nama_prodi' => 'Informatika',
        ]);

        tb_prodi::create([
            'kode_prodi' => 'G1B0',
            'nama_prodi' => 'Sipil',
        ]);

        tb_jenis_surat::create([
            'kode_surat' => 'KDU1',
            'jenis_surat' => 'surat_umum',
        ]);

        tb_jenis_surat::create([
            'kode_surat' => 'KDM2',
            'jenis_surat' => 'surat_mahasiswa',
        ]);

        tb_judul_surat::create([
            'kode_jenis_surat' => 'KDM2',
            'kode_judul_surat' => 'A1',
            'masa_aktif' => '8',
            'judul_surat' => 'surat keterangan masih kuliah',
        ]);

        tb_judul_surat::create([
            'kode_jenis_surat' => 'KDM2',
            'kode_judul_surat' => 'A2',
            'masa_aktif' => '8',
            'judul_surat' => 'surat keterangan lulus',
        ]);



        User::create([
            'nama' => 'operator informatika',
            'username' => 'OG1A0',
            'password' => bcrypt('monmon16'),
            'kode_prodi' => 'G1A0',
            'roles' => 'OPERATOR_PRODI',
            'status_aktif' => 'Y',
        ]);

        User::create([
            'nama' => 'operator sipil',
            'username' => 'OG1B0',
            'password' => bcrypt('monmon16'),
            'kode_prodi' => 'G1B0',
            'roles' => 'OPERATOR_PRODI',
            'status_aktif' => 'Y',
        ]);

        User::create([
            'nama' => 'Informatika',
            'username' => 'G1A0',
            'password' => bcrypt('monmon16'),
            'kode_prodi' => 'G1A0',
            'roles' => 'VERIF_PRODI',
            'status_aktif' => 'Y',
        ]);



        User::create([
            'nama' => 'pak aji',
            'username' => 'kepala_operator',
            'password' => bcrypt('monmon16'),
            'roles' => 'KEPALA_OPERATOR',
            'status_aktif' => 'Y',
        ]);

        User::create([
            'nama' => 'Ashar Muda Lubis, Ph.D',
            'username' => 'monmon16',
            'password' => bcrypt('monmon16'),
            'roles' => 'VERIF_PERSETUJUAN',
            'status_aktif' => 'Y',
        ]);


        tb_persetujuan::create([
            'users_id' => '4',
            'golongan' => 'IV B',
            'jabatan' => 'wakil Dekan Bidang Akademik',
        ]);


        tb_lampiran::create([
            'judul_lampiran' => 'Satu berkas',
        ]);
        tb_lampiran::create([
            'judul_lampiran' => 'Dua berkas',
        ]);

        tb_perihal_surat::create([
            'nama' => 'Susulan Mohon Pembayaran UKT',
        ]);
        tb_perihal_surat::create([
            'nama' => 'Undangan pembukaan asesmen lapangan',
        ]);

        tb_tujuan_surat::create([
            'nama' => 'Wakil Rektor Bidang Akademik',
        ]);
        tb_tujuan_surat::create([
            'nama' => 'Wakil Rektor Bidang Kemahasiswaan',
        ]);

    }
}
