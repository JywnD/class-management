<?php

namespace App\Http\Controllers;

use App\Model\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\DB;

class FormTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    // Student management
    public function index()
    {
        $students = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'user');
            }
        )->get();
        return view('form-teacher.index', compact('students'));
    }

    public function createStudent()
    {
        return view('form-teacher.create_student');
    }

    public function storeStudent(Request $request)
    {
        if ($request->name && $request->email && $request->password) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->attachRole('user');

            return redirect()->route('student-list');
        } else {
            return redirect()->back()->with('error', 'Create failure!');
        }
    }

    public function deleteStudent(Request $request)
    {
        DB::table('users')->where('id', '=', $request->id)->delete();

        return redirect()->route('student-list');
    }

    // Sub teacher management
    public function indexSubTeacher()
    {
        $subTeachers = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'administrator');
            }
        )->get();
        return view('sub-teacher.index', compact('subTeachers'));
    }

    public function createSubTeacher()
    {
        return view('sub-teacher._create');
    }

    public function storeSubTeacher(Request $request)
    {
        if ($request->name && $request->email && $request->password) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->attachRole('administrator');

            return redirect()->route('teacher-list');
        } else {
            return redirect()->back()->with('error', 'Create failure!');
        }
    }

    public function deleteSubTeacher(Request $request)
    {
        DB::table('users')->where('id', '=', $request->id)->delete();

        return redirect()->route('teacher-list');
    }

    // Course management
    public function indexCourse()
    {
        $courses = Course::all();
        $courses->load('teacher');
        $subTeachers = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'administrator');
            }
        )->get();

        return view('course.index', compact('courses', 'subTeachers'));
    }

    public function createCourse()
    {
        return view('course._create');
    }

    public function storeCourse(Request $request)
    {
        if ($this->validateCourseInfo($request->all())) {
            Course::create([
                'name' => $request->name,
                'detail' => $request->detail,
                'teacher_id' => (int)$request->teacher,
                'start_date' => $request->startDate,
                'end_date' => $request->endDate,
            ]);

            // DB::table('course_student')->insert(
            //     ['student_id' => $request->teacher, 'course_id' => $newCourse->id]
            // );
            return redirect()->back()->with('success', 'Create course success!');
        } else {
            return redirect()->back()->with('error', 'Create failure!');
        }
    }

    public function deleteCourse(Request $request)
    {
        DB::table('courses')->where('id', '=', $request->id)->delete();
        DB::table('course_student')->where('course_id', '=', $request->id)->delete();

        return redirect()->route('course-list');
    }

    public function validateCourseInfo($course)
    {
        if (!$course['name'] || !$course['teacher'] || !$course['startDate'] || !$course['endDate']) {
            return false;
        } else if ($course['startDate'] >= $course['endDate']) {
            return false;
        }
        return true;
    }
}
