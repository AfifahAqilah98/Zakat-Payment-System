//Get date
var d = new Date();

var dayName = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

var monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"];

var day = dayName[d.getDay()];
var date = d.getDate();
var month = monthNames[d.getMonth()];
var year = d.getFullYear();

var fullDate = day + ", " + date + " " + month + " " + year;

document.getElementById("getDate").innerHTML = fullDate;

//Slide Show for homepage
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

//show and hide password
function show() {
  document.getElementById("show").style.display = "none";
  document.getElementById("hide").style.display = "inline";
  document.getElementById("pass").type = "text";
}

function hide() {
  document.getElementById("show").style.display = "inline";
  document.getElementById("hide").style.display = "none";
  document.getElementById("pass").type = "password";
}

//New Zakat Application
function add() {
  window.location.href = "user_add.php";
}

function zakatChose() {
  var zakatType = document.getElementById("zakatType").value;

  if (zakatType == "Zakat Pendapatan") {
    document.getElementById("zakatPndptn").style.display = "inline";
    document.getElementById("zakatFitrah").style.display = "none";
    document.getElementById("income").required = "required";
    document.getElementById("type").required = "required";

  } else if (zakatType == "Zakat Fitrah") {
    document.getElementById("zakatFitrah").style.display = "inline";
    document.getElementById("zakatPndptn").style.display = "none";
    document.getElementById("pax").required = "required";

  } else {
    document.getElementById("zakatFitrah").style.display = "none";
    document.getElementById("zakatPndptn").style.display = "none";
    document.getElementById("zakatAmount").value = "";
    document.getElementById("income").required = "";
    document.getElementById("type").required = "";
    document.getElementById("pax").required = "";

  }
}

function calcRate(monthlyIncome) {
  //var income = document.getElementById("annual").value;
  var year = ((monthlyIncome * 12) * 2.5) / 100;
  var month = year / 12;

  document.getElementById("payMonth").value = month.toFixed(2);
  document.getElementById("payYear").value = year.toFixed(2);
}

function payType() {
  var type = document.getElementById("pay").value;
  var month = document.getElementById("payMonth").value;
  var year = document.getElementById("payYear").value;

  if (type == "Month") {
    document.getElementById("zakatAmount").value = month;
  } else if (type == "Year") {
    document.getElementById("zakatAmount").value = year;
  } else {
    document.getElementById("zakatAmount").value = "";
  }
  
}

function calAmount(pax) {
  var amount = pax * 7;

  document.getElementById("zakatAmount").value = amount.toFixed(2);
}

function openSpan(id) {
  document.getElementById("idZakat").value = id;
  document.getElementById("myModal").style.display = "block";
}

function closeSpan() {
  document.getElementById("myModal").style.display = "none";
}

