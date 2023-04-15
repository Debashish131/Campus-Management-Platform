@extends('Frontend.layout')
@section('title','Notice board')
@push('css')
    <link rel="stylesheet" href="assets/css/datatables/datatables.min.css">
@endpush
@section('maincontent')
    <div class="container">
        <div class="container-fluid">
            <!-- Begin Page Header-->
            <div class="row">
                <div class="page-header">
                    <div class="d-flex align-items-center">
                        <h2 class="page-header-title">Notice board</h2>
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active">Notice board</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
                <div class="col-xl-12">
                    <!-- Export -->
                    <div class="widget has-shadow">
                        <div class="widget-header bordered no-actions d-flex align-items-center">
                            <h4>Notice board List</h4>
                        </div>
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table id="export-table" class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Topic</th>
                                        <th>Department</th>
                                        <th>Type</th>
                                        <th>Upload Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pdf as $val)
                                        <tr>
                                            <td>{{$val->id}}</td>
                                            <td>{{$val->name}}</td>
                                            <td>{{$val->department}}</td>
                                            <td>{{$val->type}}</td>
                                            <td>{{$val->updated_at->diffForHumans()}}</td>
                                            <td class="td-actions">

                                                &nbsp;<a href="/uploads/{{$val->file}}"><i
                                                        class="la la-cloud-download"
                                                        style="color: #0a53be"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Export -->
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Container -->

    </div>
@endsection
@push('js')
    <script src="assets/vendors/js/datatables/datatables.min.js"></script>
    <script src="assets/vendors/js/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/vendors/js/datatables/jszip.min.js"></script>
    <script src="assets/vendors/js/datatables/buttons.html5.min.js"></script>
    <script src="assets/vendors/js/datatables/pdfmake.min.js"></script>
    <script src="assets/vendors/js/datatables/vfs_fonts.js"></script>
    <script src="assets/vendors/js/datatables/buttons.print.min.js"></script>

    <!-- Begin Page Snippets -->
    <script src="assets/js/components/tables/tables.js"></script>
    <!-- End Page Snippets -->
@endpush
