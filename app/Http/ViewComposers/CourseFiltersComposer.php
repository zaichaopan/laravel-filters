<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Filters\Course\CourseFilters;

class CourseFiltersComposer
{
    public function compose(View $view)
    {
        $view->with('courseFilters', CourseFilters::mappings());
    }
}
