<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Filters\CourseFilter;
use App\Course;

class CoursesController extends Controller
{
    public function index()
    {
        $courseFilter = new CourseFilter(request());

        $courses = Course::with('subjects')->filter($courseFilter)->get();

        return $courses;
    }
}
