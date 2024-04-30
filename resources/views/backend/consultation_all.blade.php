

@extends('backend.app')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Manage Consultations</h5>


              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      Full Name
                    </th>

                    <th>Email</th>
                    <th>Phone Number</th>

                    <th>Destination</th>
                    <th>Education Level</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($consultations as $consultation)
                  <tr>
                    <td>{{$consultation->first_name}} {{$consultation->last_name}}</td>

                    <td>{{$consultation->email}}</td>
                    <td>{{$consultation->phone}}</td>

                    <td>{{$consultation->country}}</td>
                    <td>{{$consultation->education_level}}</td>
                    <td>
                      @if($consultation->status == Null)
                      <span class="badge bg-warning"><i class="bi bi-check-circle me-1"></i>Pending</span>
                      @else
                      <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>{{optional($consultation->status_name)->name}}</span>
                      @endif
                    </td>
                    <td>
                        <a href="{{route('consultation.view', $consultation->id)}}">
                            <i style="color:green;"  class="fa fa-eye text-secondary"></i>
                        </a>
                    <a type="button" class="" data-bs-toggle="modal" data-bs-target="#consultation_status_{{$consultation->id}}">
                    <i  class="fa fa-check-circle	 text-secondary"></i>
                    </a>
                    <a type="button" class="" data-bs-toggle="modal" data-bs-target="#consultation_{{$consultation->id}}">
                    <i  class="fa fa-trash text-danger"></i>
                    </a>
                    </td>
                  </tr>
                    @include('backend.modals.consultation')
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
