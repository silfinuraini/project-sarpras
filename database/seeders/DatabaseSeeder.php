<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
     
        Pegawai::factory()->create([
            'nip' => '1',
            'avatar' => 'imageUrl',
            'nama' => 'Admin',
            'email' => 'admin@localhost'
        ]);

        Pegawai::factory()->create([
            'nip' => '12',
            'avatar' => 'imageUrl',
            'nama' => 'Pengawas',
            'email' => 'pengawas@localhost'
        ]);

        Pegawai::factory()->create([
            'nip' => '13',
            'avatar' => 'imageUrl',
            'nama' => 'Unit',
            'email' => 'unit@localhost'
        ]);

        User::factory()->create([
            'username' => 'admin@localhost',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'nip' => '1'
        ]);

        User::factory()->create([
            'username' => 'pengawas@localhost',
            'password' => Hash::make('password'),
            'role' => 'pengawas',
            'nip' => '12'
        ]);

        User::factory()->create([
            'username' => 'unit@localhost',
            'password' => Hash::make('password'),
            'role' => 'unit',
            'nip' => '13'
        ]);


        // Pegawai::factory(10)->create();
        // User::factory(10)->create();

        // $this->call(PegawaiSeeder::class);
        // $this->call(KategoriSeeder::class);
        // $this->call(ItemSeeder::class);
        // $this->call(SupplierSeeder::class);
        // $this->call(PengajuanSeeder::class);
        // $this->call(DetailPengajuanSeeder::class);
        // $this->call(PermintaanSeeder::class);
        // $this->call(DetailPermintaanSeeder::class);
        // $this->call(BarangMasukSeeder::class);
        // $this->call(DetailBarangMasukSeeder::class);
        // $this->call(BarangKeluarSeeder::class);
        // $this->call(DetailBarangKeluarSeeder::class);
    }
}
