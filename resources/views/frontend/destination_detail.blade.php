<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css')}}" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/shakur.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/salman.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/tracking.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/msg.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/about.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/salman.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/findcourse.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/askgpt.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bsc.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/getstarted.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/tips.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/application.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css')}}" />

    <script src="{{asset('https://kit.fontawesome.com/c6614d5790.js')}}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css')}}">
    <script src="{{asset('https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js')}}"></script>


    <title>Academy -Destination Detail</title>

    <style>
         .overlay {
            display: none;
            position: fixed;
            top: 0px; /* Adjust as needed */
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .Rectangle-1239 {
  width: 163.5px;
  height: 33.5px;
  margin: 6px 181.5px 12.5px 8.5px;
  padding: 9px 30.5px;
  border-radius: 16.8px;
  background-color: #000000;
  color:#ffffff}

  @media (max-width:425px) {
            .form-container {
                width:80%;
           margin:0px 10%;
        }
        }
    </style>
</head>
@include('frontend.common_marquee')
<header>
    <nav class="nav-section">
        <ul class="nav-list">
            @include('frontend.common_header')s
            <div class="buttons">
                <a href="#" class="login">Free Consultation</a>
            </div>
        </ul>

        <div id="menu-icon" class="nav-link">
            <i class="fa-solid fa-bars fa-lg"></i>
        </div>
    </nav>

    @auth
        <div class="second-nav">
            <a href="{{route('home')}}"><img src="{{asset('assets/image/AncileAcad-logo.svg')}}" alt=""></a>
            <div class="nav-profile">
                <i class="fa-solid fa-xmark iconn"></i>
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <div class="input-box">
                        <form action="{{route('faq.general.search')}}" method="get">
                            <input type="text" name="search" placeholder="Search...">
                            <button type="submit" class="searchh">Search</button>
                        </form>

                    </div>
                </div>
                <div class="nav-auth-profile">
                    <img src="{{asset('assets/image/message.svg')}}" class="message" /><sup class="badge bg-primary" style="margin-left: -35px; margin-top: -10px; font-weight: bold; color: white; font-size: 10px;">{{count($unread_messages_user)}}</sup>
                    <div class="nav-profile-details">
                        <a href="{{route('profile')}}"><img src="{{Auth::user()->image != NULL ? asset(Auth::user()->image) : asset('https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?s=612x612&w=0&k=20&c=BIbFwuv7FxTWvh5S3vB6bkT0Qv8Vn8N5Ffseq84ClGI=')}}" alt="" class="profile-img"></a>
                        <div class="nav-profile-name">
                            <h3><h3>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3></h3>
                            <a href="{{route('logout')}}">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="second-nav">
            <a href="{{route('home')}}"><img src="{{asset('assets/image/AncileAcad-logo.svg')}}" alt=""></a>

            <div class="nav-profile">
                <i class="fa-solid fa-xmark iconn"></i>
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <div class="input-box">
                        <form action="{{route('faq.general.search')}}" method="get">
                            <input type="text" name="search" placeholder="Search...">
                            <button type="submit" class="search">Search</button>
                        </form>

                    </div>
                </div>
                <div class="nav-auth">
                    <a href="#" id="registered">SIGN UP</a>
                    <a href="#" id="logged">LOGIN</a>
                </div>
            </div>
        </div>
    @endauth
</header>
<section>
    <div class="tips-container">
        @if($destination->image2==NULL)
            <img src="{{asset($destination->image)}}" alt="" class="tips-banner">
        @else
            <img src="{{asset($destination->image2)}}" alt="" class="tips-banner">
        @endif
        <div class="tips-download">
            <img src="{{asset('assets/image/pdf-ic.png')}}" alt="">
            <p>RunBook - {{optional($destination->country_info)->name}}</p>
            <img src="{{asset('assets/image/download.svg')}}" alt="">
            <!-- <a href="{{asset($destination->pdf)}}" download="">Download Resource</a> -->

            <a href="#" onclick="showForm('{{$destination->pdf}}')">Download Resource</a>
        </div>
    </div>

    <div class="tips-process">
        {!! $destination->info !!}
    </div>
    <div class="tips-btn">
        <a href="#" onclick="showForm('{{$destination->pdf}}')">Find out more, download the  {{optional($destination->country_info)->name}} RunBook</a>

    </div>
</section>

<section id="offer">
    <div class="offer-container">
        <div class="offer-header">
            <h2>What We Offer</h2>
            <p>At Ancile Academy, we provide comprehensive services tailored to each
                studen’s unique journey,</p>
        </div>
        <div class="offer-box">
            <div class="offer">
                <p>University and program Selection</p>
            </div>
            <div class="offer">
                <p>Visa Assistance</p>
            </div>
            <div class="offer">
                <p>ELP Training</p>
            </div>
        </div>
        <div class="offer-box">
            <div class="offer">
                <p>Financial Aid Support</p>
            </div>
            <div class="offer">
                <p>Career Counselling</p>
            </div>
            <div class="offer">
                <p>Application & Scholarship</p>
            </div>
        </div>

        <div class="offer-box">
            <div class="offer">
                <p>Accommodation and Part-time assistance</p>
            </div>
            <div class="offer">
                <p>OPT/CPT Assistance and Post Study work right (PSW)</p>
            </div>
            <div class="offer">
                <p>Resume Marketing</p>
            </div>
        </div>
        <div class="offer-box">
            <div class="offer">
                <p>HIB visa filing and PR assistance</p>
            </div>
            <div class="offer">
                <p>Green Card filling</p>
            </div>

        </div>
    </div>
</section>
<section id="question">
    <div class="question-container">
        <div class="question-parag">
            <h3>Have a question?
                Our team is happy
                to assist you</h3>
            <p>Ask about universities, courses, programs or
                Process. Our highly trained reps are
                Standing by. Ready to help.</p>
            <div class="question-call">
                <a href="#">Contact us</a>
            </div>
        </div>
        <img src="{{asset('assets/image/call-in.jpg')}}" alt="">
    </div>
</section>


<div id="overlay" class="overlay">
            <div class="form-container">
                <h2 style="color:#080808;">Resource File Download</h2>
                <form id="downloadForm" onsubmit="return submitForm('{{ $destination->pdf }}')">
            <label for="email">Email:</label>
            <input type="email" id="email" required>
            <br>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" required>
            <br>
            <button  class="Rectangle-1239" type="submit">Submit</button>
            <button style="border-radius:10px;" class="badge bg-danger" type="button" onclick="hideForm()">Cancel</button>
        </form>

            </div>
        </div>

@include('frontend.common_footer')
<!-- consultation page............................ -->

<script src=" https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@include('frontend.common_extra_modal')
</body>
<script>


    const header = document.querySelector(".nav-section");
    const elements = document.querySelector(".nav-list");
    const menu = document.querySelectorAll(".nav-link");
    const sublink = document.querySelectorAll('.sublink')
    const icon = document.querySelector("#menu-icon i");
    const consultBtn = document.querySelector('.login')

    menu.forEach((element) => {
        element.addEventListener("click", () => {
            elements.classList.toggle("active");
            icon.classList.toggle("active");
        });
    });
    sublink.forEach((element) => {
        element.addEventListener("click", () => {
            elements.classList.toggle("active");
            icon.classList.toggle("active");
        });
    });

    consultBtn.addEventListener('click', (e) => {
        e.preventDefault()
        elements.classList.toggle("active");
        icon.classList.toggle("active");
    })

    let searchBox = document.querySelector(".search-box .fa-solid.fa-magnifying-glass");
    let search = document.querySelector('.nav-profile')
    console.log(searchBox)
    searchBox.addEventListener("click", () => {
        search.classList.toggle("showInput");
        if (search.classList.contains("showInput")) {
            searchBox.classList.replace("fa-solid.fa-magnifying-glass", "fa-solid.fa-xmark");
        } else {
            searchBox.classList.replace("fa-solid.fa-xmark", "fa-solid.fa-magnifying-glass");
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        // Fetch countries from the Restcountries API
        fetch("https://restcountries.com/v3.1/all")
            .then((response) => response.json())
            .then((data) => {
                // Get the select element
                const countrySelect = document.getElementById("country");

                // Populate the dropdown with countries
                data.forEach((country) => {
                    const option = document.createElement("option");
                    option.value = country.name.common;
                    option.textContent = country.name.common;
                    countrySelect.appendChild(option);
                });
            })
            .catch((error) => console.error("Error fetching countries:", error));
    });
    // //////////////PLAYGROUND...................................
    const input = document.querySelector("#phone");
    window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
    });

    const iti = window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
        initialCountry: "ng", // "ng" is the ISO country code for Nigeria
    });
    const input2 = document.querySelector("#phone2");
    window.intlTelInput(input2, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
    });

    const iti2 = window.intlTelInput(input2, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
        initialCountry: "ng", // "ng" is the ISO country code for Nigeria
    });

    // CONSULTATION LOGIC
    const consult = document.getElementById('consult')
    const closeConsult = document.querySelector('.consult-link')
    consultBtn.addEventListener('click', (e) => {
        e.preventDefault()
        consult.classList.toggle('active');
    })

    closeConsult.addEventListener('click', (e) => {
        e.preventDefault()
        consult.classList.toggle('active')
    })

    // REGISTER LOGIC
    const registerBtn = document.getElementById('registered')
    const registerBox = document.getElementById('register')
    const closeReg = document.querySelector('.reg-link')
    const regLogin = document.querySelector('.reg-login')
    const loginReg = document.querySelector('.login-reg')
    const getStarted = document.querySelectorAll('.login2')
    registerBtn.addEventListener('click', (e) => {
        e.preventDefault()
        registerBox.classList.toggle('active');
    })
    closeReg.addEventListener('click', (e) => {
        e.preventDefault()
        registerBox.classList.toggle('active');
    })
    //LOGIN LOGIC
    const loginBtn = document.getElementById('logged')
    const loginBox = document.getElementById('login')
    const closeLogin = document.querySelector('.login-link')
    loginBtn.addEventListener('click', (e) => {
        e.preventDefault()
        loginBox.classList.toggle('active');
    })
    closeLogin.addEventListener('click', (e) => {
        e.preventDefault()
        loginBox.classList.toggle('active');
    })

    regLogin.addEventListener('click', (e) => {
        e.preventDefault()
        registerBox.classList.toggle('active');
        loginBox.classList.toggle('active');
    })
    loginReg.addEventListener('click', (e) => {
        e.preventDefault()
        registerBox.classList.toggle('active');
        loginBox.classList.toggle('active');
    })

    function togglePasswordVisibility() {
        var passwordField = document.getElementById("passwordField");
        var eyeIcon = document.getElementById("eyeIcon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }

    function togglePasswordVisibility1() {
        const passwordField = document.getElementById("passwordField1");
        const eyeIcon = document.getElementById("eyeIcon1");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }

    function togglePasswordVisibility2() {
        const passwordField = document.getElementById("passwordField2");
        const eyeIcon = document.getElementById("eyeIcon2");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }

</script>


<script>
    function showForm(pdfLink) {
        document.getElementById('overlay').style.display = 'flex';
    }

    function hideForm() {
        document.getElementById('overlay').style.display = 'none';
    }

    function submitForm(pdfLink) {
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var page = 'destination page';

        fetch('/resource/download', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ email, phone, page }),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Success: Trigger file download
            alert(data.message);
            triggerFileDownload(pdfLink);

            setTimeout(function () {
            window.location.reload();
        }, 5000);

        })
        .catch(error => {
            // Handle errors (display appropriate messages)
            alert('Error submitting the form: ' + error.message);
        });

        document.getElementById('overlay').style.display = 'none';
        return false;
    }

    function triggerFileDownload(pdfLink) {
        // Extract the file name from the URL
        var fileName = pdfLink.substring(pdfLink.lastIndexOf('/') + 1);

        // Create an invisible link with the download attribute
        var link = document.createElement('a');
        link.href = pdfLink;
        link.download = fileName;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>

</html>
