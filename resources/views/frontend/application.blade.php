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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Academy Application</title>
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
                            <button type="submit" class="searchh">Search</button>
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

<div class="application-header-box">
    <div class="application-header">
        <a href="{{route('profile')}}"> > Back To Applications List</a>
        <h2>New Application</h2>
    </div>
    <h3>Please provide documents and details which asked in the form and we will get back to you.</h3>
</div>

<section>
    <form action="{{route('user.application.save')}}"  method="post" enctype="multipart/form-data">
        @csrf
        <div class="personal-detail">
            <h2>Personal Details</h2>
            <div class="personal">
                <div class="first-input">
                    <label for="name">Full Name (As in Passport)</label>
                    <input type="text" id="name" value="{{old('full_name')}}" name="full_name" placeholder="Enter your name now">
                    <p style="color: red; font-weight: 500">
                        @error('full_name')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="second-input">
                    <label for="fname">DoB</label>
                    <!-- <input type="text" placeholder="MM/DD/YYYY" onfocus="(this.type='date')"> -->
                    <input type="date" value="{{old('dob')}}" id="fname" name="dob" placeholder="">
                    <p style="color: red; font-weight: 500">
                        @error('dob')
                        {{$message}}
                        @enderror
                    </p>
                </div>
            </div>

            <div class="personal">
                <div class="first-input">
                    <label for="mail">Email address</label>
                    <input type="text" value="{{old('email')}}" id="mail" name="email" placeholder="xyz@email.com">
                    <p style="color: red; font-weight: 500">
                        @error('email')
                        {{$message}}
                        @enderror
                    </p>
                </div>

                <div class="first-input">
                    <label for="phone">Mobile Number</label>
                    <!-- <input type="text" placeholder="MM/DD/YYYY" onfocus="(this.type='date')"> -->
                    <input  value="{{old('mobile')}}" id="phone" type="number" name="mobile">
                    <p style="color: red; font-weight: 500">
                        @error('mobile')
                        {{$message}}
                        @enderror
                    </p>
                </div>


            </div>
        </div>

        <div class="personal-detail">
            <h2>Personal Details</h2>
            <div class="personal">
                <div class="first-input">
                    <label for="program">Choose Program</label>
                    <select name="program" id="program">
                        <option value="">Select program</option>
                        @foreach($levels as $level)
                            <option value="{{$level->level_name}}" >{{$level->level_name}}</option>
                        @endforeach
                    </select>
                    <p style="color: red; font-weight: 500">
                        @error('program')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="first-input">
                    <label for="Course">Course Preferences</label>
                    <select name="course" id="course">
                        <option value="">Select Option</option>
                        @foreach($course_cat as $course)
                            <option value="{{$course->name}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                    <p style="color: red; font-weight: 500">
                        @error('course')
                        {{$message}}
                        @enderror
                    </p>
                </div>
            </div>

            <div class="personal">
                <div class="first-input">
                    <label for="country">Address</label>
                    <input name="address" value="{{old('address')}}" placeholder="Enter Address"/>
                    <p style="color: red; font-weight: 500">
                        @error('address')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="first-input">
                    <label for="year">Academic year</label>
                    <select name="year" id="year">
                        <option value="">Select Year</option>
                        <option value="2023/2024">2023/2024</option>
                        <option value="2024/2025">2024/2025</option>
                        <option value="2025/2026">2025/2026</option>
                        <option value="2026/2027">2026/2027</option>
                        <option value="2027/2028">2027/2028</option>
                        <option value="2028/2029">2028/2029</option>
                        <option value="2029/2030">2029/2030</option>
                        <option value="2030/2031">2030/2031</option>
                        <option value="2031/2032">2031/2032</option>
                        <option value="2032/2033">2032/2033</option>
                        <option value="2033/2034">2033/2034</option>
                        <option value="2034/2035">2034/2035</option>
                        <option value="2035/2036">2035/2036</option>
                        <option value="2036/2037">2036/2037</option>
                        <option value="2037/2038">2037/2038</option>
                        <option value="2038/2039">2038/2039</option>
                        <option value="2039/2040">2039/2040</option>
                    </select>
                    <p style="color: red; font-weight: 500">
                        @error('year')
                        {{$message}}
                        @enderror
                    </p>
                </div>
            </div>
        </div>

    <div class="personal-detail">
            <h2>Other Details</h2>
            <div class="personal">
                <div class="first-input">
                    <label for="program">Source of Funds</label>
                    <select name="fund" id="fund">
                        <option value="">Select option</option>
                        <option value="loan">loan</option>
                        <option value="fixed deposit">fixed deposit</option>
                        <option value="collateral">collateral</option>

                    </select>
                    <p style="color: red; font-weight: 500">
                        @error('fund')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="first-input">
                    <label for="Course">Short listed Universities</label>
                    <input type="text" name="shortlist" placeholder="Type short listed Universities"/>
                    <p style="color: red; font-weight: 500">
                        @error('shortlist')
                        {{$message}}
                        @enderror
                    </p>
                </div>
            </div>

            <div class="personal">
                <div class="first-input">
                    <label for="country">Emergency Contact Detail</label>
                    <input name="emergency" placeholder="Enter Emergency Contact Detail"/>
                    <p style="color: red; font-weight: 500">
                        @error('emergency')
                        {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="first-input">
                    <label for="year">Application Status</label>
                    <select name="application_status" id="year">
                        <option value="">Select Option</option>
                        <option value="Application Submission">Application Submission</option>
                        <option value="Application Review">Application Review</option>
                        <option value="Conditional Admit">Conditional Admit</option>
                        <option value="I20">I20</option>
                        <option value="Visa Approval/ Visa Document copy">Visa Approval/ Visa Document copy</option>
                    </select>
                    <p style="color: red; font-weight: 500">
                        @error('application_status')
                        {{$message}}
                        @enderror
                    </p>
                </div>
            </div>
        </div>

        <div class="personal-detail">
            <h2>Required Documents</h2>
            <div class="personal">
                <div>
                    <p class="file-text">10th Mark Sheet (Attachment) <sup style="color: red; font-weight: bolder">required *</sup></p>
                    <div class="file-input">
                        <label for="fileInput1" class="file-label">
                            <img src="{{asset('assets/image/upload.svg')}}" />Drag & Drop or &nbsp;<span class="browse-text">Choose file
                  </span>&nbsp; to
                            Upload (Jpeg, Pdf,
                            png are accepted | Max 4mb) browse

                        </label>
                        <input required  style="display: none" type="file" name="mark_sheet_10" id="fileInput1" class="file-input"
                               accept=".jpeg, .jpg, .pdf, .png">
                        <div id="selectedFileName1"></div>

                    </div>
                </div>

            </div>
            <div class="personal">
                <div>
                    <p class="file-text">Intermediate (Attachment) <sup style="color: red; font-weight: bolder">required *</sup></p>
                    <div class="file-input">
                        <label for="fileInput2" class="file-label">
                            <img src="{{asset('assets/image/upload.svg')}}" />Drag & Drop or &nbsp;<span class="browse-text">Choose file
                  </span>&nbsp; to
                            Upload (Jpeg, Pdf,
                            png are accepted | Max 4mb) browse

                        </label>
                        <input required style="display: none" type="file" name="mark_sheet_11_12" id="fileInput2" class="file-input"
                               accept=".jpeg, .jpg, .pdf, .png">
                        <div id="selectedFileName2"></div>

                    </div>
                </div>

            </div>

            <div class="personal">
                <div>
                    <p class="file-text">UnderGraduate (Attachment) <sup style="color: red; font-weight: bolder">required *</sup></p>
                    <div class="file-input">
                        <label for="fileInput21" class="file-label">
                            <img src="{{asset('assets/image/upload.svg')}}" />Drag & Drop or &nbsp;<span class="browse-text">Choose file
                  </span>&nbsp; to
                            Upload (Jpeg, Pdf,
                            png are accepted | Max 4mb) browse

                        </label>
                        <input required style="display: none" type="file" name="undergraduate" id="fileInput21" class="file-input"
                               accept=".jpeg, .jpg, .pdf, .png">
                        <div id="selectedFileName21"></div>

                    </div>
                </div>

            </div>

            <div class="personal">
                <div>
                    <p class="file-text">Post Graduate (Attachment) </p>
                    <div class="file-input">
                        <label for="fileInput22" class="file-label">
                            <img src="{{asset('assets/image/upload.svg')}}" />Drag & Drop or &nbsp;<span class="browse-text">Choose file
                  </span>&nbsp; to
                            Upload (Jpeg, Pdf,
                            png are accepted | Max 4mb) browse

                        </label>
                        <input style="display: none" type="file" name="postgraduate" id="fileInput22" class="file-input"
                               accept=".jpeg, .jpg, .pdf, .png">
                        <div id="selectedFileName22"></div>

                    </div>
                </div>

            </div>

            <div class="personal">
                <div>
                    <p class="file-text">Finance Bank Statement (Attachment) <sup style="color: red; font-weight: bolder">required *</sup></p>
                    <div class="file-input">
                        <label for="fileInput23" class="file-label">
                            <img src="{{asset('assets/image/upload.svg')}}" />Drag & Drop or &nbsp;<span class="browse-text">Choose file
                  </span>&nbsp; to
                            Upload (Jpeg, Pdf,
                            png are accepted | Max 4mb) browse

                        </label>
                        <input required style="display: none" type="file" name="finance" id="fileInput23" class="file-input"
                               accept=".jpeg, .jpg, .pdf, .png">
                        <div id="selectedFileName23"></div>

                    </div>
                </div>

            </div>
            <div class="personal">
                <div>
                    <p class="file-text">Passport Copy (Attachment) <sup style="color: red; font-weight: bolder">required *</sup></p>
                    <div class="file-input">
                        <label for="fileInput3" class="file-label">
                            <img src="{{asset('assets/image/upload.svg')}}" />Drag & Drop or &nbsp;<span class="browse-text">Choose file
                  </span>&nbsp; to
                            Upload (Jpeg, Pdf,
                            png are accepted | Max 4mb) browse

                        </label>
                        <input required style="visibility: hidden; position: absolute;" type="file" name="passport" id="fileInput3" class="file-input" accept=".jpeg, .jpg, .pdf, .png">

                        <div id="selectedFileName3"></div>

                    </div>
                </div>
            </div>


            <div id="form-container">
                <!-- Initial div -->
                <p class="file-text">GRE/TOEFL/IELTS score</p>
                <div class="personals">
                    <div>

                        <div class="file-input">
                            <select name="gre_option[]" required>
                                <option value="" disabled selected>Select option</option>
                                <option value="gre">GRE</option>
                                <option value="toefl">TOEFL</option>
                                <option value="ielts">IELTS</option>
                                <option value="pte">PTE</option>
                            </select>
                            <input type="text" name="score[]" placeholder="Enter score" required>
                            <input type="file" name="attachment[]" required>
                            <!-- Hide Remove button for the first element -->
                            <button class="badge bg-danger remove-btn" style="display: none;">Remove</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Set type="button" to prevent form submission -->
            <button class="badge bg-success mb-2" id="add-btn" type="button" onclick="addMore()">Add More</button>


    <script>
        function addMore() {
            var newDiv = $('.personals:first').clone(); // Clone the first div
            newDiv.find('select, input[type="text"], input[type="file"]').val(''); // Clear values
            newDiv.find('.remove-btn').show(); // Show Remove button for the new element
            $('#form-container').append(newDiv); // Append the cloned div
        }

        $(document).ready(function () {
            // Remove button click event
            $('#form-container').on('click', '.remove-btn', function () {
                // Ensure there's more than one element before removing
                if ($('#form-container .personals').length > 1) {
                    $(this).closest('.personals').remove(); // Remove the closest parent div
                }
            });

            // Show/hide input fields based on the selected option
            $('#form-container').on('change', 'select[name="gre_option"]', function () {
                var selectedOption = $(this).val();
                var inputFields = $(this).closest('.file-input').find('input[type="text"], input[type="file"]');

                if (selectedOption !== '') {
                    // Show the input fields
                    inputFields.prop('required', true).show();
                } else {
                    // Hide and make not required if "Select option" is chosen
                    inputFields.prop('required', false).hide();
                }
            });
        });
    </script>

{{--        <div class="personal">--}}
{{--                <div>--}}
{{--                    <p class="file-text">Previous Work Experience</p>--}}
{{--                    <div class="file-input">--}}
{{--                        <label for="fileInput5" class="file-label">--}}
{{--                            <img src="{{asset('assets/image/upload.svg')}}" />Drag & Drop or &nbsp;<span class="browse-text">Choose file--}}
{{--                  </span>&nbsp; to--}}
{{--                            Upload (Jpeg, Pdf,--}}
{{--                            png are accepted | Max 4mb) browse--}}

{{--                        </label>--}}
{{--                        <input style="display: none" type="file" name="previous_work" id="fileInput5" class="file-input"--}}
{{--                               accept=".jpeg, .jpg, .pdf, .png">--}}
{{--                        <div id="selectedFileName5"></div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        <div class="personal">--}}
{{--                <div>--}}
{{--                    <p class="file-text">Academic Certificate</p>--}}
{{--                    <div class="file-input">--}}
{{--                        <label for="fileInput6" class="file-label">--}}
{{--                            <img src="{{asset('assets/image/upload.svg')}}" />Drag & Drop or &nbsp;<span class="browse-text">Choose file--}}
{{--                  </span>&nbsp; to--}}
{{--                            Upload (Jpeg, Pdf,--}}
{{--                            png are accepted | Max 4mb) browse--}}

{{--                        </label>--}}
{{--                        <input style="display: none" type="file" name="certification" id="fileInput6" class="file-input"--}}
{{--                               accept=".jpeg, .jpg, .pdf, .png">--}}
{{--                        <div id="selectedFileName6"></div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        <div class="personal">--}}
{{--                <div>--}}
{{--                    <p class="file-text">Letter of Recommendation</p>--}}
{{--                    <div class="file-input">--}}
{{--                        <label for="fileInput7" class="file-label">--}}
{{--                            <img src="{{asset('assets/image/upload.svg')}}" />Drag & Drop or &nbsp;<span class="browse-text">Choose file--}}
{{--                  </span>&nbsp; to--}}
{{--                            Upload (Jpeg, Pdf,--}}
{{--                            png are accepted | Max 4mb) browse--}}

{{--                        </label>--}}
{{--                        <input style="display: none" type="file" name="recommendation" id="fileInput7" class="file-input"--}}
{{--                               accept=".jpeg, .jpg, .pdf, .png">--}}
{{--                        <div id="selectedFileName7"></div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--<div class="personal">--}}
{{--                <div>--}}
{{--                    <p class="file-text">Birth Certificate</p>--}}
{{--                    <div class="file-input">--}}
{{--                        <label for="fileInput8" class="file-label">--}}
{{--                            <img src="{{asset('assets/image/upload.svg')}}" />Drag & Drop or &nbsp;<span class="browse-text">Choose file--}}
{{--                  </span>&nbsp; to--}}
{{--                            Upload (Jpeg, Pdf,--}}
{{--                            png are accepted | Max 4mb) browse--}}

{{--                        </label>--}}
{{--                        <input style="display: none" type="file" name="birth_certificate" id="fileInput8" class="file-input"--}}
{{--                               accept=".jpeg, .jpg, .pdf, .png">--}}
{{--                        <div id="selectedFileName8"></div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            {{--                <a href="#" class="add-document">Add Another Document</a>--}}
            <div class="last-btn">
                <a href="{{route('profile')}}">Cancel</a>
                <button type="submit">Submit application</button>
            </div>
        </div>
    </form>

</section>


<script>
    function setupFileInput(inputId, fileNameContainerId) {
        var fileInput = document.getElementById(inputId);
        var fileNameContainer = document.getElementById(fileNameContainerId);

        fileInput.addEventListener('change', function (e) {
            if (fileInput.files.length > 0) {
                fileNameContainer.textContent = 'Selected File: ' + fileInput.files[0].name;
            } else {
                fileNameContainer.textContent = '';
            }
        });
    }

    // Call the function for each file input
    setupFileInput('fileInput1', 'selectedFileName1');
    setupFileInput('fileInput2', 'selectedFileName2');
    setupFileInput('fileInput21', 'selectedFileName21');
    setupFileInput('fileInput22', 'selectedFileName22');
    setupFileInput('fileInput23', 'selectedFileName23');
    setupFileInput('fileInput3', 'selectedFileName3');
    setupFileInput('fileInput4', 'selectedFileName4');
    // setupFileInput('fileInput5', 'selectedFileName5');
    // setupFileInput('fileInput6', 'selectedFileName6');
    // setupFileInput('fileInput7', 'selectedFileName7');
    // setupFileInput('fileInput8', 'selectedFileName8');
    // Add more calls as needed for additional file inputs
</script>
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
</html>
