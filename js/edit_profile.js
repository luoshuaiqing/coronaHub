$("input[type='file']").on('change',function(){

    //get the file name
    var fileName = $(this).val().split('\\').pop(); 

    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})