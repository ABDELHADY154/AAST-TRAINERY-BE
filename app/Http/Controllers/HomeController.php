<?php

namespace App\Http\Controllers;

use App\InternshipPost;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = InternshipPost::all()->count();
        $students = Student::all()->count();
        $applied = DB::table('student_internship_post_apply')->count();
        $accepted = DB::table('student_internship_post_apply')->where('application_status', 'accepted')->count();
        return view('home', ['posts' => $posts, 'students' => $students, 'applied' => $applied, 'accepted' => $accepted]);
    }
}
