<?php

namespace App\Filters;

use Illuminate\Http\Request;

abstract class Filters
{
    protected $request;

    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        foreach ($this->getFilters() as $filter => $value) {
            $this->resolveFilter($filter)->filter($builder, $value);
        }

        return $builder;
    }

    public function getFilters()
    {
        return array_intersect_key($this->request->all(), array_flip(array_keys($this->filters)));
    }

    public function resolveFilter($filter)
    {
        return new $this->filters[$filter];
    }
}
