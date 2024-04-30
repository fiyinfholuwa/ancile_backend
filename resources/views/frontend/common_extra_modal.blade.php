<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js" integrity="sha512-oVbWSv2O4y1UzvExJMHaHcaib4wsBMS5tEP3/YkMP6GmkwRJAa79Jwsv+Y/w7w2Vb/98/Xhvck10LyJweB8Jsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" >
<head>
    <!-- ... Other head elements ... -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


<div class="se-pre-con"></div>
<style>
    /*.no-js #loader { display: none;  }*/
    /*.js #loader { display: block; position: absolute; left: 100px; top: 0; }*/
    .se-pre-con {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        display: none;
        background: url({{asset('assets/image/loader.gif')}}) center no-repeat #fff;
        background-size: contain;
    }

    @media (max-width: 767px) {
        .se-pre-con {
            /* Adjust styles for smaller screens here */
            background-size: contain; /* or any other styles you want */
        }
    }

</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Display loader on page reload
        document.querySelector('.se-pre-con').style.display = 'block';

        // Set a timeout to hide the loader after 5 seconds
        setTimeout(function () {
            document.querySelector('.se-pre-con').style.display = 'none';
        }, 2000);
    });
</script>

<div id="consult">
    <a href="#" style="margin-top:50px;"  class="consult-link"><img height="20px" width="20px" src="{{asset('assets/image/close-aa.svg')}}"></a>
    <h3  class="consult-head">START A FREE CONSULTATION</h3>

    <form action="javascript:void(0);" class="consult-form" id="consultForm">
        <div class="consult-details">
            <input type="text" name="first_name" id="fname" placeholder="First name">
            <p style="display: block; color: #ffffff" class="error" id="first_name_error"></p>

            <input type="text" name="last_name" id="lname" placeholder="Last name">
            <p class="error" id="last_name_error" style="color: white;"></p>
        </div>

        <div class="consult-details">
            <input type="email" name="email" id="email" placeholder="Email address">
            <p class="error" id="email_error" style="color: white;"></p>

            <input type="number" id="phone" name="phone" placeholder="Phone number">
            <p class="error" id="phone_error" style="color: white;"></p>
        </div>

        <div class="consult-select">
            <h4>Your intending study destination</h4>
            <select style="display: none" name="country" id="country">
                <!-- ... Options ... -->
            </select>
            <select class="form-control" name="country" id="country">
                <option value="">Select Country</option>
                @foreach($countries as $country)
                    <option value="{{$country->name}}">{{$country->name}}</option>
                @endforeach
            </select>
            <p class="error" id="country_error" style="color: white;"></p>
        </div>

        <div class="consult-select">
            <h4>level of study are you planning for?</h4>
            <select class="form-control" name="education_level" id="education_level">
                <option value="">Select Educational Level</option>
                @foreach($levels as $level)
                    <option value="{{$level->level_name}}">{{$level->level_name}}</option>
                @endforeach
            </select>
            <p class="error" id="education_level_error" style="color: white;"></p>
        </div>

       <div style="margin-top:-50px;">
       <button type="button" id="sendButton">Send Request</button>
       </div>
    </form>


    <p class="consult-parag">As soon as your request is received, an expert will be assigned to see you through an
        advice stage. If need be a university counsellor will be in the process to guide you on the right choices.</p>
</div>

<!-- Register............................ -->
<div id="register">
    <a href="#" style="margin-top:50px;" class="consult-link reg-link"><img height="20px" width="20px" src="{{asset('assets/image/close-aa.svg')}}"></a>
    <h3 class="reg-head">CREATE ACCOUNT</h3>
    <form id="registrationForm" action="{{ route('user.register') }}" method="POST"  class="consult-form">
        <div class="consult-details">
            <input type="text" name="firstname" id="firstname" placeholder="Enter First Name">
            <p class="error" id="firstname_error" style="color: white;"></p>

            <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name">
            <p class="error" id="lastname_error" style="color: white;"></p>
        </div>
        <div class="consult-details">
            <input type="email" name="email" id="mail" placeholder="Enter Email Address">
            <p class="error" id="r_email_error" style="color: white;"></p>

            <input type="number" id="phone2" name="mobile_number">
            <p class="error" id="mobile_number_error" style="color: white;"></p>
        </div>
        <div class="">
            <div class="password-box">
                <input type="password" name="password" id="passwordField1" placeholder="Enter Password">
                <p class="error" id="password_error" style="color: white;"></p>
                <span class="toggle-password1" onclick="togglePasswordVisibility1()">
              <i class="fa-solid fa-eye" id="eyeIcon1"></i>
            </span>
            </div>

            <div class="password-box">
                <input type="password" name="password_confirmation" id="passwordField2" placeholder="Confirm Password">
                <p class="error" id="password_error" style="color: white;"></p>
                <span class="toggle-password2" onclick="togglePasswordVisibility2()">
              <i class="fa-solid fa-eye" id="eyeIcon2"></i>
            </span>
            </div>

        </div>
        <p class="consult-parag2"><input required checked type="checkbox">&nbsp;  I agree to Acileacademy <a href="#">Terms &
                Conditions</a> & <a href="#">Privacy
                Policy</a></p>
        <p class="consult-parag2"><input required checked type="checkbox">&nbsp; I consent to be contacted  by phone, email or sms to assist with my enquiry</p>
        <p class="consult-parag2"><input checked type="checkbox">&nbsp;  I would like to receive update and offer from Ancileacademy.</p>
        <div class="reg-button">
            <button id="registerB" type="submit">Create Account</button>
            <div class="reg-already">
                <p>Already have an account? <span><a href="#" class="reg-login">Login</a></span></p>
            </div>
        </div>
    </form>
