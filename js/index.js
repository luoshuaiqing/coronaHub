let containerShown = $(".box--1 > div:first-of-type");


$('.img-box svg:first-child').click(function() {
    if(!containerShown.is("div:first-of-type")) {
        containerShown.hide();
        containerShown.prev().show();
        containerShown = containerShown.prev();
    }
    
    
});


$('.img-box svg:last-child').click(function() {
    if(!containerShown.is("div:last-of-type")) {
        containerShown.hide();
        containerShown.next().show();
        containerShown = containerShown.next();
    }
    
    
});