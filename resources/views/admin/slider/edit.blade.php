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
           <center><h5>Edit Slider Details</h5></center>
            <form action="{{route('slider.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
               <div class="form-group">
                <img src="{{ asset('Images/uploads/'.$sliderInfo->image) }}" style="height:100px; width:100px;" alt="">
                  <label for="">Choose Image </label>
                  <input type="file" class="form-control" name="image">
               </div>
               <input type="hidden" value="{{ $sliderInfo->id }}" name="id">
               <div class="form-group">
                  <label for="">Enter Title</label>
                  <input type="text" class="form-control" value="{{ $sliderInfo->title }}" name="title" placeholder="Enter Title">
               </div>
               <div class="form-group">
                  <label for="">Choose Category</label>
                        {{ getCategories($sliderInfo->category) }}
               </div>
               <div class="form-group">
                  <label for="">Enter Hyper Link</label>
                  <input type="text" name="hyper_link" value="{{ $sliderInfo->hyper_link }}" class="form-control" placeholder="Enter Hyper Link">
               </div>
               <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
               </div>
            </form>
         </div>
         <div class="col-2">
         <a class="btn btn-dark float-left" href="{{ route('FrontSliders.index') }}"><i class="fa fa-angle-double-left"></i> Back </a>

         </div>
      </div>
   </div>
</div>
@endsection

