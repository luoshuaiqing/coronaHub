
let lastSelectImg = null;
$('.category-box .img-box').click(function() {
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


$('#upload-photo').on('change',function(){

    //get the file name
    var fileName = $(this).val().split('\\').pop(); 
    
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})

let uploadBtnCnt = 1;
$('#btn-upload-another').click((e) => {
    e.preventDefault();
    if(uploadBtnCnt === 4) 
        return;
        
    $('#add-upload-box').append(`<div class="input-group content">
    <div class="custom-file">
        <input type="file" class="custom-file-input" name='upload-photo'>
        <label class="custom-file-label" for="upload-photo">上传</label>
    </div>
</div>`);
    uploadBtnCnt += 1;
});