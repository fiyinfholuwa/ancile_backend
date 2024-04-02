

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

              <form action="{{ route('homeslider.update', $homeslider->id) }}" enctype="multipart/form-data" method="post" class="row g-3">
    @csrf
    <div class="col-md-12 col-lg-12">
        <label for="inputName5" class="form-label">Header Text</label>
        <textarea name="header_text" class="form-control" placeholder="homeslider Name" id="updateHeaderText" maxlength="30">{{ old('header_text', $homeslider->header) }}</textarea>
        <p style="font-weight:bold; color:red; font-size:12px;" id="updateHeaderError">
            @error('header_text')
                {{ $message }}
            @enderror
        </p>
        <p id="updateHeaderCharCount">Character count: {{ strlen($homeslider->header) }}</p>
    </div>

    <div class="col-md-12 col-lg-12">
        <label for="inputName5" class="form-label">Paragraph Text</label>
        <textarea type="text" name="text" class="form-control" placeholder="homeslider Name" id="updateParagraphText" maxlength="40">{{ old('text', $homeslider->text) }}</textarea>
        <p style="font-weight:bold; color:red; font-size:12px;" id="updateParagraphError">
            @error('text')
                {{ $message }}
            @enderror
        </p>
        <p id="updateParagraphCharCount">Character count: {{ strlen($homeslider->text) }}</p>
    </div>

    <div class="col-md-12 col-lg-12">
        <label for="inputName5" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" placeholder="homeslider Name" id="updateInputName5">
        <p style="font-weight:bold; color:red; font-size:12px;">
            @error('image')
                {{ $message }}
            @enderror
        </p>
        <div style="margin: 20px 0px;">
            <img height="40px" width="40px" src="{{ asset($homeslider->image) }}">
        </div>
    </div>

    <div class="text-left">
        <button type="submit" class="btn btn-primary">Update Home Slider</button>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var updateHeaderText = document.getElementById("updateHeaderText");
        var updateParagraphText = document.getElementById("updateParagraphText");
        var updateHeaderCharCount = document.getElementById("updateHeaderCharCount");
        var updateParagraphCharCount = document.getElementById("updateParagraphCharCount");
        var updateHeaderError = document.getElementById("updateHeaderError");
        var updateParagraphError = document.getElementById("updateParagraphError");

        updateHeaderText.addEventListener("input", function () {
            var charCount = this.value.length;
            updateHeaderCharCount.textContent = "Character count: " + charCount;

            if (charCount > 30) {
                updateHeaderError.textContent = "Header text cannot exceed 30 characters.";
            } else {
                updateHeaderError.textContent = "";
            }
        });

        updateParagraphText.addEventListener("input", function () {
            var charCount = this.value.length;
            updateParagraphCharCount.textContent = "Character count: " + charCount;

            if (charCount > 40) {
                updateParagraphError.textContent = "Paragraph text cannot exceed 40 characters.";
            } else {
                updateParagraphError.textContent = "";
            }
        });
    });
</script>


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
