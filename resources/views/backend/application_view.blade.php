

@extends('backend.app')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Application</h5>
              <div class="card">

              <form class="row g-3" method="post" action="{{route('admin.application.save')}}" enctype="multipart/form-data">
                @csrf
                  <h2>Personal Details</h2>
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
                      </select>
                      <p style="color: red; font-weight: 500">
                          @error('year')
                          {{$message}}
                          @enderror
                      </p>
                  </div>

                      <h2>Other Details</h2>
                      <div class="personal col-lg-6">
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


                      <div class="personal col-lg-6">
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

                  <h2>Required Documents</h2>
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
                                  <input class="form-control" type="text" name="score[]" placeholder="Enter score" required>
                                  <input class="form-control" type="file" name="attachment[]" required>
                                  <!-- Hide Remove button for the first element -->
                                  <button class="badge bg-danger remove-btn" style="display: none;">Remove</button>
                              </div>
                          </div>
                      </div>
                      <button class="badge bg-success mb-2" id="add-btn" type="button" onclick="addMore()">Add More</button>

                  </div>

                  <!-- Set type="button" to prevent form submission -->


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
    </section>



  </main><!-- End #main -->
@endsection
