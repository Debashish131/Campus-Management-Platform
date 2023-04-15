@extends('Backend.layout')
@section('title','User Suggestion')
@push('css')
    <!-- DataTables -->
    <link href="assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets2/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('Notification')

    <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item noti-icon waves-effect"
                id="page-header-notifications-dropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
            <i class="ri-notification-3-line"></i>
            <span class="noti-dot"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
             aria-labelledby="page-header-notifications-dropdown">
            <div class="p-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-0"> Complain Notification </h6>
                    </div>
                    <div class="col-auto">
                        <a href="/userComplain" class="small"> View All</a>
                    </div>
                </div>
            </div>
            <div data-simplebar style="max-height: 230px;">
                @foreach($complain->slice(0,3) as $val)
                    <a href="/userComplain" class="text-reset notification-item">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-xs">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="ri-shopping-cart-line"></i>
                                                    </span>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{$val->subject}}</h6>
                                <div class="font-size-12 text-muted">
                                    <p class="mb-1">{{$val->describe}}</p>
                                    <p class="mb-0"><i
                                            class="mdi mdi-clock-outline"></i>{{\Carbon\Carbon::parse($val['updated_at'])->diffForHumans()}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="p-2 border-top">
                <div class="d-grid">
                    <a class="btn btn-sm btn-link font-size-14 text-center" href="/userComplain">
                        <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('maincontent')


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">User Suggestion</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Data Tables</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">User Suggestion</h4>


                                <table id="datatable-buttons"
                                       class="table table-striped table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                                                            class="badge rounded-pill bg-danger">Pending</span></span>
                                                @else
                                                    <span style="width:100px;"><span
                                                            class="badge rounded-pill bg-primary">Approved</span></span>
                                                @endif
                                            </td>

                                            <td class="td-actions">
                                                <a href="/admineditSuggestion{{$val->id}}"><i class="far fa-edit edit"
                                                                                              style="color: #0a53be"></i></a>
                                                &nbsp;
                                                @if($val->Is_approved==0)
                                                    <a href="/approveSuggestion/{{$val->id}}"><i
                                                            class="fas fa-check-double" style="color: red"></i>

                                                        @else
                                                            <a href="/approveSuggestion/{{$val->id}}"><i
                                                                    class="fas fa-check-double"></i>
                                                                @endif
                                                                &nbsp;
                                                                <a href="/adminDeleteSuggestion/{{$val->id}}"
                                                                   onclick="return confirm('Are you sure?')"><i
                                                                        class="far fa-trash-alt delete"
                                                                        style="color: #bd2130"></i></a>
                                                            </a>
                                                    </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © Upzet.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- end main content-->
@endsection

@push('js')
    <!-- Required datatable js -->
    <script src="assets2/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets2/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets2/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets2/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets2/libs/jszip/jszip.min.js"></script>
    <script src="assets2/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets2/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="assets2/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets2/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets2/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets2/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets2/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets2/js/pages/datatables.init.js"></script>
@endpush
