@extends('layouts.app')

@section('title', 'Users')
{{-- 
@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection --}}

@section('content')

    <!-- Title -->
    <div class="row">
        <div class="col-lg-6">
            <div class="pt-4 pb-4 d-flex justify-content-start h-100 align-items-center">
                <h1 class="h2 mb-0">Users</h1>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="pt-4 pb-4 d-flex justify-content-end">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
        <div class="col">
            <!-- Card -->
            <div class="card border-0 flex-fill w-100"
                data-list='{"valueNames": ["name", "email", "id", {"name": "date", "attr": "data-signed"}, "status"], "page": 8}'
                id="users">
                <div class="card-header border-0 card-header-space-between">
                    <!-- Title -->
                    <h2 class="card-header-title h4 text-uppercase">Users</h2>

                    <!-- Dropdown -->
                    <div class="dropdown ms-4">
                        <a href="javascript: void(0);" class="dropdown-toggle no-arrow text-secondary" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="14" width="14">
                                <g>
                                    <circle cx="12" cy="3.25" r="3.25" style="fill: currentColor" />
                                    <circle cx="12" cy="12" r="3.25" style="fill: currentColor" />
                                    <circle cx="12" cy="20.75" r="3.25" style="fill: currentColor" />
                                </g>
                            </svg>
                        </a>
                        <div class="dropdown-menu">
                            <a href="javascript: void(0);" class="dropdown-item">
                                Export report
                            </a>
                            <a href="javascript: void(0);" class="dropdown-item">
                                Share
                            </a>
                            <a href="javascript: void(0);" class="dropdown-item">
                                Action
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table align-middle table-edge table-hover table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="w-60px">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="checkAllCheckboxes" />
                                    </div>
                                </th>
                                <th>
                                    <a href="javascript: void(0);" class="text-muted list-sort" data-sort="name">
                                        Name
                                    </a>
                                </th>
                                <th>
                                    <a href="javascript: void(0);" class="text-muted list-sort" data-sort="email">
                                        Email
                                    </a>
                                </th>
                                <th>
                                    <a href="javascript: void(0);" class="text-muted list-sort" data-sort="id">
                                        Phone
                                    </a>
                                </th>
                                <th>
                                    <a href="javascript: void(0);" class="text-muted list-sort" data-sort="date">
                                        Roles
                                    </a>
                                </th>
                                <th class="w-150px min-w-150px">
                                    <a href="javascript: void(0);" class="text-muted list-sort" data-sort="status">
                                        Verified
                                    </a>
                                </th>
                                <th>
                                    <a href="javascript: void(0);" class="text-muted list-sort">
                                        Actions
                                    </a>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="list">

                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>
                                        {{-- <div class="avatar avatar-circle avatar-xs me-2">
                                            <img src="" alt="..." class="avatar-img" width="30"
                                                height="30" />
                                        </div> --}}
                                        <span class="name fw-bold">{{ $user->name }}</span>
                                    </td>
                                    <td class="email">
                                        {{ $user->email }}
                                    </td>
                                    <td class="id">{{ $user->phone }}</td>
                                    <td class="roles">
                                        @foreach ($user->roles as $role)
                                            <span class="badge bg-primary">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="status">
                                        @if ($user->email_verified_at)
                                            <span class="legend-circle bg-success"></span>Verified
                                        @else
                                            <span class="legend-circle bg-danger"></span>Pending Verification
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-sm btn-primary">Edit
                                            </a>
                                                <button class="btn btn-sm btn-danger delete-button"
                                                data-user-id="{{ $user->id }}"
                                                data-user-name="{{ $user->name }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                type="button">Delete</button>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- / .table-responsive -->

                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-5 text-secondary small">
                            Showing: <span class="list-pagination-page-first"></span> -
                            <span class="list-pagination-page-last"></span> of
                            <span class="list-pagination-pages"></span>
                        </div>

                        <!-- Pagination -->
                        <ul class="pagination list-pagination mb-0"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
