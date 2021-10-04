<?php
include "header.php";
?>

<!-- Site Navigation Link List -->
<div id="navigation">
<ul>
	<li><a href="index.php" class="active"><img src="img/home.png" id="icon"> Home </a></li>
	<li><a href="about.php"><img src="img/info.png" id="icon"> About </a></li>
	<li><a href="contact.php"><img src="img/contact.png" id="icon"> Contact </a></li>
	<li><a href="login.php"><img src="img/login.png" id="icon"> Login </a></li>
</ul>
</div>

<!-- Devide content into blocks -->
<div id="content-container">

<!-- Left block -->
<div id="main">	

<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <img src="img/zakat_selangor.png" style="width:100%; height: 300px">
    <div class="text">Zakat Selangor</div>
  </div>

  <div class="mySlides fade">
    <img src="img/zakat_wilayah.jpg" style="width:100%; height: 300px">
    <div class="text">Zakat Wilayah</div>
  </div>

  <div class="mySlides fade">
    <img src="img/zakat_melaka.jpg" style="width:100%; height: 300px">
    <div class="text">Zakat Melaka</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

</div>

<?php
include "footer.php";
?>