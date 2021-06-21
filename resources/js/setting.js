
var initialDataTable;
$(document).ready(function(){
    $(".owl-carousel").owlCarousel();
    initialDataTable = $('#datatableInitiazer').DataTable({
        // dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });

    // $(window).scroll(function(){
    //   var scroll = $(window).scrollTop();
    //   if (scroll > 0) {
    //      $("header").addClass("fixed-header");
    //   }
  
    //   else{
    //     $("header").removeClass("fixed-header");
    //   }
    // })
  
    
    $('.sidebar-click').click(function(e){
        $('.navbar-collapse').toggleClass('open-sidebar');
        $('body').toggleClass('overlay');
    });

 
        //  $('#records-table').DataTable();
  });

      // testimonial js
    $(".populer-slider").owlCarousel({
             items: 1,
             margin: 20,
             loop: true,
             nav: true,
             navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
             dots: true,
             dotsEach: true,
             center: false,
             autoplay: false,
             responsive: {
                 0: {
                     items: 1
                 },
                 768: {
                     items: 2
                 },
                 992: {
                     items: 3
                 },
                 1200: {
                     items: 3
                 }
             }
         });
  
    // custom js for carousels
  $(".main-slider").owlCarousel({
             items: 3,
             margin: 0,
             loop: true,
             nav: true,
             navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
             dots: true,
             dotsEach: true,
             video:true,
             center: false,
             autoplay: true,
             autoplayTimeout: 5000,
             animateOut: 'fadeOut',
             animateIn: 'fadeIn',
             responsive: {
                 0: {
                     items: 1
                 },
                 768: {
                     items: 1
                 }
             }
         });
  // trend now carousel
  $(".side-carousel").owlCarousel({
             items: 1,
             margin: 0,
             loop: true,
             nav: true,
             navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
             dots: true,
             dotsEach: true,
             video:true,
             center: false,
             autoplay: true,
             autoplayTimeout: 5000,
             responsive: {
                 0: {
                     items: 1
                 },
                 768: {
                     items: 1
                 }
             }
         });