</div>
<!-- Login............................ -->
<div id="login">
    <a href="#" style="margin-top:50px;" class="consult-link login-link"><img height="20px" width="20px" src="{{asset('assets/image/close-aa.svg')}}"></a>
    <h3 class="reg-head">LOGIN</h3>
    <!-- ... other HTML code ... -->
    <form id="loginForm" action="{{ route('login.user') }}" method="post" class="consult-form">
        @csrf
        <div class="login-div">
            <label for="email">Email Address</label><br><br>
            <input type="email" id="email" name="email" placeholder="Enter Email Address">
            <p class="error" id="register_email_error" style="color: white;"></p>
        </div>

        <div class="login-div">
            <label for="passwordField">Password</label><br><br>
            <div class="login-divv">
                <input type="password" id="passwordField" name="password" placeholder="Enter Password">
                <p class="error" id="register_password_error" style="color: white;"></p>
                <span class="toggle-password" onclick="togglePasswordVisibility()">
                    <i class="fa-solid fa-eye" id="eyeIcon"></i>
                </span>
            </div>
            <div class="field-error" id="password_error"></div>
        </div>
        <div>
            <a href="{{route('password.request')}}">Forgot password</a>
        </div>
        <!-- ... other form fields ... -->
        <button type="submit" class="loginGo">Login</button>

    </form>
    <div id="errorMessages"></div>
</div>

<div class="custom-modal" id="successModal">
    <div class="modal-content">
{{--        <span class="close" id="closeModal">&times;</span>--}}
        <p id="successMessage"></p>
        <a href="{{route('home')}}">Ok</a>
    </div>
</div>

<style>
    .custom-modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f1f1f1;
        padding: 20px;
        border: 1px solid #ccc;
        text-align: center;
        z-index: 1;
    }

    .error-message {
        color: white;
    }

    .field-error.error {
        color: white;
    }

    .custom-modal .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 40px;
        cursor: pointer;
    }

    .custom-modal a {
        margin-top: 10px;
        padding: 10px;
        background-color: #0a53be;
        color: white;
        border: none;
        cursor: pointer;
    }
