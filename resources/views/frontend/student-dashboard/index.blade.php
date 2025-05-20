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
                            <h1>Student Dashboard</h1>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Student Dashboard</li>
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
                  @include('frontend.student-dashboard.sidebar')
                </div>
                <div class="col-xl-9 col-md-8">
                    @if (auth()->user()->approve_status == 'pending')
                    <div class="alert alert-info" role="alert">
                        Hi, {{ auth()->user()->name }} your instructor request is currently panding. We will send a mail on your email when it will be approved.
                    </div>
                    @endif
                    <div class="text-end">
                        <a href="{{ route('student.become-instructor') }}" class="btn btn-primary">Become a Instructor</a>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-sm-12">
                        TEST
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--===========================
            DASHBOARD OVERVIEW END
        ============================-->
@endsection
