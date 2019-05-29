<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/avatars/avatar.PNG',
            'about'=>'Dont think its gonna be smooth',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com'
        ]);
    }
}
