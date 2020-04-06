
let lastSelectImg = null;
$('.category-box .img-box').click(function() {
    if(lastSelectImg)
        lastSelectImg.toggleClass('animate');
    $(this).toggleClass('animate');
    lastSelectImg = $(this);
});


$('#upload-photo').on('change',function(){

    //get the file name
    var fileName = $(this).val().split('\\').pop(); 
    
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})

