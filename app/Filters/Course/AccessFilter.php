<?php

namespace App\Filters\Course;

use App\Filters\Filter;

class AccessFilter extends Filter
{
    protected $mappings = [
         'free' => true,
         'premium' => false,
     ];

    public function filter($builder, $value)
    {
        if (!$value = $this->getFilterValue($value)) {
            return $builder;
        }

        return $builder->where('free', $value);
    }
}
