<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class InstructorDashboardController extends Controller
{
    public function index()
    {
        return view('frontend.instructor-dashboard.index');
    }
}
