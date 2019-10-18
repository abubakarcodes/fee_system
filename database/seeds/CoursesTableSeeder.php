<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                 DB::table('courses')->insert(
                   array(
             	'name' => 'PHP',
           )
          );
                 DB::table('courses')->insert(
                   array(
             	'name' => 'Graphic Design',
           )
          );
                 DB::table('courses')->insert(
                   array(
             	'name' => 'Python Programming',
           )
          );
                 DB::table('courses')->insert(
                   array(
             	'name' => 'NodeJs',
           )
          );

                 DB::table('courses')->insert(
                   array(
             	'name' => 'MS Office',
           )
          );

              DB::table('courses')->insert(
                   array(
             	'name' => 'Web Design',
           )
          );

               DB::table('courses')->insert(
                   array(
             	'name' => 'Javascript',
           )
          );

                DB::table('courses')->insert(
                   array(
             	'name' => 'Android',
           )
          );
    }
}
