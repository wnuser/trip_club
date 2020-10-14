<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- <link rel="stylesheet" type="text/css" href="owl.carousel/css/owl.carousel.css"/> -->
  <!-- <link rel="stylesheet" type="text/css" href="owl.carousel/css/owl.theme.default.css"/> -->
	<!-- custom style -->
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>



<header class="bg-white">
   <div class="container">
      <nav class="navbar navbar-expand-lg bg-white">

<!--  Show this only on mobile to medium screens  -->
      <li class="nav-item mob-top d-lg-none">
        <a class="nav-link" data-toggle="modal" href="#pop-search"><i class="fas fa-search"></i></a>
      </li>
  <a class="navbar-brand d-lg-none mob-centred-logo" href="index.html"><img src="images/logo-trans.svg" alt="logo"/> </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fa fa-bars"></span>
  </button>

<!--  Used flexbox utility classes to change how the child elements are justified  -->
  <div class="collapse navbar-collapse justify-content-between" id="navbarToggle">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="index.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">about</a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="dropdownMenuButton" data-toggle="dropdown">inspirations <i class="fas fa-angle-down"></i></a> 
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
      </li>
      <li class="nav-item d-mob-none">
        <a class="nav-link" data-toggle="modal" href="#pop-search"><i class="fas fa-search"></i></a>
      </li>
    </ul>
    
    
<!--   Show this only lg screens and up   -->
    <a class="navbar-brand d-none d-lg-block center-logo-desk" href="index.html"><img src="images/logo-trans.svg" alt="logo"/></a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link btn-nav" data-toggle="modal" href="#pop-trip">post a trip</a>
      </li>
    </ul>
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
                 <div class="col-lg-8 col-md-9 col-11">
                  <h4 class="text-center mb-4">FIND YOUR WAY!</h4>
                      <div class="search-bx">
                         <input type="search" name="search" placeholder="SEARCH" autofocus="autofocus">
                         <button type="submit" class="btn-search"><i class="fas fa-search"></i> </button>
                      </div>
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
  <div class="modal-dialog" role="document" style="background: url('images/all/form_background.jpg') center center no-repeat; background-size: cover;">
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
                       <img src="images/logo-trans.svg" class="img-fluid" alt="logo" />
                    </div>
                    <div class="form-bx-modal row">
                         <div class="col-12 mb-3">
                             <input type="text" name="name" placeholder="Name" required="" />
                         </div>
                         <div class="col-12 mb-3">
                             <input type="text" name="title" placeholder="Title" required="" />
                         </div>
                         <div class="col-12 mb-3">
                             <select>
                               <option>Category</option>
                               <option>Category</option>
                               <option>Category</option>
                               <option>Category</option>
                             </select>
                         </div>
                         <div class="col-12 mb-3">
                            <textarea placeholder="Type your story..."></textarea>
                         </div>
                         <div class="col-12 mb-3">
                            <input type="file" name="choose" id="choose">
                            <label for="choose" class="choose-file-label">Add photos/Videos <span><i class="fas fa-paperclip"></i></span></label>
                         </div>
                         <div class="col-12 mb-5 text-center">
                            <button type="submit">Publish</button>
                         </div>
                    </div>
                 </div>
           </div>
      </div>
    </div>
  </div>
</div>

