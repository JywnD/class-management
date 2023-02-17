<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:administrator');
    }

    public function index()
    {
        return view('sub-teacher.index');
    }
}
