<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $user=App\User::create([
            'name'=>'Polycarp',
            'email'=>'mogaka.poly@gmail.com',
            'password'=>bcrypt('password'),
            'admin'=>1
        ]);
        App\Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/avatars/avatar.PNG',
            'about'=>'Dont think its gonna be smooth',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com'
        ]);
    }
}
