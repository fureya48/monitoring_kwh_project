

@extends('layouts.main')

@section('title', 'Menu User')

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
              <h1 class="d-flex align-items-center fs-3 my-5">Menu Device</h1>
          </div>
          @if (auth()->user()->role == "Admin")
              <a href="{{ route('devices.createForm') }}">
                  <button name="submit" type="submit" class="btn btn-primary btn-sm">Add Devices</button>
              </a>                    
          @endif
          <!--end::Page title-->
      </div>
      <!--end::Container-->
  </div>
  <!--end::Toolbar-->

  <div class="card">
      <div class="card-body">
          <div class="row">
              <!--begin::Table-->
              <table class="table table-row-dashed table-bordered" id="example">
                  <!--begin::Table head-->
                  <thead>
                      <!--begin::Table row-->
                      <tr class="text-center text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                          <th class="min-w-auto">ID</th>
                          <th class="min-w-auto">Device Name</th>
                          <th class="min-w-auto">Code Divece</th>
                          <th class="min-w-auto">Longitude</th>
                          <th class="min-w-auto">Latitude</th>
                          <th class="min-w-auto">Active</th>
                          <th class="min-w-auto">Action</th>
                      </tr>
                      <!--end::Table row-->
                  </thead>
                  <!--end::Table head-->
                  <!--begin::Table body-->
                  <tbody>
                      @foreach ($devices as $device)
                          <tr>
                              <td>{{ $device->id }}</td>
                              <td>{{ $device->device_name }}</td>
                              <td>{{ $device->code_device }}</td>
                              <td>{{ $device->longitude }}</td>
                              <td>{{ $device->latitude }}</td>
                              <td>{{ $device->is_active ? 'Yes' : 'No' }}</td>
                              <td>
                                  <button class="btn btn-sm btn-danger">Delete</button>
                                  <button class="btn btn-sm btn-warning">Edit</button>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
                  <!--end::Table body-->
              </table>
              <!--end::Table-->
          </div>
      </div>
  </div>

</div>

@endsection