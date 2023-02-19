<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Course;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }

    public function index()
    {
        $courses = Course::all();

        return view('student.index', compact('courses'));
    }

    public function showCourses()
    {
        $courses = Course::whereHas(
            'students',
            function ($q) {
                $q->where('id', Auth::user()->id);
            }
        )->get();

        return view('student.courses', compact('courses'));
    }

    public function courseDetail($courseId)
    {
        $course = Course::find($courseId);
        $courseInfo = null;
        foreach ($course->students as $student) {
            if ($student->pivot->student_id == Auth::user()->id) {
                $courseInfo = [
                    'id' => $course->id,
                    'name' => $course->name,
                    'attendances' => $student->pivot->attendances,
                    'midterm_mark' => $student->pivot->midterm_mark,
                    'final_mark' => $student->pivot->final_mark,
                ];
            }
        }
        if ($courseInfo) {
            return view('student.course_detail', compact('courseInfo'));
        } else {
            return redirect()->back()->with('error', 'Get course information failure!');
        }
    }

    public function showMarks()
    {
        $courses = Course::whereHas(
            'students',
            function ($q) {
                $q->where('id', Auth::user()->id);
            }
        )->get();

        $coursesInfo = [];
        foreach ($courses as $course) {
            foreach ($course->students as $item) {
                if ($item->id == Auth::user()->id) {
                    array_push($coursesInfo, (object)[
                        'id' => $course->id,
                        'name' => $course->name,
                        'startDate' => $course->start_date,
                        'endDate' => $course->end_date,
                        'attendances' => $item->pivot->attendances,
                        'midtermMark' => $item->pivot->midterm_mark,
                        'finalMark' => $item->pivot->final_mark,
                    ]);
                }
            }
        }
        if (count($coursesInfo) > 0) {
            return view('student.marks', compact('coursesInfo'));
        } else {
            return redirect()->route('student')->with('error', 'Get all my courses information failure!');
        }
    }

    public function registerCourse(Request $request)
    {
        $studentId = Auth::user()->id;
        $existedCourseStudent = DB::table('course_student')->get();

        foreach ($existedCourseStudent as $courseStudent) {
            if ($courseStudent->course_id == $request->courseId && $courseStudent->student_id == $studentId) {
                return redirect()->back()->with('error', 'This course is registered!');
            }
        }

        DB::table('course_student')->insert(
            ['course_id' => $request->courseId, 'student_id' => $studentId]
        );
        return redirect()->route('student.courses')->with('success', 'Register course success!');
    }
}
