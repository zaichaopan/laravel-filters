<?php

namespace App\Filters;

use App\Subject;

class CourseFilter extends Filter
{
    protected $filters = [
        'access',
        'difficulty',
        'subject',
        'started',
        'views',
        'type'
    ];

    protected $mappings = [
        'free' => true,
        'premium' => false,
        'beginner' => 'beginner',
        'intermediate' => 'intermediate',
        'advanced' => 'advanced',
        'true' => true,
        'false' => false,
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

    public function access($value)
    {
        $this->builder->where('free', $value);
    }

    public function difficulty($value)
    {
        $this->builder->where('difficulty', $value);
    }

    public function subject($value)
    {
        $this->builder->whereHas('subjects', function ($builder) use ($value) {
            return $builder->where('slug', $value);
        });
    }

    public function started($value)
    {
        if (!auth()->check()) {
            return ;
        }
        $method = $value ? 'whereHas' : 'whereDoesnthave';
        $this->builder->{$method}('users', function ($builder) {
            return  $builder->whereIn('users.id', [auth()->id()]);
        });
    }

    public function type($value)
    {
        $this->builder->where('type', $value);
    }

    public function views($value)
    {
        $this->builder->orderBy('views', $this->getOrderDirection($value));
    }
}
