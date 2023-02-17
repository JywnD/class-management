<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function index()
    {
        return view('form-teacher.index');
    }
}
