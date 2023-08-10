<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        \DB::table('users')->insert(array (
            0=> array(
                'id'=>1,
                'fullname'=>'Katusiime Edmund',
                'username'=>'Edmund',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('admin123'),
                'role'=>'admin',
                'phone_number'=>'0779650120',
                'address'=>'nakawa',
                'profile_picture'=>'avarta.png'
                
            ),
            1=> array(
                'id'=>2,
                'fullname'=>'Nabassa Pamelah',
                'username'=>'pamelah',
                'email'=>'pamelah@gmail.com',
                'password'=>bcrypt('pamelah123'),
                'role'=>'employee',
                'phone_number'=>'0706145147',
                'address'=>'nakawa',
                'profile_picture'=>'avarta.png'
                
            )
            
            
        ));
    
    }
}
