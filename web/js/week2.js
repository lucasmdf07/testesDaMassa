function alert1() {
    window.alert("Clicked!");
}

function changeColor() {
    var textbox_id = "colorChanger";
    var textbox = document.getElementById(textbox_id);

    var div_id = "button1";
    var div = document.getElementById(div_id);

    // We should verify values here before we use them...
    var color = textbox.value;
    div.style.backgroundColor = color;

}

$(document).ready(function() {
    $(".clickme").click(function() {
        alert("Text was clicked.");
    });
});

$(document).ready(function() {
    $("#stchangeColor").click(function() {

        var stc = $("#stcolorChanger").val();
        $("#stbutton1").css("background-color", stc);
    })
})
$(document).ready(function() {
    $("#stFade").click(function() {
        $("#stbutton3").fadeToggle("slow", function() {
            // Animation complete.
        })
    })
})