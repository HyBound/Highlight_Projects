<!DOCTYPE html>
<html>
<title>Hy Bound Artist Site</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>

<body>
<?php 
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    require_once 'Cookies.php';
    require_once 'HeaderLogged.php';}
 else {
       require_once 'Header.php';
  require_once 'Cookies.php'; 
  }
  ?>

<!-- Page content -->
<div class="w3-content" style="max-width:1600px;margin-top:46px">

  <!-- Slideshow Images -->
 <?php
    require_once 'Slides.html';
    ?>
  <!-- Music Section -->

       <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="music">
    <h2 class="w3-wide">MUSIC</h2>
    <p class="w3-opacity"><i></i></p>
    <p class="w3-justify"></p>
    <div class="container">

<p class="w3-opacity w3-center"><i>Tyler Carson writes music in a variety of styles, ranging from Film to Dance to Rock. Listen to it now.</i></p>
    <div class="w3-row w3-padding-32">
    <a href="/HyBound/MusicPage.php" class="w3-black w3-button w3-padding-large w3-hide-small">LISTEN!</a>
    <div class="w3-row w3-padding-32">
    </div>
  </div>
    </div>
       </div>

    </body>
</html>

    <!-- The Artist Section -->

<!-- End Page Content -->
</div>

<!-- Footer -->
<?php
    require_once 'Footer.php';
    ?>

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
var myPic = false;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1;}    
    x[myIndex-1].style.display = "block";
    if (myPic === true){
    setTimeout(carousel, 15);
    myPic = false;
    }
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") === -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target === modal) {
    modal.style.display = "none";
  }
};

function nextPic() {
    var myPic = true;
    carousel();
}
</script>

</body>
</html>