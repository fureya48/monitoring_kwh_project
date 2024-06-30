@extends('layouts.main')

@section('title', 'Dashboard')

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.min.css" />

<style>
    .chart-outer {
    display: flex;
    }

    .highcharts-data-table {
    background: white;
    min-width: 30%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    font-size: 15px;
    }

    .highcharts-data-table th {
    pointer-events: none; 
    }

    #highcharts-data-table-0,
    #highcharts-data-table-1 {
    margin: 0;
    }

    .highcharts-data-table table {
    border-collapse: collapse;
    border-spacing: 0;
    background: white;
    min-width: 100%;
    margin-top: 10px;
    font-family: sans-serif;
    font-size: 0.9em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
    border: 0px solid silver;
    padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
    background: #eff;
    }

    .highcharts-data-table caption {
    border-bottom: none;
    font-size: 1.1em;
    font-weight: bold;
    }

    .buttons-html5 {
        border-radius: 5px !important;
        border: none !important;
        font-weight: normal !important;
        margin-left: 5px;
        padding: 5px;
    }
    .buttons-print {
        border-radius: 5px !important;
        border: none !important;
        font-weight: normal !important;
        margin-left: 5px;
        padding: 5px;
    }
    .buttons-colvis {
        border: none !important;
        border-radius: 5px !important;
    }
    .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
        /* background-color: red !important; */
        --bs-table-accent-bg: #8ecae650 !important;
    }

    .table>:not(caption)>*>* {
        padding: 0.25rem 0.25rem !important;
    }

    .dataTables_filter{
        padding: 0 !important;
        margin-left: 5px !important;
        color: #B5B5C3;

    }

