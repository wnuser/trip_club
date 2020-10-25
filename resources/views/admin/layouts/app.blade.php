<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Laravel</title>
      <!-- Fonts -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <link href="{{ mix('css/app.css') }}" rel="stylesheet">
   </head>
   <body>
      <div class="main-wrap-admin">
         <!-- admin site logo desktop -->
         <div class="logo-admin">
            <h3>LOG</h3>
         </div>
         <!-- header admin -->
         <header class="bg-white">
            <div class="container">
               <nav class="navbar navbar-expand-lg bg-white">
                  <ul class="icon-sidebar">
                     <li><a href="javascript:void(0)" class="sidebar-click"><i class="fas fa-bars"></i></a></li>
                  </ul>
                  <!-- <ul class="navbar-nav ml-auto">
                     <li class="nav-item dropdown">
                         <a class="nav-link" href="#" id="dropdownMenuButton" data-toggle="dropdown">Admin <i class="fas fa-angle-down"></i></a> 
                         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                           <a class="dropdown-item" href="#">Action</a>
                           <a class="dropdown-item" href="#">Another action</a>
                           <a class="dropdown-item" href="#">Logout</a>
                         </div>
                     </li>
                     </ul> -->
                  <ul class="navbar-nav ml-auto">
                     <!-- Authentication Links -->
                     @guest
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                     </li>
                     @if (Route::has('register'))
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                     </li>
                     @endif
                     @else
                     <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                           </form>
                        </div>
                     </li>
                     @endguest
                  </ul>
               </nav>
            </div>
         </header>
         @include('admin.layouts.sidebar')
         <main>
            @yield('content')
         </main>
         <!-- footer section starts -->
         <footer class="footer-admin">
            <div class="container">
               <div class="row">
                  <div class="col-12 text-center py-3">
                     <small>Copyright © 2020. Trip Club India All Rights Reserved</small>
                  </div>
               </div>
            </div>
         </footer>
         <!-- footer section ends -->
      </div>
      <!-- main arapper admin ends -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <!-- <script src="owl.carousel/js/owl.carousel.min.js"></script> -->
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
      <script src="{{ asset('js/app.js') }}" defer></script>
      @stack('scripts')
   </body>
</html>