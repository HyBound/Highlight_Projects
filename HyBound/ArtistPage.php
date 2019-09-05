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
<?php 
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    require_once 'Cookies.php';
    require_once 'HeaderLogged2.php';}
 else {
       require_once 'Header2.php';
  require_once 'Cookies.php'; 
  }
  ?>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px;background-color: black;"></div>
<div align = "center" style="background-color: black">
<div style="max-width: 400px" >
<img src="images/retro" style="max-width:100%;" />
</div>
</div>
<div class="w3-black" id="artist">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <h2 class="w3-wide w3-center">ARTIST</h2>
      <p class="w3-opacity w3-center"><i>Hailing from Golden, CO, Tyler Carson writes music in a variety of styles, ranging from Film to Dance to Rock. 
              He has worked in many different styles with many different artists. He has worked on sound design for sample libraries and other artists.</i></p>
       <div class="w3-row w3-padding-32">
    </div>
              <div align = "center">
    <a href="/HyBound/MusicPage.php" class="w3-white w3-button w3-padding-large w3-hide-small w3-center">LISTEN!</a>
    <div class="w3-row w3-padding-32">
    </div>
      <div class="w3-row w3-padding-32">
        </div>
    </div>
  </div>
</div>


<?php
require_once 'Footer.php';
?>