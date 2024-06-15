

@extends('backend.app')

@section('title','View Course')
@section('page','View Course')
@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
{{--              <h5 class="card-title">View Course</h5>--}}
              <div class="">

              <form method="post" action="" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-6 col-lg-6">
                  <label for="inputName5" class="form-label">Course Title : </label> {{$course->title}}
                </div>

                  <div class="col-md-6 col-lg-6">
                      <label for="inputName5" class="form-label">Duration: </label> {{$course->duration}}
                  </div>

                  <div class="col-md-6 col-lg-6">
                      <label for="inputName5" class="form-label">Exam Score: </label> {{$course->entry_score}}

                  </div>

                  <div class="col-md-6 col-lg-6">
                      <label for="inputName5" class="form-label">Location:  </label> {{$course->location}}

                  </div>

                  <div class="col-md-6 col-lg-6">
                      <label for="inputName5" class="form-label">Intake :  </label>{{$course->intake}}

                  </div>
                  <div class="col-md-6 col-lg-6">
                      <label for="inputName5" class="form-label">Tuition Fee : </label> {{$course->fee}}

                  </div>


                  <div class="col-md-12 col-lg-12">
                      <label for="inputName5" class="form-label">University : </label> {{$course->university}}

                  </div>



                  <div class="col-md-12 col-lg-6">
                  <label for="inputCity" class="form-label">Course Category : {{optional($course->course_info)->name}} </label>

                </div>

                  <div class="col-md-12 col-lg-6">
                      <label for="inputCity" class="form-label">Educational Category : {{optional($course->edu_name)->level_name}} </label>

                  </div>

                  <div class="">
                  <a href="{{route('admin.course.all')}}"  class="btn btn-danger">go back</a>
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
