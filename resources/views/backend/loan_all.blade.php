

@extends('backend.app')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Manage Loans</h5>


              <!-- Table with stripped rows -->
              <table class="table datatable">
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
                   <a type="button" class="" data-bs-toggle="modal" data-bs-target="#loan_status_{{$loan->id}}">
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
