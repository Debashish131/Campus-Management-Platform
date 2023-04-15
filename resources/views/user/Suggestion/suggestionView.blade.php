@extends('Frontend.layout')
@section('title','Suggestion View')
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
                        <h2 class="page-header-title">Suggestions</h2>
                        <div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active">Datatables</li>
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
                            <h4>Suggestion List</h4>
                        </div>
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table id="export-table" class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Topic</th>
                                        <th>Email</th>
                                        <th>Describe</th>
                                        <th>Submission Date</th>
                                        <th><span style="width:100px;">Status</span></th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($suggestion as $val)
                                        <tr>
                                            <td><span class="text-primary">{{$val->id}}</span></td>
                                            <td>{{$val->topic}}</td>
                                            <td>{{$val->email}}</td>
                                            <td>{{$val->describe}}</td>
                                            <td>{{\Carbon\Carbon::parse($val['updated_at'])->diffForHumans()}}</td>
                                            <td>
                                                @if($val->Is_approved==0)
                                                    <span style="width:100px;"><span
                                                            class="badge-text badge-text-small danger">Pending</span></span>
                                                @else
                                                    <span style="width:100px;"><span
                                                            class="badge-text badge-text-small info">Approved</span></span>
                                                @endif
                                            </td>

                                            <td class="td-actions">
                                                <a href="/editSuggestion{{$val->id}}"><i class="la la-edit edit"></i></a>
                                                <a href="/deleteSuggestion{{$val->id}}"><i
                                                        class="la la-close delete"></i></a>
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
