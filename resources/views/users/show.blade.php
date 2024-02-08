@extends('layouts.app')

@section('title', 'Users')
{{-- 
@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection --}}

@section('content')
    <div class="row">

        <div class="col-lg-6">
            <div class="pt-4 pb-4 d-flex justify-content-start h-100 align-items-center">
                <h1 class="h2 mb-0">Edit "{{ $user->name }}"</h1>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="pt-4 pb-4 d-flex justify-content-end">
                <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="col-12">
            <form class="needs-validation" novalidate="" id="emailForm" method="POST"
                action="{{ route('users.edit', $user->id) }}">
                @csrf
                @method('PUT')
                <!-- Body -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="John Doe"
                        required="" value="{{ $user->name }}">
                    <div class="invalid-feedback">First and Last Name</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com"
                        required="" value="{{ $user->email }}">
                    <div class="invalid-feedback">Please add an email address</div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="03112076777"
                        value="{{ $user->phone }}">
                </div>
                <div class="mb-3">
                    <label for="roles" class="form-label">Roles</label>
                    <select name="roles[]" id="roles" class="form-control" multiple>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="*******">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                        placeholder="*******">
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label">Message</label>
                    <div class="ql-toolbar ql-snow">
                        <div data-quill="" class="h-200px ql-container ql-snow">
                            <div class="ql-editor ql-blank" data-gramm="false" contenteditable="true">
                                <p><br></p>
                            </div>
                            <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                            <div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer"
                                    target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2"
                                    data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a
                                    class="ql-remove"></a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- End Body -->

                <!-- Footer -->
                <div class="modal-footer pt-0">
                    <!-- Button -->
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                <!-- End Footer -->
            </form>
        </div>
    </div>
@endsection
