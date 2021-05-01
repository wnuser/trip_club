@extends('admin.layouts.app')

@section('content')



<div class="wrapper-with-sidebar">
   <div class="container-fluid py-4">
      <div class="row">
         <div class="col-2"></div>
         <div class="col-8">
           <center>  <h5>Fill Blog Details</h5></center>
           @include('layouts.error')
            <form action="{{route('blog.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
               <div class="form-group">
                  <label for="">Enter User Name</label>
                  <input type="hidden" value="{{ $blogData['id'] }}" name="id">
                  <input type="text" name="user_name" class="form-control" placeholder="Enter User Name" value="{{ $blogData['user_name'] }}"> 
               </div>
               <div class="form-group">
                   <label for="">Enter Blog Title</label>
                   <input type="text" class="form-control" name="title" placeholder="Enter Blog Title" value="{{ $blogData['title'] }}">
               </div>
               <div class="form-group">
                    <label for="">Choose blog Category</label>
                    {{ getCategories($blogData['category']) }}
                   
               </div>
               <div class="form-group">
                  <label for="">Choose Main Image</label>
                  <input type="file" class="form-control" name="image">
               </div>
               <div class="form-group">
                  <label for="">Enter Description </label>
                  <textarea name="Description" class="form-control" id="message_description" cols="30" rows="10">{{ $blogData['Description'] }}</textarea>
               </div>
               <div class="form-group">
                  <label for="">Enter Meta Tags</label>
                  <textarea  id="" cols="30" rows="5" class="form-control" name="meta_tag">{{ $blogData['meta_tag'] }}</textarea>
               </div>
               <div class="form-group">
                  <label for="">Enter Meta Description</label>
                  <textarea name="meta_description" id="" cols="30" rows="5" class="form-control">{{ $blogData['meta_description'] }}</textarea>
               </div>
               <div class="form-group">
                    <label for="">Enter Image Alt Description</label>
                    <textarea name="alt_description" id="" cols="30" rows="2" class="form-control">{{ $blogData['alt_description'] }}</textarea>
               </div>
               <div class="form-group">
                    <button class="btn btn-primary">Update</button>
               </div>
            </form>
         </div>
         <div class="col-2">
         <a class="btn btn-dark float-left" href="{{ route('AdminBlogs.index') }}"><i class="fa fa-angle-double-left"></i> Back </a>
         </div>
      </div>
   </div>
</div>
@endsection

@push('scripts')
<script>
CKEDITOR.replace('message_description',  {
   filebrowserUploadUrl: "{{ route('blog.image.upload', ['_token' => csrf_token() ])}}",
   filebrowserUploadMethod: 'form'
});
</script>

@endpush