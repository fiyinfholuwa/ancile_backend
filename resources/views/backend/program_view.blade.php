

@extends('backend.app')

@section('title','Manage Program')
@section('page','Manage Program')
@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-5">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <div class="">

              <form action="{{route('program.add')}}" enctype="multipart/form-data" method="post" class="row g-3">
                @csrf
                <div class="col-md-12 col-lg-12">
                  <label for="inputName5" class="form-label">Program Name</label>
                  <input type="text" name="name" value="{{old('name')}}" class="form-control"  placeholder="Program Name" id="inputName5">
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  @error('name')
                    {{$message}}
                  @enderror
                  </p>
                </div>

                <div class="col-md-12 col-lg-12">
                  <label for="inputName5" class="form-label">Program Image</label>
                  <input required type="file" name="image" class="form-control"  placeholder="Program Name" id="inputName5">
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  @error('image')
                    {{$message}}
                  @enderror
                  </p>
                </div>

                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Add Program</button>
                </div>
              </form><!-- End Multi Columns Form -->


            </div>
          </div>


            </div>
          </div>


        <div class="col-lg-7">
          <div class="card">
            <div class="card-body">
{{--              <h5 class="card-title">Manage Programs</h5>--}}
              <!-- Table with stripped rows -->
              <table id="my-table" class="table datatable">
                <thead>
                  <tr>
                    <th>
                      Name
                    </th><th>
                      Program ID
                    </th>
                      <th>
                      Image
                    </th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                @foreach($programs as $program)
                  <tr>
                    <td>{{$program->name}}</td>
                    <td>{{$program->id}}</td>

                  <td><img height="40px" width="40px" src="{{asset($program->image)}}"></td>
                    <td>
                    <a href="{{route('program.edit', $program->id)}}">
                    <i  class="fa fa-edit text-primary"></i>
                    </a>
                        <a type="button" class="" data-bs-toggle="modal" data-bs-target="#program_{{$program->id}}">
                            <i  class="fa fa-trash text-danger"></i>
                        </a>
                    </td>
                    @include('backend.modals.program')
                </tr>
                @endforeach
                </tbody>

              </tableid>
              <!-- End Table with stripped rows -->

            </div>
          </div>
        </div>
      </div>
  </section>



  </main><!-- End #main -->
@endsection