</header>
<main>
<!-- main top section starts -->
<section class="banner-sec">
   <div class="owl-carousel main-slider">
       <a href="#">
         <div class="item">
          <img src="images/banner/1.jpg" alt="carousel-img" class="img-fluid" />  
          <div class="carousel-caption">
              <span class="cat-label">category</span>
              <h1>Online job that skyrocket your income</h1>
              <p><span class="date">September 20, 2020</span> / Posted by <span>Ahsun ansari</span></p>
          </div>      
        </div>
       </a>
        <a href="#">
          <div class="item">
           <img src="images/banner/bg.jpg" alt="carousel-img" class="img-fluid" />  
          <div class="carousel-caption">
              <span class="cat-label">category</span>
              <h1>Online job that skyrocket your income</h1>
              <p><span class="date">September 20, 2020</span> / Posted by <span>Ahsun ansari</span></p>
          </div>         
        </div>
        </a>
        
        <a href="#">
          <div class="item">
           <img src="images/banner/1.jpg" alt="carousel-img" class="img-fluid" />  
          <div class="carousel-caption">
              <span class="cat-label">category</span>
              <h1>Online job that skyrocket your income</h1>
              <p><span class="date">September 20, 2020</span> / Posted by <span>Ahsun ansari</span></p>
          </div>        
        </div>
        </a>
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
                </div>
             </div>
             <div class="row">
              <div class="col-12 tite-uline">
                 <h5>recent post</h5>
              </div>
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                   <div class="post-box">
                      <a href="#">
                         <div class="p-img-bx">
                            <img src="images/all/blog_min_1.jpg" alt="post-thumb" class="img-fluid" />
                            <div class="hover-bx">
                               <p>
                               <span></span>
                               <span></span>
                               <span></span>
                               </p>
                            </div>
                         </div>
                         <span class="cat-label">category</span>
                         <h4>Envy of the World(A Blues for Terry Adkins)</h4>
                         <p><span class="date">September 20, 2020</span>  <span>Posted by Ahsun ansari</span></p>
                      </a>
                   </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                   <div class="post-box">
                      <a href="#">
                         <div class="p-img-bx">
                            <img src="images/all/blog_min_2.jpg" alt="post-thumb" class="img-fluid" />
                            <div class="hover-bx">
                               <p>
                               <span></span>
                               <span></span>
                               <span></span>
                               </p>
                            </div>
                         </div>
                         <span class="cat-label">category</span>
                         <h4>Envy of the World(A Blues for Terry Adkins)</h4>
                         <p><span class="date">September 20, 2020</span>  <span>Posted by Ahsun ansari</span></p>
                      </a>
                   </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                   <div class="post-box">
                      <a href="#">
                         <div class="p-img-bx">
                            <img src="images/all/blog_min_3.jpg" alt="post-thumb" class="img-fluid" />
                            <div class="hover-bx">
                               <p>
                               <span></span>
                               <span></span>
                               <span></span>
                               </p>
                            </div>
                         </div>
                         <span class="cat-label">category</span>
                         <h4>Envy of the World(A Blues for Terry Adkins)</h4>
                         <p><span class="date">September 20, 2020</span>  <span>Posted by Ahsun ansari</span></p>
                      </a>
                   </div>
                </div>
             </div>
             <!-- inner row -->
              <div class="row cat-post-list mb-3">
                 <div class="col-lg-5 col-md-12 col-12">
                     <a href="#">
                       <img src="images/all/blog_min_4.jpg" alt="cat-img" class="img-fluid" />
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
                       <img src="images/all/blog_min_4.jpg" alt="cat-img" class="img-fluid" />
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
                  <div class="col-12 tite-uline mt-4">
                    <h5>most populer</h5>
                  </div>
                  <div class="col-12">
                     <div class="owl-carousel populer-slider">
                          <div class="item">
                              <div class="post-box">
                                <a href="#">
                                   <div class="p-img-bx">
                                      <img src="images/all/blog_min_1.jpg" alt="post-thumb" class="img-fluid" />
                                      <div class="hover-bx">
                                         <p>
                                         <span></span>
                                         <span></span>
                                         <span></span>
                                         </p>
                                      </div>
                                   </div>
                                   <span class="cat-label">category</span>
                                   <h4>Envy of the World(A Blues for Terry Adkins)</h4>
                                   <p><span class="date">September 20, 2020</span> <span>Posted by Ahsun ansari</span></p>
                                </a>
                             </div>
                          </div>
                          <div class="item">
                              <div class="post-box">
                                <a href="#">
                                   <div class="p-img-bx">
                                      <img src="images/all/blog_min_2.jpg" alt="post-thumb" class="img-fluid" />
                                      <div class="hover-bx">
                                         <p>
                                         <span></span>
                                         <span></span>
                                         <span></span>
                                         </p>
                                      </div>
                                   </div>
                                   <span class="cat-label">category</span>
                                   <h4>Envy of the World(A Blues for Terry Adkins)</h4>
                                   <p><span class="date">September 20, 2020</span> <span>Posted by Ahsun ansari</span></p>
                                </a>
                             </div>
                          </div>
                          <div class="item">
                              <div class="post-box">
                                <a href="#">
                                   <div class="p-img-bx">
                                      <img src="images/all/blog_min_3.jpg" alt="post-thumb" class="img-fluid" />
                                      <div class="hover-bx">
                                         <p>
                                         <span></span>
                                         <span></span>
                                         <span></span>
                                         </p>
                                      </div>
                                   </div>
                                   <span class="cat-label">category</span>
                                   <h4>Envy of the World(A Blues for Terry Adkins)</h4>
                                   <p><span class="date">September 20, 2020</span> <span>Posted by Ahsun ansari</span></p>
                                </a>
                             </div>
                          </div>
                          <div class="item">
                              <div class="post-box">
                                <a href="#">
                                   <div class="p-img-bx">
                                      <img src="images/all/blog_min_2.jpg" alt="post-thumb" class="img-fluid" />
                                      <div class="hover-bx">
                                         <p>
                                         <span></span>
                                         <span></span>
                                         <span></span>
                                         </p>
                                      </div>
                                   </div>
                                   <span class="cat-label">category</span>
                                   <h4>Envy of the World(A Blues for Terry Adkins)</h4>
                                   <p><span class="date">September 20, 2020</span> <span>Posted by Ahsun ansari</span></p>
                                </a>
                             </div>
                          </div>
                     </div>
                  </div>
              </div>
              <!-- populer row carousel -->
              <div class="row">
                 <div class="col-12">
                    <!-- advertisement box -->
                 </div>
              </div>
              <!-- ad row ends -->
              <div class="row cat-post-list mb-3">
                 <div class="col-lg-5 col-md-12 col-12">
                     <a href="#">
                       <img src="images/all/blog_min_4.jpg" alt="cat-img" class="img-fluid" />
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
                       <img src="images/all/blog_min_4.jpg" alt="cat-img" class="img-fluid" />
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
                       <img src="images/all/blog_min_4.jpg" alt="cat-img" class="img-fluid" />
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
<!-- footer section starts -->
   <footer class="footer-section pb-2">
       <div class="container py-3">
        <div class="row">
          <div class="col-12 text-center">
             <img src="images/logo-footer.png" class="img-fluid" alt="logo-footer"/>
          </div>
          <div class="col-12 footer-links">
              <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#"> Privacy Policy</a></li>
                <li><a href="#"> Post a Trip </a></li>
                <li><a href="#"> Partner with Us</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
          </div>
            <div class="col-12">
                <div class="social">
                    <div class="social-sec fb">
                       <a href="">&nbsp;<i class="fab fa-facebook-f"></i> </a>
                    </div>
                    <div class="social-sec insta">
                       <a href=""><i class="fab fa-instagram"></i> </a>
                    </div>
                    <div class="social-sec twit">
                       <a href=""><i class="fab fa-twitter"></i> </a>
                    </div>
                    <div class="social-sec pin">
                       <a href=""><i class="fab fa-pinterest"></i> </a>
                    </div>
                </div>
            </div>
        </div>
           <div class="row">
              <div class="col-12 text-center text-white">
                 <small>Copyright © 2020. Trip Club India All Rights Reserved</small>
              </div>
           </div>
       </div>
   </footer>
   
<!-- footer section ends -->



<!-- bootstrap js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="owl.carousel/js/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- <script src="js/custom.js"></script> -->
<script>
    $(document).ready(function(){
  $(".owl-carousel").owlCarousel();
  });
</script>
</body>
</html>