@extends('layouts.app')

@section('content')

<main>
<section class="banner-listing">
   <img src="{{ asset('Images/banner/1.jpg') }}" class="img-fluid" alt="banner-listing" />
   <h2>{{ $categoryData['name'] }}</h2>
</section>

<section class="category-sec">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-7 col-12">
            @foreach($Blogs as $blogValue)
            <div class="row cat-post-list mb-3">
                 <div class="col-lg-5 col-md-12 col-12">
                     <a href="{{ route('single.blog', ['id'=> $blogValue['slug']]) }}" target="blank">
                       <img src="{{asset('Images/uploads/'.$blogValue['image'])}}" alt="{{ $blogValue['alt_description'] }}" class="img-fluid" />
                     </a>
                 </div>
                 <div class="col-lg-7 col-md-12 col-12">
                    <span class="cat-label">{{ getCategoryName($blogValue['category']) }}</span>
                    <a href="{{ route('single.blog', ['id'=> $blogValue['slug']]) }}" target="blank"><h4>{{ $blogValue['title'] }}</h4></a>
                    <div class="d-flex">
                       <div class="w-50">
                       @php     $createdBy          =   $blogValue['created_at'];
                                $createdByArray     =   explode(" ", $createdBy); 
                                $newDate            =   date("F d , Y", strtotime($createdByArray[0]));
                       @endphp
                         <span>{{$newDate}}</span>
                       </div>
                       <div class="w-50 text-right">
                          <span><i class="fas fa-eye"></i>{{ $blogValue['clicks'] }}</span>
                       </div>
                    </div>
                    <!-- it has character or words limit -->
                    <p>{{ str_limit(strip_tags($blogValue->Description,100 )) }}</p>
                 </div>
              </div>
            @endforeach
              
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
                            <img src="{{asset('Images/all/blog_min_4.jpg')}}" alt="cat-img" class="img-fluid" />
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