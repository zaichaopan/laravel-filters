<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Filters\CourseFilter;

class CourseFiltersComposer
{
    public function compose(View $view)
    {
        $view->with('courseFilters', CourseFilter::mappings());
    }
}
