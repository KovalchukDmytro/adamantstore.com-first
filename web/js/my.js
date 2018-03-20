

$(document).on("scroll",function(){
    if($(document).scrollTop()>200 && window.innerWidth > 767) {
        $("header").css("height", "85px");
        $(".logo_2").css({"display":"block", "margin-top":"28px"});
        $(".logo").css("display", "none");
        $(".small_head").css("top", "84px");
            $(".button_box").css("margin-top", "10px");
             $(".soc_box_nav").find("a").css("font-size", "20px");
             $(".soc_box_nav").css("margin-top", "10px");
            $(".menu_nav").css("margin-top", "35px");
            


        
    } else if(window.innerWidth > 767 && $(document).scrollTop()<=200){
         $("header").css("height", "125px");
          $(".logo_2").css({"display":"none", "margin-top":"0px"});
        $(".logo").css("display", "block");
       $(".small_head").css("top", "124px");
        $(".button_box").css("margin-top", "30px");
        $(".soc_box_nav").find("a").css("font-size", "25px");
        $(".soc_box_nav").css("margin-top", "15px");
        $(".menu_nav").css("margin-top", "55px");

    }});

$(document).on("scroll",function(){
    if($(document).scrollTop()>200 && window.innerWidth > 991) {
      
               $(".list_page").css("top", "150px");


        
    } else if(window.innerWidth > 991 && $(document).scrollTop()<=200){
        
        $(".list_page").css("top", "200px");
    }});

$(".nav_button").on("click", function () {
	$("#top_menu").toggleClass("displ_block");
})

 $(".dropdown-toggle-js").dropdown();



$(".categories").on("click", function () {
  $(".categories_list").toggleClass("show_hide");
})

$(".sort_by").on("click", function () {
  $(".sort_by_list").toggleClass("show_hide_1");
})

$(".categories_list").hover(function () {
  $(".categories_list").addClass("show_hide");
}, function () {
  $(".categories_list").removeClass("show_hide");
});

$(".sort_by_list").hover(function () {
  $(".sort_by_list").addClass("show_hide_1");
}, function () {
  $(".sort_by_list").removeClass("show_hide_1");
});



$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});


$('.carousel_my').slick({
    dots: true,
    //infinite: true,
    speed: 1000,
    slidesToShow: 1,
    adaptiveHeight: true,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000

});



