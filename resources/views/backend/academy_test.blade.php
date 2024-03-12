

@extends('backend.app')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Manage Academy Tutorial Students</h5>


              <!-- Table with stripped rows -->
              <table class="table datatable">
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
                    @include('backend.modals.academy')
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
