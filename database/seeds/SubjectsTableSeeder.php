<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Subject::create([
            'name' => 'laravel',
            'slug' => 'laravel'
        ]);

        \App\Subject::create([
            'name' => 'php',
            'slug' => 'php',
        ]);

        collect(range(1, 80))->each(function ($i) {
            \App\Course::find($i)->subjects()->attach(rand(1, 2));
        });
    }
}
