@extends('frontend.layouts.master')

@section('content')
    <!--===========================
                BREADCRUMB START
            ============================-->
    <section class="wsus__breadcrumb" style="background: url(images/breadcrumb_bg.jpg);">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Instructor Dashboard</h1>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Instructor Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
                BREADCRUMB END
            ============================-->


    <!--===========================
                DASHBOARD OVERVIEW START
            ============================-->
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-4 wow fadeInLeft">
                    @include('frontend.instructor-dashboard.sidebar')
                </div>
                <div class="col-xl-9 col-md-8">
                    {{-- Update users information --}}
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="wsus__dashboard_heading">
                                <h5>Update Your Information</h5>
                                <p>Manage your courses and its update like live, draft and insight.</p>
                            </div>
                        </div>

                        <div class="wsus__dashboard_profile wsus__dashboard_profile_avatar">
                            <div class="img">
                                <img src="{{ asset(auth()->user()->image) }}" alt="profile" class="img-fluid w-100">
                                <label for="profile_photo">
                                    <img src="{{ asset('frontend/assets/images/dash_camera.png') }}" alt="camera" class="img-fluid w-100">
                                </label>
                                <input type="file" id="profile_photo" hidden="">
                            </div>
                            <div class="text">
                                <h6>Your avatar</h6>
                                <p>PNG or JPG no bigger than 400px wide and tall.</p>
                            </div>
                        </div>

                        <form action="{{ route('instructor.profile.update', auth()->user()->id) }}" method="POST" class="wsus__dashboard_profile_update" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Full Name</label>
                                        <input name="name" type="text" placeholder="Enter your name" value="{{ auth()->user()->name }}">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: red;" />
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Profile Image</label>
                                        <input name="image" type="file">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Email</label>
                                        <input name="email" type="email" placeholder="Enter your mail" value="{{ auth()->user()->email }}">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red;" />
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Headline</label>
                                        <input name="headline" type="text" placeholder="Enter headline" value="{{ auth()->user()->headline }}">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option @selected(auth()->user()->gender == 'male') value="male">Male</option>
                                            <option @selected(auth()->user()->gender == 'female') value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                         
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Bio</label>
                                        <textarea name="bio" rows="7" placeholder="Your text here">{{ auth()->user()->bio }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_btn">
                                        <button type="submit" class="common_btn">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- Update socials Links --}}
                    <div class="wsus__dashboard_contant">
                        <div class="wsus__dashboard_contant_top d-flex flex-wrap justify-content-between">
                            <div class="wsus__dashboard_heading">
                                <h5>Update Your Social Information</h5>
                                <p>Put your socials links url.</p>
                            </div>
                        </div>

                        <form action="{{ route('instructor.profile.user-social-links', auth()->user()->id) }}" method="POST" class="wsus__dashboard_profile_update">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Facebook</label>
                                        <input name="facebook" type="text" placeholder="Enter your facebook url" value="{{ auth()->user()->facebook }}">
                                            <x-input-error :messages="$errors->get('facebook')" class="mt-2" style="color: red;" />
                                    </div>
                                </div>

                                 <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>X</label>
                                        <input name="x" type="text" placeholder="Enter your x url" value="{{ auth()->user()->x }}">
                                            <x-input-error :messages="$errors->get('x')" class="mt-2" style="color: red;" />
                                    </div>
                                </div>

                                 <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Linkedin</label>
                                        <input name="linkedin" type="text" placeholder="Enter your linkedin url" value="{{ auth()->user()->linkedin }}">
                                            <x-input-error :messages="$errors->get('linkedin')" class="mt-2" style="color: red;" />
                                    </div>
                                </div>
                                 <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Website</label>
                                        <input name="website" type="text" placeholder="Enter your website url" value="{{ auth()->user()->website }}">
                                    </div>
                                </div>
                                 <div class="col-xl-6">
                                    <div class="wsus__dashboard_profile_update_info">
                                        <label>Github</label>
                                        <input name="github" type="text" placeholder="Enter your github url" value="{{ auth()->user()->github }}">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__dashboard_profile_update_btn">
                                        <button type="submit" class="common_btn">Update Socials</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
                DASHBOARD OVERVIEW END
            ============================-->
@endsection
