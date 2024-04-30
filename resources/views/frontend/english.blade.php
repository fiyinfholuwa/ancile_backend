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
    <link rel="stylesheet" href="{{asset('assets/css/english.css')}}">
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


    <title>Academy -Course</title>

    <style>
        /* Your existing CSS styles */

        .resource-box {
            display: flex;
            flex-wrap: wrap;
        }

        .resource {
            margin: 20px;
        }

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
            padding:50px 30px !important;

        }

        .form-container i{
            position: absolute;
            top:20px;
            right:20px;
            font-size:20px;
        }

        .form-container a{
            color:black;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            padding:50px 70px !important;
            border-radius: 20px;
            position: relative;
            width: 40%;
        }


        .form-container h2{
            margin-top:30px;
            font-size: 27px;

        }

        .Rectangle-1239 {
            padding: 1rem 3rem;
            border-radius: 50px;
            font-size: 1.5rem;
            outline: none;
            border: none;
            background-color: #000;
            color: #fff;
            margin-left: 2rem;
        }

        @media (max-width:425px) {
            .form-container {
                width:100%;
                /*margin:0px 10%;*/
                padding:20px 15px;
            }

            .form-container h2{
                margin-top:20px;
                font-size: 14px;
                border-radius: 10px;

            }

        }
    </style>
</head>
<body>
@include('frontend.common_marquee')
<header>
    <nav class="nav-section">
        <ul class="nav-list">
            @include('frontend.common_header')
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


    <div class="hero-container">
        <div class="hero-bag">
            <h1>Prepare for your
                English test</h1>
            <p>Apply for lessons</p>
            <div class="tutorial-link">
                <a href="#IELTS">IELTS</a>
                <a href="#PTE">PTE</a>
                <a href="#DUO">Duolingo</a>
                <a href="#TOEFL">TOEFL</a>
            </div>
        </div>
    </div>

</header>

<section id="IELTS">
    <div class="tutorial-container">
        <img src="{{asset('assets/image/ielts-img.png')}}" alt="" class="tutor-imgg">
        <div class="tutorial-text">
            <img src="{{asset('assets/image/ielts-logo.png')}}" alt="">
            <p>The International English Language Testing System (IELTS) measures the language proficiency of people who
                want to study
                or work where English is used as a language of communication. It uses a nine-band scale to clearly identify
                levels of
                proficiency, from non-user (band score 1) through to expert (band score 9). Over 2.7 million candidates take
                the test
                each year to start their journeys in international education and employment.</p>
            <p>The IELTS is accepted by more than 9,000 institutions / organizations in over 135 countries.</p>
            <a href="#"  onclick="showForm('IELTS')" class="test-link">Apply for Lessons</a>
        </div>
    </div>
</section>
<section id="PTE">
    <div class="tutorial-container">
        <div class="tutorial-text">
            <img src="{{asset('assets/image/pearson-logo.png')}}" alt="">
            <p>The PTE (Pearson Test of English) exam is a computer-based English language proficiency test designed to
                assess the
                speaking, writing, listening, and reading abilities of non-native English speakers. It’s widely accepted by
                universities, colleges, and governments around the world as proof of English language proficiency for study,
                work, and
                migration purposes.</p>
            <a href="#"  onclick="showForm('PTF')" class="test-link">Apply for Lessons</a>
        </div>
        <img src="{{asset('assets/image/pearson-img.png')}}" alt="" class="tutor-imgg">
    </div>
</section>
<section id="DUO">
    <div class="tutorial-container">
        <img src="{{asset('assets/image/duolingo.png')}}" alt="" class="tutor-imgg">
        <div class="tutorial-text">
            <!-- <img src="assets/image/AncileAcad-logo.svg" alt=""> -->
            <p>The Duolingo English Test (DET) is an English proficiency test offered by the language-learning platform
                Duolingo. It’s
                gaining popularity as an alternative to traditional language tests like TOEFL and IELTS, especially for
                admission to
                universities and colleges.</p>
            <a href="#" onclick="showForm('Duolingo')" class="test-link">Apply for Lessons</a>
        </div>
    </div>
</section>
<section id="TOEFL">
    <div class="toe-container">
        <img src="{{asset('assets/image/tofel-logo.png')}}" alt="">
        <p>The TOEFL (Test of English as a Foreign Language) exam is one of the most widely recognized English
            proficiency tests
            globally. It’s designed to assess the English language skills of non-native speakers who wish to enroll in
            English-speaking universities or colleges, as well as for immigration and professional purposes.</p>
        <a href="#"  onclick="showForm('TOEFL')">Apply for Lessons</a>
    </div>
</section>


<div id="overlay" class="overlay">
    <div class="form-container">
        <a href="#" style="margin-top:50px;"  onclick="hideForm()"><i class="fa fa-times"></i></a>
        <h2 id="formTitle" style="color:#080808; padding-bottom:20px; text-align: center">Register for the lessons</h2>
        <form id="downloadForm" onsubmit="return submitForm()">
            <input type="hidden" id="typeField" name="type" value="">
            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Enter Email" required>
            <br>
            <br/>
            <br/>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" placeholder="Enter Mobile Number" required>
            <br>
            <br/>
            <br/>
            <button class="Rectangle-1239" type="submit">Submit</button>

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
</body>
@include('frontend.common_extra_modal')
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
        initialCountry: "in", // "ng" is the ISO country code for Nigeria
    });
    const input2 = document.querySelector("#phone2");
    window.intlTelInput(input2, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
    });

    const iti2 = window.intlTelInput(input2, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
        initialCountry: "in", // "ng" is the ISO country code for Nigeria
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
    function showForm(type) {
        document.getElementById('overlay').style.display = 'flex';
        document.getElementById('formTitle').innerText = 'Register for ' + type + ' lessons';
        document.getElementById('typeField').value = type;
    }

    function hideForm() {
        document.getElementById('overlay').style.display = 'none';
    }

    function submitForm() {
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var section = document.getElementById('typeField').value;

        fetch('/english/tutorial', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ email, phone, section }),
        })
            .then(response => {
                if (!response.ok) {
                    document.getElementById('overlay').style.display = 'none';
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Success: Trigger file download
                alert(data.message);
                document.getElementById('overlay').style.display = 'none';
                setTimeout(function () {
                    window.location.reload();
                }, 5000);

            })
            .catch(error => {
                document.getElementById('overlay').style.display = 'none';
                // Handle errors (display appropriate messages)
                alert('Error submitting the form: ' + error.message);
            });


        return false;
    }


</script>
</html>
