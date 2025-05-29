@extends('admin.layouts.master')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0">Create Category</h3>
                            <a href="{{ route('admin.course-categories.index') }}" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="me-1">
                                    <path d="M12 5v14M5 12h14"></path>
                                </svg>
                                Back
                            </a>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.course-categories.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Enter Category name" value="{{ old('name') }}">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <x-input-error :messages="$errors->get('image')" class="mt-2 text-danger" />
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Icon</label>
                                        <input type="file" class="form-control" name="icon">
                                        <x-input-error :messages="$errors->get('icon')" class="mt-2 text-danger" />
                                    </div>
                                    <div class="col-md-6 mb-3">

                                        <label class="row">
                                            <div class="col-md-6">
                                                <span class="form-label">Show at Trending</span>
                                                <span class="col-auto">
                                                    <label class="form-check form-check-single form-switch ps-0"
                                                        style="margin-top:14px;">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="show_at_trending" value="1">

                                                    </label>
                                                    <x-input-error :messages="$errors->get('show_at_trending')" class="mt-2 text-danger" />
                                                </span>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="form-label">Status</span>
                                                <span class="col-auto">
                                                    <label class="form-check form-check-single form-switch ps-0"
                                                        style="margin-top:14px;">
                                                        <input class="form-check-input" type="checkbox" name="status"
                                                            value="1">

                                                    </label>
                                                    <x-input-error :messages="$errors->get('status')" class="mt-2 text-danger" />
                                                </span>
                                            </div>
                                        </label>

                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
