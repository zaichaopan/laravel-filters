<?php

namespace App\Filters;

use Illuminate\Http\Request;


abstract class Filter
{
    protected $request;

    protected $builder;

    protected $filters = [];

    protected $mappings = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($this->getFilterValue($value));
            }
        }

        return $this->builder;
    }

    public function getFilters()
    {
        return array_intersect_key($this->request->all(), array_flip($this->filters));
    }

    public function getFilterValue($value)
    {
        return array_key_exists($value, $this->mappings)
            ? $this->mappings[$value]
            : $value;
    }

    public function getOrderDirection($value)
    {
        return $value === 'desc' ? $value : 'asc';
    }
}
