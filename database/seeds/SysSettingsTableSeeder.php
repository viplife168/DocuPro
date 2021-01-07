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
                'setting_value' => 'a:53:{s:2:"PM";s:15:"PEJABAT MENTERI";s:3:"PKE";s:23:"PEJABAT KETUA EKSEKUTIF";s:5:"DASAR";s:31:"CAWANGAN DASAR DAN PENYELIDIKAN";s:5:"AUDIT";s:16:"UNIT AUDIT DALAM";s:3:"PUU";s:18:"UNIT UNDANG-UNDANG";s:3:"UKK";s:28:"CAWANGAN KOMUNIKASI KORPORAT";s:14:"PENGUATKUASAAN";s:23:"CAWANGAN PENGUATKUASAAN";s:3:"LOD";s:21:"Seksyen LOD Dan Saman";s:8:"SIASATAN";s:16:"Seksyen Siasatan";s:11:"CARIAN_KHAS";s:19:"Seksyen Carian Khas";s:3:"PNP";s:37:"CAWANGAN PENDAFTARAN DAN PENENTUSAHAN";s:3:"PBP";s:33:"PEJABAT PENGURUS BESAR PENGURUSAN";s:10:"PENGURUSAN";s:27:"BAHAGIAN KHIDMAT PENGURUSAN";s:3:"PSM";s:34:"CAWANGAN PENGURUSAN SUMBER MANUSIA";s:9:"INTEGRITI";s:14:"Unit Integriti";s:5:"ADMIN";s:20:"CAWANGAN PENTADBIRAN";s:3:"BPM";s:28:"BAHAGIAN PENGURUSAN MAKLUMAT";s:5:"INFRA";s:38:"CAWANGAN INFRASTRUKTUR DAN OPERASI ICT";s:10:"MULTIMEDIA";s:28:"CAWANGAN APLIKASI MULTIMEDIA";s:8:"APLIKASI";s:39:"Seksyen Penyelenggaraan Aplikasi Sistem";s:11:"DEVELOPMENT";s:43:"Seksyen Pembangunan Aplikasi dan Multimedia";s:2:"BW";s:47:"BAHAGIAN KEWANGAN KORPORAT, PELABURAN DAN AKAUN";s:19:"PENGURUSAN_KEWANGAN";s:29:"CAWANGAN  PENGURUSAN KEWANGAN";s:3:"KEW";s:16:"Seksyen Kewangan";s:9:"PEROLEHAN";s:17:"Seksyen Perolehan";s:9:"PELABURAN";s:28:"CAWANGAN PELABURAN DAN AKAUN";s:8:"INSURANS";s:28:"Seksyen Bayaran dan Insurans";s:8:"TERIMAAN";s:30:"Seksyen Terimaan dan Pelaburan";s:3:"PBO";s:30:"PEJABAT PENGURUS BESAR OPERASI";s:4:"BPPL";s:36:"BAHAGIAN PENGURUSAN PINJAMAN LATIHAN";s:10:"ARAH_BAYAR";s:15:"Unit Arah Bayar";s:10:"PERJANJIAN";s:15:"Unit Perjanjian";s:10:"PEMBIAYAAN";s:38:"BAHAGIAN PENGURUSAN PEMBIAYAAN LATIHAN";s:10:"PERMOHONAN";s:15:"Unit Permohonan";s:2:"RD";s:30:"CAWANGAN REKOD DAN DOKUMENTASI";s:2:"FP";s:34:"Seksyen Fail Penyelenggaraan Rekod";s:2:"BB";s:22:"BAHAGIAN BAYARAN BALIK";s:5:"NOTIS";s:27:"CAWANGAN PUNGUTAN DAN NOTIS";s:14:"KAWALAN_KREDIT";s:23:"CAWANGAN KAWALAN KREDIT";s:11:"PENANGGUHAN";s:19:"Seksyen Penangguhan";s:5:"CCRIS";s:26:"Seksyen CCRIS Dan Insentif";s:9:"HAPUSKIRA";s:35:"Seksyen Penstrukturan Dan Hapuskira";s:14:"KUTIPAN_CARIAN";s:32:"CAWANGAN AGEN KUTIPAN DAN CARIAN";s:7:"KUTIPAN";s:20:"Seksyen Agen Kutipan";s:6:"CARIAN";s:19:"Seksyen Agen Carian";s:5:"UTCKL";s:16:"UTC Kuala Lumpur";s:8:"UTCPERAK";s:9:"UTC Perak";s:9:"UTCPAHANG";s:10:"UTC Pahang";s:8:"UTCJOHOR";s:9:"UTC Johor";s:9:"UTCMELAKA";s:10:"UTC Melaka";s:8:"UTCKEDAH";s:9:"UTC Kedah";s:10:"UTCSARAWAK";s:11:"UTC Sarawak";s:8:"UTCSABAH";s:9:"UTC Sabah";}',
                'created_at' => '2021-01-07 07:50:31',
                'updated_at' => '2021-01-07 07:50:31',
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
                'setting_value' => 'a:2:{i:0;s:0:"";i:1;i:1;}',
                'created_at' => '2021-01-07 06:32:41',
                'updated_at' => '2021-01-07 06:33:07',
            ),
            4 => 
            array (
                'id' => 8,
                'setting_key' => 'tingkat',
                'setting_value' => 'a:5:{i:0;s:0:"";i:1;s:1:"3";i:2;s:1:"1";i:3;s:1:"5";i:4;s:1:"2";}',
                'created_at' => '2021-01-07 00:33:10',
                'updated_at' => '2021-01-07 00:33:10',
            ),
            5 => 
            array (
                'id' => 9,
                'setting_key' => 'seksyen',
                'setting_value' => 'a:2:{i:0;s:0:"";i:1;i:1;}',
                'created_at' => '2021-01-07 06:33:38',
                'updated_at' => '2021-01-07 06:34:01',
            ),
        ));
        
        
    }
}