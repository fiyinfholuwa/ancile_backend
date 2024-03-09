

@extends('backend.app')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Destination</h5>
              <div class="card">

              <form method="post" action="{{route('admin.destination.save')}}" enctype="multipart/form-data" class="row g-3">
                @csrf

                <div class="col-md-12">
                  <label for="inputCity" class="form-label">Select Country</label>
                  <select required name="country_id" class="form-control">
                      <option value="">Select Country</option>
                      @foreach($countries as $country)
                          <option value="{{$country->id}}">{{$country->name}}</option>
                      @endforeach
                  </select>
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  @error('country_id')
                    {{$message}}
                  @enderror
                  </p>
                </div>

                  <div class="col-md-6 col-lg-12">
                      <label for="inputName5" class="form-label">Destination Cover Image</label>
                      <input type="file" name="image"  class="form-control" id="inputName5">
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('image')
                          {{$message}}
                          @enderror
                      </p>
                  </div>
                  <div class="col-md-6 col-lg-12">
                      <label for="inputName5" class="form-label">Destination Resource Image</label>
                      <input type="file" name="image2"  class="form-control" id="inputName5">
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('image2')
                          {{$message}}
                          @enderror
                      </p>
                  </div>

                  <div class="col-md-6 col-lg-12">
                      <label for="inputName5" class="form-label">Destination PDF</label>
                      <input type="file" name="pdf"  class="form-control" id="inputName5">
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('pdf')
                          {{$message}}
                          @enderror
                      </p>
                  </div>

                  <div class="col-md-6 col-lg-12">
                      <label for="inputName5" class="form-label">More Information about Destination</label>
                      <textarea id="myTextarea" name="info" placeholder="More Information about Destination" class="form-control" rows="10"></textarea>
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('info')
                          {{$message}}
                          @enderror
                      </p>
                  </div>


                  <div class="">
                  <button type="submit" class="btn btn-primary">Add destination</button>
                </div>
              </form><!-- End Multi Columns Form -->


            </div>
          </div>


            </div>
          </div>

        </div>
      </div>
    </section>



  </main><!-- End #main -->
@endsection
