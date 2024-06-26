

@extends('backend.app')

@section('title',  'Manage Status')
@section('page',  'Manage Status')
@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-5">

          <div class="card">
            <div class="card-body">
{{--              <h5 class="card-title"></h5>--}}
              <div class="">

              <form action="{{route('status.add')}}" method="post" class="row g-3">
                @csrf
                <div class="col-md-12 col-lg-12">
                  <label for="inputName5" class="form-label">Status Name</label>
                  <input type="text" name="name" value="{{old('name')}}" class="form-control"  placeholder="Status Name" id="inputName5">
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  @error('name')
                    {{$message}}
                  @enderror
                  </p>
                </div>

                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Add Status</button>
                </div>
              </form><!-- End Multi Columns Form -->


            </div>
          </div>


            </div>
          </div>


        <div class="col-lg-7">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Manage Status</h5>
              <!-- Table with stripped rows -->
              <table id="my-table" class="table datatable">
                <thead>
                  <tr>
                    <th>
                      Name
                    </th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                @foreach($statuses as $status)
                  <tr>
                    <td>{{$status->name}}</td>

                    <td>
                    <a href="{{route('status.edit', $status->id)}}">
                    <i  class="fa fa-edit text-primary"></i>
                    </a>
                    <a type="button" class="" data-bs-toggle="modal" data-bs-target="#status_{{$status->id}}">
                    <i  class="fa fa-trash text-danger"></i>
                    </a>
                    </td>

                </tr>
                @include('backend.modals.status')
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
