@extends('Frontend.layout')
@section('title','Complain')
@section('maincontent')
    <div class="container">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Complain add</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Components</a></li>
                            <li class="breadcrumb-item active">Complain Form</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row flex-row">
            <div class="col-xl-12">
                <!-- Form -->
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>Complain Form</h4>
                    </div>
                    <div class="widget-body">
                        <form class="needs-validation" action="/complainStore" method="post" id="myForm" enctype="multipart/form-data" novalidate>
                          @csrf
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Subject</label>
                                <div class="col-lg-5">
                                    <input type="text" name="subject" class="form-control" placeholder="Enter your Complain's Subject"  required>
                                    <div class="invalid-feedback">
                                        Please enter a short subject
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Email Address </label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <input type="email"  name="email" class="form-control" placeholder="Enter your email">
                                        <span class="input-group-addon addon-orange">.com</span>
                                        <div class="invalid-feedback">
                                            Please enter a valid email (If you want)
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Problem that you find Date</label>
                                <div class="col-lg-5">
                                    <input type="date" name="date" class="form-control" placeholder="MM/DD/YYYY">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Problem Type *</label>
                                <div class="col-lg-5">
                                    <div class="select">
                                        <select name="problem_type" class="custom-select form-control" required>
                                            <option value="">Select an option</option>
                                            <option value="AC problem">AC problem</option>
                                            <option value="Seat Problem">Seat Problem</option>
                                            <option value="Washroom problem">Washroom problem</option>
                                            <option value="Electricity problem">Electricity problem</option>
                                            <option value="Projector problem">Projector problem</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select an option
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Image</label>
                                <div class="col-lg-5">
                                    <input type="file" name="images" class="form-control" placeholder="Enter a image if any">
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Describe</label>
                                <div class="col-lg-5">
                                    <textarea class="form-control" name="describe" placeholder="Type your message here ..." required></textarea>
                                    <div class="invalid-feedback">
                                        Please enter a custom message
                                    </div>
                                </div>
                            </div>
                            <div class="em-separator separator-dashed"></div>
                            <div class="form-group row mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">I concern about the information</label>
                                <div class="col-lg-5">
                                    <div class="custom-control custom-checkbox styled-checkbox">
                                        <input class="custom-control-input" type="checkbox" name="checkbox" id="check-1" required>
                                        <label class="custom-control-descfeedback" for="check-1">Tick me</label>
                                        <div class="invalid-feedback">
                                            Tick me please!
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button class="btn btn-gradient-01" type="submit">Submit Form</button>
                                <button class="btn btn-shadow" type="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Form -->
            </div>
        </div>
        <!-- End Row -->
    </div>
@endsection
@push('js')
    <script src="assets/js/components/validation/validation.min.js"></script>
@endpush
