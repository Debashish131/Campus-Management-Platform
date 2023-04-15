@extends('Backend.authority')
@section('title','Authority')
@push('css')
    <!-- jvectormap -->
    <link href="assets2/libs/jqvmap/jqvmap.min.css" rel="stylesheet"/>
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
                            <h4 class="mb-sm-0">Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Authority Dashboard</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="ri-user-heart-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Users</p>
                                        <h5 class="mb-3">{{$count = \App\User::all()->count()}}</h5>
                                        <p class="text-truncate mb-0"><span class="text-success me-2"> <?php
                                                echo rand(0.05, 10);
                                                ?>%<i
                                                    class="ri-arrow-right-up-line align-bottom ms-1"></i></span> From
                                            previous</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-danger font-size-20">
                                                <i class="ri-emotion-unhappy-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Complain</p>
                                        <h5 class="mb-3">{{$count = \App\Complain::all()->count()}}</h5>
                                        <p class="text-truncate mb-0"><span class="text-success me-2">
                                                {{$count = \App\Complain::where('Is_approved', '=', 1)->count()}}%
                                                <i
                                                    class="ri-arrow-right-up-line align-bottom ms-1"></i></span>
                                            Complain Approve</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="ri-open-arm-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Suggestion</p>
                                        <h5 class="mb-3">{{$count = \App\Suggestion::all()->count()}}</h5>
                                        <p class="text-truncate mb-0"><span class="text-danger me-2">{{$count = \App\Suggestion::where('Is_approved', '=', 0)->count()}}%<i
                                                    class="ri-arrow-right-down-line align-bottom ms-1"></i></span> Solve
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0  me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="ri-group-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">New Visitors</p>
                                        <h5 class="mb-3">435</h5>
                                        <p class="text-truncate mb-0"><span class="text-success me-2"> 0.01% <i
                                                    class="ri-arrow-right-up-line align-bottom ms-1"></i></span> From
                                            previous</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                {{--                <div class="row">--}}
                {{--                    <div class="col-xl-8">--}}
                {{--                        <div class="card">--}}
                {{--                            <div class="card-body">--}}
                {{--                                <div class="d-flex align-items-center">--}}
                {{--                                    <div class="flex-grow-1">--}}
                {{--                                        <h5 class="card-title">Overview</h5>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="flex-shrink-0">--}}
                {{--                                        <div>--}}
                {{--                                            <button type="button" class="btn btn-soft-secondary btn-sm">--}}
                {{--                                                ALL--}}
                {{--                                            </button>--}}
                {{--                                            <button type="button" class="btn btn-soft-primary btn-sm">--}}
                {{--                                                1M--}}
                {{--                                            </button>--}}
                {{--                                            <button type="button" class="btn btn-soft-secondary btn-sm">--}}
                {{--                                                6M--}}
                {{--                                            </button>--}}
                {{--                                            <button type="button" class="btn btn-soft-secondary btn-sm active">--}}
                {{--                                                1Y--}}
                {{--                                            </button>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}

                {{--                                <div>--}}
                {{--                                    <div id="mixed-chart" class="apex-charts" dir="ltr"></div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <!-- end card-body -->--}}

                {{--                            <div class="card-body border-top">--}}
                {{--                                <div class="text-muted text-center">--}}
                {{--                                    <div class="row">--}}
                {{--                                        <div class="col-4 border-end">--}}
                {{--                                            <div>--}}
                {{--                                                <p class="mb-2"><i--}}
                {{--                                                        class="mdi mdi-circle font-size-12 text-primary me-1"></i>--}}
                {{--                                                    Expenses</p>--}}
                {{--                                                <h5 class="font-size-16 mb-0">$ 8,524 <span--}}
                {{--                                                        class="text-success font-size-12"><i--}}
                {{--                                                            class="mdi mdi-menu-up font-size-14 me-1"></i>1.2 %</span>--}}
                {{--                                                </h5>--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="col-4 border-end">--}}
                {{--                                            <div>--}}
                {{--                                                <p class="mb-2"><i--}}
                {{--                                                        class="mdi mdi-circle font-size-12 text-light me-1"></i>--}}
                {{--                                                    Maintenance</p>--}}
                {{--                                                <h5 class="font-size-16 mb-0">$ 8,524 <span--}}
                {{--                                                        class="text-success font-size-12"><i--}}
                {{--                                                            class="mdi mdi-menu-up font-size-14 me-1"></i>2.0 %</span>--}}
                {{--                                                </h5>--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="col-4">--}}
                {{--                                            <div>--}}
                {{--                                                <p class="mb-2"><i--}}
                {{--                                                        class="mdi mdi-circle font-size-12 text-danger me-1"></i> Profit--}}
                {{--                                                </p>--}}
                {{--                                                <h5 class="font-size-16 mb-0">$ 8,524 <span--}}
                {{--                                                        class="text-success font-size-12"><i--}}
                {{--                                                            class="mdi mdi-menu-up font-size-14 me-1"></i>0.4 %</span>--}}
                {{--                                                </h5>--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <!-- end card-body -->--}}
                {{--                        </div>--}}
                {{--                        <!-- end card -->--}}
                {{--                    </div>--}}
                {{--                    <!-- end col -->--}}

                {{--                    <div class="col-xl-4">--}}
                {{--                        <div class="card">--}}
                {{--                            <div class="card-body">--}}
                {{--                                <div class="d-flex  align-items-center">--}}
                {{--                                    <div class="flex-grow-1">--}}
                {{--                                        <h5 class="card-title">Social Source</h5>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="flex-shrink-0">--}}
                {{--                                        <select class="form-select form-select-sm mb-0 my-n1">--}}
                {{--                                            <option value="MAY" selected="">May</option>--}}
                {{--                                            <option value="AP">April</option>--}}
                {{--                                            <option value="MA">March</option>--}}
                {{--                                            <option value="FE">February</option>--}}
                {{--                                            <option value="JA">January</option>--}}
                {{--                                            <option value="DE">December</option>--}}
                {{--                                        </select>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}

                {{--                                <div>--}}
                {{--                                    <div id="radialBar-chart" class="apex-charts" dir="ltr"></div>--}}
                {{--                                </div>--}}

                {{--                                <div class="row">--}}
                {{--                                    <div class="col-4">--}}
                {{--                                        <div class="social-source text-center mt-3">--}}
                {{--                                            <div class="avatar-xs mx-auto mb-3">--}}
                {{--                                                        <span--}}
                {{--                                                            class="avatar-title rounded-circle bg-primary font-size-18">--}}
                {{--                                                            <i class="ri  ri-facebook-circle-fill text-white"></i>--}}
                {{--                                                        </span>--}}
                {{--                                            </div>--}}
                {{--                                            <h5 class="font-size-15">Facebook</h5>--}}
                {{--                                            <p class="text-muted mb-0">125 sales</p>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="col-4">--}}
                {{--                                        <div class="social-source text-center mt-3">--}}
                {{--                                            <div class="avatar-xs mx-auto mb-3">--}}
                {{--                                                        <span class="avatar-title rounded-circle bg-info font-size-18">--}}
                {{--                                                            <i class="ri  ri-twitter-fill text-white"></i>--}}
                {{--                                                        </span>--}}
                {{--                                            </div>--}}
                {{--                                            <h5 class="font-size-15">Twitter</h5>--}}
                {{--                                            <p class="text-muted mb-0">112 sales</p>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="col-4">--}}
                {{--                                        <div class="social-source text-center mt-3">--}}
                {{--                                            <div class="avatar-xs mx-auto mb-3">--}}
                {{--                                                        <span--}}
                {{--                                                            class="avatar-title rounded-circle bg-danger font-size-18">--}}
                {{--                                                            <i class="ri ri-instagram-line text-white"></i>--}}
                {{--                                                        </span>--}}
                {{--                                            </div>--}}
                {{--                                            <h5 class="font-size-15">Instagram</h5>--}}
                {{--                                            <p class="text-muted mb-0">104 sales</p>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <!-- end card-body -->--}}
                {{--                        </div>--}}
                {{--                        <!-- end card -->--}}
                {{--                    </div>--}}
                {{--                    <!-- end col -->--}}
                {{--                </div>--}}
                {{--                <!-- end row -->--}}

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Complain Stats</h5>
                                <div>

                                    <ul class="list-unstyled">
                                        @foreach($complain->slice(0, 1) as $val)
                                            <li class="py-3">
                                                <div class="d-flex">
                                                    <div class="avatar-xs align-self-center me-3">
                                                        <div
                                                            class="avatar-title rounded-circle bg-light text-primary font-size-18">
                                                            <i class="ri-checkbox-circle-line"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted mb-2">Completed</p>
                                                        <div class="progress progress-sm animated-progess">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                 style="width: {{$count =  \App\Complain::where('Is_approved', '=', 1)->count()*10}}%"
                                                                 aria-valuenow="70" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="py-3">
                                                <div class="d-flex">
                                                    <div class="avatar-xs align-self-center me-3">
                                                        <div
                                                            class="avatar-title rounded-circle bg-light text-primary font-size-18">
                                                            <i class="ri-calendar-2-line"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted mb-2">Pending</p>
                                                        <div class="progress progress-sm animated-progess">
                                                            <div class="progress-bar bg-warning" role="progressbar"
                                                                 style="width: {{$count =  \App\Complain::where('Is_approved', '=', 0)->count()*10}}%"
                                                                 aria-valuenow="45" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="py-3">
                                                <div class="d-flex">
                                                    <div class="avatar-xs align-self-center me-3">
                                                        <div
                                                            class="avatar-title rounded-circle bg-light text-primary font-size-18">
                                                            <i class="ri-close-circle-line"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted mb-2">Cancel</p>
                                                        <div class="progress progress-sm animated-progess">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                 style="width: {{$count =  \App\Complain::where('Is_approved', '=', 0)->count()*0.90}}%"
                                                                 aria-valuenow="19" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>

                                <hr>

                                <div class="text-center">
                                    <div class="row">
                                        @foreach($complain->slice(0, 1) as $val)
                                            <div class="col-4">
                                                <div class="mt-2">
                                                    <p class="text-muted mb-2">Completed</p>
                                                    <h5 class="font-size-16 mb-0">{{$count =  \App\Complain::where('Is_approved', '=', 1)->count()}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mt-2">
                                                    <p class="text-muted mb-2">Pending</p>
                                                    <h5 class="font-size-16 mb-0">{{$count =  \App\Complain::where('Is_approved', '=', 0)->count()}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mt-2">
                                                    <p class="text-muted mb-2">Cancel</p>
                                                    <h5 class="font-size-16 mb-0">0</h5>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Suggestion notification
                                </h4>

                                <div class="pe-3" data-simplebar style="max-height: 287px;">
                                    @forelse($suggestion as $val)
                                        <a href="#" class="text-body d-block">
                                            <div class="d-flex py-3">
                                                <div class="flex-shrink-0 me-3 align-self-center">
                                                    <img class="rounded-circle avatar-xs" alt=""
                                                         src="assets2/images/users/avatar-<?php
                                                         echo rand(1, 10);
                                                         ?>.jpg">
                                                </div>

                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="font-size-14 mb-1">{{$val->creator}}</h5>
                                                    <p class="text-truncate mb-0">
                                                        {{$val->describe}}
                                                    </p>
                                                </div>
                                                <div class="flex-shrink-0 font-size-13">
                                                    {{$val->update_at}}
                                                </div>
                                            </div>
                                        </a>
                                    @empty
                                        No data found

                                    @endforelse
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Revenue by Location</h5>

                                <div>
                                    <div id="usa" style="height: 226px">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3291.2396758487316!2d90.37532883345796!3d23.752398587259414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDQ1JzA5LjQiTiA5MMKwMjInMzkuNSJF!5e0!3m2!1sen!2sbd!4v1636580134557!5m2!1sen!2sbd"
                                            width="280" height="280" style="border:0;" allowfullscreen=""
                                            loading="lazy"></iframe>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <a href="#" class="btn btn-primary btn-sm">View More</a>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Latest Transaction</h4>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap mb-0">
                                        <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Problem Type</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($complain->slice(0,3) as $val)
                                            <tr>
                                                <td><span class="text-primary">{{$val->id}}</span></td>
                                                <td>{{$val->subject}}</td>
                                                <td>{{$val->email}}</td>
                                                <td>{{\Carbon\Carbon::parse($val['date'])->diffForHumans()}}</td>
                                                <td>{{$val->problem_type}}</td>
                                                <td><img src="categorypic/{{$val['images']}}" class="avatar-xs rounded-circle" alt="No image found"
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
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © Authority Dashboard.
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
    <!-- apexcharts js -->
    {{--    <script src="assets2/libs/apexcharts/apexcharts.min.js"></script>--}}

    <!-- jquery.vectormap map -->
    <script src="assets2/libs/jqvmap/jquery.vmap.min.js"></script>
    <script src="assets2/libs/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="assets2/js/pages/dashboard.init.js"></script>

@endpush
