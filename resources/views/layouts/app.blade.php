<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="owl.carousel/css/owl.carousel.css"/>
        <link rel="stylesheet" type="text/css" href="owl.carousel/css/owl.theme.default.css"/>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">  
    </head>
    <body>

    <header class="bg-white">
   <div class="container">
      <nav class="navbar navbar-expand-lg bg-white">

<!--  Show this only on mobile to medium screens  -->
      <li class="nav-item mob-top d-lg-none">
        <a class="nav-link" data-toggle="modal" href="#pop-search"><i class="fas fa-search"></i></a>
      </li>
  <a class="navbar-brand d-lg-none mob-centred-logo" href="index.html"><img src="images/logo-trans.svg" alt="logo"/> </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fa fa-bars"></span>
  </button>

<!--  Used flexbox utility classes to change how the child elements are justified  -->
  <div class="collapse navbar-collapse justify-content-between" id="navbarToggle">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="index.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">about</a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="dropdownMenuButton" data-toggle="dropdown">inspirations <i class="fas fa-angle-down"></i></a> 
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
      </li>
      <li class="nav-item d-mob-none">
        <a class="nav-link" data-toggle="modal" href="#pop-search"><i class="fas fa-search"></i></a>
      </li>
    </ul>
    
    
<!--   Show this only lg screens and up   -->
    <a class="navbar-brand d-none d-lg-block center-logo-desk" href="index.html"><img src="images/logo-trans.svg" alt="logo"/></a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link btn-nav" data-toggle="modal" href="#pop-trip">post a trip</a>
      </li>
    </ul>
  </div>
</nav>  
   </div>

   
   <!-- ======== search popup ======== -->
<!-- Modal -->
<div class="modal fade full-model h100-dialog" id="pop-search" tabindex="-1" role="dialog" aria-labelledby="pop-search" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="container">
              <div class="row justify-content-center align-items-center">
                 <div class="col-lg-8 col-md-9 col-11">
                  <h4 class="text-center mb-4">FIND YOUR WAY!</h4>
                      <div class="search-bx">
                         <input type="search" name="search" placeholder="SEARCH" autofocus="autofocus">
                         <button type="submit" class="btn-search"><i class="fas fa-search"></i> </button>
                      </div>
                 </div>
              </div>
           </div>
      </div>
    </div>
  </div>
</div>


<!-- ======== post a trip popup ======== -->

<!-- Modal -->
<div class="modal fade full-model" id="pop-trip" tabindex="-1" role="dialog" aria-labelledby="pop-trip" aria-hidden="true">
  <div class="modal-dialog" role="document" style="background: url('images/all/form_background.jpg') center center no-repeat; background-size: cover;">
    <div class="modal-content bg-trans">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="container">
              <div class="row justify-content-center align-items-center">
                 <div class="col-lg-8 col-md-9 col-12">
                    <div class="text-center mb-4">
                       <img src="images/logo-trans.svg" class="img-fluid" alt="logo" />
                    </div>
                    <div class="form-bx-modal row">
                         <div class="col-12 mb-3">
                             <input type="text" name="name" placeholder="Name" required="" />
                         </div>
                         <div class="col-12 mb-3">
                             <input type="text" name="title" placeholder="Title" required="" />
                         </div>
                         <div class="col-12 mb-3">
                             <select>
                               <option>Category</option>
                               <option>Category</option>
                               <option>Category</option>
                               <option>Category</option>
                             </select>
                         </div>
                         <div class="col-12 mb-3">
                            <textarea placeholder="Type your story..."></textarea>
                         </div>
                         <div class="col-12 mb-3">
                            <input type="file" name="choose" id="choose">
                            <label for="choose" class="choose-file-label">Add photos/Videos <span><i class="fas fa-paperclip"></i></span></label>
                         </div>
                         <div class="col-12 mb-5 text-center">
                            <button type="submit">Publish</button>
                         </div>
                    </div>
                 </div>
           </div>
      </div>
    </div>
  </div>
</div>

</header>

    

    <main>
        @yield('content')
    </main>



<!-- footer section starts -->
<footer class="footer-section pb-2">
       <div class="container py-3">
        <div class="row">
          <div class="col-12 text-center">
             <img src="images/logo-footer.png" class="img-fluid" alt="logo-footer"/>
          </div>
          <div class="col-12 footer-links">
              <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#"> Privacy Policy</a></li>
                <li><a href="#"> Post a Trip </a></li>
                <li><a href="#"> Partner with Us</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
          </div>
            <div class="col-12">
                <div class="social">
                    <div class="social-sec fb">
                       <a href="">&nbsp;<i class="fab fa-facebook-f"></i> </a>
                    </div>
                    <div class="social-sec insta">
                       <a href=""><i class="fab fa-instagram"></i> </a>
                    </div>
                    <div class="social-sec twit">
                       <a href=""><i class="fab fa-twitter"></i> </a>
                    </div>
                    <div class="social-sec pin">
                       <a href=""><i class="fab fa-pinterest"></i> </a>
                    </div>
                </div>
            </div>
        </div>
           <div class="row">
              <div class="col-12 text-center text-white">
                 <small>Copyright © 2020. Trip Club India All Rights Reserved</small>
              </div>  
           </div>
       </div>
   </footer>
   
<!-- footer section ends -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="owl.carousel/js/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
@stack('scripts')
    </body>
</html>
