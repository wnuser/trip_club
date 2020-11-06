@extends('layouts.app')

@section('content')

<main>
<!-- main top section starts -->
<section class="banner-sec">
   <div class="owl-carousel main-slider">
       
       @foreach($frontSlider as $value)
         <a href="{{ $value['hyper_link'] }}" target="_blank">
            <div class="item">
            <img src="{{ asset('Images/uploads/'.$value['image']) }}" alt="carousel-img" class="img-fluid" />  
            <div class="carousel-caption">
               <span class="cat-label"> {{ getCategoryName($value['id']) }} </span>
               <h1>{{ $value['title'] }}</h1>
               <p><span class="date">September 20, 2020</span> / Posted by <span>Ahsun ansari</span></p>
            </div>      
         </div>
         </a>
       @endforeach
       
     
    </div>
  </div>
</section>
<!-- banner section ends -->

<section class="category-sec">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-7 col-12">
             <div class="row">
                <div class="col-12">
                   <!-- advetisement box -->
                    <!-- <img src="{{asset('Images/all/blog_min_1.jpg')}}" class="img-fluid" alt=""> -->
                </div>
             </div>
             <div class="row">
              <div class="col-12 tite-uline">
                 <h5>recent post</h5>
              </div>
               @foreach($recentBlogs as $recentValue)
               <div class="col-lg-4 col-md-6 col-12 mb-3">
                  <div class="post-box">
                      <a href="{{ route('single.blog', ['id'=> $recentValue['slug']]) }}" target="blank">
                         <div class="p-img-bx">
                            <img src="{{asset('Images/uploads/'.$recentValue['image'])}}" alt="{{$recentValue['alt_description']}}" class="img-fluid" />
                            <div class="hover-bx">
                               <p>
                               <span></span>
                               <span></span>
                               <span></span>
                               </p>
                            </div>
                         </div>
                         <span class="cat-label">{{getCategoryName($recentValue['category'])}}</span>
                         <h4>{{ $recentValue['title'] }}</h4>
                         @php    $createdBy          =   $recentValue['created_at'];
                                 $createdByArray     =   explode(" ", $createdBy); 
                                 $newDate            = date("F d , Y", strtotime($createdByArray[0]));
                                 @endphp

                         <p><span class="date">{{$newDate}}</span>  <span>Posted by {{ $recentValue['user_name'] }}</span></p>
                      </a>
                   </div>
                </div>
               @endforeach 
             </div>
             <!-- inner row -->

             @foreach($defaultBlogs as $defaultValue)

               <div class="row cat-post-list mb-3">
                  <div class="col-lg-5 col-md-12 col-12">
                        <a href="{{ route('single.blog', ['id'=>$defaultValue['slug'] ]) }}"  target="blank">
                        <img src="{{ asset('Images/uploads/'. $defaultValue['image']) }}" alt="{{$defaultValue['alt_description']}}" class="img-fluid" />
                        </a>
                  </div>
                  <div class="col-lg-7 col-md-12 col-12">
                     <span class="cat-label">{{ getCategoryName($defaultValue['category']) }}</span>
                     <a href="{{ route('single.blog', ['id'=>$defaultValue['slug'] ]) }}" target="blank"><h4>{{ $defaultValue['title'] }}</h4></a>
                     <div class="d-flex">
                        <div class="w-50">
                        @php    $createdBy          =   $defaultValue['created_at'];
                                 $createdByArray     =   explode(" ", $createdBy); 
                                 $newDate            = date("F d , Y", strtotime($createdByArray[0]));
                                 @endphp
                           <span>{{ $newDate }}</span>
                        </div>
                        <div class="w-50 text-right">
                           <span><i class="fas fa-eye"></i>{{ $defaultValue['clicks'] }}</span>
                        </div>
                     </div>
                     <p> {{ str_limit(strip_tags($defaultValue->Description,100 )) }}</p>
                  </div>
               </div>

             @endforeach

              <!-- post row -->
              <div class="row">
                  <div class="col-12 tite-uline mt-4">
                    <h5>most populer</h5>
                  </div>
                  <div class="col-12">
                     <div class="owl-carousel populer-slider">
                          @foreach($popularBlogs as $popularValue)
                              <div class="item">
                                    <div class="post-box">
                                    <a href="{{ route('single.blog', ['id'=> $popularValue['slug']]) }}" target="blank">
                                       <div class="p-img-bx">
                                          <img src="{{ asset('Images/uploads/'.$popularValue['image']) }}" alt="{{$popularValue['alt_description']}}" class="img-fluid" />
                                          <div class="hover-bx">
                                             <p>
                                             <span></span>
                                             <span></span>
                                             <span></span>
                                             </p>
                                          </div>
                                       </div>
                                       <span class="cat-label">{{getCategoryName($popularValue['category'])}}</span>
                                       <h4>{{ $popularValue['title'] }}</h4>
                                       @php    $createdBy          =   $defaultValue['created_at'];
                                                $createdByArray     =   explode(" ", $createdBy); 
                                                $newDate            = date("F d , Y", strtotime($createdByArray[0]));
                                                @endphp
                                       <p><span class="date">{{$newDate}}</span> <span>Posted by {{ $popularValue['user_name'] }}</span></p>
                                    </a>
                                 </div>
                              </div>
                          @endforeach
                         
                     </div>
                  </div>
              </div>
              <!-- populer row carousel -->
              <div class="row">
                 <div class="col-12">
                    <!-- advertisement box -->
                 </div>
              </div>
              @foreach($generalBlogs as $generalValue)
               <!-- ad row ends -->
                  <div class="row cat-post-list mb-3">
                  <div class="col-lg-5 col-md-12 col-12">
                        <a href="{{ route('single.blog',['id'=> $generalValue['slug'] ]) }}" target="blank">
                        <img src="{{ asset('Images/uploads/'.$generalValue['image']) }}" alt="{{ $generalValue['alt_description'] }}" class="img-fluid" />
                        </a>
                  </div>
                  <div class="col-lg-7 col-md-12 col-12">
                     <span class="cat-label">{{ getCategoryName($generalValue['category']) }}</span>
                     <a href="{{ route('single.blog',['id'=> $generalValue['slug'] ]) }}" target="blank"><h4>{{ $generalValue['title'] }}</h4></a>
                     <div class="d-flex">
                        <div class="w-50">
                        @php     $createdBy          =   $defaultValue['created_at'];
                                 $createdByArray     =   explode(" ", $createdBy); 
                                 $newDate            =   date("F d , Y", strtotime($createdByArray[0]));
                                                @endphp
                           <span>{{$newDate}}</span>
                        </div>
                        <div class="w-50 text-right">
                           <span><i class="fas fa-eye"></i>{{ $generalValue['clicks'] }}</span>
                        </div>
                     </div>
                     <!-- it has character or words limit -->
                     <p>{{ str_limit(strip_tags($generalValue->Description,100 )) }} </p>
                  </div>
               </div>
              @endforeach
             
             
              <!-- post row -->
              <div class="row">
                 <div class="col-12 text-center mt-3 mb-5">
                     <a href="#"><button type="button" class="btn-custom-reverse">view more</button></a>
                 </div>
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
                <h5>trending now</h5>
            </div>
            <div class="col-12">
               <div class="owl-carousel side-carousel">
                  <div class="item">

                  @foreach($trendingBlogs as $trendingValue)
                     <a href="{{ route('single.blog', ['id'=> $trendingValue['slug'] ]) }}" target="blank" class="d-block">
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
                           <small>Posted by {{ $trendingValue['user_name'] }}</small>
                        </div>
                     </div>
                     </a>     
                  @endforeach
                    
                  </div>
               </div>
            </div>

            <div class="col-12">
               <div class="signup-box">
                  <h3>GET TRIP CLUB INDIA IN YOUR INBOX</h3>
                  <p>Get our best stuff sent straight to you!</p>
                  <form action="{{ route('Subscribe.store') }}" method="POST">
                     @csrf
                     <div class="form-group">
                        <input type="email" name="email" placeholder="Enter your email" required="required">
                     </div>
                     <input type="checkbox" name="remember" id="check"> <label for="check">I have read and agree to the Privacy Policy</label>
                      <div class="form-group mb-0">
                         <button type="submit" class="btn-link">Subscribe Now</button>
                      </div>
                  </form>
               </div>
            </div>

            <div class="col-12 text-center my-5">
               <div class="label-cat-fancy">
                   <span>CATEGORIES</span>
               </div>
               <div class="links-cat">
                  @foreach($categories as $catValue)
                     <a href="{{route('category.blogs', ['id'=> $catValue['id']])}}">{{$catValue['name']}}</a>
                  @endforeach
               </div>
            </div>

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