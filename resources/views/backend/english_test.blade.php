

@extends('backend.app')

@section('title', 'Manage English Test Students')
@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
{{--              <h5 class="card-title"></h5>--}}

              <form method="post" action="{{route('english.test.report')}}">
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
                                    <select  class="form-control" name="type">
                                      <option value="">select option</option>
                                      <option value="ielts">ielts</option>
                                      <option value="ptf">ptf</option>
                                      <option value="duolingo">duolingo</option>
                                      <option value="toefl">toefl</option>
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
              <table  id="my-table" class="table datatable">
                <thead>
                  <tr>
                    <th>
                      S/N
                    </th>

                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Section</th>

                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                  @foreach($tests as $test)
                  <tr>
                    <td>{{$i++}}</td>

                    <td>{{$test->phone}}</td>
                    <td>{{$test->email}}</td>
                    <td>{{$test->section}}</td>


                   <td>
                    <a type="button" class="" data-bs-toggle="modal" data-bs-target="#test_{{$test->id}}">
                    <i  class="fa fa-trash text-danger"></i>
                    </a>
                    </td>
                    @include('backend.modals.english')
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
