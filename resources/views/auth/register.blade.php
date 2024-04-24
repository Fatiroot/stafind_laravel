
@extends('layouts.layout')
@section('content')
  <main class="main-content  mt-0">
    <section class="min-vh-100">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('assets/img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Welcome!</h1>
              <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <div class="card-body">
                <form id="signUpForm" role="form text-left" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row px-xl-5 px-sm-4 px-3 text-gray-900 font-medium text-xs text-center">
                        <div class="col-12 col-md-6 offset-md-3">
                            <div class="text-center">
                                <label for="image-input" class="cursor-pointer d-flex justify-content-center align-items-center rounded-circle border border-secondary p-1" style="width: 130px; height: 130px; overflow: hidden;">
                                    <img id="preview-image" class="h-100 w-auto mx-auto" src="{{ URL::asset('img/user.jpg') }}" alt="user image">
                                    <input type="file" id="image-input" name="image" class="hidden" onchange="previewImage(event)" >
                                </label>
                            </div>
                        </div>
                        <div class="mt-2 mb-2 text-center">
                            <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline bg-white px-3">
                                Create your account
                            </p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" aria-label="Name" aria-describedby="email-addon">
                        <div id="fullname_error" style="color: red"></div>
                    </div>
                    <div class="mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                        <div id="email_error" style="color: red"></div>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                        <div id="password_error" style="color: red"></div>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password_confirmation" id="confirm_password" class="form-control" placeholder="Confirm Password" aria-label="Password" aria-describedby="password-addon">
                        <div id="confirm_password_error" style="color: red"></div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="address" id="address" class="form-control" placeholder="Address" aria-label="Address" aria-describedby="password-addon">
                        <div id="address_error" style="color: red"></div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" aria-label="Phone Number" aria-describedby="password-addon">
                        <div id="phone_error" style="color: red"></div>
                    </div>
                    <div class="mb-3">
                        <label class="block text-gray-700 font-medium mb-2">Role</label>
                        <div class="flex items-center">
                            <input type="radio" id="role_candidate" name="role" value="2" class="mr-2">
                            <label for="role_candidate" class="mr-4">Candidate</label>

                            <input type="radio" id="role_recruiter" name="role" value="3" class="mr-2">
                            <label for="role_recruiter">Entrepreneur</label>

                            <input type="radio" id="role_representative" name="role" value="4" class="mr-2">
                            <label for="role_representative">Representative</label>
                        </div>
                        <div id="role_error" style="color: red"></div>
                    </div>
                    <div id="companySelect" style="display: none;">
                        <select name="company_id" id="company_id" class="w-full rounded-md border-gray-200 p-2" style="width: 100%;">
                            <option value="">Select company</option>
                            @foreach ($companies as $company)
                            <option value="{{ $company['id'] }}">{{ $company['name'] }}</option>
                            @endforeach
                        </select>
                        <div id="company_id_error" style="color: red"></div>
                    </div>
                    <div id="companyDetails" style="display: none;">
                        <div class="mt-2 position-relative text-center">
                            <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                                Your company details
                            </p>
                            <div class="row px-xl-5 px-sm-4 px-3 text-gray-900 font-medium text-xs text-center">
                                <div class="col-12 col-md-6 offset-md-3">
                                    <div class="text-center">
                                            <label for="logo-input" class="cursor-pointer d-flex justify-content-center align-items-center rounded-circle border border-secondary p-1" style="width: 130px; height: 130px; overflow: hidden;">
                                                <img id="logo-preview-image" class="h-100 w-auto" src="{{ URL::asset('img/company.jpg') }}" alt="company logo">
                                                <input type="file" id="logo-input" name="logo" class="hidden" onchange="logopreviewImage(event)" >
                                            </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="name" id="company_name" class="form-control" placeholder="Company Name" aria-label="Company Name" aria-describedby="password-addon">
                            <div id="company_name_error" style="color: red"></div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="location" id="company_location" class="form-control" placeholder="Company Location" aria-label="Company Location" aria-describedby="password-addon">
                            <div id="company_location_error" style="color: red"></div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="description" id="company_description" class="form-control" placeholder="Company Description" aria-label="Company Description" aria-describedby="password-addon">
                            <div id="company_description_error" style="color: red"></div>
                        </div>
                        <div class="mb-3">
                            <select id="sectors" class="js-example-basic-multiple w-full rounded-md border-gray-200" name="sectors[]" multiple="multiple" style="width: 100%;">
                                @foreach ($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->label }}</option>
                                @endforeach
                            </select>
                            <div id="sectors_error" style="color: red"></div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" onclick="validateForm()" class="btn bg-gradient-dark w-100 my-4 mb-2 flex-1">Submit</button>
                    </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>


<script src="{{asset('js/validateRegistration.js')}}"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
<@endsection
