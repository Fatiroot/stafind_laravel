
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

    toggleCompanyDetails();

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

// **********************************************

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
// ***********************************************

    function validateForm() {
        resetErrors();

        var fullname = document.getElementById('fullname').value.trim();
        var email = document.getElementById('email').value.trim();
        var password = document.getElementById('password').value.trim();
        var confirm_password = document.getElementById('confirm_password').value.trim();
        var address = document.getElementById('address').value.trim();
        var phone = document.getElementById('phone').value.trim();
        var role = document.querySelector('input[name="role"]:checked');
        var company_id = document.getElementById('company_id').value.trim();
        var company_name = document.getElementById('company_name').value.trim();
        var company_location = document.getElementById('company_location').value.trim();
        var company_description = document.getElementById('company_description').value.trim();
        var sectors = document.getElementById('sectors').value;

        var isValid = true;

        // Validate Full Name
        if (fullname === '') {
            document.getElementById('fullname_error').textContent = 'Please enter your full name';
            isValid = false;
        }

        // Validate Email
        if (email === '') {
            document.getElementById('email_error').textContent = 'Please enter your email';
            isValid = false;
        } else if (!isValidEmail(email)) {
            document.getElementById('email_error').textContent = 'Please enter a valid email address';
            isValid = false;
        }

        // Validate Password
        if (password === '') {
            document.getElementById('password_error').textContent = 'Please enter a password';
            isValid = false;
        }

        // Validate Confirm Password
        if (confirm_password === '') {
            document.getElementById('confirm_password_error').textContent = 'Please confirm your password';
            isValid = false;
        } else if (confirm_password !== password) {
            document.getElementById('confirm_password_error').textContent = 'Passwords do not match';
            isValid = false;
        }

        // Validate Address
        if (address === '') {
            document.getElementById('address_error').textContent = 'Please enter your address';
            isValid = false;
        }

        // Validate Phone Number
        if (phone === '') {
            document.getElementById('phone_error').textContent = 'Please enter your phone number';
            isValid = false;

        }

        // Validate Role
        if (!role) {
            document.getElementById('role_error').textContent = 'Please select a role';
            isValid = false;
        }

        // Validate Company ID (if applicable)
        if (role && (role.value === '3' )) {
            if (company_id === '') {
                document.getElementById('company_id_error').textContent = 'Please select a company domain';
                isValid = false;
            }
        }

        // Validate Company Name (if applicable)
        if (role && role.value === '4') {
            if (company_name === '') {
                document.getElementById('company_name_error').textContent = 'Please enter your company name';
                isValid = false;
            }
        }

        // Validate Company Location (if applicable)
        if (role && role.value === '4') {
            if (company_location === '') {
                document.getElementById('company_location_error').textContent = 'Please enter your company location';
                isValid = false;
            }
        }

        // Validate Company Description (if applicable)
        if (role && role.value === '4') {
            if (company_description === '') {
                document.getElementById('company_description_error').textContent = 'Please enter your company description';
                isValid = false;
            }
        }

        // Validate Sectors (if applicable)
        if (role && role.value === '4') {
            if (sectors.length === 0) {
                document.getElementById('sectors_error').textContent = 'Please select at least one sector';
                isValid = false;
            }
        }

        // Submit the form if valid
        if (isValid) {
            document.getElementById('signUpForm').submit();
        }
    }

    function resetErrors() {
        var errorFields = document.querySelectorAll('[id$="_error"]');
        errorFields.forEach(function (element) {
            element.textContent = '';
        });
    }

    function isValidEmail(email) {
        // Regular expression for validating email format
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
