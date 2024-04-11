<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <title>SignUp</title>

</head>
<body style="background-image: url('assets/img/curved-images/curved1.jpg'); background-size: cover;">
  <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
            </div>
          </div>
        </div>
       <h1 class="text-lg font-bold text-white leading-tight text-center mt-12 mb-5">Create your acoount now!</h1>
        <form id="signUpForm" class="p-12 shadow-md rounded-2xl bg-white mx-auto border-solid border-2 border-gray-100 mb-8"
            method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <!-- step one -->
            <div class="step">
                <div class="text-gray-900 font-medium text-xs text-center flex flex-col items-center justify-center">
                    <label for="image-input" class="cursor-pointer">
                        <img id="preview-image" class="h-40 w-40 rounded-full shadow-xl border-2 border-gray-300"
                            src="{{ URL::asset('img/user.jpg') }}" alt="user image">
                    </label>
                    <input type="file" id="image-input" name="image" class="hidden" onchange="previewImage(event)"
                        required>
                </div>
                <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Create your account</p>
                <div class="mb-6">
                    <input type="text" placeholder="Full name" name="fullname"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                        required />
                </div>
                <div class="mb-6">
                    <input type="email" placeholder="Email Address" name="email" id="email"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                        required>
                    <div id="email_error" class="text-red-500"></div>
                </div>

                <div class="mb-6">
                    <input type="password" placeholder="Password" name="password" id="password"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200"
                        required>
                </div>
                <div class="mb-6">
                    <input type="password" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200" />
                    <div id="password_error" class="text-red-500"></div>
                </div>
            </div>
            <!-- step two -->
            <div class="step">
                <div class="mb-6"> <input type="text" placeholder="Address" name="address"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200">
                </div>
                <div class="mb-6"> <input type="text" placeholder="phone number" name="phone"
                        class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200">
                </div>
                <div class="mb-6">
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
                <div class="mb-6" id="companyDetails" style="display: none;">
                    <p class="text-md text-gray-700 leading-tight text-center mt-8 mb-5">Your company details</p>
                    <div class="text-gray-900 font-medium text-xs text-center flex flex-col items-center justify-center">
                        <label for="logo-input" class="cursor-pointer">
                            <img id="logo-preview-image" class="h-40 w-40 rounded-full shadow-xl border-2 border-gray-400"
                                src="{{ URL::asset('img/company.jpg') }}" alt="user image">
                        </label>
                        <input type="file" id="logo-input" name="logo" class="hidden" onchange="logopreviewImage(event)"
                            required>
                    </div>
                    <div class="mb-6"> <input type="text" placeholder="company name" name="name"
                            class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200">
                    </div>
                    <div class="mb-6"> <input type="text" placeholder="company location" name="location"
                            class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200">
                    </div>
                    <div class="mb-6"> <input type="text" placeholder="company description" name="description"
                            class="w-full px-4 py-3 rounded-md text-gray-700 font-medium border-solid border-2 border-gray-200">
                    </div>
                </div>
            </div>

            <div class="form-footer flex gap-3">
                <button type="button" id="prevBtn"
                    class="flex-1 focus:outline-none border border-gray-300 py-2 px-5 rounded-lg shadow-sm text-center text-gray-700 bg-white hover:bg-gray-100 text-lg"
                    onclick="nextPrev(-1)">Previous</button> <button type="button" id="nextBtn"
                    class="flex-1 border border-transparent focus:outline-none p-3 rounded-md text-center text-white bg-indigo-600 hover:bg-indigo-700 text-lg"
                    onclick="nextPrev(1)">Next</button>
            </div>
        </form>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <footer class="footer py-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mb-4 mx-auto text-center">
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                  Company
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                  About Us
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                  Team
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                  Offers
                </a>
              </div>
              <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                  <span class="text-lg fab fa-dribbble"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                  <span class="text-lg fab fa-twitter"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                  <span class="text-lg fab fa-instagram"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                  <span class="text-lg fab fa-pinterest"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                  <span class="text-lg fab fa-github"></span>
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-8 mx-auto text-center mt-1">
                <p class="mb-0 text-secondary">
                  Copyright © <script>
                    document.write(new Date().getFullYear())
                  </script>
                </p>
              </div>
            </div>
          </div>
        </footer>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <!--   Core JS Files   -->
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
          var win = navigator.platform.indexOf('Win') > -1;
          if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
              damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
          }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>




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
    const confirmPasswordInput = document.getElementById('password_confirmation');
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


<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" /><!-- google font -->
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</body>
</html>
