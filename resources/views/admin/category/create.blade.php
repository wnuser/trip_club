@extends('admin.layouts.app')
@section('content')
<div class="wrapper-with-sidebar">
   <div class="container-fluid py-4">
      <div class="row">
      </div>
      <div class="row">
         <div class="col-2">
         </div>
         <div class="col-8">

           @include('layouts.error')
           <center><h5>Fill Category Details</h5></center>
            <form action="{{route('BlogCategorys.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
               <div class="form-group">
                   <label for="">Enter Category Name</label>
                   <input type="text" class="form-control" name="name" placeholder="Enter Blog Title">
               </div>
               <div class="form-group">
                  <label for="">Choose Image </label>
                  <input type="file" class="form-control" name="image">
               </div>
               <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
               </div>
            </form>
         </div>
         <div class="col-2">
         <a class="btn btn-dark float-left" href="{{ route('BlogCategorys.index') }}"><i class="fa fa-angle-double-left"></i> Back </a>

         </div>
      </div>
   </div>
</div>
@endsection

