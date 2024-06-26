

@extends('backend.app')

@section('title', 'Edit FAQ')
@section('page', 'Edit FAQ')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
{{--              <h5 class="card-title">Edit FAQ</h5>--}}
              <div class="">

              <form method="post" action="{{route('admin.askgpt.update', $askgpt->id)}}" enctype="multipart/form-data" class="row g-3">
                @csrf

                <div class="col-md-12">
                  <label for="inputCity" class="form-label">FAQ Category</label>
                  <select required name="askgpt_id" class="form-control">
                      <option value="">Select FAQ Category</option>
                      @foreach($askgpts as $askgpt_d)
                          <option value="{{$askgpt_d->id}}" {{$askgpt_d->id == $askgpt->askgpt_id ? "selected" : ""}}>{{$askgpt_d->ask_name}}</option>
                      @endforeach
                  </select>
                  <p style="font-weight:bold; color:red; font-size:12px;">
                  @error('askgpt_id')
                    {{$message}}
                  @enderror
                  </p>
                </div>

                  <div class="col-md-12">
                      <label for="inputCity" class="form-label">Question</label>
                      <textarea class="form-control" name="question" rows="4" placeholder="Enter FAQ Question">{{$askgpt->question}}</textarea>
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('question')
                          {{$message}}
                          @enderror
                      </p>
                  </div>

                  <div class="col-md-12">
                      <label for="inputCity" class="form-label">Answer</label>
                      <textarea class="form-control" name="answer" rows="4" placeholder="Enter FAQ Answer">{{$askgpt->answer}}</textarea>
                      <p style="font-weight:bold; color:red; font-size:12px;">
                          @error('answer')
                          {{$message}}
                          @enderror
                      </p>
                  </div>

                  <div class="">
                  <button type="submit" class="btn btn-primary">Update FAQ</button>
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
