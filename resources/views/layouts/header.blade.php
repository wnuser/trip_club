<header class="bg-white">
   <div class="container">
      <nav class="navbar navbar-expand-lg bg-white">
         <!--  Show this only on mobile to medium screens  -->
         <li class="nav-item mob-top d-lg-none">
            <a class="nav-link" data-toggle="modal" href="#pop-search"><i class="fas fa-search"></i></a>
         </li>
         <a class="navbar-brand d-lg-none mob-centred-logo" href="{{ route('Home') }}"><img src="{{ asset('Images/healthlogo.png') }}" alt="logo"/> </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
         <span class="fa fa-bars"></span>
         </button>
         <!--  Used flexbox utility classes to change how the child elements are justified  -->
         <div class="collapse navbar-collapse justify-content-between" id="navbarToggle">
           <a class="navbar-brand d-none d-lg-block " href="{{ route('Home') }}"><img src="{{ asset('Images/healthlogo.png') }}" alt="logo"/></a>
            <ul class="navbar-nav mr-right" >
               <li class="nav-item">
                  <a class="nav-link active" href="{{route('Home')}}">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('category.blogs', ['id'=>3]) }}">HEALTH CARE</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('category.blogs', ['id'=>4]) }}">FASHION & LIFESTYLE</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('category.blogs', ['id'=>5]) }}">FITNESS</a>
               </li>
               <!-- <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="dropdownMenuButton" data-toggle="dropdown">inspirations <i class="fas fa-angle-down"></i></a> 
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <a class="dropdown-item" href="{{ route('category.blogs', ['id'=>3]) }}" target="blank">Adventure</a>
                     <a class="dropdown-item" href="{{ route('category.blogs', ['id'=>7]) }}" target="blank">Historical</a>
                     <a class="dropdown-item" href="{{ route('category.blogs', ['id'=>9]) }}" target="blank">Pilgrimage</a>
                     <a class="dropdown-item" href="{{ route('category.blogs', ['id'=>12]) }}" target="blank">Tourist Hub</a>
                     <a class="dropdown-item" href="{{ route('category.blogs', ['id'=>13]) }}" target="blank">Trekking</a>
                     <a class="dropdown-item" href="{{ route('all.categories') }}">All Categories</a>

                  </div>
               </li> -->
               <li class="nav-item d-mob-none">
                  <a class="nav-link" data-toggle="modal" href="#pop-search"><i class="fas fa-search"></i></a>
               </li>
            </ul>
            <!--   Show this only lg screens and up   -->
            <!-- <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link btn-nav" data-toggle="modal" href="#pop-trip">post a trip</a>
               </li>
            </ul> -->
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
                     <div class="col-lg-12 col-md-12 col-12">
                        <!-- <h4 class="text-center mb-4">FIND PERFECT BLOG</h4> -->
                        <form action="{{ route('search') }}" method="POST">
                           <div class="search-bx">
                              @csrf
                              <input type="search" name="search" placeholder="Enter keywords here..." autofocus="autofocus">
                              <button type="submit" class="btn-search"><i class="fas fa-search"></i> </button>
                           </div>
                        </form>
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
   <div class="modal-dialog" role="document" style="background: url('Images/all/form_background.jpg') center center no-repeat; background-size: cover;">
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
                        <img src="{{ asset('Images/logo-trans.svg') }}" class="img-fluid" alt="logo" />
                     </div>
                     <form action="{{ route('user.blog.post') }}" method="POST" enctype="multipart/form-data">

                     @csrf
                     <div class="form-bx-modal row">
                           <div class="col-12 mb-3">
                              <input type="text" name="user_name" placeholder="Name" required="" />
                           </div>
                           <div class="col-12 mb-3">
                              <input type="text" name="title" placeholder="Title" required="" />
                           </div>
                           <div class="col-12 mb-3">
                              <select name="category">
                              @php  $allCategories    =  allCategories();   @endphp 
                              @foreach($allCategories as $value)
                                 <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                              @endforeach
                              </select>
                           </div>
                           <div class="col-12 mb-3">
                              <textarea name="Description" placeholder="Type your story..." id="message_description"></textarea>
                           </div>
                           <div class="col-12 mb-3">
                              <input type="file" name="image" id="choose">
                              <label for="choose" class="choose-file-label">Add photo <span><i class="fas fa-paperclip"></i></span></label>
                           </div>
                           <div class="col-12 mb-5 text-center">
                              <button type="submit">Publish</button>
                           </div>
                     </div>
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>