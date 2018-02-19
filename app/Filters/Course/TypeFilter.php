<?php

namespace App\Filters\Course;

use App\Filters\Filter;

class TypeFilter extends Filter
{
    public function filter($builder, $value)
    {
        return $builder->where('type', $value);
    }
}
