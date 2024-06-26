

@extends('backend.app')

@section('title', 'Edit Course')
@section('page', 'Edit Course')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
{{--              <h5 class="card-title"></h5>--}}
              <div class="">

              <form method="post" action="{{route('admin.course.update', $course->id)}}" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-6 col-lg-12">
                  <label for="inputName5" class="form-label">Course Title</label>
                  <input type="text" name="title" value="{{$course->title}}" class="form-control" placeholder="Enter Course Title" id="inputName5">
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  @error('title')
                    {{$message}}
                  @enderror
                  </p>
                </div>

                  <div class="col-md-6 col-lg-4">
                      <label for="inputName5" class="form-label">Duration</label>
                      <input type="number" value="{{$course->duration}}" class="form-control" name="duration">
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('duration')
                          {{$message}}
                          @enderror
                      </p>
                  </div>

                  <div class="col-md-6 col-lg-4">
                      <label for="inputName5" class="form-label">Exam Score</label>
                      <input type="text" value="{{$course->entry_score}}" placeholder="Exam Score" class="form-control" name="entry_score">
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
                              <option value="{{$country->id}}" {{$country->id == $course->location ? 'selected' : ''}}>{{$country->name}}</option>
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
                      <input type="text" value="{{$course->intake}}" placeholder="Intake" class="form-control" name="intake">
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('intake')
                          {{$message}}
                          @enderror
                      </p>
                  </div>
                  <div class="col-md-6 col-lg-6">
                      <label for="inputName5" class="form-label">Tuition Fee</label>
                      <input type="text" value="{{$course->fee}}" class="form-control" placeholder="Tuition Fee" name="fee">
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('fee')
                          {{$message}}
                          @enderror
                      </p>
                  </div>


                  <div class="col-md-12 col-lg-12">
                      <label for="inputName5" class="form-label">University</label>
                      <input type="text" value="{{$course->university}}" class="form-control" placeholder="University" name="university">
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
                      @foreach($courses as $coursed)
                          <option value="{{$coursed->id}}" {{$coursed->id == $course->course_id ? "selected" : ""}}>{{$coursed->name}}</option>
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
                              <option value="{{$level->id}}" {{$level->id == $course->level ? "selected" : ""}}>{{$level->level_name}}</option>
                          @endforeach
                      </select>
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('level')
                          {{$message}}
                          @enderror
                      </p>
                  </div>

                  <div class="">
                  <button type="submit" class="btn btn-primary">Update Course</button>
                </div>
              </form><!-- End Multi Columns Form -->


            </div>
          </div>


            </div>
          </div>

        </div>
      </div>
    </section>



  </main><!-- End #main -->
@endsection
