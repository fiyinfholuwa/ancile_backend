

@extends('backend.app')

@section('content')

  <main id="main" class="main">


      <div class="modal" id="delete_all" tabindex="-1">
          <form method="post" action="{{route('delete.courses.all_all')}}">
              @csrf
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 style="font-weight:bold;" class="modal-title text-primary">Courses Delete</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          Are you sure you want to delete all the uploaded courses?
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </div>
                  </div>
              </div>
          </form>
      </div><!-- End Disabled Animation Modal-->



      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Manage Courses  <span style="margin-left: 40px;"><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_all">Delete All Course</a></span></h5>


              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      Course Title
                    </th>
                    <th>Course Category</th>
                    <th>Course Duration</th>
                    <th>Exam Score</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($courses as $course)
                  <tr>
                    <td>{{$course->title}}</td>
                    <td>{{optional($course->course_info)->name}}</td>
                    <td>{{$course->duration}}</td>
                    <td>{{$course->entry_score}}</td>

                   <td>
                    <a href="{{route('admin.course.edit', $course->id)}}">
                    <i  class="fa fa-edit text-primary"></i>
                    </a>
                       <a href="{{route('admin.course.review', $course->id)}}">
                    <i  class="fa fa-eye text-secondary"></i>
                    </a>
                    <a type="button" class="" data-bs-toggle="modal" data-bs-target="#course_delete_{{$course->id}}">
                    <i  class="fa fa-trash text-danger"></i>
                    </a>
                    </td>
                    @include('backend.modals.course')
                  </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>



  </main><!-- End #main -->
@endsection
