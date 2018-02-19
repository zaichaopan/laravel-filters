<?php

namespace App\Http\Controllers;

use App\Course;
use App\Filters\Course\CourseFilters;

use App\Subject;

class CoursesController extends Controller
{
    public function index(CourseFilters $filters)
    {
        $courses = Course::with(['subjects', 'users'])->filter($filters)->paginate(10);
        return view('courses.index', compact('courses'));
    }
}
