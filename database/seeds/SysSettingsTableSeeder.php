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
                'setting_value' => 'a:53:{i:0;s:15:"PEJABAT MENTERI";i:1;s:23:"PEJABAT KETUA EKSEKUTIF";i:2;s:31:"CAWANGAN DASAR DAN PENYELIDIKAN";i:3;s:16:"UNIT AUDIT DALAM";i:4;s:18:"UNIT UNDANG-UNDANG";i:5;s:28:"CAWANGAN KOMUNIKASI KORPORAT";i:6;s:23:"CAWANGAN PENGUATKUASAAN";i:7;s:21:"Seksyen LOD Dan Saman";i:8;s:16:"Seksyen Siasatan";i:9;s:19:"Seksyen Carian Khas";i:10;s:37:"CAWANGAN PENDAFTARAN DAN PENENTUSAHAN";i:11;s:33:"PEJABAT PENGURUS BESAR PENGURUSAN";i:12;s:27:"BAHAGIAN KHIDMAT PENGURUSAN";i:13;s:34:"CAWANGAN PENGURUSAN SUMBER MANUSIA";i:14;s:14:"Unit Integriti";i:15;s:20:"CAWANGAN PENTADBIRAN";i:16;s:28:"BAHAGIAN PENGURUSAN MAKLUMAT";i:17;s:38:"CAWANGAN INFRASTRUKTUR DAN OPERASI ICT";i:18;s:28:"CAWANGAN APLIKASI MULTIMEDIA";i:19;s:39:"Seksyen Penyelenggaraan Aplikasi Sistem";i:20;s:43:"Seksyen Pembangunan Aplikasi dan Multimedia";i:21;s:47:"BAHAGIAN KEWANGAN KORPORAT, PELABURAN DAN AKAUN";i:22;s:29:"CAWANGAN  PENGURUSAN KEWANGAN";i:23;s:16:"Seksyen Kewangan";i:24;s:17:"Seksyen Perolehan";i:25;s:28:"CAWANGAN PELABURAN DAN AKAUN";i:26;s:28:"Seksyen Bayaran dan Insurans";i:27;s:29:"Seksyen Terimaan dan Pelabura";i:28;s:30:"PEJABAT PENGURUS BESAR OPERASI";i:29;s:36:"BAHAGIAN PENGURUSAN PINJAMAN LATIHAN";i:30;s:15:"Unit Arah Bayar";i:31;s:15:"Unit Perjanjian";i:32;s:38:"BAHAGIAN PENGURUSAN PEMBIAYAAN LATIHAN";i:33;s:15:"Unit Permohonan";i:34;s:30:"CAWANGAN REKOD DAN DOKUMENTASI";i:35;s:34:"Seksyen Fail Penyelenggaraan Rekod";i:36;s:22:"BAHAGIAN BAYARAN BALIK";i:37;s:27:"CAWANGAN PUNGUTAN DAN NOTIS";i:38;s:23:"CAWANGAN KAWALAN KREDIT";i:39;s:19:"Seksyen Penangguhan";i:40;s:26:"Seksyen CCRIS Dan Insentif";i:41;s:35:"Seksyen Penstrukturan Dan Hapuskira";i:42;s:32:"CAWANGAN AGEN KUTIPAN DAN CARIAN";i:43;s:20:"Seksyen Agen Kutipan";i:44;s:19:"Seksyen Agen Carian";i:45;s:16:"UTC Kuala Lumpur";i:46;s:9:"UTC Perak";i:47;s:10:"UTC Pahang";i:48;s:9:"UTC Johor";i:49;s:10:"UTC Melaka";i:50;s:9:"UTC Kedah";i:51;s:11:"UTC Sarawak";i:52;s:9:"UTC Sabah";}',
                'created_at' => '2020-12-25 10:26:45',
                'updated_at' => '2020-12-25 10:26:45',
            ),
            1 => 
            array (
                'id' => 5,
                'setting_key' => 'file-expire-warning',
                'setting_value' => 'a:1:{i:0;s:1:"3";}',
                'created_at' => '2020-10-15 09:38:02',
                'updated_at' => '2020-10-15 09:38:02',
            ),
            2 => 
            array (
                'id' => 6,
                'setting_key' => 'bilik_fail',
                'setting_value' => 'a:4:{i:0;s:30:"CAWANGAN REKOD DAN DOKUMENTASI";i:1;s:34:"Seksyen Fail Penyelenggaraan Rekod";i:2;s:18:"UNIT UNDANG-UNDANG";i:3;s:20:"CAWANGAN PENTADBIRAN";}',
                'created_at' => '2020-12-30 05:44:01',
                'updated_at' => '2020-12-30 05:44:01',
            ),
            3 => 
            array (
                'id' => 7,
                'setting_key' => 'rak',
                'setting_value' => 'a:1:{i:0;s:0:"";}',
                'created_at' => '2021-01-05 05:13:22',
                'updated_at' => '2021-01-05 05:13:22',
            ),
            4 => 
            array (
                'id' => 8,
                'setting_key' => 'tingkat',
                'setting_value' => 'a:1:{i:0;s:0:"";}',
                'created_at' => '2021-01-05 05:13:31',
                'updated_at' => '2021-01-05 05:13:31',
            ),
            5 => 
            array (
                'id' => 9,
                'setting_key' => 'seksyen',
                'setting_value' => 'a:1:{i:0;s:0:"";}',
                'created_at' => '2021-01-05 05:13:40',
                'updated_at' => '2021-01-05 05:13:40',
            ),
        ));
        
        
    }
}