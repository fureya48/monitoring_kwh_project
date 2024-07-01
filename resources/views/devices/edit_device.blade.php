

@extends('layouts.main')

@section('title', 'Edit Devives')

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
                <h1 class="d-flex align-items-center fs-3 my-5">Dashboard
                </h1>
            </div>
            <a href="{{ route('devices.index') }}" class="btn btn-sm btn-danger">Back</a>
                <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <div class="card">
        <div class="card-body">
            @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <form action="{{ route('devices.updateDevice', $device->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="device_name" class="form-label">Device Name</label>
                <input type="text" value="" name="device_name" class="form-control" value="{{ old('device_name', $device->device_name) }}" placeholder={{ $device->device_name }} required maxlength="25">
                @error('device_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="code_device" class="form-label">Code Device</label>
                <input type="text" value="" name="code_device" class="form-control" value="{{ old('code_device', $device->code_device) }}" placeholder={{ $device->code_device }} required maxlength="10">
                @error('code_device')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" name="longitude" class="form-control" value="{{ old('longitude', $device->longitude) }}" placeholder={{ $device->longitude }} required maxlength="50">
                @error('longitude')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" name="latitude" class="form-control" value="{{ old('latitude', $device->latitude) }}" placeholder={{ $device->latitude }} required maxlength="50">
                @error('latitude')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="is_active" class="form-label">Is Active</label>
                <select name='is_active' class="form-select" aria-label="Default select example" {{ old('is_active', $device->is_active) ? 'checked' : '' }} required>
                    <option value="1">Active</option>
                    <option value="0">Unactive</option>
                </select>
                @error('is_active')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            @if(auth()->user()->role == "Admin")
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Update Devices</button>
            </div>
            @endif
        </form>
        </div>
    </div>
</div>

@endsection