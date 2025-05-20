<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    use FileUpload;

    public function index()
    {
        return view('frontend.student-dashboard.index');
    }

    public function becomeInstructor()
    {
        return view('frontend.student-dashboard.become-instructor.index');
    }

    public function becomeInstructorUpdate(Request $request, User $user)
    {
         $request->validate(['document' => 'required', 'mimes:pdf,doc,docx,jpg,png', 'max:12000']);
         $file_path = $this->uploadFile($request->file('document'));
         $user->update([
            'approve_status' => 'pending',
            'document' => $file_path
         ]);

         return redirect()->route('student.dashboard');
    }
}
