@extends('Backend.authority')
@section('title','User Complain')
@push('css')
    <!-- DataTables -->
    <link href="assets2/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets2/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="assets2/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
          type="text/css"/>
@endpush


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
                            <h4 class="mb-sm-0">User Complain</h4>

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

                                <h4 class="card-title">User Complain</h4>


                                <table id="datatable-buttons"
                                       class="table table-striped table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Problem Type</th>
                                        <th>Image</th>
                                        <th><span style="width:100px;">Status</span></th>
                                        <th>Describe</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($complain as $val)
                                        <tr>
                                            <td><span class="text-primary">{{$val->id}}</span></td>
                                            <td>{{$val->subject}}</td>
                                            <td>{{\Carbon\Carbon::parse($val['updated_at'])->diffForHumans()}}</td>
                                            <td>{{$val->problem_type}}</td>
                                            <td><img src="categorypic/{{$val['images']}}"
                                                     class="avatar-xs rounded-circle" alt="No image found"
                                                     height="80"
                                                     width="80"></td>
                                            <td>
                                                @if($val->Is_approved==0)
                                                    <span style="width:100px;"><span
                                                            class="badge rounded-pill bg-danger">Pending</span></span>
                                                @else
                                                    <span style="width:100px;"><span
                                                            class="badge rounded-pill bg-primary">Approved</span></span>
                                                @endif
                                            </td>
                                            <td>{{$val->describe}}</td>
                                            <td class="td-actions">
                                                &nbsp;
                                                @if($val->Is_approved==0)
                                                    <a href="/authApp/{{$val->id}}"><i
                                                            class="fas fa-check-double" style="color: red"></i>

                                                        @else
                                                            <a href="/authApp/{{$val->id}}"><i
                                                                    class="fas fa-check-double"></i>
                                                                @endif
                                                                &nbsp;
                                                                <a href="/authDelete/{{$val->id}}"
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

    {{--    <script>--}}
    {{--        // $(document).ready(function () {--}}
    {{--        //     $('datatable-buttons').DataTable({--}}
    {{--        //         "order": ["desc"]--}}
    {{--        //     });--}}
    {{--        // });--}}
    {{--        // $('#datatable-buttons').dataTable({--}}
    {{--        //     destroy: true,--}}
    {{--        //     "order": ["desc"]--}}
    {{--        // });--}}

    {{--    </script>--}}
@endpush
