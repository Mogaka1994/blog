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
        App\Setting::create([
           'site_name'=>'Polycarp',
           'address'=>'Nairobi,Kenya',
           'contact_email'=>'mogaka.poly@gmail.com',
           'contact_number'=>'0714593171'
        ]);
    }
}
