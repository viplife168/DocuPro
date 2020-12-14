<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@lara.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$AvtdRP.QfreIKN.2yEc3ZOHx4DlzjLDEp702vZLKPwroX3zjRln0m',
                'remember_token' => NULL,
                'role' => 'admin',
                'created_at' => '2020-10-06 15:33:06',
                'updated_at' => '2020-10-06 15:33:06',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Supervisor',
                'email' => 'super@lara.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$XbJemxcU5syR2f/U/bNzU.ivxZGOczaBI451ODvmMXT8EXO5edoe6',
                'remember_token' => NULL,
                'role' => 'supervisor',
                'created_at' => '2020-11-04 07:46:28',
                'updated_at' => '2020-11-04 07:46:28',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Staff',
                'email' => 'staff@lara.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$fd9YX9h9k/APd489oC2iiuNXofZJlZVMEaojtMe1LjABaZPRUjPHG',
                'remember_token' => NULL,
                'role' => 'staff',
                'created_at' => '2020-11-04 11:26:05',
                'updated_at' => '2020-11-04 11:26:05',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Manager',
                'email' => 'manager@lara.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$5iEXia/MDEik63NNzkPRt.wA2ZdwYxfh5LZ.NfW.CWmr/TQ4Q1/Qe',
                'remember_token' => NULL,
                'role' => 'manager',
                'created_at' => '2020-11-04 11:27:20',
                'updated_at' => '2020-11-04 11:27:20',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'User',
                'email' => 'user@lara.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$cu5JvCRNE.lu70AlBpcHTOPaP5URgXPewAL0I13jYrTRFY1FIVkIC',
                'remember_token' => NULL,
                'role' => 'user',
                'created_at' => '2020-11-24 01:45:52',
                'updated_at' => '2020-11-24 01:45:52',
            ),
        ));
        
        
    }
}