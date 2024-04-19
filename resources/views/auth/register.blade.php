
@extends('layouts.layout')
@section('content')
  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
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
              <div class="card-header text-center pt-4">
                <h5>Register with</h5>
              </div>
              <div class="card-body">
                <form id="signUpForm" role="form text-left"  method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                  @csrf
                              <!-- step one -->

                   <div class="step">
                    <div class="row px-xl-5 px-sm-4 px-3 text-gray-900 font-medium text-xs text-center flex flex-col items-center justify-center">
                <label for="image-input" class="cursor-pointer">
                  <img id="preview-image" class="h-40 w-40 rounded-full shadow-xl border-2 border-gray-300"
                      src="{{ URL::asset('img/user.jpg') }}" alt="user image">
              </label>
              <input type="file" id="image-input" name="image" class="hidden" onchange="previewImage(event)"
                  required>
                <div class="mt-2 position-relative text-center">
                  <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                    Create your account
                  </p>
                </div>
              </div>
                  <div class="mb-3">
                    <input type="text" name="fullname" class="form-control" placeholder="FullName" aria-label="Name" aria-describedby="email-addon" required>
                    <div id="email_error" style="color: red"></div>

                  </div>
                  <div class="mb-3">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" required>
                  </div>
                  <div class="mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required>
                  </div>
                  <div class="mb-3">
                    <input type="password" name="password_confirmation" id="confirm_password" class="form-control" placeholder="Confirm Password" aria-label="Password" aria-describedby="password-addon" required>
                    <div id="password_error" style="color: red"></div>

                  </div>
                </div>
                  <!-- step two -->
               <div class="step">
                  <div class="mb-3">
                    <input type="text" name="address" class="form-control" placeholder="Address" aria-label="address" aria-describedby="password-addon" required>
                  </div>
                  <div class="mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" aria-label="phone" aria-describedby="password-addon" required>
                  </div>
                  <div class="mb-3">
                    <label class="block text-gray-700 font-medium mb-2">Role</label>
                    <div class="flex items-center">
                        <input type="radio" id="role_candidate" name="role" value="2" class="mr-2">
                        <label for="role_candidate" class="mr-4">Candidate</label>

                        <input type="radio" id="role_recruiter" name="role" value="3" class="mr-2">
                        <label for="role_recruiter">Entrepreneur</label>
                        <input type="radio" id="role_representative" name="role" value="4" class="mr-2">
                        <label for="role_representative" class="mr-4">Representative</label>

                    </div>
                    </div>
                    <div class="mb-6" id="companySelect" style="display: none;">
                      <label class="block text-gray-700 font-medium mb-2">Select Your Company</label>
                      <select name="company_id"
                          class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200">
                          @foreach ($companies as $company)
                              <option value="{{ $company['id'] }}">{{ $company['name'] }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="mb-3" id="companyDetails" style="display: none;">
                    <div class="mt-2 position-relative text-center">
                      <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                        Your company details
                       </p>
                    </div>
                      <div class="text-gray-900 font-medium text-xs text-center flex flex-col items-center justify-center">
                          <label for="logo-input" class="cursor-pointer">
                              <img id="logo-preview-image" class="h-40 w-40 rounded-full shadow-xl border-2 border-gray-400"
                                  src="{{ URL::asset('img/company.jpg') }}" alt="user image">
                          </label>
                          <input type="file" id="logo-input" name="logo" class="hidden" onchange="logopreviewImage(event)"
                              required>
                      </div>
                      <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="company name" aria-label="name" aria-describedby="password-addon" required>
                      </div>
                      <div class="mb-3">
                        <input type="text" name="location" class="form-control" placeholder="company location" aria-label="name" aria-describedby="password-addon" required>
                      </div>
                      <div class="mb-3">
                        <input type="text" name="description" class="form-control" placeholder="company description" aria-label="description" aria-describedby="password-addon" required>
                      </div>
                      <div class="mb-3">
                          <select class="js-example-basic-multiple select2 w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" name="sectors[]" multiple="multiple" style="width: 100%;">
                              @foreach ($sectors as $sector)
                                  <option value="{{ $sector->id }}" >
                                      {{ $sector->label }}
                                  </option>
                              @endforeach
                          </select>
                      </div>

                  </div>
                </div>

                  <div class="text-center">
                    <button type="button" id="prevBtn"
                    class="btn bg-gradient-dark w-100 my-4 mb-2 flex-1 "
                    onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="prevBtn"
                    class="btn bg-gradient-dark w-100 my-4 mb-2 flex-1 "
                    onclick="nextPrev(1)">Next</button>
                  </div>
                  <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ route('login') }}" class="text-dark font-weight-bolder">Sign in</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->

    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  </main>
  <script>
   var currentTab = 0;
        showTab(currentTab);

        function showTab(n) {
            var x = document.getElementsByClassName("step");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("step");
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;
            if (currentTab >= x.length) {
                document.getElementById("signUpForm").submit();
                return false;
            }
            showTab(currentTab);
        }


        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("step");
            y = x[currentTab].getElementsByTagName("input");
            for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    y[i].className += " invalid";
                    valid = false;
                }
            }
            if (valid) {
                document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
            }
            return valid;
        }

        function fixStepIndicator(n) {
            var i, x = document.getElementsByClassName("stepIndicator");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
        }
</script>
<script>
    ///////Representative
    document.addEventListener('DOMContentLoaded', function() {
        var roleRadios = document.querySelectorAll('input[name="role"]');
        var companyDetails = document.getElementById('companyDetails');

        function toggleCompanyDetails() {
            if (document.getElementById('role_representative').checked) {
                companyDetails.style.display = 'block';
            } else {
                companyDetails.style.display = 'none';
            }
        }

        toggleCompanyDetails(); // Initial state

        roleRadios.forEach(function(radio) {
            radio.addEventListener('change', toggleCompanyDetails);
        });
    });
    ///////// recuiter
    document.addEventListener('DOMContentLoaded', function() {
        var roleRadios = document.querySelectorAll('input[name="role"]');
        var companySelect = document.getElementById('companySelect');

        function toggleCompanySelect() {
            if (document.getElementById('role_recruiter').checked) {
                companySelect.style.display = 'block';
            } else {
                companySelect.style.display = 'none';
            }
        }

        toggleCompanySelect();

        roleRadios.forEach(function(radio) {
            radio.addEventListener('change', toggleCompanySelect);
        });
    });

    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview-image');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function logopreviewImage(event) {
        const input = event.target;
        const preview = document.getElementById('logo-preview-image');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm_password');
    const passwordError = document.getElementById('password_error');

    passwordInput.addEventListener('input', validatePassword);
    confirmPasswordInput.addEventListener('input', validatePassword);

    function validatePassword() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (password.length < 8) {
            passwordError.textContent = 'Password must be at least 8 characters long.';
        } else if (password !== confirmPassword) {
            passwordError.textContent = 'Passwords do not match.';
        } else {
            passwordError.textContent = '';
        }
    }
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('email_error');

    emailInput.addEventListener('input', validateEmail);

    function validateEmail() {
        const email = emailInput.value;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailPattern.test(email)) {
            emailError.textContent = 'Please enter a valid email address.';
        } else {
            emailError.textContent = '';
        }
    }
</script>

    <script>
      $(document).ready(function() {

          $('.js-example-basic-multiple').select2();
      });
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
<@endsection
