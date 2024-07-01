@extends('layouts.main')

@section('title', 'Change Password')

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
                <h1 class="d-flex align-items-center fs-3 my-5">Change Password</h1>
            </div>
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger">Back</a>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.updatePassword', Auth::user()->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="old_password">Password Lama</label>
                    <input type="password" name="old_password" class="form-control" autocomplete="false" required>
                    @error('old_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" name="password" class="form-control" autocomplete="false" required>
                    @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control" autocomplete="false" required>
                    @error('password.confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Password</button>
            </form>
        </div>
    </div>
</div>

@endsection()

@section('js-script')
@endsection