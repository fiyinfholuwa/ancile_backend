

@extends('backend.app')

@section('page', 'View Applied Course')

@section('title')
    View Applied Course ({{$ap->email}})
@endsection
@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
{{--              <h5 class="card-title">View Applied Course ({{$ap->email}})</h5>--}}
              <div class="">

                  <form method="post" action="" enctype="multipart/form-data" class="row g-3">
                      @csrf
                      <div class="col-md-6 col-lg-6">
                          <label for="inputName5" class="form-label">Email : </label> {{$ap->email}}
                      </div>

                      <div class="col-md-6 col-lg-6">
                          <label for="inputName5" class="form-label">Mobile Number: </label> {{$ap->phone}}
                      </div>

                      <div class="col-md-6 col-lg-6">
                          <label for="inputName5" class="form-label">Course Title: </label> {{optional($ap->course_info)->title}}

                      </div>
                      <div class="col-md-6 col-lg-6">
                          <label for="inputName5" class="form-label">Exam Score: </label> {{optional($ap->course_info)->entry_socre}}

                      </div>

                      <div class="col-md-6 col-lg-6">
                          <label for="inputName5" class="form-label">Location:  </label>{{optional($ap->course_info)->location}}

                      </div>

                      <div class="col-md-6 col-lg-6">
                          <label for="inputName5" class="form-label">Intake :  </label>{{optional($ap->course_info)->intake}}

                      </div>
                      <div class="col-md-6 col-lg-6">
                          <label for="inputName5" class="form-label">Tuition Fee : </label> {{optional($ap->course_info)->fee}}

                      </div>


                      <div class="col-md-12 col-lg-6">
                          <label for="inputName5" class="form-label">University : </label> {{optional($ap->course_info)->university}}

                      </div>

                      <div class="">
                          <a href="{{route('admin.apply.course.all')}}"  class="btn btn-danger">go back</a>
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