</style>

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
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Body Dashboard-->
    <div id="dashboard-body" class="mt-3">
        <!--begin::maps-->
        <div class="card mt-0 mb-5">
            <div class="card-title mt-8">
                <div class="d-flex flex-row gap-5 align-items-center mx-6 px-5">
                    <a href="#">
                        <button class="btn btn-secondary">
                            <p class="m-0"><span class="me-3">🟢</span>Device 001</p>
                        </button>
                    </a>
                    <a href="#">
                        <button class="btn btn-secondary">
                            <p class="m-0"><span class="me-3">🟢</span>Device 002</p>
                        </button>
                    </a>
                    <a href="#">
                        <button class="btn btn-secondary">
                            <p class="m-0"><span class="me-3">🟢</span>Device 003</p>
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <iframe src="https://maps.google.com/maps?q=-6.3306599, 106.9549803&z=15&output=embed&z=20" width="100%" height="350" frameborder="0" style="border:0"></iframe>
            </div>
        </div>
        <!--end::maps-->

        <!--begin::Card Status-->
        <div class="card">
            <div class="card-title"></div>
            <div class="card-body">
                <div class="row mx-3">
                    <!--begin::Card column-->
                    <div class="col-3">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Card widget 20-->
                            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-90 mb-5 mb-xl-10" style="background-color: #017EB8;background-image:url('/assets/media/patterns/vector-1.png');background-repeat: no-repeat;background-size: auto;">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Amount-->
                                        <span class="fs-3 fw-bold text-white me-2 lh-1 ls-n2">Sisa Daya</span>
                                        <!--end::Amount-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end pt-0">
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-end justify-content-center flex-row mt-1 w-100">
                                        <p class="m-0 text-white fs-1 fw-bold">72.0</p>
                                        <span><b class="fs-2 text-white">kWh</b></span>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 20-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card column-->
                    
                    <!--begin::Card column-->
                    <div class="col-3">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Card widget 20-->
                            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-90 mb-5 mb-xl-10" style="background-color: #01b810;background-image:url('/assets/media/patterns/vector-1.png');background-repeat: no-repeat;background-size: auto;">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Amount-->
                                        <span class="fs-3 fw-bold text-white me-2 lh-1 ls-n2">Daya Aktif</span>
                                        <!--end::Amount-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end pt-0">
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-end justify-content-center flex-row mt-1 w-100">
                                        <p class="m-0 text-white fs-1 fw-bold">72.0</p>
                                        <span><b class="fs-2 text-white">kWh</b></span>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 20-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card column-->
                    
                    <!--begin::Card column-->
                    <div class="col-3">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Card widget 20-->
                            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-90 mb-5 mb-xl-10" style="background-color: #ff8e04;background-image:url('/assets/media/patterns/vector-1.png');background-repeat: no-repeat;background-size: auto;">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Amount-->
                                        <span class="fs-3 fw-bold text-white me-2 lh-1 ls-n2">Tegangan</span>
                                        <!--end::Amount-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end pt-0">
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-end justify-content-center flex-row mt-1 w-100">
                                        <p class="m-0 text-white fs-1 fw-bold">72.0 V</p>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 20-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card column-->
                    
                    <!--begin::Card column-->
                    <div class="col-3">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Card widget 20-->
                            <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-90 mb-5 mb-xl-10" style="background-color: #ff0404;background-image:url('/assets/media/patterns/vector-1.png');background-repeat: no-repeat;background-size: auto;">
                                <!--begin::Header-->
                                <div class="card-header pt-5">
                                    <!--begin::Title-->
                                    <div class="card-title d-flex flex-column">
                                        <!--begin::Amount-->
                                        <span class="fs-3 fw-bold text-white me-2 lh-1 ls-n2">Arus</span>
                                        <!--end::Amount-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Card body-->
                                <div class="card-body d-flex align-items-end pt-0">
                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-end justify-content-center flex-row mt-1 w-100">
                                        <p class="m-0 text-white fs-1 fw-bold">72.0 A</p>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card widget 20-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card column-->
                </div>
            </div>
        </div>
        <!--end::Card Status-->
        
        <!--begin::Card Chart dan Table-->
        <div class="card mt-5">
            <div class="card-title">
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold pt-8 mb-4 ms-8">
                    <!--begin:::Tab item Grafik-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active"
                            data-bs-toggle="tab" href="#kt_user_view_grafik"
                            style="font-size:14px;">Grafik</a>
                    </li>
                    <!--end:::Tab item Grafik-->
        
                    <!--begin:::Tab item Table-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4"
                            data-bs-toggle="tab"
                            href="#kt_user_view_table"
                            style="font-size:14px;">Table</a>
                    </li>
                    <!--end:::Tab item Table-->
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <!--begin:: Tab pane Grafik-->
                    <div class="tab-pane fade show active" id="kt_user_view_grafik" role="tabpanel">
                        <div class="row">
                            <div class="col-6">
                                <!--begin::LINE CHART-->
                                <figure class="highcharts-figure">
                                    <div id="konsumsi-energi"></div>
                                    <!-- data table is inserted here -->
                                </figure>
                                <!--begin::LINE CHART-->
                            </div>
                            <div class="col-6">
                                <!--begin::LINE CHART-->
                                <figure class="highcharts-figure">
                                    <div id="tegangan"></div>
                                    <!-- data table is inserted here -->
                                </figure>
                                <!--begin::LINE CHART-->
                            </div>
                        </div>
                    </div>
                    <!--end:: Tab pane Grafik-->
                    
                    <!--begin:: Tab pane Table-->
                    <div class="tab-pane fade" id="kt_user_view_table" role="tabpanel">
                        <div class="row mb-8">
                            <div class="col-5">
                                <div class="mb-3 row" id="start-date">
                                    <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="start_date" class="form-control" id="start_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="mb-3 row" id="end-date">
                                    <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="end_date" id="end_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2" id="button-search">
                                <button type="submit" class="btn btn-sm btn-primary">Search</button>
                            </div>
                        </div>
                        <div class="row">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-bordered" id="example">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-auto">Timestamp</th>
                                        <th class="min-w-auto">Tegangan (V)</th>
                                        <th class="min-w-auto">Arus (A)</th>
                                        <th class="min-w-auto">Daya Aktif (W)</th>
                                        <th class="min-w-auto">Daya Reaktif (VAR)</th>
                                        <th class="min-w-auto">Daya Semu (VA)</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end:: Tab pane Table-->
                </div>
            </div>
        </div>
        <!--end::Card Chart dan Table-->
        
    </div>
    <!--end::Body Dashboard-->

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


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://rawgit.com/highcharts/rounded-corners/master/rounded-corners.js"></script>

    <!--Begin::Datatable-->
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: '<"float-start"f><"#example"t>Brtip',
                // dom: 'Brti',
                pageLength : 50,
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'Data Result'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Data Result',
                        customize: function (doc) {
                            doc.pageOrientation="landscape";
                        }
                    },
                    'print'
                    ]
            } );
        });
    </script>
    <!--End::Datatable-->



    <!--begin::Highchart Line-->
    <script>
        Highcharts.chart('konsumsi-energi', {
            title: {
                text: 'Konsumsi Energi',
                style: {
                    fontWeight: 'bold',
                    fontSize: '25px'
                }
            },

            subtitle: {
                // text: ''
            },

            yAxis: {
                title: {
                    text: ''
                }
            },

            xAxis: {
                accessibility: {    
                    // rangeDescription: 'Range: 2010 to 2020'
                },
                categories: [
                        "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu", "Minggu"
                    ],
            },

            tooltip: {
                headerFormat: '<span style="font-size:15px">{point.key}</span><table>',
                pointFormat: '<tr><td style="padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>&nbsp;{point.y:.0f}V</b></td></tr>',
                footerFormat: '</table>',
                // shared: true,
                useHTML: true
            },

            colors: ["#01b810"],
            
            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    // pointStart: 1
                }
            },

            credits: {
                enabled: false
            },
            exporting: {
                showTable: false,
                allowHTML: true
            },

            // legend: {
            //     layout: 'horizontal',
            //     align: 'center',
            //     verticalAlign: 'bottom',
            //     format : '<b>{point.key}</b><br>',
            //     itemStyle: {
            //         fontSize:'20px',
            //     },
            // },

            series: [{
                name: 'Konsumsi Per Hari',
                data: [5, 6, 3, 6, 4, 5, 7]
            }],

            responsive: {
                rules: [{
                    condition: {
                        // maxWidth: 500
                    },
                    chartOptions: {
                        // legend: {
                        //     layout: 'horizontal',
                        //     align: 'center',
                        //     verticalAlign: 'bottom'
                        // }
                    }
                }]
            }

        });
    </script>

    <script>
        Highcharts.chart('tegangan', {
            title: {
                text: 'Tegangan',
                style: {
                    fontWeight: 'bold',
                    fontSize: '25px'
                }
            },

            subtitle: {
                // text: ''
            },

            yAxis: {
                title: {
                    text: ''
                }
            },

            xAxis: {
                accessibility: {    
                    // rangeDescription: 'Range: 2010 to 2020'
                },
                categories: [
                        "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu", "Minggu"
                    ],
            },

            tooltip: {
                headerFormat: '<span style="font-size:15px">{point.key}</span><table>',
                pointFormat: '<tr><td style="padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>&nbsp;{point.y:.0f}V</b></td></tr>',
                footerFormat: '</table>',
                // shared: true,
                useHTML: true
            },
            
            colors: ["#ff0404"],

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    // pointStart: 1
                }
            },

            credits: {
                enabled: false
            },
            exporting: {
                showTable: false,
                allowHTML: true
            },

            // legend: {
            //     layout: 'horizontal',
            //     align: 'center',
            //     verticalAlign: 'bottom',
            //     format : '<b>{point.key}</b><br>',
            //     itemStyle: {
            //         fontSize:'20px',
            //     },
            // },

            series: [{
                name: 'Tegangan Per Hari',
                data: [220, 250, 210, 216, 225, 200, 200]
            }],

            responsive: {
                rules: [{
                    condition: {
                        // maxWidth: 500
                    },
                    chartOptions: {
                        // legend: {
                        //     layout: 'horizontal',
                        //     align: 'center',
                        //     verticalAlign: 'bottom'
                        // }
                    }
                }]
            }

        });
    </script>
    <!--end::Highchart Line-->

@endsection