<?php

use App\User;
use Illuminate\Database\Seeder;
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
        //'name', 'username','email', 'password','status','type', 'image'


        User::create(['name'=>'disimonato',
            'username'=>'ds',
            'email'=>'admin@disimonato.com',
            'password'=>Hash::make('102030'),
            'status'=>'ativo',
            'type'=>'adm'
        ]);
    }
}
