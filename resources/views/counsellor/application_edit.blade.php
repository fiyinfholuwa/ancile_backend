

@extends('counsellor.app')

@section('content')

  <main id="main" class="main">

  <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">View Application</h5>
              <div class="card">

                  <form class="row g-3" method="post" action="{{route('admin.application.update', $app->id)}}" enctype="multipart/form-data">
                      @csrf
                      <h2>Personal Details</h2>
                      <div class="col-md-6">
                          <label for="inputName5" class="form-label">Full Name</label>
                          <input type="text"  readonly name="full_name" value="{{$app->full_name}}" placeholder="Full Name" class="form-control" id="inputName5">
                          <p style="font-weight:bold; color:red; font-size:12px;">
                              @error('full_name')
                              {{$message}}
                              @enderror
                          </p>
                      </div>
                      <div class="col-md-6">
                          <label for="inputEmail5" class="form-label">Email</label>
                          <input type="email" readonly name="email" value="{{$app->email}}" placeholder="Email" class="form-control" id="inputEmail5">
                          <p style="font-weight:bold; color:red; font-size:12px;">
                              @error('email')
                              {{$message}}
                              @enderror
                          </p>
                      </div>
                      <div class="col-md-6">
                          <label for="inputPassword5" class="form-label">Mobile</label>
                          <input type="number" readonly name="mobile" value="{{$app->mobile}}"  placeholder="Mobile" class="form-control" id="inputPassword5">
                          <p style="font-weight:bold; color:red; font-size:12px;">
                              @error('mobile')
                              {{$message}}
                              @enderror
                          </p>
                      </div>

                      <div class="col-md-6">
                          <label for="inputPassword5" class="form-label">DOB</label>
                          <input type="date" readonly name="dob" value="{{$app->dob}}"  placeholder="dob" class="form-control" id="inputPassword5">
                          <p style="font-weight:bold; color:red; font-size:12px;">
                              @error('dob')
                              {{$message}}
                              @enderror
                          </p>
                      </div>

                      <div class="col-md-6">
                          <label>Program</label> : {{$app->program}}


                      </div>

                      <div class="col-md-6">
                          <label>Course</label> : {{$app->course }}

                      </div>


                      <div class="col-md-6">
                          <label for="inputPassword5" class="form-label">Address</label>
                          <input type="text" readonly name="address" value="{{$app->country}}" placeholder="Address" class="form-control"/>
                          <p style="color: red; font-weight: 500">
                              @error('address')
                              {{$message}}
                              @enderror
                          </p>
                      </div>


                      <div class="col-md-6">
                          <label for="year">Academic year</label> : {{$app->year}}

                      </div>

                      <h2>Other Details</h2>
                      <div class="personal col-lg-6">
                          <label for="program">Source of Funds</label> : {{$app->fund}}

                      </div>


                      <div class="personal col-lg-6">
                          <div class="first-input">
                              <label for="country">Emergency Contact Detail</label>
                              <input type="number" readonly class="form-control" value="{{$app->emergency}}" name="emergency" placeholder="Enter Emergency Contact Detail"/>
                              <p style="color: red; font-weight: 500">
                                  @error('emergency')
                                  {{$message}}
                                  @enderror
                              </p>
                          </div>
                      </div>
                      <div class="first-input col-lg-6">
                          <label for="year">Application Status</label> : {{$app->application_status}}

                      </div>


                      <div class="first-input col-lg-6">
                          <label for="Course">Short listed Universities</label>
                          <input type="text" readonly class="form-control" value="{{$app->shortlist}}" name="shortlist" placeholder="Type short listed Universities"/>
                          <p style="color: red; font-weight: 500">
                              @error('shortlist')
                              {{$message}}
                              @enderror
                          </p>
                      </div>

                      <h2>Required Documents</h2>
                      <div class="col-md-4">
                          <label for="inputAddress2" class="form-label">UnderGraduate (Attachment)</label>

                          @if($app->undergraduate != NULL)
                              <a class="badge bg-success" href="{{asset($app->undergraduate)}}">view file</a>
                          @else
                              <span class="badge bg-danger">not stated</span>
                          @endif
                      </div>
                      <div class="col-md-4">
                          <label for="inputAddress2" class="form-label">PostGraduate (Attachment)</label>

                          @if($app->postgraduate != NULL)
                              <a class="badge bg-success" href="{{asset($app->postgraduate)}}">view file</a>
                          @else
                              <span class="badge bg-danger">not stated</span>
                          @endif
                      </div>


                      <div class="col-md-6">
                          <label for="inputCity" class="form-label">Intermediate (Attachment) </label>

                          @if($app->mark_sheet_11_12 != NULL)
                              <a class="badge bg-success" href="{{asset($app->mark_sheet_11_12)}}">view file</a>
                          @else
                              <span class="badge bg-danger">not stated</span>
                          @endif
                      </div>


                      <div class="col-md-6">
                          <label for="inputCity" class="form-label">10th Mark Sheet (Attachment)</label>

                          @if($app->mark_sheet_10 != NULL)
                              <a class="badge bg-success" href="{{asset($app->mark_sheet_10)}}">view file</a>
                          @else
                              <span class="badge bg-danger">not stated</span>
                          @endif
                      </div>


                      <div class="col-md-6">
                          <label for="inputCity" class="form-label">Finance Bank Statement (Attachment)</label>

                          @if($app->finance != NULL)
                              <a class="badge bg-success" href="{{asset($app->finance)}}">view file</a>
                          @else
                              <span class="badge bg-danger">not stated</span>
                          @endif
                      </div>

                      <div class="col-md-6">
                          <label for="inputCity" class="form-label">Passport Copy if applicable</label>

                          @if($app->passport != NULL)
                              <a class="badge bg-success" href="{{asset($app->passport)}}">view file</a>
                          @else
                              <span class="badge bg-danger">not stated</span>
                          @endif
                      </div>
                      <div style="margin-top: 20px;">
                          <h3>Previously Selected Scores/Exams:</h3>
                          <table style="width: 70%; border-collapse: collapse; margin-top: 10px;">
                              <thead>
                              <tr>
                                  <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;">Exam Options</th>
                                  <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;">Score</th>
                                  <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;">Attachment</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach(json_decode($app->gre_score, true)['gre_options'] as $i => $greOption)
                                  <tr>
                                      <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $greOption }}</td>
                                      <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ json_decode($app->gre_score, true)['scores'][$i] ?? null }}</td>
                                      <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                          <a style="font-size: 10px;" class="badge bg-primary text-white" href="{{ isset(json_decode($app->gre_score, true)['attachments'][$i]) ? asset(json_decode($app->gre_score, true)['attachments'][$i]) : '#' }}" target="_blank" style="color: #007bff; text-decoration: none;">
                                              {{ isset(json_decode($app->gre_score, true)['attachments'][$i]) ? 'view file' : 'Attachment not stated' }}
                                          </a>
                                      </td>
                                  </tr>
                              @endforeach

                              </tbody>
                          </table>
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
