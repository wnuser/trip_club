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
       
        <!-- <a href="#">
          <div class="item">
           <img src="{{ asset('Images/banner/bg.jpg') }}" alt="carousel-img" class="img-fluid" />  
          <div class="carousel-caption">
              <span class="cat-label">category</span>
              <h1>Online job that skyrocket your income</h1>
              <p><span class="date">September 20, 2020</span> / Posted by <span>Ahsun ansari</span></p>
          </div>         
        </div>
        </a>
        
        <a href="#">
          <div class="item">
           <img src="{{ asset('Images/banner/1.jpg') }}" alt="carousel-img" class="img-fluid" />  
          <div class="carousel-caption">
              <span class="cat-label">category</span>
              <h1>Online job that skyrocket your income</h1>
              <p><span class="date">September 20, 2020</span> / Posted by <span>Ahsun ansari</span></p>
          </div>        
        </div>
        </a> -->
    </div>
  </div>
</section>
<!-- banner section ends -->

<section class="category-sec">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-7 col-12">
             <div class="row">
                <div class="col-12 add-box">
                   <!-- advetisement box -->
                    <img src="{{asset('Images/all/blog_min_1.jpg')}}" class="img-fluid" alt="">
                </div>
             </div>
             <div class="row">
              <div class="col-12 tite-uline">
                 <h5>recent post</h5>
              </div>
               @foreach($recentBlogs as $recentValue)
               <div class="col-lg-4 col-md-6 col-12 mb-3">
                   <div class="post-box">
                      <a href="#">
                         <div class="p-img-bx">
                            <img src="{{asset('Images/uploads/'.$recentValue['image'])}}" alt="post-thumb" class="img-fluid" />
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
                         <p><span class="date">September 20, 2020</span>  <span>Posted by {{ $recentValue['user_name'] }}</span></p>
                      </a>
                   </div>
                </div>
               @endforeach 
             </div>
             <!-- inner row -->

             @foreach($defaultBlogs as $defaultValue)

               <div class="row cat-post-list mb-3">
                  <div class="col-lg-5 col-md-12 col-12">
                        <a href="#">
                        <img src="{{ asset('Images/uploads/'. $defaultValue['image']) }}" alt="cat-img" class="img-fluid" />
                        </a>
                  </div>
                  <div class="col-lg-7 col-md-12 col-12">
                     <span class="cat-label">{{ getCategoryName($defaultValue['category']) }}</span>
                     <a href="#"><h4>{{ $defaultValue['title'] }}</h4></a>
                     <div class="d-flex">
                        <div class="w-50">
                           <span>{{ $defaultValue['created_at'] }}</span>
                        </div>
                        <div class="w-50 text-right">
                           <span><i class="fas fa-eye"></i> 800</span>
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
                                    <a href="#">
                                       <div class="p-img-bx">
                                          <img src="{{ asset('Images/uploads/'.$popularValue['image']) }}" alt="post-thumb" class="img-fluid" />
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
                                       <p><span class="date">September 20, 2020</span> <span>Posted by {{ $popularValue['user_name'] }}</span></p>
                                    </a>
                                 </div>
                              </div>
                          @endforeach
                         
                        
                     </div>
                  </div>
              </div>
              <!-- populer row carousel -->
              <div class="row">
                 <div class="col-12 add-box">
                    <!-- advertisement box -->
                    <video width="400" autoplay controls>
                       <source src="{{ asset('Images/uploads/sample.mp4') }}" type="video/mp4">
                    </video>
                 </div>
              </div>
              <!-- ad row ends -->
              <div class="row cat-post-list mb-3">
                 <div class="col-lg-5 col-md-12 col-12">
                     <a href="#">
                       <img src="{{ asset('Images/all/blog_min_4.jpg') }}" alt="cat-img" class="img-fluid" />
                     </a>
                 </div>
                 <div class="col-lg-7 col-md-12 col-12">
                    <span class="cat-label">category</span>
                    <a href="#"><h4>Hit the road, Jack: ’20: Legacy’ casts Rodriguez Hawkins in Thomas</h4></a>
                    <div class="d-flex">
                       <div class="w-50">
                         <span>September 20, 2020</span>
                       </div>
                       <div class="w-50 text-right">
                          <span><i class="fas fa-eye"></i> 800</span>
                       </div>
                    </div>
                    <!-- it has character or words limit -->
                    <p>Was certainty sing remaining along how dare dad apply discover only. Settled opinion how enjoy so shy joy greater one. No properly day fat surprise and interest...</p>
                 </div>
              </div>
              <!-- post row -->
              <div class="row cat-post-list mb-3">
                 <div class="col-lg-5 col-md-12 col-12">
                     <a href="#">
                       <img src="{{ asset('Images/all/blog_min_4.jpg') }}" alt="cat-img" class="img-fluid" />
                     </a>
                 </div>
                 <div class="col-lg-7 col-md-12 col-12">
                    <span class="cat-label">category</span>
                    <a href="#"><h4>Hit the road, Jack: ’20: Legacy’ casts Rodriguez Hawkins in Thomas</h4></a>
                    <div class="d-flex">
                       <div class="w-50">
                         <span>September 20, 2020</span>
                       </div>
                       <div class="w-50 text-right">
                          <span><i class="fas fa-eye"></i> 800</span>
                       </div>
                    </div>
                    <!-- it has character or words limit -->
                    <p>Was certainty sing remaining along how dare dad apply discover only. Settled opinion how enjoy so shy joy greater one. No properly day fat surprise and interest...</p>
                 </div>
              </div>
              <!-- post row -->
              <div class="row cat-post-list mb-3">
                 <div class="col-lg-5 col-md-12 col-12">
                     <a href="#">
                       <img src="Images/all/blog_min_4.jpg" alt="cat-img" class="img-fluid" />
                     </a>
                 </div>
                 <div class="col-lg-7 col-md-12 col-12">
                    <span class="cat-label">category</span>
                    <a href="#"><h4>Hit the road, Jack: ’20: Legacy’ casts Rodriguez Hawkins in Thomas</h4></a>
                    <div class="d-flex">
                       <div class="w-50">
                         <span>September 20, 2020</span>
                       </div>
                       <div class="w-50 text-right">
                          <span><i class="fas fa-eye"></i> 800</span>
                       </div>
                    </div>
                    <!-- it has character or words limit -->
                    <p>Was certainty sing remaining along how dare dad apply discover only. Settled opinion how enjoy so shy joy greater one. No properly day fat surprise and interest...</p>
                 </div>
              </div>
              <!-- post row -->
              <div class="row">
                 <div class="col-12 text-center mt-3 mb-5">
                     <a href="#"><button type="button" class="btn-custom-reverse">view more</button></a>
                 </div>
              </div>
         </div>
         <div class="col-lg-4 col-md-5 col-12">
            <div class="row">
               <div class="col-12 add-box">
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
                           <small>Posted by {{ $trendingValue['user_name'] }}</small>
                        </div>
                     </div>
                     </a>     
                  @endforeach
                    
                    
                  </div>
                  <!-- item -->
                   <div class="item">
                     <a href="#" class="d-block">
                       <div class="d-flex">
                        <div class="img-trend w-25">
                            <img src="Images/all/blog_min_1.jpg" alt="cat-img" class="img-fluid" />
                            <div class="hover-bx">
                                 <p>
                                 <span></span>
                                 <span></span>
                                 <span></span>
                                 </p>
                              </div>
                        </div>
                        <div class="w-75">
                           <h6>10 Museums that will blow your Child’s Mind</h6>
                           <small>Posted by Ahsun ansari</small>
                        </div>
                     </div>
                     </a>
                     <a href="#" class="d-block">
                       <div class="d-flex">
                        <div class="img-trend w-25">
                            <img src="Images/all/blog_min_4.jpg" alt="cat-img" class="img-fluid" />
                            <div class="hover-bx">
                                 <p>
                                 <span></span>
                                 <span></span>
                                 <span></span>
                                 </p>
                              </div>
                        </div>
                        <div class="w-75">
                           <h6>10 Museums that will blow your Child’s Mind</h6>
                           <small>Posted by Ahsun ansari</small>
                        </div>
                     </div>
                     </a>
                     <a href="#" class="d-block">
                       <div class="d-flex">
                        <div class="img-trend w-25">
                            <img src="Images/all/blog_min_3.jpg" alt="cat-img" class="img-fluid" />
                            <div class="hover-bx">
                                 <p>
                                 <span></span>
                                 <span></span>
                                 <span></span>
                                 </p>
                              </div>
                        </div>
                        <div class="w-75">
                           <h6>10 Museums that will blow your Child’s Mind</h6>
                           <small>Posted by Ahsun ansari</small>
                        </div>
                     </div>
                     </a>
                     <a href="#" class="d-block">
                       <div class="d-flex">
                        <div class="img-trend w-25">
                            <img src="Images/all/blog_min_2.jpg" alt="cat-img" class="img-fluid" />
                            <div class="hover-bx">
                                 <p>
                                 <span></span>
                                 <span></span>
                                 <span></span>
                                 </p>
                              </div>
                        </div>
                        <div class="w-75">
                           <h6>10 Museums that will blow your Child’s Mind</h6>
                           <small>Posted by Ahsun ansari</small>
                        </div>
                     </div>
                     </a>
                  </div>
                  <!-- item -->
                   <div class="item">
                     <a href="#" class="d-block">
                       <div class="d-flex">
                        <div class="img-trend w-25">
                            <img src="Images/all/blog_min_1.jpg" alt="cat-img" class="img-fluid" />
                            <div class="hover-bx">
                                 <p>
                                 <span></span>
                                 <span></span>
                                 <span></span>
                                 </p>
                              </div>
                        </div>
                        <div class="w-75">
                           <h6>10 Museums that will blow your Child’s Mind</h6>
                           <small>Posted by Ahsun ansari</small>
                        </div>
                     </div>
                     </a>
                     <a href="#" class="d-block">
                       <div class="d-flex">
                        <div class="img-trend w-25">
                            <img src="Images/all/blog_min_2.jpg" alt="cat-img" class="img-fluid" />
                            <div class="hover-bx">
                                 <p>
                                 <span></span>
                                 <span></span>
                                 <span></span>
                                 </p>
                              </div>
                        </div>
                        <div class="w-75">
                           <h6>10 Museums that will blow your Child’s Mind</h6>
                           <small>Posted by Ahsun ansari</small>
                        </div>
                     </div>
                     </a>
                     <a href="#" class="d-block">
                       <div class="d-flex">
                        <div class="img-trend w-25">
                            <img src="Images/all/blog_min_3.jpg" alt="cat-img" class="img-fluid" />
                            <div class="hover-bx">
                                 <p>
                                 <span></span>
                                 <span></span>
                                 <span></span>
                                 </p>
                              </div>
                        </div>
                        <div class="w-75">
                           <h6>10 Museums that will blow your Child’s Mind</h6>
                           <small>Posted by Ahsun ansari</small>
                        </div>
                     </div>
                     </a>
                     <a href="#" class="d-block">
                       <div class="d-flex">
                        <div class="img-trend w-25">
                            <img src="Images/all/blog_min_4.jpg" alt="cat-img" class="img-fluid" />
                            <div class="hover-bx">
                                 <p>
                                 <span></span>
                                 <span></span>
                                 <span></span>
                                 </p>
                              </div>
                        </div>
                        <div class="w-75">
                           <h6>10 Museums that will blow your Child’s Mind</h6>
                           <small>Posted by Ahsun ansari</small>
                        </div>
                     </div>
                     </a>
                  </div>
                  <!-- item -->
               </div>
            </div>

            <div class="col-12">
               <div class="signup-box">
                  <h3>GET TRIP CLUB INDIA IN YOUR INBOX</h3>
                  <p>Get our best stuff sent straight to you!</p>
                  <form action="">
                     <div class="form-group">
                        <input type="email" name="mail" placeholder="Enter your email" required="required">
                     </div>
                      <div class="form-group mb-0">
                         <button type="submit" class="btn-link">Subscribe Now</button>
                      </div>
                      <input type="checkbox" name="remember" id="check"> <label for="check">I have read and agree to the Privacy Policy</label>
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

            <div class="col-12 add-box">
               <!-- advertisement box -->
            </div>
         </div>
      </div>
      <!-- main row -->
   </div>
</section>

</main>

@endsection