</style>
<script>


    document.addEventListener('DOMContentLoaded', function () {
        const consult = document.getElementById('consult');
        const closeConsult = document.querySelector('.consult-link');
        const sendButton = $('#sendButton');

        sendButton.click(function () {
            // Clear previous errors
            $('.error').text('');

            // Serialize form data
            var formData = $('#consultForm').serialize();

            // Include CSRF token in the data
            formData += '&_token=' + $('meta[name="csrf-token"]').attr('content');

            // Change button text to 'Processing...'
            sendButton.text('Processing...');

            // Submit form data using AJAX
            $.ajax({
                type: 'POST',
                url: '{{ route("consultation.add") }}', // Replace with your actual route name
                data: formData,
                dataType: 'json',
                success: function (data) {
                    // Display success message in the modal
                    showSuccessModal(data.message);

                    // Close the modal
                    closeConsultModal();
                },
                error: function (xhr) {
                    // Handle errors (display error messages)
                    if (xhr.status === 422) {
                        // Validation errors
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = 'The following errors occurred:';

                        for (var key in errors) {
                            // Display all errors for each field
                            $('#' + key + '_error').text(errors[key][0]);
                            // Add errors to the general error message
                            errorMessage += '\n- ' + errors[key][0];
                        }

                    } else {
                        // Other server-side errors
                        alert('An error occurred while processing your request. Please try again.');
                    }
                },
                complete: function () {
                    // Change button text back to 'Submit Request'
                    sendButton.text('Submit Request');
                }
            });
        });

        // Show success modal
        function showSuccessModal(message) {
            document.getElementById('successMessage').innerText = message;
            document.getElementById('successModal').style.display = 'block';
        }

        // Close modal
        function closeConsultModal() {
            consult.classList.remove('active');
        }

        closeConsult.addEventListener('click', (e) => {
            e.preventDefault();
            closeConsultModal();
        });
    });

    $(document).ready(function () {
        $('#loginForm').submit(function (e) {
            e.preventDefault();

            // Serialize form data
            var formData = $(this).serialize();

            // Submit form data using Ajax
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                dataType: 'json',
                success: function (data) {
                    if(data.success){
                        window.location.href = data.redirect;
                    }else{
                        $('#register_email_error').text(data.errors);
                    }
                },
                error: function (xhr) {
                    // Handle errors (display error messages)
                    if (xhr.status === 422) {
                        // Validation errors
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = 'The following errors occurred:';
                        for (var key in errors) {
                            // Display all errors for each field
                            $('#' + key + '_error').text(errors[key][0]);
                            if(key=='email'){
                                $('#register_email_error').text(errors[key][0]);
                            }
                            if(key=='password'){
                                $('#register_password_error').text(errors[key][0]);
                            }
                            errorMessage += '\n- ' + errors[key][0];
                        }
                    } else {
                        // Other server-side errors
                        alert('An error occurred while processing your request. Please try again.');
                    }
                }
            });
        });
    });



    {{--$(document).ready(function () {--}}
    {{--    $('#registrationForm').submit(function (event) {--}}
    {{--        event.preventDefault();--}}

    {{--        var formData = $(this).serialize();--}}

    {{--        $.ajax({--}}
    {{--            type: 'POST',--}}
    {{--            url: '{{route('user.register')}}',--}}
    {{--            data: formData,--}}
    {{--            dataType: 'json',--}}
    {{--            headers: {--}}
    {{--                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')--}}
    {{--            },--}}
    {{--            success: function (response) {--}}
    {{--                if(response.status =="success"){--}}
    {{--                    alert(response.message);--}}
    {{--                    window.location.href = response.redirect_url;--}}
    {{--                }else{--}}
    {{--                    alert('Error Occured');--}}
    {{--                }--}}
    {{--            },--}}
    {{--            error: function (xhr, status, error) {--}}
    {{--                if (xhr.status === 422) {--}}
    {{--                    var errors = xhr.responseJSON.errors;--}}
    {{--                    displayErrors(errors);--}}
    {{--                } else {--}}
    {{--                    // Other server-side errors--}}
    {{--                    alert('An error occurred while processing your request. Please try again.');--}}
    {{--                }--}}


    {{--            }--}}
    {{--        });--}}
    {{--    });--}}

    {{--    function displayErrors(errors) {--}}
    {{--        for (var field in errors) {--}}
    {{--            var errorMessage = errors[field][0];--}}
    {{--            if(field=='email'){--}}
    {{--                $('#r_email_error').html(errors[field][0]);--}}
    {{--            }--}}
    {{--            $('#' + field + '_error').html(errorMessage);--}}
    {{--        }--}}
    {{--    }--}}
    {{--});--}}


    $(document).ready(function () {
        $('#registrationForm').submit(function (event) {
            event.preventDefault();

            var formData = $(this).serialize();
            var registerButton = $('#registerB');

            $('.error').text('');

            // Change button text to 'Processing...'
            registerButton.text('Processing...');

            $.ajax({
                type: 'POST',
                url: '{{route('user.register')}}',
                data: formData,
                dataType: 'json',
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.status == "success") {
                        alert(response.message);
                        window.location.href = response.redirect_url;
                    } else {
                        alert('Error Occurred');
                    }
                },
                error: function (xhr, status, error) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        displayErrors(errors);
                    } else {
                        // Other server-side errors
                        alert('An error occurred while processing your request. Please try again.');
                    }
                },
                complete: function () {
                    // Change button text back to 'Create Account'
                    registerButton.text('Create Account');
                }
            });
        });

        function displayErrors(errors) {
            for (var field in errors) {
                var errorMessage = errors[field][0];
                if (field == 'email') {
                    $('#r_email_error').html(errors[field][0]);
                }
                $('#' + field + '_error').html(errorMessage);
            }
        }
    });

</script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}";
    switch(type){
        case 'info':
            Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
                style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
            }).showToast();
            break;

        case 'success':
            Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
                style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
            }).showToast();
            break;

        case 'warning':
            Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
                style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
            }).showToast();
            break;

        case 'error':
            Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
                style: { background: "linear-gradient(to right, #ff0000, #ff0000)" }
            }).showToast();
            break;
    }

    // Unset the session
    {{ Session::forget('message') }}
    {{ Session::forget('alert-type') }}
    @endif
</script>


