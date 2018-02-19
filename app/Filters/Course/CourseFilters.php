<?php

namespace App\Filters\Course;

use App\Subject;
use App\Filters\Filters;
use App\Filters\Course\AccessFilter;
use App\Filters\Course\DifficultyFilter;
use App\Filters\Course\StartedFilter;
use App\Filters\Course\SubjectFilter;
use App\Filters\Course\TypeFilter;
use App\Filters\Course\ViewsFilter;

class CourseFilters extends Filters
{
    protected $filters = [
        'access' => AccessFilter::class,
        'difficulty' => DifficultyFilter::class,
        'started' => StartedFilter::class,
        'subject' => SubjectFilter::class,
        'type' => TypeFilter::class,
        'views' => ViewsFilter::class
    ];

    public static function mappings()
    {
        $maps = [
            'access' => [
                'free' => 'Free',
                'premium' => 'Premium'
            ],
            'difficulty' => [
                'beginner' => 'Beginner',
                'intermediate' => 'Intermediate',
                'advanced' => 'Advanced'
            ],
            'type' => [
              'snippet' => 'snippet',
              'theory' => 'theory',
              'project' => 'project'
            ],
            'started' => [
                'true' => 'started ',
                'false' => 'Not Started'
            ],
            'subject' => Subject::get()->pluck('name', 'slug')
         ];

        if (auth()->check()) {
            $maps = array_merge(
                $maps,
                ['subject' => Subject::get()->pluck('name', 'slug')]
             );
        }

        return $maps;
    }
}
