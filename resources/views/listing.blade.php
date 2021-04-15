@extends('layouts.app')

@section('content')

<main>
<section class="banner-listing">
   <img src="{{ asset('Images/categories/'.$categoryData['image']) }}" class="img-fluid" alt="banner-listing" />
   <h2>{{ $categoryData['name'] }}</h2>      
</section>

<section class="category-sec">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-7 col-12">
            <div class="row">
            @foreach($Blogs as $blogValue)
               <div class="col-lg-6 col-md-6 col-12 mb-3">
                  <div class="card shadow-sm">
                        <div class="card-img-custom">
                           <a href="{{ route('single.blog', ['id'=> $blogValue['slug']]) }}">
                           <img class="card-img" src="{{ asset('Images/uploads/'.$blogValue['image']) }}" alt="{{ $blogValue['alt_description'] }}">
                           <span class="cat-label">{{getCategoryName($blogValue['category'])}}</span>
                           </a>
                        </div>
                        <div class="card-body post-box">
                           <a href="{{ route('single.blog', ['id'=> $blogValue['slug']]) }}" target="blank">
                              <h4 class="card-title">  {{ mb_strimwidth($blogValue['title'], 0, 50 , ".....")  }} </h4>
                              <p class="card-text">{{ str_limit(strip_tags($blogValue->Description,100 )) }}</p>
                           </a>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                           @php        $createdBy          =   $blogValue['created_at'];
                           $createdByArray     =   explode(" ", $createdBy); 
                           $newDate            = date("F d , Y", strtotime($createdByArray[0]));
                           @endphp
                           <div class="views">{{$newDate}}
                           </div>
                           <div class="stats">
                              <i class="far fa-eye"></i> {{ $blogValue['clicks'] }}
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
            </div>
           
         </div>
         <div class="col-lg-4 col-md-5 col-12">
            <div class="row">
               <div class="col-12">
                   <!-- advertisement box -->
               </div>
            </div>
            <!-- inner row -->
            <div class="col-12 tite-uline">
                <h5>trending blogs</h5>
            </div>
            <div class="col-12">
               <div class="owl-carousel side-carousel">
                  <div class="item">
                  @foreach($trendingBlogs as $trendingValue)
                     <a href="#" class="d-block">
                       <div class="d-flex">
                        <div class="img-trend w-25">
                            <img src="{{ asset('Images/uploads/'.$trendingValue['image']) }}" alt="cat-img" class="img-fluid" />
                            <div class="hover-bx">
                                 <p>
                                 <span></span>
                                 <span></span>
                                 <span></span>
                                 </p>
                              </div>
                        </div>
                        <div class="w-75">
                           <h6>{{ $trendingValue['title'] }}</h6>
                           <small>Written by {{ $trendingValue['user_name'] }}</small>
                        </div>
                     </div>
                     </a>     
                  @endforeach
                     
                  </div>
               
               </div>
            </div>

            <div class="col-12">
               <div class="signup-box">
                     <h3>SUBSCRIBE US FOR LATEST LIFESTYLE BLOGS</h3>
                     <p></p>
                     <form action="{{ route('Subscribe.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                           <input type="email"  class="form-control" name="email" placeholder="Enter your email" required="required">
                        </div>
                        <div class="form-group mb-0">
                           <center>
                           <button type="submit" class="btn " style="background-color:#293745; color:white"><i class="fa fa-paper-plane"></i> Subscribe </button>
                           </center>
                        </div>
                     </form>
                  </div>
            </div>
            <div class="col-12">
            <!-- <div class="sign-up-container">
               <div class="envelope">
                  <div class="paper">
                     <h1>Subscribe our Newslatter</h1>
                     <form class="sign-up-form">
                     <input type="text" placeholder="Email" class="text-input"/>
                     <button type="submit" class="button">Sign up</button>
                     </form>
                  </div>
                  <div class="bottom-flap"></div>
               </div>
               <div class="thanks-text"> <span>Thanks for subscribing</span></div>
            </div> -->

            </div>

            <!-- <div class="col-12 text-center my-5">
               <div class="label-cat-fancy">
                   <span>CATEGORIES</span>
               </div>
               <div class="links-cat">
               @foreach($categories as $catValue)
                     <a href="{{route('category.blogs', ['id'=> $catValue['id']])}}">{{$catValue['name']}}</a>
                  @endforeach
               </div>
            </div> -->

            <div class="col-12">
               <!-- advertisement box -->
            </div>
         </div>
      </div>
      <!-- main row -->
   </div>
</section>

</main>


@endsection