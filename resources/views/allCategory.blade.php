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
         <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="cat-inner">
               <a href="#">
                 <img src="{{ asset('Images/all/adventure.jpg') }}" class="img-fluid" alt="cat-inner"/>
               </a>
               <h4 class="mt-3">Adventure</h4>
            </div>
         </div>

         <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="cat-inner">
               <a href="#">
                 <img src="{{ asset('Images/all/beaches.jpg') }}" class="img-fluid" alt="cat-inner"/>
               </a>
               <h4 class="mt-3">Beaches</h4>
            </div>
         </div>

         <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="cat-inner">
               <a href="#">
                 <img src="{{ asset('Images/all/family.jpg') }}" class="img-fluid" alt="cat-inner"/>
               </a>
               <h4 class="mt-3">Family</h4>
            </div>
         </div>

         <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="cat-inner">
               <a href="#">
                 <img src="{{ asset('Images/all/hill station.jpg') }}" class="img-fluid" alt="cat-inner"/>
               </a>
               <h4 class="mt-3">Hill Station</h4>
            </div>
         </div>

         <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="cat-inner">
               <a href="#">
                 <img src="{{ asset('Images/all/historical.jpg') }}" class="img-fluid" alt="cat-inner"/>
               </a>
               <h4 class="mt-3">Historical</h4>
            </div>
         </div>

         <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="cat-inner">
               <a href="#">
                 <img src="{{ asset('Images/all/honeymoon.jpg') }}" class="img-fluid" alt="cat-inner"/>
               </a>
               <h4 class="mt-3">Honeymoon</h4>
            </div>
         </div>

         <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="cat-inner">
               <a href="#">
                 <img src="images/all/pilgrimage.jpg" class="img-fluid" alt="cat-inner"/>
               </a>
               <h4 class="mt-3">Pilgrimage</h4>
            </div>
         </div>

         <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="cat-inner">
               <a href="#">
                 <img src="images/all/roadtrips.jpg" class="img-fluid" alt="cat-inner"/>
               </a>
               <h4 class="mt-3">Roadtrips</h4>
            </div>
         </div>

         <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="cat-inner">
               <a href="#">
                 <img src="images/all/solo.jpg" class="img-fluid" alt="cat-inner"/>
               </a>
               <h4 class="mt-3">Solo</h4>
            </div>
         </div>

         <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="cat-inner">
               <a href="#">
                 <img src="images/all/tourist hub.jpg" class="img-fluid" alt="cat-inner"/>
               </a>
               <h4 class="mt-3">Tourist Hub</h4>
            </div>
         </div>

         <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="cat-inner">
               <a href="#">
                 <img src="images/all/trekking.jpg" class="img-fluid" alt="cat-inner"/>
               </a>
               <h4 class="mt-3">Trekking</h4>
            </div>
         </div>

         <div class="col-lg-4 col-md-6 col-12 mb-4">
            <div class="cat-inner">
               <a href="#">
                 <img src="images/all/wildlife.jpg" class="img-fluid" alt="cat-inner"/>
               </a>
               <h4 class="mt-3">Wildlife</h4>
            </div>
         </div>
      </div>
   </div>
</section>

</main>
@endsection