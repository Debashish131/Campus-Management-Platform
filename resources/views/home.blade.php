@extends('Frontend.layout')
@section('title','Home')
@section('notification')
    <li class="nav-item dropdown"><a id="notifications" rel="nofollow" data-target="#" href="#"
                                     data-toggle="dropdown" aria-haspopup="true"
                                     aria-expanded="false" class="nav-link"><i
                class="la la-bell animated infinite swing"></i><span class="badge-pulse"></span></a>
        <ul aria-labelledby="notifications" class="dropdown-menu notification">
            <li>
                <div class="notifications-header">
                    <div class="title">Notifications ( {{$count = \App\Complain::where([['creator', '=', Auth::user()->name]])->count()}} )</div>
                    <div class="notifications-overlay"></div>
                    <img src="assets/img/notifications/01.jpg" alt="..." class="img-fluid">
                </div>
            </li>
            @foreach($complain as $val)

            <li>
                <a href="#">
                    <div class="message-icon">
                        <i class="la la-user"></i>
                    </div>
                    <div class="message-body">
                        <div class="message-body-heading">
                            {{$val->subject}}
                        </div>
                        <div class="message-body-heading">
                            <span style="color: red">{{$val->problem_type}}</span>
                        </div>
                        <span class="date">{{\Carbon\Carbon::parse($val['updated_at'])->diffForHumans()}}</span>
                    </div>
                </a>
            </li>
            @endforeach
            <li>
                <a rel="nofollow" href="/complainView" class="dropdown-item all-notifications text-center">View
                    All Complains</a>
            </li>
        </ul>
    </li>
