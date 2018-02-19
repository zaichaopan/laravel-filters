<?php

namespace App\Filters;

use Illuminate\Http\Request;

abstract class Filter
{
    protected $mappings = [];

    protected function getFilterValue($value)
    {
        return array_get($this->mappings, $value);
    }

    protected function getOrderDirection($value)
    {
        return $value === 'desc' ? $value : 'asc';
    }

    abstract public function filter($builder, $value);
}
