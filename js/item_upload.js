
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


$("input[type='file']").on('change',function(){
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
    
    uploadBtnCnt += 1;

    $('#add-upload-box').append(`
        <div class="input-group content">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="picture${uploadBtnCnt}" id="picture${uploadBtnCnt}">
                <label class="custom-file-label" for="picture${uploadBtnCnt}">上传</label>
            </div>
        </div>`
    );

    $("input[type='file']").on('change',function(){
        //get the file name
        var fileName = $(this).val().split('\\').pop(); 
        
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
    
});