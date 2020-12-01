@extends('layouts.app')
@section('content')
<main>


<section class="category-sec">
   <div class="container">
     <div class="row">
          <div class="col-12 mb-5">
             <form action="{{ route('search') }}" method="POST">
              @csrf
             <div class="search-bx">
                 <input type="search" name="search" placeholder="SEARCH" autofocus="autofocus">
                 <button type="submit" class="btn-search"><i class="fas fa-search"></i> </button>
              </div>
              </form>  
          </div>    
      </div>
      <div class="row">
         <div class="col-lg-8 col-md-7 col-12">
             <div class="row">
                <div class="col-12 mb-4">
                  @if($result->isEmpty())
                     <h4>No Blog Found.....!</h4>
                  @else
                  <h4>Result for <b>“SEARCH”</b></h4>
                  @endif
                </div>
             </div>
             <!-- inner row -->

              <!-- post row -->
              @foreach($result as $value)
              <div class="row cat-post-list">
                 <div class="col-lg-5 col-md-12 col-12">
                     <a href="{{ route('single.blog', ['id'=> $value['slug'] ]) }}" >
                       <img src="{{ asset('Images/uploads/'.$value['image']) }}" alt="cat-img" class="img-fluid" />
                     </a>
                 </div>
                 <div class="col-lg-7 col-md-12 col-12">
                    <span class="cat-label">{{ getCategoryName($value['category']) }}  category</span>
                    <a href="{{ route('single.blog', ['id'=> $value['slug'] ]) }}" target="_blank"><h4>{{ $value['title'] }}</h4></a>
                    <div class="d-flex">
                       <div class="w-50">
                       @php      $createdBy          =   $value['created_at'];
                                 $createdByArray     =   explode(" ", $createdBy); 
                                 $newDate            =   date("F d , Y", strtotime($createdByArray[0]));
                        @endphp
                         <span>{{$newDate}}</span>
                       </div>
                       <div class="w-50 text-right">
                          <span><i class="fas fa-eye"></i>{{ $value['clicks'] }}</span>
                       </div>
                    </div>
                    <!-- it has character or words limit -->
                    <p>Was certainty sing remaining along how dare dad apply discover only. Settled opinion how enjoy so shy joy greater one. No properly day fat surprise and interest...</p>
                 </div>
              </div>
              @endforeach

             
              <!-- post row -->
         </div>
         <div class="col-lg-4 col-md-5 col-12">
            <div class="row">
               <div class="col-12">
                   <!-- advertisement box -->
                   @php  $adDetails   =  getAdsDetails(8);   @endphp
                   @if($adDetails['isRunning'])
                    <a href="{{ route('click.count', ['id'=>$adDetails['id']]) }}" target="_blank" class="d-block">
                        <img src="{{asset('Images/uploads/'.$adDetails['image'])}}" class="img-fluid" alt="">
                    </a>  
                   @endif  
               </div>
            </div>
            <!-- inner row -->
            <div class="col-12 tite-uline">
                <h5>trending now</h5>
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
                           <small>Posted by {{ $trendingValue['user_name'] }}</small>
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