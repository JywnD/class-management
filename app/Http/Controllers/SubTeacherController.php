<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function detailCourse($courseId)
    {
        $course = Course::find($courseId);
        $courseInfo = [];
        foreach ($course->students as $student) {
            array_push($courseInfo, (object)[
                'id' => $course->id,
                'name' => $course->name,
                'studentId' => $student->id,
                'studentName' => $student->name,
                'studentEmail' => $student->email,
                'attendances' => $student->pivot->attendances,
                'midtermMark' => $student->pivot->midterm_mark,
                'finalMark' => $student->pivot->final_mark,
            ]);
        }
        if ($courseInfo) {
            return view('sub-teacher.course_detail', compact('courseInfo'));
        } else {
            return redirect()->back()->with('info', 'This course has no student yet!');
        }
    }

    public function editCourse(Request $request)
    {
        $originCourseStudent = DB::table('course_student')->where('course_id', $request['courseId'])->get();

        $updateCourseStudent = [];
        foreach ($originCourseStudent as $item) {
            array_push($updateCourseStudent, [
                'course_id' => $request['courseId'],
                'student_id' => $item->student_id,
                'attendances' => $request['attendances-' . $item->student_id],
                'midterm_mark' => $request['midtermMark-' . $item->student_id],
                'final_mark' => $request['finalMark-' . $item->student_id]
            ]);
        }

        DB::table('course_student')->where('course_id', $request['courseId'])->delete();
        DB::table('course_student')->insert($updateCourseStudent);

        return redirect()->route('teacher.course-detail', $request['courseId'])->with('success', 'Updated successfully!');
    }
}
