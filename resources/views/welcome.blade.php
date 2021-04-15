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
                  <span class="cat-label"> {{ getCategoryName($value['category']) }} </span>
                  <h1>{{ $value['title'] }}</h1>
                  <!-- <p><span class="date">September 20, 2020</span> / Written by <span>Ahsun ansari</span></p> -->
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
         @include('layouts.error')
         <div class="row">
            <div class="col-lg-8 col-md-7 col-12">
               <div class="row">
                  <div class="col-12 add-box">
                     <!-- advetisement box -->
                     @php  $adDetails   =  getAdsDetails(1);   @endphp
                     @if($adDetails['isRunning'])
                     <a href="{{ route('click.count', ['id'=>$adDetails['id']]) }}" target="_blank" class="d-block">
                     <img src="{{asset('Images/uploads/'.$adDetails['image'])}}" class="img-fluid" alt="">
                     </a>  
                     @endif  
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 tite-uline">
                     <h5>recent Blogs</h5>
                  </div>
                  @foreach($recentBlogs as $recentValue)
                  <div class="col-lg-6 col-md-6 col-12 mb-3">
                     <div class="card shadow-sm">
                        <div class="card-img-custom">
                           <a href="{{ route('single.blog', ['id'=> $recentValue['slug']]) }}">
                           <img class="card-img" src="{{ asset('Images/uploads/'.$recentValue['image']) }}" alt="{{ $recentValue['alt_description'] }}">
                           <span class="cat-label">{{getCategoryName($recentValue['category'])}}</span>
                           </a>
                        </div>
                        <div class="card-body post-box">
                           <a href="{{ route('single.blog', ['id'=> $recentValue['slug']]) }}" target="blank">
                              <h4 class="card-title">  {{ mb_strimwidth($recentValue['title'], 0, 50 , ".....")  }} </h4>
                              <p class="card-text">{{ str_limit(strip_tags($recentValue->Description,100 )) }}</p>
                           </a>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                           @php        $createdBy          =   $recentValue['created_at'];
                           $createdByArray     =   explode(" ", $createdBy); 
                           $newDate            = date("F d , Y", strtotime($createdByArray[0]));
                           @endphp
                           <div class="views">{{$newDate}}
                           </div>
                           <div class="stats">
                              <i class="far fa-eye"></i> {{ $recentValue['clicks'] }}
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
               <!-- inner row -->

               <div class="row">
               @foreach($defaultBlogs as $defaultValue)
                  <div class="col-lg-6 col-md-6 col-12 mb-3">
                     <div class="card shadow-sm">
                        <div class="card-img-custom">
                           <a href="{{ route('single.blog', ['id'=> $defaultValue['slug']]) }}">
                           <img class="card-img" src="{{ asset('Images/uploads/'.$defaultValue['image']) }}" alt="{{ $defaultValue['alt_description'] }}">
                           <span class="cat-label">{{getCategoryName($defaultValue['category'])}}</span>
                           </a>
                        </div>
                        <div class="card-body post-box">
                           <a href="{{ route('single.blog', ['id'=> $defaultValue['slug']]) }}" target="blank">
                              <h4 class="card-title">  {{  mb_strimwidth($defaultValue['title'], 0, 50 , ".....")  }} </h4>
                              <p class="card-text">{{ str_limit(strip_tags($defaultValue->Description,100 )) }}</p>
                           </a>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                           @php        $createdBy          =   $defaultValue['created_at'];
                           $createdByArray     =   explode(" ", $createdBy); 
                           $newDate            = date("F d , Y", strtotime($createdByArray[0]));
                           @endphp
                           <div class="views">{{$newDate}}
                           </div>
                           <div class="stats">
                              <i class="far fa-eye"></i> {{ $defaultValue['clicks'] }}
                           </div>
                        </div>
                     </div>
                  </div>

               @endforeach
               </div>
               <!-- post row -->
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
               <div class="row">
                  <div class="col-12 add-box">
                     <!-- advertisement box -->
                     <!-- <video width="400" autoplay controls>
                        <source src="{{ asset('Images/uploads/sample.mp4') }}" type="video/mp4">
                        </video> -->
                     @php  $adDetails   =  getAdsDetails(3);   @endphp
                     @if($adDetails['isRunning'])
                     <a href="{{ route('click.count', ['id'=>$adDetails['id']]) }}" target="_blank" class="d-block">
                     <img src="{{asset('Images/uploads/'.$adDetails['image'])}}" class="img-fluid" alt="">
                     </a>  
                     @endif  
                  </div>
               </div>

                  <div class="col-12 tite-uline mt-4">
                     <h5></h5>
                  </div>

               <div class="row">
                  @foreach($generalBlogs as $generalValue)
                  <!-- ad row ends -->
                  <div class="col-lg-6 col-md-6 col-12 mb-3">
                        <div class="card shadow-sm">
                           <div class="card-img-custom">
                              <a href="{{ route('single.blog', ['id'=> $generalValue['slug']]) }}">
                              <img class="card-img" src="{{ asset('Images/uploads/'.$generalValue['image']) }}" alt="{{ $generalValue['alt_description'] }}">
                              <span class="cat-label">{{getCategoryName($generalValue['category'])}}</span>
                              </a>
                           </div>
                           <div class="card-body post-box">
                              <a href="{{ route('single.blog', ['id'=> $generalValue['slug']]) }}" target="blank">
                                 <h4 class="card-title">  {{ mb_strimwidth($generalValue['title'], 0, 50 , ".....")  }} </h4>
                                 <p class="card-text">{{ str_limit(strip_tags($generalValue->Description,100 )) }}</p>
                              </a>
                           </div>
                           <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                              @php        $createdBy          =   $generalValue['created_at'];
                              $createdByArray     =   explode(" ", $createdBy); 
                              $newDate            = date("F d , Y", strtotime($createdByArray[0]));
                              @endphp
                              <div class="views">{{$newDate}}
                              </div>
                              <div class="stats">
                                 <i class="far fa-eye"></i> {{ $generalValue['clicks'] }}
                              </div>
                           </div>
                        </div>
                     </div>
                  @endforeach
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
                     @php  $adDetails   =  getAdsDetails(2);   @endphp
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
                                 <h6>{{  mb_strimwidth($trendingValue['title'], 0, 50 , ".....")  }}</h6>
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
               <div class="col-12 add-box">
                  <!-- advertisement box -->
                  @php  $adDetails   =  getAdsDetails(4);   @endphp
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