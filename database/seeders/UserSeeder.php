<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:: table('users')->insert([
          [  'username' => 'admin1',
            'password' => Hash::make('123'),
        ],

        [  'username' => 'admin2',
        'password' => Hash::make('1234'),
    ],

    [  'username' => 'admin3',
    'password' => Hash::make('12345'),
],

        ]);
    }
    
}

