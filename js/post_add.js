
let lastSelectImg = null;

var stay = document.getElementById("stay").checked;
var back = document.getElementById("back").checked;

// console.log("nmsl");

// console.log("Stay is: " + stay);
// console.log("Back is: " + back);

// TO DO: Toggle of stay and back button

if(stay)
{
    let temp = document.getElementById("stay").parentNode;
    console.log(temp);
    temp.classList.add('animate');
}
else
{
    let temp = document.getElementById("back").parentNode;
    console.log(temp);
    temp.classList.add('animate');
}

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

