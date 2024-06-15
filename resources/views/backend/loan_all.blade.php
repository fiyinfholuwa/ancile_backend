

@extends('backend.app')

@section('title', 'Manage Loans')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
{{--              <h5 class="card-title"></h5>--}}


              <form method="post" action="{{route('loan.report')}}">
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



                                <div class="col-lg-4   mt-1" >
                                <button type="submit" class='btn btn-secondary btn-sm'>Export to CSV</button>
                                </div>
                                </div>
                            </div>
                        </form>

              <!-- Table with stripped rows -->
              <table id="my-table" class="table datatable">
                <thead>
                  <tr>
                    <th>
                      S/N
                    </th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                  @foreach($loans as $loan)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$loan->full_name}}</td>
                    <td>{{$loan->phone}}</td>
                    <td>{{$loan->email}}</td>
                    <td>{{$loan->program}}</td>
                    <td>
                      @if($loan->status == Null || $loan->status == 'pending')
                      <span class="badge bg-warning"><i class="bi bi-check-circle me-1"></i>Pending</span>
                      @else
                      <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>{{$loan->status}}</span>
                      @endif
                    </td>

                   <td>
                       <a href="{{route('loan.view', $loan->id)}}">
                           <i style="color:green;"  class="fa fa-eye text-secondary"></i>
                       </a>
                   <a  class="" data-bs-toggle="modal" data-bs-target="#loan_status_{{$loan->id}}">
                    <i  class="fa fa-check-circle	 text-secondary"></i>
                    </a>

                    <a type="button" class="" data-bs-toggle="modal" data-bs-target="#loan_{{$loan->id}}">
                    <i  class="fa fa-trash text-danger"></i>
                    </a>
                    </td>
                    @include('backend.modals.loan')
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
