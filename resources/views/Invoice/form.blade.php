@extends('layouts.main')
@section('title', 'Invoice')

<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

#input-table{
  outline: 0;
  border-width: 0 0 1px;
  border-color: black
}
/* #input-table:focus {
  border-color: green;
  outline: 1px dotted #000
} */

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
                <h3>{{ $is_edit ? "Edit" : "New" }} | Invoice</h3>
            </div>
            <div class="d-flex align-items-center py-1">
                <a href="#" class="btn btn-sm btn-primary">Save</a>
            </div>
        </div>
    </div>
    <div class="card mx-6" Id="List-vv" style="position: relative; overflow: hidden;">
        <div class="card-body pt-6">
            <div class="row">
                <div class="col-6 px-7">
                    <x-input name="nomor_invoice" label="Nomor Invoice" :required="true"/>
                    <x-input name="customer" label="Customer" :required="true"/>
                    <x-input name="payment_terms" label="Payment Terms" :required="true"/>
                </div>
                <div class="col-6 px-7">
                    <x-input name="tanggal_invoice" label="Tanggal Invoice" :required="true" type="date"/>
                    <x-input name="tanggal_jatuh_tempo" label="Tanggal Jatuh Tempo" :required="true" type="date"/>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="card mx-6" Id="List-vv" style="position: relative; overflow: hidden;">
        <div class="card-body pt-6">
            <button type="button" class="btn btn-sm btn-outline-primary" onclick="addRow()">Tambah</button>
            <br>
            <br>
            <table id="example" class="table table-striped" style="width:100%">
                <thead >
                    <tr class="fw-bolder fs-7 text-uppercase">
                        <th class="min-w-auto">Produk</th>
                        <th class="min-w-auto">Deskripsi</th>
                        <th class="min-w-auto">Qty</th>
                        <th class="min-w-auto">Price</th>
                        <th class="min-w-auto">Sub Total</th>
                        <th class="min-w-auto" style="text-align: center"></th>
                    </tr>
                </thead>
                <tbody class="fs-6" id="body-table">
                    <tr>
                        <td>
                            <input id="input-table" type="text" name="produk[]">
                        </td>
                        <td>
                            <input id="input-table" type="text" name="deskripsi[]">
                        </td>
                        <td>
                            <input id="input-table" type="number" name="quantity[]">
                        </td>
                        <td>
                            <input id="input-table" type="number" name="price[]">
                        </td>
                        <td>
                            <input id="input-table" type="number" name="subtotal[]" readonly>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('js-script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    
    // $(document).ready(function () {
    //     $('#example').DataTable({
    //         rowReorder: true,
    //         columnDefs: [
    //             { orderable: true, className: 'reorder', targets: [1,2,5,7] },
    //             { orderable: false, targets: '_all' }
    //         ]
    //     });
    // });

</script>

<script>
    const row = document.querySelector('#body-table');
    function addRow(){
        const clone = row.childNodes[1].cloneNode(true);
        row.appendChild(clone);
    }
</script>
@endsection