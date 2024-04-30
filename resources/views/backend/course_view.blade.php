

@extends('backend.app')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Course</h5>
              <div class="card">

              <form method="post" action="{{route('admin.course.save')}}" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-6 col-lg-12">
                  <label for="inputName5" class="form-label">Course Title</label>
                  <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Enter Course Title" id="inputName5">
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  @error('title')
                    {{$message}}
                  @enderror
                  </p>
                </div>

                  <div class="col-md-6 col-lg-4">
                      <label for="inputName5" class="form-label">Duration</label>
                      <input type="number" value="{{old('duration')}}" class="form-control" placeholder="Duration" name="duration">
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('duration')
                          {{$message}}
                          @enderror
                      </p>
                  </div>

                  <div class="col-md-6 col-lg-4">
                      <label for="inputName5" class="form-label">Exam Score</label>
                      <input type="text" value="{{old('entry_score')}}" placeholder="Exam Score" class="form-control" name="entry_score">
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('entry_score')
                          {{$message}}
                          @enderror
                      </p>
                  </div>

                 <div class="col-md-6 col-lg-4">
                      <label for="inputName5" class="form-label">Country</label>
                     <select required name="location" class="form-control">
                         <option value="">Select Country</option>
                         @foreach($countries as $country)
                             <option value="{{$country->id}}">{{$country->name}}</option>
                         @endforeach
                     </select>

                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('location')
                          {{$message}}
                          @enderror
                      </p>
                  </div>

                <div class="col-md-6 col-lg-6">
                      <label for="inputName5" class="form-label">Intake</label>
                      <input type="text" value="{{old('intake')}}" placeholder="Intake" class="form-control" name="intake">
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('intake')
                          {{$message}}
                          @enderror
                      </p>
                  </div>
                <div class="col-md-6 col-lg-6">
                      <label for="inputName5" class="form-label">Tuition Fee</label>
                      <input type="text" value="{{old('fee')}}" class="form-control" placeholder="Tuition Fee" name="fee">
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('fee')
                          {{$message}}
                          @enderror
                      </p>
                  </div>


                <div class="col-md-12 col-lg-12">
                      <label for="inputName5" class="form-label">University</label>
                      <input type="text" value="{{old('university')}}" class="form-control" placeholder="University" name="university">
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('university')
                          {{$message}}
                          @enderror
                      </p>
                  </div>


                  <div class="col-md-12 col-lg-6">
                  <label for="inputCity" class="form-label">Course Category</label>
                  <select required name="course_id" class="form-control">
                      <option value="">Select Course</option>
                      @foreach($courses as $course)
                          <option value="{{$course->id}}">{{$course->name}}</option>
                      @endforeach
                  </select>
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  @error('course_id')
                    {{$message}}
                  @enderror
                  </p>
                </div>

                  <div class="col-md-12 col-lg-6">
                      <label for="inputCity" class="form-label">Educational Category</label>
                      <select required name="level" class="form-control">
                          <option value="">Select Levels</option>
                          @foreach($levels as $level)
                              <option value="{{$level->id}}">{{$level->level_name}}</option>
                          @endforeach
                      </select>
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('level')
                          {{$message}}
                          @enderror
                      </p>
                  </div>

                  <div class="">
                  <button type="submit" class="btn btn-primary">Add Course</button>
                </div>
              </form>


            </div>
          </div>
            </div>
          </div>
          <div style="margin-top: 50px" class="col-lg-4">
              <form action="{{route('admin.course.excel')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <h5 class="card-title">Upload Excel/ CSV File</h5>
                  <div class="form-group">
                    <input type="file" class="form-control" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="csv_file"/>
                  </div>
                  <div class="mt-5">
                      <button class="btn btn-danger" type="submit">Upload Excel / CSV</button>
                  </div>
              </form>

              <div class="mt-5">
                  <a href="{{asset('course_upload_template.xlsx')}}" class="btn btn-outline-success" download="">Download Template</a>

              </div>
              <div class="mt-5">
                  <form action="{{route('export.save_courses')}}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-outline-primary">Download Saved Courses</button>

                  </form>
              </div>
              <div class="mt-5">
                  <h3>Brief Instruction on how to use the template</h3>
                  <ul>
                      <li>Course Duration is in Months</li>
                      <li>You will need to  <a style="text-decoration: #0a53be;" href="{{route('program.view')}}">click here </a>for course category ID</li>

                      <li>For Education Level to the the education level:
                          <ol>
                              <li>Undergraduate => 1</li>
                              <li>High School  => 2</li>
                              <li>Master Degree =>  3</li>
                              <li>PHD  => 4</li>
                          </ol>
                      <li>You will need to  <a style="text-decoration: #0a53be;" href="{{route('manage.country.view')}}">click here </a>for Country ID</li>
                  </ul>
              </div>
          </div>

        </div>

    </section>



  </main><!-- End #main -->
@endsection
