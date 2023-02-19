<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Course;
use Illuminate\Support\Facades\Auth;

class SubTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:administrator');
    }

    public function index()
    {
        $courses = Course::where('teacher_id', Auth::user()->id)->get();

        return view('sub-teacher.index', compact('courses'));
    }

    public function detailCourse($id)
    {
        $courseInfo = Course::find($id);

        return view('sub-teacher.detail_course', compact('courseInfo'));
    }
}
