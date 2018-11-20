$(function () {


    var cw = $('.element').width();
    $('.element').css({
        'height': cw + 'px'
    });
});
$(window).resize(function(){
    var cw = $('.element').width();
    $('.element').css({
        'height': cw + 'px'
    });
});