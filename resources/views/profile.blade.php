@extends('layouts.app')

@section('content')

<section class="profile-sec">
   <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
               <div class="card card-hm">
               <div class="about-card profile-about">
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
               </div>
               <div class="card card-hm">
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
        <form action="#">
      <div class="modal-body p-0">
         <div class="about-card profile-popup">
            <div class="cover-bg">
                  <img src="{{ asset('Images/cover-mentors.jpg') }}" alt="cover-bg" class="img-fluid">
            </div>
         <div class="profile-box">
            <a class="profile-popup" href="#">
                 <img src="{{ asset('Images/solo.jpg') }}" alt="profile" class="img-fluid">
            </a>
             <label for="change-profile" class="btn-icon"><i class="fas fa-camera"></i></label>
             <input type="file" class="hidden" id="change-profile"/>
         </div>
         <div class="about-body">
            <div class="about-info-box">
                  <div class="row">
                     <div class="col-lg-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $userInfo['name'] }}" placeholder="Name"/>
                     </div>
                     <div class="col-lg-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" readonly value="{{ $userInfo['email'] }}" placeholder="Email"/>
                     </div>
                     <div class="col-lg-6">
                        <label for="name">Mobile</label>
                        <input type="number" class="form-control" name="mobile" value="{{ $userInfo['mobile'] }}" placeholder="Mobile"/>
                     </div>
                     <div class="col-lg-6">
                        <label for="name">Country</label>
                        <select name="country" id="">
                           <option value="india">India</option>
                           <option value="india">US</option>
                           <option value="india">UK</option>
                        </select>
                     </div>
                     <div class="col-lg-6">
                        <label for="name">State</label>
                        <select name="state" id="">
                           <option value="india">Uttarakhand</option>
                           <option value="india">California</option>
                           <option value="india">Midlands</option>
                        </select>
                     </div>
                     <div class="col-lg-6">
                        <label for="name">City</label>
                        <select name="city" id="">
                           <option value="india">Deheradun</option>
                           <option value="india">San jose</option>
                           <option value="india">Birmingham</option>
                        </select>
                     </div>
                     <div class="col-12">
                        <label for="name">How many years of experience you have</label>
                        {{ experience() }}
                     </div>

                     <div class="col-12">
                        <label for="name">Education (Mention about your educational backgroud including all certifications.) </label>
                         <textarea name="education"></textarea>
                     </div>
                     <div class="col-12">
                        <label for="name">About (Mention about yourself, what kind of personality you are? your achievements, your expertise.) </label>
                         <textarea name="About"></textarea>
                     </div>
                     
                     <div class="col-12">
                        <label for="name">Office address (Your working place address from where you are operating.) </label>
                         <textarea name="Office address"></textarea>
                     </div>
                  </div>
              
            </div>
         </div>
        
         </div>
         <div class="modal-footer">
             <a href="#" class="btn btn-small">Save</a>
         </div>
         </form>
    </div>
  </div>
   </div>
</section>

@endsection('content')