<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kurikulum;
use App\Models\ProgramStudi;
use App\Models\Role;
use App\Models\semester;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\user::factory(10)->create();

        // \App\Models\user::factory()->create([
        //     'name' => 'Test user',
        //     'email' => 'test@example.com',
        // ]);

        Kurikulum::create([
            'id_kurikulum' => '1',
            'tahun' => '2019'
        ]);

        Kurikulum::create([
            'id_kurikulum' => '2',
            'tahun' => '2020'
        ]);

        Role::create([
            'id_role' => '1',
            'nama_role' => 'admin'
        ]);

        Role::create([
            'id_role' => '2',
            'nama_role' => 'kaprodi'
        ]);

        Role::create([
            'id_role' => '3',
            'nama_role' => 'mahasiswa'
        ]);

        ProgramStudi::create([
            'id_program_studi' => '72',
            'nama_program_studi' => 'Teknik Informatika'
        ]);

        ProgramStudi::create([
            'id_program_studi' => '73',
            'nama_program_studi' => 'Sistem Informasi'
        ]);


        User::create([
            'id_user' => 'admin',
            'nama_user' => 'admin',
            'email' => 'admin@maranatha.ac.id',
            'password' => Hash::make('password'),
            'id_role' => '1',
            'id_program_studi' => NULL
        ]);

        User::create([
            'id_user' => 'kaprodi',
            'nama_user' => 'kaprodi',
            'email' => 'kaprodi@maranatha.ac.id',
            'password' => Hash::make('password'),
            'id_role' => '2',
            'id_program_studi' => NULL
        ]);

        semester::create([
            'id_semester' => '1',
            'semester' => 'SA-1'
        ]);

        semester::create([
            'id_semester' => '2',
            'semester' => 'SA-2'
        ]);

        semester::create([
            'id_semester' => '3',
            'semester' => 'SA-3'
        ]);







    }
}
