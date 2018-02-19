<?php

namespace App\Filters;

trait Filterable
{
    public function scopeFilter($builder, $filter)
    {
        $filter->apply($builder);
    }
}
