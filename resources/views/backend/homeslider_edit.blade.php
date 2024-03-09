

@extends('backend.app')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-5">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Home Slider</h5>
              <div class="card">

              <form action="{{route('homeslider.update', $homeslider->id)}}" enctype="multipart/form-data" method="post" class="row g-3">
                @csrf
                <div class="col-md-12 col-lg-12">
                  <label for="inputName5" class="form-label">Header Text</label>
                  <textarea  name="header_text" value="{{old('header_text')}}" class="form-control"  placeholder="homeslider Name" id="inputName5">{{$homeslider->header}}</textarea>
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  @error('header_text')
                    {{$message}}
                  @enderror
                  </p>
                </div>

                <div class="col-md-12 col-lg-12">
                  <label for="inputName5" class="form-label">Paragraph Text</label>
                  <textarea type="text" name="text" value="{{old('text')}}" class="form-control"  placeholder="homeslider Name" id="inputName5">{{$homeslider->text}}</textarea>
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  @error('text')
                    {{$message}}
                  @enderror
                  </p>
                </div>

                <div class="col-md-12 col-lg-12">
                  <label for="inputName5" class="form-label">Image</label>
                  <input type="file" name="image"  class="form-control"  placeholder="homeslider Name" id="inputName5">
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  
                  @error('image')
                    {{$message}}
                  @enderror
                  </p>
                  <div style="margin: 20px 0px;">
                        <img height="40px" width="40px" src="{{asset($homeslider->image)}}">
                    </div>
                </div>



                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Update Home Slider</button>
                </div>
              </form><!-- End Multi Columns Form -->


            </div>
          </div>


            </div>
          </div>


        <div class="col-lg-7">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Manage homesliders</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      Header 
                    </th>
                    <th>
                      Paragraph 
                    </th>

                    <th>
                      Image
                    </th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                @foreach($homesliders as $homeslider)
                  <tr>
                    <td>{{$homeslider->header}}</td>
                    <td>{{$homeslider->text}}</td>
                    <td><img height="40px" width="40px" src="{{asset($homeslider->image)}}"></td>
                    <td>
                    <a href="{{route('homeslider.edit', $homeslider->id)}}">
                    <i  class="fa fa-edit text-primary"></i>
                    </a>
                        <a type="button" class="" data-bs-toggle="modal" data-bs-target="#homeslider_{{$homeslider->id}}">
                            <i  class="fa fa-trash text-danger"></i>
                        </a>
                    </td>
                    @include('backend.modals.homeslider')
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
