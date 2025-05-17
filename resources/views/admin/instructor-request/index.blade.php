@extends('admin.layouts.master')

@section('content')
        <div class="container-xl" style="padding-top: 20px;">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Instructor Request</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-selectable card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Document</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                       <td>{{ $user->name }}</td>
                                       <td>{{ $user->email }}</td>
                                       <td>
                                        @if ($user->approve_status == 'pending')
                                            <span class="px-3 py-1 rounded bg-warning text-white fw-semibold">Pending</span>
                                        @elseif ($user->approve_status == 'rejected')
                                            <span class="px-3 py-1 rounded bg-danger text-white fw-semibold">Rejected</span>
                                        @endif
                                       </td>
                                       <td>
                                        <a href="{{ route('admin.instructor-doc-download', $user->id) }}">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                                        </a>
                                       </td>
                                       <td>
                                        <form action="{{ route('admin.instructor.update', $user->id) }}" method="POST" id="status-form-{{ $user->id }}">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control" onchange="document.getElementById('status-form-{{ $user->id }}').submit()">
                                                <option @selected($user->approve_status == 'pending') value="pending">Pending</option>
                                                <option @selected($user->approve_status == 'approved') value="approved">Approve</option>
                                                <option @selected($user->approve_status == 'rejected') value="rejected">Reject</option>
                                            </select>
                                        </form>
                                       </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No data.</td>
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
