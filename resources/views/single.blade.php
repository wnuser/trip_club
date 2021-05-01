@extends('layouts.app')

@section('content')
<main>


<section class="category-sec">
   <div class="container">
      <div class="row">
          <div class="col-12 add-box">
              <!-- advetisement box -->
              @php  $adDetails   =  getAdsDetails(5);   @endphp
                  @if($adDetails['isRunning'])
                    <a href="{{ route('click.count', ['id'=>$adDetails['id']]) }}" target="_blank" class="d-block">
                        <img src="{{asset('Images/uploads/'.$adDetails['image'])}}" class="img-fluid" alt="">
                    </a>  
                   @endif  
          </div>
         <div class="col-lg-8 col-md-7 col-12 m-p-single">
             <div class="row">
               <div class="col-12 single-title">
                  <h2>{{$blogData['title']}}</h2>
               </div>
               <div class="col-lg-6 col-md-12 col-12">
               @php        
                     $createdBy          =   $blogData['created_at'];
                     $createdByArray     =   explode(" ", $createdBy); 
                     $newDate            =   date("F d , Y", strtotime($createdByArray[0]));
               @endphp
                  <small>{{$newDate}}</small>
               </div>
               <div class="col-lg-6 col-md-12 col-12">
                  <!-- <p class="text-right share-bx">
                    <span>Share:</span>
                    <span>
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-pinterest"></i></a>
                      <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </span>
                  </p> -->
               </div>
               <div class="col-12 blog-description">
                   <div class="single-img-box">
                       <img src="{{ asset('Images/uploads/'.$blogData['image']) }}" class="img-fluid" alt="{{ $blogData['alt_description'] }}" />
                       <small>Written By :- <span>{{ $blogData['user_name'] }}</span></small>
                   </div>

                   <p> {!! $blogData['Description'] !!} </p>
                         
                  
               </div>
               <div class="col-12">
                  <div class="comments-box">
                  @if($blogData->comment)
                     @foreach($blogData->comment as $commentValue)
                        <div class="user-box">
                        <div class="img-user">
                           <img src="{{ asset('Images/userprofilepic.png') }}" class="img-fluid" alt="user" />
                        </div>
                        <div class="user-inf">
                           <span>{{ $commentValue['name'] }}</span>
                           <h6>{{ $commentValue['comment'] }}</h6>

                           @php     $createdBy          =   $commentValue['created_at'];
                                    $createdByArray     =   explode(" ", $createdBy); 
                                    $newDate            =   date("F d , Y", strtotime($createdByArray[0]));
                           @endphp

                           <p class="n-font"><span>{{$newDate}}</span> <span><a data-toggle="collapse" href="#reply-bx1"></a></span></p>
                        </div>
                        <div class="reply-box collapse" id="reply-bx1">
                           <form action="">
                              <textarea placeholder="Type here..." required=""></textarea>
                              <button type="submit">Submit</button>
                           </form>
                        </div>
                        </div>
                        @endforeach
                  @endif
                     <form action="{{ route('post.commnet') }}" method="POST">
                      <div class="row">
                      @csrf
                         <div class="col-lg-12 col-12 mb-3">
                             <textarea class="cm-text" placeholder="Leave a comment" name="comment" required=""></textarea>
                         </div>
                         <div class="col-lg-6 col-md-12 col-12 mb-3">
                            <input type="text" name="name" placeholder="Name" required="">
                         </div>
                         <div class="col-lg-6 col-md-12 col-12 mb-3">
                            <input type="email" name="email" placeholder="Email" required="">
                            <input type="hidden" name="blogId" value="{{ $blogData['id'] }}">
                         </div>
                         <div class="col-12 mb-3">
                            <button type="submit" class="btn-comments">Post</button>
                         </div>
                      </div>
       
                     </form>

                  </div>
                  
               </div>
             </div>
             <!-- inner row -->
              
              <div class="row">
                  <div class="col-12 tite-uline mt-4">
                    <h5>most impressive</h5>
                  </div>


                  @foreach($popularBlogs as $popularValue)
                  <div class="col-lg-6 col-md-6 col-12 mb-3">
                     <div class="card shadow-sm">
                        <div class="card-img-custom">
                           <a href="{{ route('single.blog', ['id'=> $popularValue['slug']]) }}">
                           <img class="card-img" src="{{ asset('Images/uploads/'.$popularValue['image']) }}" alt="{{ $popularValue['alt_description'] }}">
                           <span class="cat-label">{{getCategoryName($popularValue['category'])}}</span>
                           </a>
                        </div>
                        <div class="card-body post-box">
                           <a href="{{ route('single.blog', ['id'=> $popularValue['slug']]) }}" target="blank">
                              <h4 class="card-title">  {{mb_strimwidth($popularValue['title'], 0, 50 , ".....") }}  </h4>
                              <p class="card-text">{{ str_limit(strip_tags($popularValue->Description,100 )) }}</p>
                           </a>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                           @php        $createdBy          =   $popularValue['created_at'];
                           $createdByArray     =   explode(" ", $createdBy); 
                           $newDate            = date("F d , Y", strtotime($createdByArray[0]));
                           @endphp
                           <div class="views">{{$newDate}}
                           </div>
                           <div class="stats">
                              <i class="far fa-eye"></i> {{ $popularValue['clicks'] }}
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
              </div>
              <!-- populer row carousel -->
            
         </div>
         <div class="col-lg-4 col-md-5 col-12">
            <div class="row">
               <div class="col-12">
                  <!-- <div class="qoute-box" style="background: url({{asset('Images/all/qoute-bg.jpg')}}) center center no-repeat; background-size: cover;">
                     <h4>Want to experience the same in real?</h4>
                     <p>Contact us for a quote, help or enquiry</p>
                     <form action="{{ route('BlogQuery.store') }}" method="POST" class="mt-5">
                       @csrf
                       <div class="row">
                          <div class="col-12 mb-3">
                              <input type="text" name="name" required="" placeholder="Name">
                              <input type="hidden" name="blog_info" value="{{ $blogData['title'] }}">
                          </div>
                          <div class="col-12 mb-3">
                              <input type="email" name="email" required="" placeholder="Email">
                          </div>
                          <div class="col-12 mb-3">
                              <input type="number" name="mobile" required="" placeholder="Mobile No">
                          </div>
                          <div class="col-12 mb-3">
                              <button type="submit" class="btn-qoute">Get a Quote</button>
                          </div>
                       </div>
                     </form>
                  </div> -->
               </div>
            </div>
            <div class="row">
               <div class="col-12">
                   <!-- advertisement box -->
                   @php  $adDetails   =  getAdsDetails(6);   @endphp
                   @if($adDetails['isRunning'])
                    <a href="{{ route('click.count', ['id'=>$adDetails['id']]) }}" target="_blank" class="d-block">
                        <img src="{{asset('Images/uploads/'.$adDetails['image'])}}" class="img-fluid" alt="">
                    </a>  
                   @endif  
               </div>
            </div>
            <!-- inner row -->
            <div class="col-12 tite-uline">
                <h5>trending blogs</h5>
            </div>
            <div class="col-12">
               <div class="owl-carousel side-carousel">
               @foreach($supperArray as $subArray)
               <div class="item">
                  @foreach($subArray as $trendingValue)
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
                           <small>Written by {{ $trendingValue['user_name'] }}</small>
                        </div>
                     </div>
                     </a>     
                  @endforeach
                  </div>

               @endforeach
                 
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
                  <h5>You Must Pay Attention</h5>
                  <hr>
               <div class=" relative-blogs-div">
                  @foreach($similarBlogs as $similarValue)
                     <div class="item">
                        <a href="{{ route('single.blog', ['id'=> $similarValue['slug']]) }}" class="d-block">
                           <div class="d-flex">
                              <div class="img-trend w-25">
                                 <img src="{{ asset('Images/uploads/'.$similarValue['image']) }}" alt="cat-img" class="img-fluid" />
                                 <div class="hover-bx">
                                    <p>   
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    </p>
                                 </div>
                              </div>
                           <div class="w-75">
                              <h6>{{ $similarValue['title'] }}</h6>
                              <small>Written by {{ $similarValue['user_name'] }}</small>
                           </div>
                          </div>
                  </div>
                  @endforeach
                  </div>
               </div>
                  
            <div class="col-12">
               <!-- advertisement box -->
               @php  $adDetails   =  getAdsDetails(7);   @endphp
                  @if($adDetails['isRunning'])
                    <a href="{{ route('click.count', ['id'=>$adDetails['id']]) }}" target="_blank" class="d-block">
                        <img src="{{asset('Images/uploads/'.$adDetails['image'])}}" class="img-fluid" alt="">
                    </a>  
                   @endif   
            </div>
         </div>
      </div>
      <!-- main row -->
   </div>
</section>

</main>
@endsection