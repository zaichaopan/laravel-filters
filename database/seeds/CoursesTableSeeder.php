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
        factory('App\Course', 100)->create();

        \App\User::find(1)->update([
            'email' => 'john@example.com'
        ]);

        \App\User::find(1)->courses()->attach([
            1, 2, 3
        ]);
    }
}
