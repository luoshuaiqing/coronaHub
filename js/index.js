let imgShown = $(".img-box img:first-of-type");


$('.img-box svg:first-child').click(function() {
    if(!imgShown.prev().is(":first-of-type")) {
        imgShown.hide();
        imgShown.prev().show();
        imgShown = imgShown.prev();
    }
    
    
});


$('.img-box svg:last-child').click(function() {
    if(!imgShown.next().is(":last-of-type")) {
        imgShown.hide();
        imgShown.next().show();
        imgShown = imgShown.next();
    }
    
    
});