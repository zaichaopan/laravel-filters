<?php

namespace App\Http\Controllers;

use App\Course;
use App\Filters\CourseFilter;
use App\Subject;

class CoursesController extends Controller
{
    public function index(CourseFilter $filter)
    {
        $courses = Course::with(['subjects', 'users'])->filter($filter)->paginate(10);

        return view('courses.index', compact('courses'));
    }
}
