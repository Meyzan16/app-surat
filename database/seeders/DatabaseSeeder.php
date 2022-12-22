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
            'slug' => 'M1',
            'judul_surat' => 'surat keterangan masih kuliah',
            'masa_aktif' => '8',
        ]);

        tb_judul_surat::create([
            'kode_jenis_surat' => 'KDM2',
            'slug' => 'M2',
            'judul_surat' => 'surat keterangan lulus',
            'masa_aktif' => '8',
        ]);



        User::create([
            'nama' => 'operator informatika',
            'username' => 'OG1A0',
            'password' => bcrypt('monmon16'),
            'password_noenkripsi' => 'monmon16',
            'kode_prodi' => 'G1A0',
            'roles' => 'OPERATOR_PRODI',
            'status_aktif' => 'Y',
        ]);

        User::create([
            'nama' => 'operator sipil',
            'username' => 'OG1B0',
            'password' => bcrypt('monmon16'),
            'password_noenkripsi' => 'monmon16',
            'kode_prodi' => 'G1B0',
            'roles' => 'OPERATOR_PRODI',
            'status_aktif' => 'Y',
        ]);

        User::create([
            'nama' => 'Informatika',
            'username' => 'G1A0',
            'password' => bcrypt('monmon16'),
            'password_noenkripsi' => 'monmon16',
            'kode_prodi' => 'G1A0',
            'roles' => 'VERIF_PRODI',
            'status_aktif' => 'Y',
        ]);



        User::create([
            'nama' => 'pak aji',
            'username' => 'kepala_operator',
            'password' => bcrypt('monmon16'),
            'password_noenkripsi' => 'monmon16',
            'roles' => 'KEPALA_OPERATOR',
            'status_aktif' => 'Y',
        ]);

        User::create([
            'nama' => 'Ashar Muda Lubis, Ph.D',
            'username' => 'monmon16',
            'password' => bcrypt('monmon16'),
            'password_noenkripsi' => 'monmon16',
            'roles' => 'VERIF_PERSETUJUAN',
            'status_aktif' => 'Y',
        ]);


        tb_persetujuan::create([
            'users_id' => '5',
            'golongan' => 'IV B',
            'jabatan' => 'wakil Dekan Bidang Akademik',
        ]);


        tb_lampiran::create([
            'judul_lampiran' => 'Satu berkas',
        ]);
        tb_lampiran::create([
            'judul_lampiran' => 'Dua berkas',
        ]);

        // tb_perihal_surat::create([
        //     'nama' => 'Susulan Mohon Pembayaran UKT',
        // ]);
        // tb_perihal_surat::create([
        //     'nama' => 'Undangan pembukaan asesmen lapangan',
        // ]);

        tb_tujuan_surat::create([
            'nama' => 'Wakil Rektor Bidang Akademik',
        ]);
        tb_tujuan_surat::create([
            'nama' => 'Wakil Rektor Bidang Kemahasiswaan',
        ]);




        tb_prodi::create([
            'kode_prodi' => 'F0E0',
            'nama_prodi' => 'D3 LABORATORIUM SAINS'
        ]);

        tb_prodi::create([
            'kode_prodi' => 'F0G0',
            'nama_prodi' => 'D3 KEBIDANAN'
        ]);
        tb_prodi::create([
            'kode_prodi' => 'F0H0',
            'nama_prodi' => 'D3 KEPARAWATAN'
        ]);
        tb_prodi::create([
            'kode_prodi' => 'F0I0',
            'nama_prodi' => 'D3 FARMASI'
        ]);

        tb_prodi::create([
            'kode_prodi' => 'F1A0',
            'nama_prodi' => 'S1 MATEMATIKA'
        ]);
        tb_prodi::create([
            'kode_prodi' => 'F1B0',
            'nama_prodi' => 'S1 KIMIA'
        ]);
        tb_prodi::create([
            'kode_prodi' => 'F1C0',
            'nama_prodi' => 'S1 FISIKA'
        ]);
        tb_prodi::create([
            'kode_prodi' => 'F1D0',
            'nama_prodi' => 'S1 BIOLOGI'
        ]);
        tb_prodi::create([
            'kode_prodi' => 'F1F0',
            'nama_prodi' => 'S1 STATISTIKA'
        ]);
        tb_prodi::create([
            'kode_prodi' => 'F1G0',
            'nama_prodi' => 'S1 FARMASI'
        ]);
        tb_prodi::create([
            'kode_prodi' => 'F1H0',
            'nama_prodi' => 'S1 GEOFISIKA'
        ]);


        tb_prodi::create([
            'kode_prodi' => 'F2B0',
            'nama_prodi' => 'S2 KIMIA'
        ]);

        tb_prodi::create([
            'kode_prodi' => 'F2F0',
            'nama_prodi' => 'S2 STATISTIKA'
        ]);

        tb_prodi::create([
            'kode_prodi' => 'F2D0',
            'nama_prodi' => 'S2 BIOLOGI'
        ]);




    }
}
