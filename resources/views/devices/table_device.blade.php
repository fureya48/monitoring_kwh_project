

@extends('layouts.main')

@section('title', 'Menu Device')

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
                      <tr class="text-center text-gray-400 fw-bolder fs-5 text-uppercase gs-0">
                          <th class="min-w-auto">ID</th>
                          <th class="min-w-auto">Device Name</th>
                          <th class="min-w-auto">Code Divece</th>
                          <th class="min-w-auto">Longitude</th>
                          <th class="min-w-auto">Latitude</th>
                          <th class="min-w-auto">Active</th>
                          @if (auth()->user()->role == "Admin")                
                            <th class="min-w-auto">Action</th>
                          @endif
                      </tr>
                      <!--end::Table row-->
                  </thead>
                  <!--end::Table head-->
                  <!--begin::Table body-->
                  <tbody>
                      @foreach ($devices as $device)
                          <tr>
                              <td  class="text-center">{{ $device->id }}</td>
                              <td class="text-center">{{ $device->device_name }}</td>
                              <td class="text-center">{{ $device->code_device }}</td>
                              <td class="text-center">{{ $device->longitude }}</td>
                              <td class="text-center">{{ $device->latitude }}</td>
                              <td class="text-center">{{ $device->is_active ? 'Yes' : 'No' }}</td>
                              @if (auth()->user()->role == "Admin")                
                              <td class="text-center">
                                <form action="{{ route('devices.destroy', ['id' => $device->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{ route('devices.editDevice', ['id' => $device->id]) }}" class="btn btn-warning">Edit Devices</a>
                            </td>
                              @endif
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