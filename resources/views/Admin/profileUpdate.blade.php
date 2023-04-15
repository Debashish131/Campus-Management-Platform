@extends('Backend.layout')
@section('title','Profile Pic update')
@section('maincontent')

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
                        <h4 class="mb-sm-0">Profile pic Update</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Profile pic Update</a></li>
                                <li class="breadcrumb-item active">Elements</li>
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

                            <h4 class="card-title">Profile Image</h4>

                            <form action="/uploadImage" method="post" id="myForm"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="example-old-input" class="col-md-2 col-form-label">Profile Pic</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="image"
                                               id="image">
                                    </div>
                                </div>

                                <div class="mb-3 row ">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
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
