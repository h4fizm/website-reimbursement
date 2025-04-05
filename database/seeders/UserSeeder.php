<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'NIP' => '1234',
                'Nama' => 'DONI',
                'Jabatan' => 'Direktur',
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'NIP' => '1235',
                'Nama' => 'DONO',
                'Jabatan' => 'Finance',
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'NIP' => '1236',
                'Nama' => 'DONA',
                'Jabatan' => 'Staff',
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
