<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10 ; $i++) { 
        	DB::table('students')->insert(
                   array(
             
            'date' =>  date('Y-m-d'),
           'picture' =>  'student.jpg',
            'name' =>  "usman",
           'father_name' => 'abubakar',
           'gender' =>  'male',
           'cnic' =>   '331023162404',
            'contact' => '03323310233',
            'email' =>  'abubakar@gmail.com',
            'father_contact' =>  '03323310233',
            'expertise' =>  'html,css3',
            'referral' =>  'shehbaz',
           'address' =>  'chak 2 , tehsil fsd , FSD',
           'birth_date' => date('Y-m-d'),
            'courses' => implode(',' , [0 => 'android' , 'java'])
           )
          );



        DB::table('students')->insert(
                   array(
             
            'date' =>  date('Y-m-d'),
           'picture' =>  'student.jpg',
            'name' =>  "ali",
           'father_name' => 'shezab',
           'gender' =>  'male',
           'cnic' =>   '331023162404',
            'contact' => '03323310233',
            'email' =>  'abubakar@gmail.com',
            'father_contact' =>  '03323310233',
            'expertise' =>  'html,css3',
            'referral' =>  'shani',
           'address' =>  'chak 2 , tehsil fsd , FSD',
            'birth_date' => date('Y-m-d'),
           'courses' => implode(',' , [0 => 'php' , 'laravel'])
           )
          );


        DB::table('students')->insert(
                   array(
             
            'date' =>  date('Y-m-d'),
           'picture' =>  'student.jpg',
            'name' =>  "sarfraz",
           'father_name' => 'Abul Zaffar',
           'gender' =>  'male',
           'cnic' =>   '3310256162404',
            'contact' => '03323310233',
            'email' =>  'abubakar@gmail.com',
            'father_contact' =>  '03323310233',
            'expertise' =>  'html,css3',
            'referral' =>  'shehbaz',
           'address' =>  'chak 2 , tehsil fsd , FSD',
            'birth_date' => date('Y-m-d'),
            'courses' => implode(',' , [0 => 'graphicdesign' , 'webDesign'])
           )
          );
        }
    }
}
