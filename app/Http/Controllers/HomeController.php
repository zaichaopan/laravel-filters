<?php

namespace App\Http\Controllers;

use App\Course;
use App\Filters\CourseFilter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CourseFilter $filter)
    {
        $courses = Course::with(['subjects', 'users'])->filter($filter)->paginate(10);

        return view('home', compact('courses'));
    }
}
