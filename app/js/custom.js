/**
 * Created by elsevar on 2/17/17.
 */
var wow = new WOW(
    {
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       0,          // distance to the element when triggering the animation (default is 0)
        mobile:       true,       // trigger animations on mobile devices (default is true)
        live:         true,       // act on asynchronously loaded content (default is true)
        callback:     function(box) {
            // the callback is fired every time an animation is started
            // the argument that is passed in is the DOM node being animated
        },
        scrollContainer: null // optional scroll container selector, otherwise use window
    }
);
wow.init();
$(function () {
    $('[data-toggle="tooltip"]').tooltip()


    $(document).ready(function(){
        var p = $('.block-2 .info');
        var tf = 0;
        $(document).scroll(function(){
            var st = $(this).scrollTop() + window.innerHeight;
            if(st > p.offset().top){

                if (tf == 0){

                    $('#count1').prop('number', 0).animateNumber({number: 300},1500);
                    $('#count2').prop('number', 0).animateNumber({number: 200},1500);
                    $('#count3').prop('number', 0).animateNumber({number: 120},1500);
                    $('#count4').prop('number', 0).animateNumber({number: 12},1500);
                    tf = 1;
                }
            }else {

            }
        });
    });
$('.block-3__gallery img').click(function () {
    var imgIndex = $(this).parent().index();
    $('#block-2__gallery a').eq(imgIndex).click();

});
    $("#block-2__gallery").lightGallery();

    var p = $('.block-2__h2');
    $(document).scroll(function(){
        var st = $(this).scrollTop() + window.innerHeight;
        if(st > p.offset().top) {
            $('.top-header').addClass('fixed animated fadeIn');
        }else {
            $('.top-header').removeClass('fixed animated fadeIn');
        }
    });

    var $root = $('html, body');
    $('a').click(function() {
        $root.animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top-80
        }, 500);
        return false;
    });
});
