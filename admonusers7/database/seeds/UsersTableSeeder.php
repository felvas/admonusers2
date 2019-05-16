<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProcessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $users=[
            'id'=>1,
            'name' => 'Felipe',
            'lastname' => 'Vasquez Gacha',
            'email' => 'wfvg1030@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('FelipeTestPHP'),
            'remember_token'=>null,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('users')->insert($users);
    }
}
