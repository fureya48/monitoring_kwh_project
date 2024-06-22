@extends('layouts.main')
@section('title', 'Dokumen GR/SES')

@section('container')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
     <!--begin::Toolbar-->
     <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h3>Dokumen GR/SES</h3>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal" id="kt_toolbar_primary_button">New</a>
            </div>
        </div>
    </div>
    <div class="card mx-6" Id="List-vv" style="position: relative; overflow: hidden;">
        <div class="card-body pt-6">
            <table id="example" class="table table-striped" style="width:100%">
                <thead >
                    <tr class="fw-bolder fs-7 text-uppercase">
                        <th style="text-align: center">No</th>
                        <th>Nomor GR/SES</th>
                        <th>Unit Kerja</th>
                        <th>Nomor Dokumen</th>
                        <th>Created On</th>
                        <th>Created By</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody class="fs-6">
                    @php
                        $no=1;
                        $user = [1,2,3,4,5,6,7,8,9];
                    @endphp
                    @foreach ($user as $item)
                        <tr>
                            <td style="text-align:center">{{ $no++ }}</td>
                            <td>{{ "00".$item."81".$no }}</td>
                            <td>Building Oversease</td>
                            <td>GR-SES/2023/WIKA/00{{ $item }}</td>
                            <td>{{ Carbon\Carbon::create('now')->format('d F Y') }}</td>
                            <td>Supervisor</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" id="kt_toolbar_primary_button">Upload</a>
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modaldelete">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Dokumen</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <x-input label="No. GR/SES" required='true' placeholder='Input Nomor GR/SES' name='nomor_gr_ses'/>
                    <br>
                    <x-input label="No. Dokumen" required='true' placeholder='Input Nomor Dokumen' name='nomor_dokumen'/>
                    <br>
                    <x-input label="Upload File" required='true' type='file' name='file-dokumen'/>
                </form>
            </div>
            <div class="modal-footer">
                <button id="save-3" class="btn btn-primary btn-sm">Save</button>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection

@section('js-script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    
        $(document).ready(function () {
            $('#example').DataTable();
        });

</script>
@endsection