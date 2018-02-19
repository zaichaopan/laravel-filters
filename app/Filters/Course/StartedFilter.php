<?php

namespace App\Filters\Course;

use App\Filters\Filter;

class StartedFilter extends Filter
{
    protected $mappings = [
        'true' => true,
        'false' => false
    ];

    public function filter($builder, $value)
    {
        if (!auth()->check()) {
            return $builder;
        }

        if (!$value = $this->getFilterValue($value)) {
            return $builder;
        }

        $method = $value ? 'whereHas' : 'whereDoesnthave';

        return $builder->{$method}('users', function ($builder) {
            return  $builder->whereIn('users.id', [auth()->id()]);
        });
    }
}
