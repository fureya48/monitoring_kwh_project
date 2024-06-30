@extends('layouts.main')

@section('title', 'Add User')

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div style=" height:auto" class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="d-flex align-items-center flex-wrap me-3 row">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center fs-3 my-5">Add User</h1>
                </div>
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger">Back</a>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <p>{{ session('success') }}</p>
                @endif
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="ename" value="{{ old('name') }}" name="name" class="form-control" required maxlength="25">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" required autocomplete="false">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" autocomplete="false" required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Re-Password</label>
                        <input type="password" name="password_confirmation" class="form-control" autocomplete="false" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name='role' class="form-select" aria-label="Default select example" required>
                            <option value="Admin" {{ old('role') == "Admin" ? 'selected' : '' }}>Admin</option>
                            <option value="User" {{ old('role') == "User" ? 'selected' : '' }}>User</option>
                        </select>
                    </div>
                    <div class="my-8 d-grid">
                        <button name="submit" type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js-script')

@endsection
