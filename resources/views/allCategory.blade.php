@extends('layouts.app')

@section('content')

<main>

<section class="categories-sec">
   <div class="container">
      <div class="row">
            <div class="col-12 tite-uline">
                 <h5>INSPIRATIONS</h5>
            </div>
      </div>
      <div class="row mt-3">
         @foreach($categories as $catValue)
            <div class="col-lg-4 col-md-6 col-12 mb-4">
               <div class="cat-inner">
                  <a href="{{ route('category.blogs', ['id'=> $catValue['id'] ]) }}">
                  <img src="{{ asset('Images/categories/'.$catValue['image']) }}" class="img-fluid" alt="cat-inner"/>
                  </a>
                  <h4 class="mt-3">{{ $catValue['name'] }}</h4>
               </div>
            </div>
         @endforeach
        

      </div>
   </div>
</section>

</main>
@endsection