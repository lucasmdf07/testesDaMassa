function clickAlert() {
    alert("Clicked!");
}

function colorChange() {
    var textColor = document.getElementById("divColor");
    var div1 = document.getElementById("div1");
    var color = textColor.value;
    div1.style.backgroundColor = color;

}

$(document).ready(function(){
    $("#bColor").click(function(){
        var bla = $('#divColor').val();
      $("#div1").css("color", bla);
    });

    $("#bToggle").click(function(){
        $("#div3").toggle("slow", "linear");
    });
  });