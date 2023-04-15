@extends('Frontend.layout')
@section('title','Suggestion')
@section('maincontent')
    <div class="container">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Suggestion add</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Components</a></li>
                            <li class="breadcrumb-item active">Suggestion Form</li>
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
                        <h4>Suggestion Form</h4>
                    </div>
                    <div class="widget-body">
                        <form class="needs-validation" action="/suggestionStore" method="post" id="myForm"
                              enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Topic</label>
                                <div class="col-lg-5">
                                    <input type="text" name="topic" class="form-control"
                                           placeholder="Enter your Topic's name" required>
                                    <div class="invalid-feedback">
                                        Please enter a short Suggestion topic
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Email
                                    Address </label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control"
                                               placeholder="Enter your email">
                                        <span class="input-group-addon addon-orange">.com</span>
                                        <div class="invalid-feedback">
                                            Please enter a valid email (If you want)
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label
                                    class="col-lg-4 form-control-label d-flex justify-content-lg-end">Describe</label>
                                <div class="col-lg-5">
                                    <textarea class="form-control" name="describe"
                                              placeholder="Type your message here ..." required></textarea>
                                    <div class="invalid-feedback">
                                        Please enter your suggestion in describe
                                    </div>
                                </div>
                            </div>
                            <div class="em-separator separator-dashed"></div>
                            <div class="form-group row mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">I concern about
                                    the information</label>
                                <div class="col-lg-5">
                                    <div class="custom-control custom-checkbox styled-checkbox">
                                        <input class="custom-control-input" type="checkbox" name="checkbox" id="check-1"
                                               required>
                                        <label class="custom-control-descfeedback" for="check-1">I am sure</label>
                                        <div class="invalid-feedback">
                                            Check it!
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
