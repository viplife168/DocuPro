<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dashboard',
                'parent_menu' => NULL,
                'slug' => 'dashboard',
                'type' => 'menu-item',
                'icon' => 'uil-home-alt',
                'link' => '/home',
                'bootclass' => 'waves-effect',
                'menu_order' => '0',
                'access' => 'All',
                'created_at' => '2020-10-10 09:18:05',
                'updated_at' => '2020-10-10 09:18:05',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Pinjaman Fail',
                'parent_menu' => NULL,
                'slug' => 'pinjaman-fail',
                'type' => 'menu-title',
                'icon' => 'uil-file-copy-alt',
            'link' => 'javascript: void(0);',
                'bootclass' => NULL,
                'menu_order' => '2',
                'access' => 'All',
                'created_at' => '2020-10-10 09:44:30',
                'updated_at' => '2020-10-10 09:44:30',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Permohonan Baru',
                'parent_menu' => 'pinjaman-fail',
                'slug' => 'permohonan-baru',
                'type' => 'menu-item',
                'icon' => 'uil-file-medical',
                'link' => '/permohonan-baru',
                'bootclass' => 'waves-effect',
                'menu_order' => '3',
                'access' => 'All',
                'created_at' => '2020-10-10 09:49:06',
                'updated_at' => '2020-10-10 09:49:06',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Senarai Permohonan',
                'parent_menu' => 'pinjaman-fail',
                'slug' => 'senarai-permohonan',
                'type' => 'menu-item',
                'icon' => 'uil-files-landscapes-alt',
            'link' => 'javascript: void(0);',
                'bootclass' => 'has-arrow waves-effect',
                'menu_order' => '4',
                'access' => 'All',
                'created_at' => '2020-10-10 10:18:12',
                'updated_at' => '2020-10-10 10:18:12',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Sejarah Permohonan',
                'parent_menu' => 'senarai-permohonan',
                'slug' => 'sejarah-permohonan',
                'type' => 'menu-child',
                'icon' => 'uil-file-medical-alt',
                'link' => '/sejarah-permohonan',
                'bootclass' => 'waves-effect',
                'menu_order' => '6',
                'access' => 'All',
                'created_at' => '2020-10-10 10:21:08',
                'updated_at' => '2020-10-10 10:21:08',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Permohonan Aktif',
                'parent_menu' => 'senarai-permohonan',
                'slug' => 'permohonan-aktif',
                'type' => 'menu-child',
                'icon' => 'uil-file-check-alt',
                'link' => '/permohonan-aktif',
                'bootclass' => 'waves-effect',
                'menu_order' => '5',
                'access' => 'All',
                'created_at' => '2020-10-10 11:29:13',
                'updated_at' => '2020-10-10 11:29:13',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'Carian Fail',
                'parent_menu' => 'pinjaman-fail',
                'slug' => 'carian-fail',
                'type' => 'menu-item',
                'icon' => 'uil-file-search-alt',
                'link' => '/carian-fail',
                'bootclass' => 'waves-effect',
                'menu_order' => '1',
                'access' => 'All',
                'created_at' => '2020-10-10 11:32:37',
                'updated_at' => '2020-10-10 11:32:37',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'Lanjutan Pinjaman',
                'parent_menu' => 'pinjaman-fail',
                'slug' => 'lanjutan-pinjaman',
                'type' => 'menu-item',
                'icon' => 'uil-file-export',
                'link' => '/lanjutan',
                'bootclass' => 'waves-effect',
                'menu_order' => '7',
                'access' => 'All',
                'created_at' => '2020-10-10 11:43:48',
                'updated_at' => '2020-10-10 11:43:48',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'Pindahan Fail',
                'parent_menu' => 'pinjaman-fail',
                'slug' => 'pindahan-fail',
                'type' => 'menu-title',
                'icon' => 'uil-file-share-alt',
            'link' => 'javascript: void(0);',
                'bootclass' => 'has-arrow waves-effect',
                'menu_order' => '8',
                'access' => 'All',
                'created_at' => '2020-10-10 11:45:20',
                'updated_at' => '2020-10-10 11:45:20',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'Mohon Pindahan',
                'parent_menu' => 'pindahan-fail',
                'slug' => 'permohonan-pindahan',
                'type' => 'menu-item',
                'icon' => 'uil-file-plus-alt',
            'link' => 'javascript: void(0);',
                'bootclass' => 'has-arrow waves-effect',
                'menu_order' => '9',
                'access' => 'All',
                'created_at' => '2020-10-10 11:46:37',
                'updated_at' => '2020-10-10 11:46:37',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'Penerimaan Pindahan',
                'parent_menu' => 'pindahan-fail',
                'slug' => 'penerimaan-pindahan',
                'type' => 'menu-item',
                'icon' => 'uil-file-download-alt',
                'link' => '/penerimaan-pindahan',
                'bootclass' => 'waves-effect',
                'menu_order' => '10',
                'access' => 'All',
                'created_at' => '2020-10-10 11:47:48',
                'updated_at' => '2020-10-10 11:47:48',
            ),
            11 => 
            array (
                'id' => 13,
            'name' => 'Pindahan Antara Cawangan ( Fail Keluar)',
                'parent_menu' => 'permohonan-pindahan',
                'slug' => 'pindahan-antara-cawangan-fail-keluar',
                'type' => 'menu-child',
                'icon' => 'uil-file-export',
                'link' => '/pindah-cawangan-keluar',
                'bootclass' => 'waves-effect',
                'menu_order' => '11',
                'access' => 'All',
                'created_at' => '2020-10-14 07:01:03',
                'updated_at' => '2020-10-14 07:01:03',
            ),
            12 => 
            array (
                'id' => 14,
            'name' => 'Pindahan Antara Cawangan (Fail Masuk)',
                'parent_menu' => 'permohonan-pindahan',
                'slug' => 'pindahan-antara-cawangan-fail-masuk',
                'type' => 'menu-child',
                'icon' => 'uil-file-import',
                'link' => '/pindah-cawangan-masuk',
                'bootclass' => 'waves-effect',
                'menu_order' => '12',
                'access' => 'All',
                'created_at' => '2020-10-14 07:03:20',
                'updated_at' => '2020-10-14 07:03:20',
            ),
            13 => 
            array (
                'id' => 15,
                'name' => 'Pindahan Dalaman Daripada',
                'parent_menu' => 'permohonan-pindahan',
                'slug' => 'pindahan-dalaman-daripada',
                'type' => 'menu-child',
                'icon' => 'uil-file-download-alt',
                'link' => '/pindahan-dalaman-daripada',
                'bootclass' => 'waves-effect',
                'menu_order' => '13',
                'access' => 'All',
                'created_at' => '2020-10-14 07:06:46',
                'updated_at' => '2020-10-14 07:06:46',
            ),
            14 => 
            array (
                'id' => 16,
                'name' => 'Pindahan Dalaman Kepada',
                'parent_menu' => 'permohonan-pindahan',
                'slug' => 'pindahan-dalaman-kepada',
                'type' => 'menu-child',
                'icon' => 'uil-file-upload-alt',
                'link' => '/pindahan-dalaman-kepada',
                'bootclass' => 'waves-effect',
                'menu_order' => '14',
                'access' => 'All',
                'created_at' => '2020-10-14 07:08:04',
                'updated_at' => '2020-10-14 07:08:04',
            ),
            15 => 
            array (
                'id' => 17,
                'name' => 'Pertukaran Pegawai Bertanggungjawab',
                'parent_menu' => 'permohonan-pindahan',
                'slug' => 'pertukaran-pegawai-bertanggungjawab',
                'type' => 'menu-child',
                'icon' => 'uil-file-shield-alt',
                'link' => '/pertukaran-pegawai-bertanggungjawab',
                'bootclass' => 'waves-effect',
                'menu_order' => '15',
                'access' => 'All',
                'created_at' => '2020-10-14 07:10:22',
                'updated_at' => '2020-10-14 07:10:22',
            ),
        ));
        
        
    }
}