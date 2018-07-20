<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;margin:0}
.mySlides1 {display:none}

/* Slideshow container */
.slideshow-container {
  max-width: 900px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 70%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 10px;
  width: 10px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

</style>
</head>
<body>

<div class="slideshow-container">

<div class="mySlides1">
  <div class="numbertext">1 / 6</div>
  <img src="../images/50offsale.jpg" height="600px" style="width:70%" class="active">
  <div class="text"></div>
</div>

<div class="mySlides1">
  <div class="numbertext">2 / 6</div>
  <img src="../images/donut8.jpg" height="600px" style="width:70%">
  <div class="text">Brownies</div>
</div>

<div class="mySlides1">
  <div class="numbertext">3 / 6</div>
  <img src="../images/cupcake9.jpg" height="600px" style="width:70%">
  <div class="text">Cupcake</div>
</div>
<div class="mySlides1">
  <div class="numbertext">4 / 6</div>
  <img src="../images/ChocolateTiramisu.jpg" height="600px" style="width:70%">
  <div class="text">Chocolate Tiramisu </div>
</div>
<div class="mySlides1">
  <div class="numbertext">5 / 6</div>
  <img src="../images/lavacaramel.jpg" height="600px" style="width:70%">
  <div class="text">Lava Caramel </div>
</div>
<div class="mySlides1">
  <div class="numbertext">6 / 6</div>
  <img src="../images/birthday-cake2.jpg" height="600px" style="width:70%">
  <div class="text">bánh sinh nhật</div>
</div>

	

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
   <span class="dot" onclick="currentSlide(5)"></span>
   <span class="dot" onclick="currentSlide(6)"></span>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides1");
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
    setTimeout(showSlides, 2500); // Change image every 2 seconds
}
</script>

</body>
</html> 
