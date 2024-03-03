<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TambahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('123456'),
                'mapel' => 'tidak mengajar'
            ],
            [
                'name'=>'walas',
                'email'=>'walas@gmail.com',
                'role'=>'walas',
                'password'=>bcrypt('123456'),
                'mapel' => 'tidak mengajar'
            ],
            [
                'name'=>'guru',
                'email'=>'guru@gmail.com',
                'role'=>'guru',
                'password'=>bcrypt('123456'),
                'mapel' => 'mengajar'
            ],
        ];

        foreach($user as $key => $val){
            User::create($val);
        }
    }
}
