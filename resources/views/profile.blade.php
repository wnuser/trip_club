@extends('layouts.app')

@section('content')

<section class="post-sec">
   <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
               <div class="card">
               <div class="about-card">
            <div class="cover-bg">
                  <img src="{{ asset('Images/cover-mentors.jpg') }}" alt="cover-bg" class="img-fluid">
            </div>
         <div class="profile-box">
            <a class="profile-popup" href="#">
                 <img src="{{ asset('Images/solo.jpg') }}" alt="profile" class="img-fluid">
            </a>
         </div>
         <div class="about-body">
            <div class="button-strip">
                <a href="#" class="btn btn-small">Connect</a>
                <a href="#" class="btn btn-small">Message</a>
                <a href="#about-mentor" data-toggle="modal" class="btn btn-small btn-icon"><i class="fas fa-pen"></i></a>
            </div>
            <div class="about-info-box">
               <h4 class="mb-0">Josh butler peter</h4>
               <p><span>Gym trainer at Royal Gym</span> </p>
               <h6>Deharadun, Uttarakhand, india <span class="dot"></span> <span>6 years of experience</span> <span class="dot"></span> <a href="#" class="">Contact Info</a></h6>
            </div>
         </div>
         </div>
         <hr>
         <div class="about-info-sec">
           <h5>About</h5>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est dolores iste neque, quas, sit at sapiente ullam tenetur reprehenderit ea adipisci, a voluptas consequuntur. Accusamus consequuntur a voluptas eligendi non?</p>
          </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
              <div class="card">
                 right sidebar
              </div>
            </div>
        </div>
  </div>

  <!-- edit info modal -->
  <!-- Modal -->
<div class="modal fade modal-about-mentor" id="about-mentor" tabindex="-1" role="dialog" aria-labelledby="about-mentorlLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-body p-0">
         <div class="about-card">
            <div class="cover-bg">
                  <img src="{{ asset('Images/cover-mentors.jpg') }}" alt="cover-bg" class="img-fluid">
            </div>
         <div class="profile-box">
            <a class="profile-popup" href="#">
                 <img src="{{ asset('Images/solo.jpg') }}" alt="profile" class="img-fluid">
            </a>
            <a href="#" class="btn btn-small btn-icon"><i class="fas fa-camera"></i></a>
         </div>
         <div class="about-body">
            <div class="about-info-box">
               form here
            </div>
         </div>
        
         </div>
         <div class="modal-footer">
             <a href="#" class="btn btn-small">Save</a>
         </div>
         <hr>

    </div>
  </div>
</div>
</section>

@endsection('content')