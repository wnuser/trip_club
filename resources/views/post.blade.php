@extends('layouts.app')

@section('content')

<section class="post-sec">
   <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-12">
                 <div class="card side-card py-3 sticky-dektop card-anchors">
                     <a href="#">
                      connetions
                      <span>growth your network</span>
                     </a>
                     <a href="#">
                      connetions
                      <span>growth your network</span>
                     </a>
                     <a href="#">
                      connetions
                      <span>growth your network</span>
                     </a>
                 </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
               <div class="card post-card p-3">
                   <div class="d-flex">
                     <div class="profile-img">
                     <img src="{{ asset('Images/solo.jpg') }}" alt="profile" class="img-fluid">
                    </div>
                    <a href="#">
                      Write a post
                    </a>
                    <div class="photo-upload">
                        <form action="#">
                           <label for="upload-img"><i class="fas fa-image"></i> <span>Photo</span> </label>
                          <input type="file" class="form-control" id="upload-img"/>
                        </form>
                    </div>
                   </div>
               </div>

                <div class="card feed-card p-3">
                   <div class="d-flex">
                       <div class="profile-img">
                          <a href="#">
                          <img src="{{ asset('Images/solo.jpg') }}" alt="profile" class="img-fluid">
                          </a>
                        </div>
                        <div class="name-post">
                           <h6>John Doe</h6>
                           <span>Gym trainer dehradun</span>
                        </div>
                   </div>
                   <div class="post-content">
                      <p>I am looking for a job, I have arround 3 years experience in php developer. I can work only home.</p>
                      <div class="img-block">
                          <img src="{{ asset('Images/cover-mentors.jpg') }}" alt="cover-bg" class="img-fluid">
                      </div>
                   </div>
                </div>
                <!-- /card feed -->
                <div class="card feed-card p-3">
                   <div class="d-flex">
                       <div class="profile-img">
                          <a href="#">
                          <img src="{{ asset('Images/solo.jpg') }}" alt="profile" class="img-fluid">
                          </a>
                        </div>
                        <div class="name-post">
                           <h6>John Doe</h6>
                           <span>Gym trainer dehradun</span>
                        </div>
                   </div>
                   <div class="post-content">
                      <p>I am looking for a job, I have arround 3 years experience in php developer. I can work only home.</p>
                      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo deleniti quibusdam nulla? Quidem, quam adipisci nobis consectetur facilis voluptatum, fuga reiciendis officiis beatae ratione nisi eligendi culpa corrupti officia. Earum!.</p>
                   </div>
                </div>

            </div>
            <div class="col-lg-3 col-md-12 col-12">
                 <div class="card py-3 sticky-dektop card-anchors">
                    <div class="filter-sd px-3">
                       <h5>Sort</h5>
                       <select name="filter" id="">
                       <option value="1">Recent</option>
                          <option value="2">Top</option>
                       </select>
                    </div>
                    <hr>
                  <h5 class="px-3">Latest feed</h5>
                   <a href="#">
                     <h6>Product-based company or Service based company</h6>
                      <span>Let's Connect on Twitter:</span>
                   </a>
                   <a href="#">
                     <h6>Product-based company or Service based company</h6>
                      <span>Let's Connect on Twitter:</span>
                   </a>
                   <a href="#">
                     <h6>Product-based company or Service based company</h6>
                      <span>Let's Connect on Twitter:</span>
                   </a>
                   <a href="#">
                     <h6>Product-based company or Service based company</h6>
                      <span>Let's Connect on Twitter:</span>
                   </a>
                   <a href="#">
                     <h6>Product-based company or Service based company</h6>
                      <span>Let's Connect on Twitter:</span>
                   </a>
                 </div>
            </div>
        </div>
  </div>
</section>

@endsection('content')