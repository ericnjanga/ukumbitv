/**
 * Created by admin on 15.08.2017.
 */
/***********slider*************/
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
/*********series**slider*************/
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
/*********video**popup*************/
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
/**************change**password**button*********/
$("#change-pas").click(function () {
  $('.change-pas-block').slideToggle(300)
                        .toggleClass("open");
  $(this).toggleClass("open");

})
/**************search****button*********/
$("#butn-search").click(function(){
   if(window.innerWidth<767){
       if($(".search-wrap").hasClass('open') && $(".search-wrap").find('input').val()){
       }else {
           $(".search-wrap").toggleClass("open");
           $(".login-block").toggleClass("open");
           return false;
       }
   }
});
/**************show**password**button*********/
$(".mypass").passField({ /*options*/ });
/**************menu**mobile**button*********/
$(document).on("click", ".butn-menu", function () {
  $('.menu-block').slideToggle();
  $(this).toggleClass("open");
  $('.menu-block').toggleClass('open');
})
/************aside**menu***********/
function GoogleMenu(selector) {
    $container = $(selector);
    $($container).css('height',$($container).height()+'px');
    $toggler = $($container).find('.show-on-hover');
    $itemsContainer = $($container).find('.menu-items');
    $items = $($container).find('.menu-items>li');
    $current = false;
    $currentActive = false;

    var hideElements = function () {
        $container.find('.menu-items>li').not($current).css('width',0);
    };

    var showElements = function () {
       $container.find('.menu-items>li').not($current).css('width','170px');
    }

    var slideDownElements = function () {
        $container.find('.menu-items>li').not($current).stop().animate({width:0},500,function () {

        });
    };

    var slideUpElements = function () {

        $container.find('.menu-items>li').not($current).stop().animate({width:$container.width()},500,function () {
        });
    };

    var showSubmenu = function () {
        $subMenu = $current.find('.sub-menu');
        if($subMenu.length < 1){
            return false
        }
        $subMenu = $subMenu[0];
        $($subMenu).slideDown();
    };

    var changeActive = function () {
        if($current.find('.sub-menu').length>0){
            hideElements();
            $current.css({'position':'absolute',top:$current.position().top}).animate({top:0},500,function () {
                $(this).addClass('active').removeAttr('style');
                $currentActive.removeClass('active');
                showSubmenu();
            });

        }else {
            hideElements()
            var $activeClone = $currentActive.clone().removeClass('active');
            var offset_top = $current.position().top;

            $currentActive.stop().animate({top:offset_top},500,function () {
                $(this).remove();
                var $before_elem = $current.next();
                if(!$before_elem.length){
                    $($activeClone).insertAfter($current.prev());
                }else {
                    $($activeClone).insertBefore($before_elem);
                }
                showElements();
            });

            $current.css({'position':'absolute',top:$current.position().top}).animate({top:0},500,function () {
                $(this).addClass('active').removeAttr('style');
            });
        }

    };

    $(document).on('click','.menu-items>li',function () {
        if($(this).hasClass('active')){
            return false;
        }

        if($($container).find(':animated').length>0){
            return false
        }

        $('.sub-menu:visible').css('display','none');
        $currentActive = $($itemsContainer).find('.active');
        $current = $(this);
        changeActive();
        return false;
    });



    $(document).on('mouseenter','.show-on-hover',function () {
        if($($container).find(':animated').length>0){
            return false
        }
        slideUpElements();
    }).on('mouseleave','.menu-container',function () {
        if($($container).find(':animated').length>0){
            return false
        }
        if($('.active').find('.sub-menu').length > 0){
            slideDownElements();
        }
    });
}

GoogleMenu('.menu-container');
// $(".video-item").colorbox({});
// $(".popup").colorbox({inline:true, href:"#myForm"});