<?php

namespace App\Filters\Course;

use App\Filters\Filter;

class ViewsFilter extends Filter
{
    public function filter($builder, $value)
    {
        return $builder->orderBy('views', $this->getOrderDirection($value));
    }
}
