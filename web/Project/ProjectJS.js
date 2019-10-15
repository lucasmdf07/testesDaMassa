function addItem() {
   var ingredDiv = document.getElementById("ingred");
   var amountSelect = document.createElement("select");
   var measType = document.createElement("select");
   var ingredient = document.createElement("input");
   var breakLine = document.createElement("br");
   var count = parseInt(document.getElementById("count").value);
   document.getElementById("count").value = (++count).toString();
   document.getElementById("direct").value = count;
   var amountLab = document.createElement("label");
   var measureLab = document.createElement("label");
   var ingredLab = document.createElement("label");


   amountLab.innerHTML = "Amount";
   measureLab.innerHTML = "Measurement Type";
   ingredLab.innerHTML = "Ingredient";
   var lineBreak = document.createElement("div");
   ingredient.setAttribute("type", "text");
   ingredient.setAttribute("id", "ingredient" + count);
   ingredient.setAttribute("name", "ingredient" + count);
   ingredient.setAttribute("required", "");
   var tempString = "return" + count;
   lineBreak.setAttribute("id", tempString);

   amountSelect.setAttribute("id", "amount" + count);
   amountSelect.setAttribute("name", "amount" + count);
   amountSelect.setAttribute("value", "1");
   measType.setAttribute("id", "meastype" + count);
   measType.setAttribute("name", "meastype" + count);
   measType.setAttribute("value", "1");
   ingredDiv.appendChild(amountSelect);
   ingredDiv.appendChild(amountLab);
   ingredDiv.appendChild(measType);
   ingredDiv.appendChild(measureLab);
   ingredDiv.appendChild(ingredient);
   ingredDiv.appendChild(ingredLab);
   ingredDiv.appendChild(lineBreak);
   
   var a = document.getElementById("amount" + (count - 1));
   for (var i = 0; i < a.length; i++) {
      document.getElementById("amount" + count).innerHTML += "<option value='" + a[i].value + "'> " + a[i].textContent + "</option>";
      
   }
   var b = document.getElementById("meastype" + (count - 1));
   for (var i = 0; i < b.length; i++) {
      document.getElementById("meastype" + count).innerHTML += "<option value='" + b[i].value + "'> " + b[i].textContent + "</option>";

   }
   
   
   document.getElementById(tempString).innerHTML = "<br/>";

}


function buttonClick(username) {
   $.ajax({
      url: 'http://calm-shelf-84172.herokuapp.com/Week3/AssignWeek3_B.php',
      type: "POST",
      data: { user: username },
      success: function (data) {
         alert("Item has been added to the cart!");
      },
      error: function () {
         alert("ERROR!");

      }
   });
}