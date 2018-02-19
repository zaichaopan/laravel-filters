<?php

namespace App\Filters;

class UserFilter extends Filter
{
    protected $filters = ['name'];

    public function name($name)
    {
        return $this->builder->where('name', $name);
    }
}
