@extends('layouts.admin')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
              <li class="breadcrumb-item active"> <a href="{{route('post.index')}}">Post list</a> </li>
              <li class="breadcrumb-item active">Create Post</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
    <!-- Main content -->

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                    <div class="card-header">
                            <div class="d-flex justify-content-between allign-items-center">
                                <h3 class="card-title">Create Post</h3>
                                <a href="{{route('post.index')}}" class="btn btn-primary">Go back to Post list </a>
                            </div>
                    </div>
                
                    <div class="card-body p-0"> 
                      <div class="row">
                         <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">

                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                @include('includes.errors') 

                  <div class="form-group">
                    <label for="title"> Post Tilte </label>
                    <input type="name" name="title" value="{{old('title')}}"class="form-control" placeholder="Enter title">
                  </div>

                  <div class="form-group">
                    <label for="title"> Post Category </label>

                    <select name="category" id="category" class="form-control">
                    <option value="" style="display:none" selected> Select Category</option>
                    @foreach($categories as $c)
                    <option value="{{ $c->id }}"> {{$c->name}}</option>
                    @endforeach 
                    </select>
                  </div>

                  <div class="form-group">
                  <label> Choose Post Tags</label>
                  <div class=" d-flex flex-wrap">
                    @foreach($tags as $tag)
                    <div class="custom-control custom-checkbox" style="margin-right:20px">
                          <input class="custom-control-input" name="tags[]" type="checkbox" id="tag{{ $tag->id}}" value="{{$tag->id}}">
                          <label for="tag{{ $tag->id}}" class="custom-control-label">{{$tag->name}}</label>
                    </div>
                    @endforeach
                  </div>
                  </div>

                  <div class="form-group"> 
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                  </div>

                  <div class="form-group"> 
                    <label for="exampleInputPassword">Description</label>
                    <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter description"> {{old('description')}} </textarea>  
                  </div>


                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
                         
                    </div>
                 </div>                
              </div>
           </div>
        </div>
     </div> 
   </div>
</div>

     
@endsection 

@section('style')
  <link rel="stylesheet" href="{{asset('/admin/css/summernote-bs4.min.css')}}">
@endsection

@section('script')
  <script src="{{asset('/admin/js/summernote-bs4.min.js')}}"></script>
  <script>
      $('#description').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 300
      });
  </script>
@endsection
