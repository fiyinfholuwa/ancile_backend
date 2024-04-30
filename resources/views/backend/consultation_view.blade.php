

@extends('backend.app')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-5">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">View Consutlation (ID:{{$consultation->id}})</h5>
              <div class="card">

              <form style="box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px; padding: 20px 40px;" action="" enctype="multipart/form-data" method="post" class="row g-3">
    @csrf
    <div class="col-md-12 col-lg-12 mt-3">
        <label for="inputName5" class="form-label">Full Name: </label> <span>{{$consultation->first_name}} {{$consultation->last_name}}</span>

    </div>
<div class="col-md-12 col-lg-12 mt-3">
        <label for="inputName5" class="form-label">Phone Number: </label> <span>{{$consultation->phone}}</span>

    </div>
<div class="col-md-12 col-lg-12 mt-3">
        <label for="inputName5" class="form-label">Email: </label> <span>{{$consultation->email}}</span>

    </div>
<div class="col-md-12 col-lg-12 mt-3">
        <label for="inputName5" class="form-label">Education Level: </label> <span>{{$consultation->education_level}}</span>

    </div>
<div class="col-md-12 col-lg-12 mt-3">
        <label for="inputName5" class="form-label">Status: </label> <span>{{is_null($consultation->status) ? 'Pending' : $consultation->status }}</span>

    </div>

<div>
    <a class="btn btn-danger" href="{{route('consultation.all')}}">Go Back</a>
</div>
</form>



            </div>
          </div>


            </div>
          </div>





  </main><!-- End #main -->
@endsection
