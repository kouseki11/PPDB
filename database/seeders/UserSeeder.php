<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nisn' => '0066553149',
            'gender' => 'Laki-Laki',
            'name' => 'Kouseki',
            'school' => 'SMPN 18 Bogor',
            'email' => 'ffadhil1108@gmail.com',
            'phone_number' => '083811972903',
            'pn_father' => '081291550149',
            'pn_mother' => '083819524251',
            'role' => 'admin',
            'password' => bcrypt('kouseki123'),
        ]);
    }
}
