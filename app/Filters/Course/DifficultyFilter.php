<?php

namespace App\Filters\Course;

use App\Filters\Filter;

class DifficultyFilter extends Filter
{
    protected $mappings = [
        'beginner' => 'beginner',
        'intermediate' => 'intermediate',
        'advanced' => 'advanced'
    ];

    public function filter($builder, $value)
    {
        if (!$value = $this->getFilterValue($value)) {
            return $builder;
        }

        return $builder->where('difficulty', $value);
    }
}
