<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InstructorRequestApprovedMail;
use App\Mail\InstructorRequestRejectMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class InstructorRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereIn('approve_status', ['pending', 'rejected'])->get();
        return view('admin.instructor-request.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $instructor)
    {
        $request->validate([
            'status' => ['required', 'in:pending,approved,rejected']
        ]);

        $instructor->approve_status = $request->status;

        if ($request->status == 'approved') {
            $instructor->role = 'instructor';
        }
        $instructor->save();

        self::sendNotification($instructor);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function download(User $user)
    {
        return response()->download(public_path($user->document));
    }

    private static function sendNotification($instructor)
    {
        switch ($instructor->approve_status) {
            case 'approved':
                if (config('mail_queue.is_queue')) {
                    Mail::to($instructor->email)->queue(new InstructorRequestApprovedMail());
                } else {
                    Mail::to($instructor->email)->send(new InstructorRequestApprovedMail());
                }
                break;
            case 'rejected':
                if (config('mail_queue.is_queue')) {
                    Mail::to($instructor->email)->queue(new InstructorRequestRejectMail());
                } else {
                    Mail::to($instructor->email)->send(new InstructorRequestRejectMail());
                }
                break;
        }
    }
}
