@extends('backend.app')

@section('page', 'Add Application')
@section('title', 'Add Application')
@section('content')


    <!-- [ Header ] end -->

    <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
{{--                            <h5 class="card-title"></h5>--}}
                            <div class="">

                                <form class="row g-3" method="post" action="{{route('admin.application.save')}}" enctype="multipart/form-data">
                                    @csrf
                                    <h4>Personal Details</h4>
                                    <div class="col-md-6">
                                        <label for="inputName5" class="form-label">Full Name</label>
                                        <input type="text"  name="full_name" value="{{old('full_name')}}" placeholder="Full Name" class="form-control" id="inputName5">
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('full_name')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail5" class="form-label">Email</label>
                                        <input type="email" name="email" value="{{old('email')}}" placeholder="Email" class="form-control" id="inputEmail5">
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('email')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword5" class="form-label">Mobile</label>
                                        <input type="number" name="mobile" value="{{old('mobile')}}"  placeholder="Mobile" class="form-control" id="inputPassword5">
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('mobile')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputPassword5" class="form-label">DOB</label>
                                        <input type="date" name="dob" value="{{old('dob')}}"  placeholder="dob" class="form-control" id="inputPassword5">
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('dob')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Program</label>

                                        <select name="program" id="program" class="form-control">
                                            <option value="">Select program</option>
                                            @foreach($levels as $level)
                                                <option value="{{$level->level_name}}">{{$level->level_name}}</option>
                                            @endforeach
                                        </select>
                                        <p style="color: red; font-weight: 500">
                                            @error('program')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Course</label>
                                        <select name="course" id="course" class="form-control">
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


                                    <div class="col-md-6">
                                        <label for="inputPassword5" class="form-label">Address</label>
                                        <input type="text" name="address" value="{{old('address')}}" placeholder="Address" class="form-control"/>
                                        <p style="color: red; font-weight: 500">
                                            @error('address')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>


                                    <div class="col-md-6">
                                        <label for="year">Academic year</label>
                                        <select name="year"  id="year" class="form-control">
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

                                    <h4>Other Details</h4>
                                    <div class="personal col-lg-4">
                                        <label for="program">Source of Funds</label>
                                        <select name="fund" id="fund" class="form-control">
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


                                    <div class="personal col-lg-4">
                                        <div class="first-input">
                                            <label for="country">Emergency Contact Detail</label>
                                            <input type="number" class="form-control" value="{{old('emergency')}}" name="emergency" placeholder="Enter Emergency Contact Detail"/>
                                            <p style="color: red; font-weight: 500">
                                                @error('emergency')
                                                {{$message}}
                                                @enderror
                                            </p>
                                        </div>
                                    </div>

                                    <div class="personal col-lg-4">
                                        <label for="program">User Account</label>
                                        <select name="user_id" id="fund" class="form-control">
                                            <option value="">Select user</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->email}}</option>
                                            @endforeach
                                        </select>
                                        <p style="color: red; font-weight: 500">
                                            @error('user_id')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>


                                    <div class="first-input col-lg-6">
                                        <label for="year">Application Status</label>
                                        <select class="form-control" name="application_status" id="year">
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


                                    <div class="first-input col-lg-6">
                                        <label for="Course">Short listed Universities</label>
                                        <input type="text" class="form-control" value="{{old('shortlist')}}" name="shortlist" placeholder="Type short listed Universities"/>
                                        <p style="color: red; font-weight: 500">
                                            @error('shortlist')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>

                                    <h4>Required Documents</h4>
                                    <div class="col-md-4">
                                        <label for="inputAddress2" class="form-label">UnderGraduate (Attachment)</label>
                                        <input type="file" name="undergraduate" class="form-control" id="inputAddress2" >
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('undergraduate')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputAddress2" class="form-label">PostGraduate (Attachment)</label>
                                        <input type="file" name="postgraduate" class="form-control" id="inputAddress2" >
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('postgraduate')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>


                                    <div class="col-md-6">
                                        <label for="inputCity" class="form-label">Intermediate (Attachment) </label>
                                        <input type="file" name="mark_sheet_11_12" class="form-control" id="inputCity">
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('mark_sheet_11_12')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>


                                    <div class="col-md-6">
                                        <label for="inputCity" class="form-label">10th Mark Sheet (Attachment)</label>
                                        <input type="file" name="mark_sheet_10" class="form-control" id="inputCity">
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('mark_sheet_10')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>


                                    <div class="col-md-6">
                                        <label for="inputCity" class="form-label">Finance Bank Statement (Attachment)</label>
                                        <input type="file" name="finance" class="form-control" id="inputCity">
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('finance')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputCity" class="form-label">Passport Copy if applicable</label>
                                        <input type="file" name="passport" class="form-control" id="inputCity">
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('passport')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>
                                    <div id="form-container">
                                        <!-- Initial div -->
                                        <p class="file-text">GRE/TOEFL/IELTS score</p>
                                        <div class="personals">
                                            <div>

                                                <div class="file-input">
                                                    <select class="form-control" name="gre_option[]" required>
                                                        <option value="" disabled selected>Select option</option>
                                                        <option value="gre">GRE</option>
                                                        <option value="toefl">TOEFL</option>
                                                        <option value="ielts">IELTS</option>
                                                    </select>
                                                    <input class="form-control mt-3" type="text" name="score[]" placeholder="Enter score" required>
                                                    <input class="form-control  mt-3" type="file" name="attachment[]" required>
                                                    <!-- Hide Remove button for the first element -->
                                                    <button class="btn bg-danger remove-btn text-white mt-2" style="display: none;">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn bg-success mb-2 text-white mt-2" id="add-btn" type="button" onclick="addMore()">Add More</button>

                                    </div>

                                    <!-- Set type="button" to prevent form submission -->
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            // Function to add more elements
                                            window.addMore = function() {
                                                var firstDiv = document.querySelector('.personals:first-of-type');
                                                var newDiv = firstDiv.cloneNode(true); // Clone the first div
                                                var selectElements = newDiv.querySelectorAll('select, input[type="text"], input[type="file"]');
                                                selectElements.forEach(function (element) {
                                                    element.value = ''; // Clear values
                                                });
                                                newDiv.querySelector('.remove-btn').style.display = 'block'; // Show Remove button for the new element
                                                document.getElementById('form-container').appendChild(newDiv); // Append the cloned div
                                            };

                                            // Event listener for Remove button click
                                            document.getElementById('form-container').addEventListener('click', function (event) {
                                                if (event.target.classList.contains('remove-btn')) {
                                                    var formContainer = document.getElementById('form-container');
                                                    if (formContainer.querySelectorAll('.personals').length > 1) {
                                                        event.target.closest('.personals').remove(); // Remove the closest parent div
                                                    }
                                                }
                                            });

                                            // Event listener for select option change
                                            document.getElementById('form-container').addEventListener('change', function (event) {
                                                if (event.target.name === 'gre_option') {
                                                    var selectedOption = event.target.value;
                                                    var inputFields = event.target.closest('.file-input').querySelectorAll('input[type="text"], input[type="file"]');

                                                    inputFields.forEach(function (inputField) {
                                                        if (selectedOption !== '') {
                                                            // Show the input fields
                                                            inputField.required = true;
                                                            inputField.style.display = 'block';
                                                        } else {
                                                            // Hide and make not required if "Select option" is chosen
                                                            inputField.required = false;
                                                            inputField.style.display = 'none';
                                                        }
                                                    });
                                                }
                                            });
                                        });

                                    </script>

                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Save Application</button>
                                        <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                                    </div>
                                </form><!-- End Multi Columns Form -->


                            </div>
                        </div>


                    </div>
                </div>

            </div>

            </div>



    <!-- [ Main Content ] end -->
@endsection
