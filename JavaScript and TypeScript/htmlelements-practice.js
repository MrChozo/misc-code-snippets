/*
 * Turning this:
 */
$("#individual_wrapper").append(
    "<div class='p-4 individual'>" +
    "   <img class='block' src='" + selected_individual_src + "' />" +
    "   <input type='hidden' name='individual_id[]' value='" + selected_individual_id + "' />" +
    "   <span class='font-bold'>" + selected_individual_description + "</span>" +
    "   <a href='javascript:' class='remove_individual'><i class='fas fa-minus-circle'></i></a>" +
    "</div>"
);

/*
 * Into this pure JS:
 */
var wrapper, myDiv, myImg, myInp, mySpan, myButt, myIcon;

wrapper = document.getElementById("individual_wrapper");

myDiv = document.createElement("div");
myDiv.className = "p-4 individual";

myImg = document.createElement("img");
myImg.className = "block";
myImg.src = selected_individual_src;

myInp = document.createElement("input");
myInp.type = "hidden";
myInp.name = "individual_id[]";
myInp.value = selected_individual_id;

mySpan = document.createElement("span");
mySpan.className = "font-bold";
mySpan.innerHTML = selected_individual_description;

myButt = document.createElement("button");
myButt.className = "remove_individual";

myIcon = document.createElement("i");
myIcon.className = "fas fa-minus-circle";

myButt.appendChild(myIcon);

myDiv.appendChild(myImg);
myDiv.appendChild(myInp);
myDiv.appendChild(mySpan);
myDiv.appendChild(myButt);

wrapper.append(myDiv);