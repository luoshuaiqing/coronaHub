
let lastSelectImg = null;
$('.post-category-box .img-box').click(function() {
    if(lastSelectImg) {
        lastSelectImg.toggleClass('animate');
        let checkBox = lastSelectImg.find(`input[type='checkbox']`);
        checkBox.prop("checked", !checkBox.prop("checked"));
    }
        
    $(this).toggleClass('animate');
    lastSelectImg = $(this);

    let checkBox = $(this).find(`input[type='checkbox']`);
    checkBox.prop("checked", !checkBox.prop("checked"));
    // console.log(checkBox.prop("checked"));
});