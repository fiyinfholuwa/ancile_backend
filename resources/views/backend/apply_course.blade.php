

@extends('backend.app')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Manage Applied Courses</h5>

              <form method="post" action="{{route('applied.course.report')}}">
										@csrf
                                <div class="row">
                                    <div class="col-lg-2  mt-1">
                                    <div class="" style="">

                                    <input name="date_from" class="form-control "  type="date"  placeholder="Start Date"    required/>

                                    </div>
                                </div>
                                <div class="col-lg-2  mt-1">
                                    <div class="" style="">

                                    <input name="date_to" class="form-control "  type="date"  placeholder="End Date"   required/>

                                    </div>
                                </div>

                                <div class="col-lg-2  mt-1">
                                    <div class="" style="">
                                    <select required  class="form-control" name="type">
                                      <option value="">select option</option>
                                        @foreach($courses as $course)
                                            <option value="{{$course->id}}">{{$course->title}}</option>
                                        @endforeach
                                    </select>

                                    </div>
                                </div>


                                <div class="col-lg-4   mt-1" >
                                <button type="submit" class='btn btn-secondary btn-sm'>Export to CSV</button>
                                </div>
                                </div>
                            </div>
                        </form>


              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      S/N
                    </th>

                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Course</th>

                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                  @foreach($applied as $ap)
                  <tr>
                    <td>{{$i++}}</td>

                    <td>{{$ap->phone}}</td>
                    <td>{{$ap->email}}</td>
                    <td>{{optional($ap->course_info)->title}}</td>


                   <td>
                       <a href="{{route('admin.apply.course.review', $ap->id)}}">
                           <i  class="fa fa-eye text-primary"></i>
                       </a>
                    <a type="button" class="" data-bs-toggle="modal" data-bs-target="#ap_{{$ap->id}}">
                    <i  class="fa fa-trash text-danger"></i>
                    </a>
                    </td>
                    @include('backend.modals.apply')
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
