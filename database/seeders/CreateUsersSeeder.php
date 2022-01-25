<?php


namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\User;



class CreateUsersSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $user = [

            [

               'userID'=>'CB19010',

               'islecture'=>'0',

               'email'=>'aliaimanaziz98@gmail.com',

               'password'=> bcrypt('12345678'),

            ],

            [

                'userID'=>'CB19013',

                'islecture'=>'0',

                'email'=>'hasif@gmail.com',

                'password'=> bcrypt('12345678'),

             ],

             [

                'userID'=>'AA61Q211',

                'islecture'=>'1',

                'email'=>'cheras@gmail.com',

                'password'=> bcrypt('12345678'),

             ],

             [

                'userID'=>'AA61Q212',

                'islecture'=>'1',

                'email'=>'ump2@gmail.com',

                'password'=> bcrypt('12345678'),

             ],

             [

                'userID'=>'AA61Q213',

                'islecture'=>'1',

                'email'=>'ump3@gmail.com',

                'password'=> bcrypt('12345678'),

             ],

             [

                'userID'=>'AA61Q214',

                'islecture'=>'1',

                'email'=>'ump4@gmail.com',

                'password'=> bcrypt('12345678'),

             ],

             [

                'userID'=>'CB19012',
 
                'islecture'=>'0',
 
                'email'=>'student1@gmail.com',
 
                'password'=> bcrypt('12345678'),
 
             ],

             [

                'userID'=>'CB19014',
 
                'islecture'=>'0',
 
                'email'=>'student2@gmail.com',
 
                'password'=> bcrypt('12345678'),
 
             ],

             

        ];



        foreach ($user as $key => $value) {

            User::create($value);

        }

    }

}
