<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfileSocialUpdateRequest;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use FileUpload;

    public function index()
    {
        return view('frontend.student-dashboard.profile');
    }

    public function instructorIndex()
    {
        return view('frontend.instructor-dashboard.profile');
    }

    public function update(ProfileUpdateRequest $request, User $user)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'headline' => $request->headline,
            'bio' => $request->bio
        ];

        if($request->hasFile('image')){
            $this->deleteFile($user->image);
            $data['image'] = $this->uploadFile($request->file('image'));
        }

        $user->update($data);

        return redirect()->back();
    }

    public function updateSocialLinks(ProfileSocialUpdateRequest $request, User $user)
    {
        $user->update([
            'facebook' => $request->facebook,
            'x' => $request->x,
            'linkedin' => $request->linkedin,
            'website' => $request->website,
            'github' => $request->github,
        ]);

        return redirect()->back();
    }

}
