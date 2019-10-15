$(document).ready(function(){
    // All 3 functions change the selected image when moused over,
    // The original image is replaced when the mouse leaves the image area.
    $("#ffImage").mouseover(function(){
        this.src="/Homepage/homepageImages/FF122.jpg"
    }).mouseout(function(){
        this.src="/Homepage/homepageImages/FF52.jpg"
    });

    $("#spideyImage").mouseover(function(){
        this.src="/Homepage/homepageImages/spidey149.jpg"
    }).mouseout(function(){
        this.src="/Homepage/homepageImages/spidey145.jpg"
    });

    $("#ironmanImage").mouseover(function(){
        this.src="/Homepage/homepageImages/ironman41.jpg"
    }).mouseout(function(){
        this.src="/Homepage/homepageImages/ironman25.jpg"
    });
});