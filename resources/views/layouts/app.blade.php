<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W3YDV01ZB4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-W3YDV01ZB4');
</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ isset($blogData) ? $blogData['meta_description'] : 'Blogs for health care , fitness and life style. Providing solutions for health issues and advise for a better life' }}">
    <meta name="keywords" content="{{ isset($blogData) ? $blogData['meta_tag'] : '' }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Health Mentors | We are the hub of mentors in all walks of life.</title>
    <link rel="icon" type="image/png" href="{{ asset('Images/healthlogo.png') }}"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/xfwmfhghtu2at20dliuhsu0cijd2vb32lyj688argre523qq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


   
   @yield('custom_css')

</head>
<body>
    @include('layouts.header')
    
    <main>
        @yield('content')
    </main>

    

    @include('layouts.footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>
        $(document).ready(function() {
            CKEDITOR.replace('message_description',  {
            filebrowserUploadUrl: "{{ route('blog.image.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
            });
        });

        $('#color-2').on('change', function(){
            // alert(1);
            if($('#color-2').is(':checked')) { 
               
               $('#text-input').addClass('d-none');
               $('#mentor_type').removeClass('d-none');
            
            }
        });

        $('#color-1').on('change', function(){
            if($('#color-1').is(':checked')) {
                $('#text-input').removeClass('d-none');
                $('#mentor_type').addClass('d-none');
            }
        })

        $('#mentor_type').on('change', function(){
            
            var mentorType = $("#mentor_type option:selected").val();
            if(mentorType) {
                $('#proceed_btn').removeClass('d-none');
            } else {
                $('#proceed_btn').addClass('d-none');
            }

        })

    </script>
  
  @yield('custom_js')

</body>
</html>
