

@extends('backend.app')

@section('title')
    View Loan ({{$loan->id}})
@endsection

@section('page', 'View Loan')

@section('content')

  <main id="main" class="main">

  <section class="section mt-5">
      <div class="row">
        <div class="col-lg-5">

          <div class="">
            <div class="">
{{--              <h5 class="card-title">View Loan ({{$loan->id}})</h5>--}}
              <div class="">

              <form style="box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px; padding: 20px 40px;" action="" enctype="multipart/form-data" method="post" class="row g-3">
    @csrf
    <div class="col-md-12 col-lg-12 mt-3">
        <label for="inputName5" class="form-label">Full Name: </label> <span>{{$loan->full_name}}</span>

    </div>
<div class="col-md-12 col-lg-12 mt-3">
        <label for="inputName5" class="form-label">Phone Number: </label> <span>{{$loan->phone}}</span>

    </div>
<div class="col-md-12 col-lg-12 mt-3">
        <label for="inputName5" class="form-label">Email: </label> <span>{{$loan->email}}</span>

    </div>
<div class="col-md-12 col-lg-12 mt-3">
        <label for="inputName5" class="form-label">Program: </label> <span>{{$loan->program}}</span>

    </div>
<div class="col-md-12 col-lg-12 mt-3">
        <label for="inputName5" class="form-label">Status: </label> <span>{{$loan->status}}</span>

    </div>

<div>
    <a class="btn btn-danger" href="{{route('admin.loan.all')}}">Go Back</a>
</div>
</form>



            </div>
          </div>


            </div>
          </div>





  </main><!-- End #main -->
@endsection
