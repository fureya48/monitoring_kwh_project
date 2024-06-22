@extends('layouts.main')
@section('title', 'Invoice')

<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>

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
                <h3>Invoice</h3>
            </div>
            <div class="d-flex align-items-center py-1 gap-3">
                <a href="/invoice/new" target="__blank" class="btn btn-sm btn-primary">New</a>
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                data-bs-target="#exampleModal" id="kt_toolbar_primary_button">Upload</a>
            </div>
        </div>
    </div>
    <div class="card mx-6" Id="List-vv" style="position: relative; overflow: hidden;">
        <div class="card-body pt-6">
            <table id="example" class="table table-striped" style="width:100%">
                <thead >
                    <tr class="fw-bolder fs-7 text-uppercase">
                        <th class="min-w-auto" style="text-align: center">No</th>
                        <th class="min-w-auto">Nomor Invoice</th>
                        <th class="min-w-auto">Unit Kerja</th>
                        <th class="min-w-auto">Customer</th>
                        <th class="min-w-auto">Total Nilai</th>
                        <th class="min-w-auto">Jangka Waktu</th>
                        <th class="min-w-auto">Status</th>
                        <th class="min-w-auto">Tanggal Pembuatan</th>
                        <th class="min-w-auto">Created By</th>
                        <th class="min-w-auto" style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody class="fs-6">
                    @php
                        $no=1;
                        $user = [1,2,3,4,5,6,7,8,9];
                        $unit = ['Divisi Infrastruktur', 'Divisi Building Oversease'];
                        $arr = ['Disetujui', 'Ditolak', 'Diproses'];
                    @endphp
                    @foreach ($user as $item)
                        <tr>
                            <td style="text-align:center">{{ $no++ }}</td>
                            <td>{{ "00".$item."81".$no }}</td>
                            <td>{{ $unit[array_rand($unit)] }}</td>
                            <td>ISystemAsia</td>
                            <td>Rp.{{ number_format(mt_rand(100000000, 999999999), 0, '.', '.') }}</td>
                            <td>{{ Carbon\Carbon::create('now')->format('d F Y') }}</td>
                            <td><p class="badge badge-sm badge-primary text-center">{{ $arr[array_rand($arr)] }}</p></td>
                            <td>{{ Carbon\Carbon::create('now')->format('d F Y') }}</td>
                            <td>Supervisor</td>
                            <td class="text-center">
                                <a href="/invoice/edit" class="btn btn-sm btn-primary" target="__blank">Edit</a>
                                <button type="button" class="btn btn-secondary btn-sm">Delete</button>
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
              <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Dokumen Invoice & Faktur Pajak</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="gr_ses" class="form-label">
                            <span class="required">No. Invoice</span>
                        </label>
                        <select class="form-select form-select-sm border-input" aria-label="Default select example">
                            @php
                                $nmr = 2;
                            @endphp
                            <option value="">--Pilih Nomor Invoice--</option>
                            @foreach ($user as $item)
                                <option value="{{ $item }}">{{ "00".$item."81".$nmr++ }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                    <x-input label="Upload File" required='true' type='file' option='multiple' name='file-dokumen'/>
                    <span>*Support multiple files</span>
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
            $('#example').DataTable({
                rowReorder: true,
                columnDefs: [
                    { orderable: true, className: 'reorder', targets: [1,2,5,7] },
                    { orderable: false, targets: '_all' }
                ]
            });
        });

</script>
@endsection