<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            SachTableSeeder::class,
            TacGiaTableSeeder::class,
            LoaiSachTableSeeder::class,
            NhaXuatBanTableSeeder::class,
            KhuVucVanChuyenSeeder::class,
            PhiVanChuyenSeeder::class,
            HinhAnhTableSeeder::class
        ]);
    }
}
