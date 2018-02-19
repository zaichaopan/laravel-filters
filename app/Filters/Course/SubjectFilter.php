<?php

namespace App\Filters\Course;

use App\Filters\Filter;

class SubjectFilter extends Filter
{
    public function filter($builder, $value)
    {
        return $builder->whereHas('subjects', function ($builder) use ($value) {
            return $builder->where('slug', $value);
        });
    }
}
