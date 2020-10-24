@extends('layouts.adminApp')

@section('content')
<main>


<section class="category-sec">
   <div class="container">
     <div class="row">
          <div class="col-12 mb-5">
             <div class="search-bx">
                 <input type="search" name="search" placeholder="SEARCH" autofocus="autofocus">
                 <button type="submit" class="btn-search"><i class="fas fa-search"></i> </button>
              </div>
          </div>    
      </div>
      <div class="row">
         <div class="col-lg-8 col-md-7 col-12">
             <div class="row">
                <div class="col-12 mb-4">
                   <h4>Result for <b>“SEARCH”</b></h4>
                </div>
             </div>
             <!-- inner row -->
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
              <div class="row cat-post-list">
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
                     <a href="#" class="d-block">
                       <div class="d-flex">
                        <div class="img-trend w-25">
                            <img src="images/all/blog_min_4.jpg" alt="cat-img" class="img-fluid" />
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
                            <img src="images/all/blog_min_2.jpg" alt="cat-img" class="img-fluid" />
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
                            <img src="images/all/blog_min_1.jpg" alt="cat-img" class="img-fluid" />
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
                            <img src="images/all/blog_min_4.jpg" alt="cat-img" class="img-fluid" />
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
                            <img src="images/all/blog_min_1.jpg" alt="cat-img" class="img-fluid" />
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
                            <img src="images/all/blog_min_4.jpg" alt="cat-img" class="img-fluid" />
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
                            <img src="images/all/blog_min_3.jpg" alt="cat-img" class="img-fluid" />
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
                            <img src="images/all/blog_min_2.jpg" alt="cat-img" class="img-fluid" />
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
                            <img src="images/all/blog_min_1.jpg" alt="cat-img" class="img-fluid" />
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
                            <img src="images/all/blog_min_2.jpg" alt="cat-img" class="img-fluid" />
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
                            <img src="images/all/blog_min_3.jpg" alt="cat-img" class="img-fluid" />
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
                            <img src="images/all/blog_min_4.jpg" alt="cat-img" class="img-fluid" />
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
                   <a href="#">Adventure</a>
                   <a href="#">Beaches</a>
                   <a href="#">Family</a>
                   <a href="#">Hill Station</a>
                   <a href="#">Historical</a>
                   <a href="#">Honeymoon</a>
                   <a href="#">Pilgrimage</a>
                   <a href="#">Roadtrips</a>
                   <a href="#">Solo</a>
                   <a href="#">Tourist Places</a>
                   <a href="#">Trekking</a>
                   <a href="#">Wildlife</a>
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