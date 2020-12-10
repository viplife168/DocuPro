<?php

use Illuminate\Database\Seeder;

class SysSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sys_settings')->delete();
        
        \DB::table('sys_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'setting_key' => 'departments',
                'setting_value' => 'a:4:{i:0;s:3:"BPM";i:1;s:8:"Kewangan";i:2;s:14:"Bahagian Masak";i:3;s:14:"Bahagian Dapur";}',
                'created_at' => '2020-10-07 05:32:30',
                'updated_at' => '2020-10-07 05:32:30',
            ),
            1 => 
            array (
                'id' => 5,
                'setting_key' => 'file-expire-warning',
                'setting_value' => 'a:1:{i:0;s:1:"3";}',
                'created_at' => '2020-10-15 09:38:02',
                'updated_at' => '2020-10-15 09:38:02',
            ),
        ));
        
        
    }
}