@endsection
@section('maincontent')

    <div class="container">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Dashboard</h2>
                    <div>
                        <div class="page-header-tools">
                            <a class="btn btn-gradient-01" href="/complainForm">Add Issue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <!-- Begin Row -->
        <div class="row flex-row">
            <div class="col-xl-6 col-md-6">
                <div class="widget widget-21 has-shadow">
                    {{--                    <div class="widget-body h-100 d-flex align-items-center">--}}
                    {{--                        <div class="section-title">--}}
                    {{--                            <h3>Hit Rate</h3>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="hit-rate">--}}
                    {{--                            <div class="percent"></div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="value-progress text-green">--}}
                    {{--                            + 34%--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="widget widget-05 has-shadow">
                        <!-- Begin Widget Header -->
                        <div class="widget-header bordered d-flex align-items-center">
                            <h2>User Dashboard</h2>
                            <div class="widget-options">
                                <div class="dropdown">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"
                                            class="dropdown-toggle">
                                        <i class="la la-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item">
                                            <i class="la la-edit"></i>Edit Widget
                                        </a>
                                        <a href="#" class="dropdown-item faq">
                                            <i class="la la-question-circle"></i>FAQ
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget Header -->
                        <!-- Begin Widget Body -->
                        <div class="widget-body no-padding hidden">
                            <div class="author-avatar">
                                <span class="badge-pulse-green"></span>
                                <img src="storage/user/{{Auth::user()->image}}" alt="..." class="img-fluid rounded-circle">
                            </div>
                            <div class="author-name">
                                {{Auth::user()->name}}
                                <span>Student</span>
                            </div>
                            <div class="chart">
                                <div class="row no-margin justify-content-center">
                                    <div class="col-12 col-xl-8 col-md-8 col-sm-8">
                                        <div class="row no-margin align-items-center">
                                            <!-- Begin Chart -->
                                        {{--                                            <div class="col-9 no-padding">--}}
                                        {{--                                                <div class="chart-graph">--}}
                                        {{--                                                    <div class="chart">--}}
                                        {{--                                                        <canvas id="sales-stats"></canvas>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="col-3 no-padding text-center">--}}
                                        {{--                                                <div class="chart-text">--}}
                                        {{--                                                    <span class="heading">Sales</span>--}}
                                        {{--                                                    <span class="number">364</span>--}}
                                        {{--                                                    <span class="cxg text-green">+35%</span>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        <!-- End Chart -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="social-stats">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-4 text-center">
                                        <i class="la la-frown-o"></i>
                                        <div class="counter">
                                            + {{$count = \App\Complain::where([['creator', '=', Auth::user()->name]])->count()}}</div>
                                        <div class="heading">Total Complain</div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <i class="la la-certificate"></i>
                                        <div class="counter">
                                            + {{$count = \App\Suggestion::where([['creator', '=', Auth::user()->name]])->count()}}</div>
                                        <div class="heading">Total Suggestion</div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <i class="la la-lightbulb-o"></i>
                                        <div class="counter">
                                            + {{$count = \App\Complain::where([['Is_approved', '=', 1  ]])->count()}}</div>
                                        <div class="heading">Approved Complain</div>
                                    </div>
                                </div>
                            </div>
                            <div class="actions text-center">
                                <a href="/profile" class="btn btn-gradient-01">View Profile</a>
                            </div>
                        </div>
                        <!-- End Widget Body -->
                    </div>

                </div>
                <div class="widget widget-22 bg-gradient-03 has-shadow">
                    <div class="widget-body h-100 d-flex align-items-center">
                        <div class="section-title">
                            <h3>Total Complain Accept</h3>
                        </div>
                        <div class="happy-customers">
                            <div class="percent"></div>
                        </div>
                        <div class="value-progress">
                            + 54 Today
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <!-- Begin Widget 04 -->
                <div class="widget widget-04 has-shadow">
                    <!-- Begin Widget Header -->
                    <div class="widget-header bordered d-flex align-items-center">
                        <h2>Last Complain</h2>
                        <div class="widget-options">
                            <div class="dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        class="dropdown-toggle">
                                    <i class="la la-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-check"></i>Valid Post
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-edit"></i>Edit Widget
                                    </a>
                                    <a href="faq.html" class="dropdown-item faq">
                                        <i class="la la-question-circle"></i>FAQ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget Header -->
                    <!-- Begin Widget Body -->
                    @forelse($complain->slice(0, 1) as $val)
                        <div class="widget-body p-0">
                            <div class="post-container">

                                <div class="media mb-3">
                                    <div class="media-left align-self-center user">
                                        <a href="pages-profile.html"><img src="assets/img/avatar/avatar-07.jpg"
                                                                          class="rounded-circle" alt="..."></a>
                                    </div>

                                    <div class="media-body align-self-center ml-3">
                                        <div class="title">
                                            <span class="username">{{Auth::user()->name}}</span> posted an image
                                        </div>
                                        <div class="time">{{\Carbon\Carbon::parse($val['date'])->diffForHumans()}}</div>
                                    </div>
                                </div>
                                <img src="categorypic/{{$val['images']}}" alt="No image found"
                                     height="1080"
                                     width="1920" class="img-fluid">
                                {{--                            <img src="assets/img/background/01.jpg" alt="..." class="img-fluid">--}}
                                <div class="col no-padding d-flex justify-content-end mt-3">
                                    <div class="meta">
                                        <ul>
                                            <li><a href="#"><i class="la la-comment"></i><span
                                                        class="numb">38</span></a>
                                            </li>
                                            <li><a href="#"><i class="la la-heart"></i><span class="numb">94</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <!-- Begin Write Comment -->
                            <div class="input-group mt-5">
                                <input type="text" class="form-control pr-0" placeholder="Write a comment ...">
                                <span class="input-group-addon">
                                                <button class="btn" type="button">
                                                    <i class="la la-smile-o la-2x"></i>
                                                </button>
                                            </span>
                                <span class="input-group-addon">
                                                <button class="btn pr-3" type="button">
                                                    <i class="la la-pencil la-2x"></i>
                                                </button>
                                            </span>
                            </div>
                            <!-- End Write Comment -->
                        </div>
                    @empty
                        <div class="post-container">
                            No post found
                        </div>
                @endforelse
                <!-- End Widget Body -->
                </div>
                <!-- End Widget 04 -->
            </div>
        </div>
        <!-- End Row -->
        <div class="row flex-row">
            <div class="col-xl-6 col-md-6">
                <!-- Begin Widget 08 -->
                <div class="widget widget-08 has-shadow">
                    <!-- Begin Widget Header -->
                    <div class="widget-header bordered d-flex align-items-center">
                        <h2>Notice Board</h2>
                        <div class="widget-options">
                            <div class="dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        class="dropdown-toggle">
                                    <i class="la la-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-plus"></i>Add Task
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-edit"></i>Edit Widget
                                    </a>
                                    <a href="#" class="dropdown-item faq">
                                        <i class="la la-question-circle"></i>FAQ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget Header -->
                    <!-- Begin Widget Body -->
                    <div class="widget-body">
                        <div class="today">
                            <div class="title">Today</div>
                            <div class="new-tasks"><span class="nb"> <?php echo date('Y-m-d');?></span> <br> New Notice
                                <br> &nbsp;<br> <span class="badge-pulse-orange"></span></div>
                        </div>
                        <!-- Begin List -->

                        <div class="todo-list">
                            <ul id="sortable" class="list">
                                @foreach($pdf->slice(0,4) as $val)
                                    <li class="task-color task-orange">
                                        <div class="styled-checkbox">
                                            <label class="text-black-50" for="task-2">{{$val->name}}</label>
                                            <label class="text-black-50" for="task-2"><span>"{{$val->department}}"</span></label>
                                            <label class="text-secondary" for="task-1">&nbsp;<a
                                                    href="/uploads/{{$val->file}}"><i
                                                        class="ri ri-download-cloud-2-line"
                                                        style="color: #0a53be"></i>Click &nbsp; </a> </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- End List -->
                    </div>
                    <!-- End Widget Body -->
                </div>
                <!-- End Widget 08 -->
            </div>
            <div class="col-xl-6">
                <!-- Begin Widget 06 -->
                <div class="widget widget-06 has-shadow">
                    <!-- Begin Widget Header -->
                    <div class="widget-header bordered d-flex align-items-center">
                        <h2>Suggestions</h2>
                        <div class="widget-options">
                            <div class="dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        class="dropdown-toggle">
                                    <i class="la la-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">
                                        <i class="la la-edit"></i>Edit Widget
                                    </a>
                                    <a href="#" class="dropdown-item faq">
                                        <i class="la la-question-circle"></i>FAQ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget Header -->
                    <!-- Begin Widget Body -->
                    <div class="widget-body p-0">
                        <div id="list-group" class="widget-scroll" style="max-height:490px;">
                            <ul class="reviews list-group w-100">
                                <!-- 01 -->
                                @forelse($suggestion as $val)
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left align-self-start">
                                                <img src="assets/img/avatar/avatar-02.jpg"
                                                     class="user-img rounded-circle"
                                                     alt="...">
                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="username">
                                                    <h4>{{Auth::user()->name}}</h4>
                                                </div>
                                                <div class="msg">
                                                    <div class="stars">
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star"></i>
                                                        <i class="la la-star-half-empty"></i>
                                                    </div>
                                                    <p>
                                                        {{$val->describe}}
                                                    </p>
                                                </div>
                                                <div class="meta">
                                                    <span class="mr-3">{{\Carbon\Carbon::parse($val['updated_at'])->diffForHumans()}} - 1 Reply</span>
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div>
                                            <div class="media-right pr-3 align-self-center">
                                                <div class="like text-center">
                                                    <i class="ion-heart"></i>
                                                    <span><?php
                                                        echo rand(1, 10);
                                                        ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-left align-self-start">
                                                No post found
                                            </div>

                                        </div>
                                    @endforelse

                                    <!-- End 01 -->
                            </ul>
                        </div>
                        <!-- End List -->
                    </div>
                    <!-- End Widget Body -->
                </div>
                <!-- End Widget 06 -->
            </div>
        </div>

        <!-- End Row -->
        <div class="row flex-row">
            <div class="col-xl-12">
                <!-- Begin Widget 07 -->
                <div class="widget widget-07 has-shadow">
                    <!-- Begin Widget Header -->
                    <div class="widget-header bordered d-flex align-items-center">
                        <h2>Complain Overview</h2>
                        <div class="widget-options">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary ripple">Week</button>
                                <button type="button" class="btn btn-primary ripple">Month</button>
                            </div>
                        </div>
                    </div>
                    <!-- End Widget Header -->
                    <!-- Begin Widget Body -->
                    <div class="widget-body">
                        <div class="table-responsive table-scroll padding-right-10" style="max-height:520px;">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="styled-checkbox mt-2">
                                            <input type="checkbox" name="check-all" id="check-all">
                                            <label for="check-all"></label>
                                        </div>
                                    </th>
                                    <th>ID</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Problem Type</th>
                                    <th>Image</th>
                                    <th><span style="width:100px;">Status</span></th>
                                    <th>Describe</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($complain as $val)
                                    <tr>
                                        <td style="width:5%;">
                                            <div class="styled-checkbox mt-2">
                                                <input type="checkbox" name="cb1" id="cb1">
                                                <label for="cb1"></label>
                                            </div>
                                        </td>
                                        <td><span class="text-primary">{{$val->id}}</span></td>
                                        <td>{{$val->subject}}</td>
                                        <td>{{\Carbon\Carbon::parse($val['date'])->diffForHumans()}}</td>
                                        <td>{{$val->problem_type}}</td>
                                        <td><img src="categorypic/{{$val['images']}}" alt="No image found"
                                                 height="80"
                                                 width="80"></td>
                                        <td>
                                            @if($val->Is_approved==0)
                                                <span style="width:100px;"><span
                                                        class="badge-text badge-text-small danger">Pending</span></span>
                                            @else
                                                <span style="width:100px;"><span
                                                        class="badge-text badge-text-small info">Approved</span></span>
                                            @endif
                                        </td>
                                        <td>{{$val->describe}}</td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End Widget Body -->
                    <!-- Begin Widget Footer -->
                    <div class="widget-footer d-flex align-items-center">
                        <div class="mr-auto p-2">
                            <span class="display-items">Showing 1-30 / 150 Results</span>
                        </div>
                        <div class="p-2">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item disabled">
                                        <span class="page-link"><i class="ion-chevron-left"></i></span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active">
                                        <span class="page-link">2<span class="sr-only">(current)</span></span>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="ion-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- End Widget Footer -->
                </div>
                <!-- End Widget 07 -->
            </div>
        </div>

        <!-- End Row -->
    </div>
    </div>

@endsection

@push('js')

@endpush
