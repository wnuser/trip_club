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
                 <input type="search" name="search" placeholder="Enter keywords here..." autofocus="autofocus">
                 <button type="submit" class="btn-search"><i class="fas fa-search"></i> </button>
              </div>
              </form>  
          </div>    
      </div>
      <div class="row">
         <div class="col-lg-8 col-md-7 col-12">
             <div class="row">
                <div class="col-12 mb-4">
                @if($result)
                  @if($result->isEmpty())
                     <h4>No Blog Found.....!</h4>
                  @else
                  <h4>Result for :- <b>{{$searchKeywords}}</b></h4>
                  @endif
               @endif   
                </div>
             </div>
             <!-- inner row -->

              <!-- post row -->
            @if($result)  
              <div class="row">
                  @foreach($result as $value)
                     <div class="col-lg-6 col-md-6 col-12 mb-3">
                        <div class="card shadow-sm">
                           <div class="card-img-custom">
                              <a href="{{ route('single.blog', ['id'=> $value['slug']]) }}">
                              <img class="card-img" src="{{ asset('Images/uploads/'.$value['image']) }}" alt="{{ $value['alt_description'] }}">
                              <span class="cat-label">{{getCategoryName($value['category'])}}</span>
                              </a>
                           </div>
                           <div class="card-body post-box">
                              <a href="{{ route('single.blog', ['id'=> $value['slug']]) }}" target="blank">
                                 <h4 class="card-title">  {{ mb_strimwidth($value['title'], 0, 50 , ".....")  }} </h4>
                                 <p class="card-text">{{ str_limit(strip_tags($value->Description,100 )) }}</p>
                              </a>
                           </div>
                           <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                              @php        $createdBy          =   $value['created_at'];
                              $createdByArray     =   explode(" ", $createdBy); 
                              $newDate            = date("F d , Y", strtotime($createdByArray[0]));
                              @endphp
                              <div class="views">{{$newDate}}
                              </div>
                              <div class="stats">
                                 <i class="far fa-eye"></i> {{ $value['clicks'] }}
                              </div>
                           </div>
                        </div>
                     </div>
                  @endforeach
              </div>
              
            @endif  

             
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