@extends('Backend.layout')
@section('title','Complain')
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
                            <h4 class="mb-sm-0">Update Complain</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Form Elements</li>
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

                                <h4 class="card-title">User Complain Edit</h4>

                                <form action="/updateComplain{{$complain->id}}" method="post" id="myForm"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Subject</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="subject" type="text"
                                                   value="{{$complain->subject}}" id="example-text-input">
                                        </div>
                                    </div>


                                    <div class="mb-3 row">
                                        <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="email" type="email" value="{{$complain->email}}"
                                                   id="example-search-input">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-date-input" class="col-md-2 col-form-label">Date</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="date" name="date" value="{{$complain->date}}"
                                                   id="example-date-input">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-problem-input" class="col-md-2 col-form-label">Problem
                                            Type</label>
                                        <div class="col-md-10">
                                            <input class="form-control"  name="problem_type" type="problem_type"
                                                   value="{{$complain->problem_type}}" id="example-problem-input">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-describe-input" class="col-md-2 col-form-label">Problem
                                            Describe</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="describe" name="describe" value="{{$complain->describe}}"
                                                   id="example-describe-input">
                                        </div>
                                    </div>

                                    <div class="col-12 ">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
