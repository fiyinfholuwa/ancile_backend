@extends('backend.app')

@section('content')

    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Post</h5>
                            <div class="card">

                                <form method="post" action="{{route('admin.blog.update',$blog->id)}}" enctype="multipart/form-data"
                                      class="row g-3">
                                    @csrf
                                    <div class="col-md-6 col-lg-12">
                                        <label for="inputName5" class="form-label">Title</label>
                                        <input type="text" name="title" value="{{$blog->title}}" class="form-control"
                                               placeholder="Enter Post Title" id="inputName5">
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('title')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>


                                    <div class="col-md-12 col-lg-12">
                                        <label for="inputCity" class="form-label">Category</label>
                                        <select required name="category" class="form-control">
                                            <option value="{{$blog->category}}">{{$blog->category}}</option>
                                            <option value="blog">blog</option>
                                            <option value="news">news</option>
                                        </select>
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('category')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputCity" class="form-label">Image</label>
                                        <input  type="file" class="form-control"  name="image"/>
                                        <div>
                                            <img height="40px" width="40px" src="{{asset($blog->image)}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12">
                                        <label for="inputName5" class="form-label">Post Content</label>
                                        <textarea id="myTextarea" name="body" placeholder="Post Content"
                                                  class="form-control" rows="10">{{$blog->body}}</textarea>
                                        <p style="font-weight:bold; color:red; font-size:12px;">
                                            @error('body')
                                            {{$message}}
                                            @enderror
                                        </p>
                                    </div>


                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Update Post</button>
                                    </div>
                                </form><!-- End Multi Columns Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


    </main><!-- End #main -->
@endsection
