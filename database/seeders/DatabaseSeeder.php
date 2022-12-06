<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tb_jenis_surat;
use App\Models\tb_judul_surat;
use App\Models\tb_persetujuan;
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
            'judul_surat' => 'surat keterangan masih kuliah',
        ]);

        tb_judul_surat::create([
            'kode_jenis_surat' => 'KDM2',
            'kode_judul_surat' => 'A2',
            'judul_surat' => 'surat keterangan lulus',
        ]);

        User::create([
            'nama' => 'verif fakultas',
            'username' => 'monmon16',
            'password' => bcrypt('monmon16'),
            'roles' => 'OPERATOR_PRODI',
            'status_aktif' => 'Y',
        ]);

        User::create([
            'nama' => 'pak aji',
            'username' => 'monmon16',
            'password' => bcrypt('monmon16'),
            'roles' => 'KEPALA_OPERATOR',
            'status_aktif' => 'Y',
        ]);

        User::create([
            'nama' => 'wakil dekan',
            'username' => 'monmon16',
            'password' => bcrypt('monmon16'),
            'roles' => 'VERIF_PERSETUJUAN',
            'status_aktif' => 'Y',
        ]);


        tb_persetujuan::create([
            'users_id' => '1',
            'golongan' => 'IV B',
            'jabatan' => 'wakil Dekan Bidang Akademik',
        ]);



    }
}
