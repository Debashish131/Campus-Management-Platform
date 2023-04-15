@extends('Frontend.layout')
@section('title','Profile')
@section('maincontent')
    <div class="container">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Profile</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row flex-row">
            <div class="col-xl-3">
                <!-- Begin Widget -->
                <div class="widget has-shadow">
                    <div class="widget-body">
                        <div class="mt-5">
                            @if(Auth::user()->image)
                                <img src="storage/user/{{Auth::user()->image}}" alt="..." style="width: 120px;"
                                     class="avatar rounded-circle d-block mx-auto">
                            @endif

                        </div>
                        @foreach($user as $val)
                            <h3 class="text-center mt-3 mb-1">{{$val->name}}</h3>
                            <p class="text-center">{{$val->email}}</p>
                            {{--                            <img src="categorypic/{{$val['images']}}" alt="No image found"--}}
                            {{--                                 height="80"--}}
                            {{--                                 width="80">--}}
                        @endforeach
                        <div class="em-separator separator-dashed"></div>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)"><i
                                        class="la la-bell la-2x align-middle pr-2"></i>Notifications</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)"><i
                                        class="la la-bolt la-2x align-middle pr-2"></i>Activity</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)"><i
                                        class="la la-comments la-2x align-middle pr-2"></i>Messages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)"><i
                                        class="la la-bar-chart la-2x align-middle pr-2"></i>Statistics</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)"><i
                                        class="la la-clipboard la-2x align-middle pr-2"></i>Tasks</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)"><i
                                        class="la la-gears la-2x align-middle pr-2"></i>Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0)"><i
                                        class="la la-question-circle la-2x align-middle pr-2"></i>FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Widget -->
            </div>
            <div class="col-xl-9">
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>Update Profile</h4>
                    </div>
                    <div class="widget-body">
                        <div class="col-10 ml-auto">
                            <div class="section-title mt-3 mb-3">
                                <h4>01. Personnal Informations</h4>
                            </div>
                        </div>
                        @foreach($user as $val)
                            <form class="form-horizontal">
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Full
                                        Name</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" value="{{$val->name}}"
                                               placeholder="Your name">
                                    </div>
                                </div>
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label
                                        class="col-lg-2 form-control-label d-flex justify-content-lg-end">Email</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" value="{{$val->email}}"
                                               placeholder="dgreen@mail.com">
                                    </div>
                                </div>
                                {{--                                <div class="form-group row d-flex align-items-center mb-5">--}}
                                {{--                                    <label--}}
                                {{--                                        class="col-lg-2 form-control-label d-flex justify-content-lg-end">Phone</label>--}}
                                {{--                                    <div class="col-lg-6">--}}
                                {{--                                        <input type="text" class="form-control" placeholder="+00 987 654 32">--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="form-group row d-flex align-items-center mb-5">--}}
                                {{--                                    <label--}}
                                {{--                                        class="col-lg-2 form-control-label d-flex justify-content-lg-end">Website</label>--}}
                                {{--                                    <div class="col-lg-6">--}}
                                {{--                                        <input type="text" class="form-control" placeholder="www.website.com">--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </form>
                        @endforeach
                        <div class="em-separator separator-dashed"></div>
                        <div class="col-10 ml-auto">
                            <div class="section-title mt-3 mb-3">
                                <h4>02. Password Update</h4>
                            </div>
                        </div>
                        <form action="/userpasswordChange" method="post" class="form-horizontal">
                            @csrf
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Current
                                    Password</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" name="current_password"
                                           id="current_password">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">New
                                    Password</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" name="new_password" id="new_password">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Confirm
                                    Password</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" name="new_confirm_password"
                                           id="new_confirm_password">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-gradient-03" type="submit">Update Password</button>

                            </div>
                        </form>
                        <div class="em-separator separator-dashed"></div>
                        <div class="col-10 ml-auto">
                            <div class="section-title mt-3 mb-3">
                                <h4>03. Profile Update</h4>
                            </div>
                        </div>
                        <form action="/useruploadImage" method="post" enctype="multipart/form-data"
                              class="form-horizontal">
                            @csrf
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Profile
                                    Image</label>
                                <div class="col-lg-6">
                                    <input type="file" class="form-control" name="image"
                                           id="image">
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-gradient-01" type="submit">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Container -->
@endsection
