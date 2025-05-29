@extends('admin.layouts.master')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="card">
                    <div class="card-header">
                        <!-- Page pre-title -->
                        <div class="card-title">Course Category</div>
                        <div class="card-actions">
                            <a href="{{ route('admin.course-categories.create') }}" class="btn btn-primary btn-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-2">
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                Add new
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive" style="margin-top: 20px;">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Trending</th>
                                    <th>Status</th>
                                    <th>Sub Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($category->icon) }}" style="width: 40px;height:40px;">
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if ($category->show_at_trending)
                                                <span class="badge bg-success text-white">Yes</span>
                                            @else
                                                <span class="badge bg-danger text-white">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($category->status)
                                                <span class="badge bg-success text-white">Yes</span>
                                            @else
                                                <span class="badge bg-danger text-white">No</span>
                                            @endif
                                        </td>
                                        <td>
                                          <a href="{{ route('admin.course-sub-categories.index', $category->id) }}">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="currentColor"
                                                class="icon icon-tabler icons-tabler-filled icon-tabler-category">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M10 3h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" />
                                                <path
                                                    d="M20 3h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" />
                                                <path
                                                    d="M10 13h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" />
                                                <path
                                                    d="M17 13a4 4 0 1 1 -3.995 4.2l-.005 -.2l.005 -.2a4 4 0 0 1 3.995 -3.8z" />
                                            </svg>
                                          </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.course-categories.edit', $category->id) }}"
                                                class="btn btn-primary" style="float: left;margin-right:5px;">Edit</a>
                                            <form action="{{ route('admin.course-categories.destroy', $category->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="5">No data found.</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
