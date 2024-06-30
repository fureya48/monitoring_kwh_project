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
                    <h1 class="d-flex align-items-center fs-3 my-5">Menu User</h1>
                </div>
                @if (auth()->user()->role == "Admin")
                    <a href="{{ route('users.createForm') }}">
                        <button name="submit" type="submit" class="btn btn-primary btn-sm">Add User</button>
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
                                <th class="min-w-auto">Name</th>
                                <th class="min-w-auto">Email</th>
                                <th class="min-w-auto">Role</th>
                                <th class="min-w-auto">Active</th>
                                <th class="min-w-auto">Action</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->is_active ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">Delete</button>
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

@section('js-script')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/print.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script> 

<!--Begin::Datatable-->
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: '<"float-start"f><"#example"t>Brtip',
            // dom: 'Brti',
            pageLength : 10,
            buttons: []
        } );
    });
</script>
<!--End::Datatable-->
@endsection
