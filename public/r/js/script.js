/**
 * Created by admin on 15.08.2017.
 */
$('.video-slider-block').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});

$('.series-list-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 12,
    slidesToScroll: 12,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});

var link = $('.play-menu li a'),
    expander = $('.show-entries-hover'),
    container = $('.menu-container'),
    pos1 = 0,
    pos2 = "46px",
    pos3 = "92px",
    pos4 = "138px",
    pos5 = "184px",
    pos6 = "230px",
    left = "-200px"
storeColor = "#444",
    appsColor = "#B3C833",
    moviesColor = "#CE5043",
    musicColor = "#FB8521",
    booksColor = "#1AA1E1",
    devicesColor = "#658092";

// Initialization, start positions
$('li#store').css('top', pos1);
$('li#store .menu-entry-text').css({'background-color' : storeColor,'color' : 'white'});
$('li#apps').css('top', pos2);
$('li#movies').css('top', pos3);
$('li#music').css('top', pos4);
$('li#books').css('top', pos5);
$('li#devices').css('top', pos6);

// Click function standard
link.each(function() {
    $(this).on('click', function() {
        // Remove Background-Color when i click on an unselected item
        // Hiding is removed for debugging
        link.not($(this)).parent().addClass('hide');
        expander.removeClass('hidden');
        link.not($(this)).children('.menu-entry-text').attr("style", "");
        // Hide all menus except the right one
        link.not($(this)).next('.sub-menu').css({'opacity' : 0}).addClass('index').removeClass('active');
        $(this).next('.sub-menu').css({'opacity' : 1}).addClass('active');

        // Changing Background-Color and Position
        // "Store"
        // This also resets all menu entries to their initial order
        if ($(this).children().hasClass('store')) {
            $(this).children('.menu-entry-text').css({'background-color' : storeColor,'color' : 'white'});
            $(this).parent().css('top', pos1).removeClass('hide');
            $('#apps').css('top', pos2);
            $('#movies').css('top', pos3);
            $('#music').css('top', pos4);
            $('#books').css('top', pos5);
            $('#devices').css('top', pos6);
            $('li').removeClass('hide');
        }
        // "Apps"
        else if ($(this).children().hasClass('apps')) {
            $(this).children('.menu-entry-text').css({'background-color' : appsColor,'color' : 'white'});
            $(this).parent().css('top', pos1).removeClass('hide');
            $('#store').css('top', pos6);
            $('#movies').css('top', pos2);
            $('#music').css('top', pos3);
            $('#books').css('top', pos4);
            $('#devices').css('top', pos5);
            $('.hide').css({'left': left, 'opacity' : 0, 'transition' : 'all 0s', '-webkit-transition' : 'all 0s', '-moz-transition' : 'all 0s' });
        }
        // "Movies"
        else if ($(this).children().hasClass('movies')) {
            $(this).children('.menu-entry-text').css({'background-color' : moviesColor,'color' : 'white'});
            $(this).parent().css('top', pos1).removeClass('hide');
            $('#store').css('top', pos6);
            $('#apps').css('top', pos2);
            $('#music').css('top', pos3);
            $('#books').css('top', pos4);
            $('#devices').css('top', pos5);
            $('.hide').css({'left': left, 'opacity' : 0, 'transition' : 'all 0s', '-webkit-transition' : 'all 0s', '-moz-transition' : 'all 0s' });
        }
        // "Music"
        else if ($(this).children().hasClass('music')) {
            $(this).children('.menu-entry-text').css({'background-color' : musicColor,'color' : 'white'});
            $(this).parent().css('top', pos1).removeClass('hide');
            $('#store').css('top', pos6);
            $('#apps').css('top', pos2);
            $('#movies').css('top', pos3);
            $('#books').css('top', pos4);
            $('#devices').css('top', pos5);
            $('.hide').css({'left': left, 'opacity' : 0, 'transition' : 'all 0s', '-webkit-transition' : 'all 0s', '-moz-transition' : 'all 0s' });
        }
        // "Books"
        else if ($(this).children().hasClass('books')) {
            $(this).children('.menu-entry-text').css({'background-color' : booksColor,'color' : 'white'});
            $(this).parent().css('top', pos1).removeClass('hide');
            $('#store').css('top', pos6);
            $('#apps').css('top', pos2);
            $('#movies').css('top', pos3);
            $('#music').css('top', pos4);
            $('#devices').css('top', pos5);
            $('.hide').css({'left': left, 'opacity' : 0, 'transition' : 'all 0s', '-webkit-transition' : 'all 0s', '-moz-transition' : 'all 0s' });
        }
        // "Devices"
        else if ($(this).children().hasClass('devices')) {
            $(this).children('.menu-entry-text').css({'background-color' : devicesColor,'color' : 'white'});
            $(this).parent().css('top', pos1).removeClass('hide');
            $('#store').css('top', pos6);
            $('#apps').css('top', pos2);
            $('#movies').css('top', pos3);
            $('#music').css('top', pos4);
            $('#books').css('top', pos5);
            $('.hide').css({'left': left, 'opacity' : 0, 'transition' : 'all 0s', '-webkit-transition' : 'all 0s', '-moz-transition' : 'all 0s' });
        }
        return false;
    });
});

// Hide menu when you leave the menu container
container.on('mouseleave', function() {
    $('.hide').css({'left': left, 'opacity' : 0, 'transition' : '', '-webkit-transition' : '', '-moz-transition' : ''});
    $('.sub-menu').removeClass('index');
})

// Show the menu when you hover the trigger
expander.on('mouseover', function() {
    $('.hide').css({'left': 0, 'opacity' : 1, 'transition' : '', '-webkit-transition' : '', '-moz-transition' : ''});
    $('.sub-menu').addClass('index');
});


if ($(window).width() > 1199) {
    $(".cb-video").colorbox({iframe:true,width:'90%',height:'80%'});
} else if ($(window).width() > 991) {
    $(".cb-video").colorbox({iframe:true,width:'90%',height:'70%'});

} else if ($(window).width() > 767) {
    $(".cb-video").colorbox({iframe:true,width:'90%',height:'55%'});


} else if ($(window).width() > 575) {
    $(".cb-video").colorbox({iframe:true,width:'90%',height:'45%'});
} else {
    $(".cb-video").colorbox({iframe:true,width:'100%',height:'40%'});
}

$("#payinfo").click(function () {
    $('.payment-content-block').slideToggle(500);
    $(this).toggleClass("open");
    return false;
})

$("#change-pas").click(function () {
  $('.change-pas-block').slideToggle(300)
                        .toggleClass("open");
  $(this).toggleClass("open");

})

$("#butn-search").click(function(){

  $(".search-wrap").toggleClass("open");
  $(".login-block").toggleClass("open");

  return false;
})


$(".mypass").passField({ /*options*/ });

$(document).on("click", ".butn-menu", function () {
  $('.menu-block').slideToggle();
  $(this).toggleClass("open");
  $('.menu-block').toggleClass('open');
})
// $(document).on("click", "#show-pas", function () {
//   $('.a_pf-btn-mask').click();
// })
// var position;
// $(".aside-menu li").addClass("st")

// $(document).on('click','.aside-menu li',function(){
//
//   if($(this).hasClass('top')){
//     return false;
//   }
//   $(".aside-menu .top").removeClass('top').css(
//
//     'transform', "translateY("+$(this).position().top+"px)"
//   );
//
//   $(this).css(
//     'transform', "translateY("+-$(this).position().top+"px)"
//   ).addClass('top');
//
//
//   return false;
//
//
// })
// $(".video-item").colorbox({});
// $(".popup").colorbox({inline:true, href:"#myForm"});