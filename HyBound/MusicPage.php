<html>
<title>Music Page</title>
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
    require_once 'HeaderLogged2.php';}
 else {
    require_once 'Cookies.php';
    require_once 'Header2.php';
   
  }
  ?>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px;background-color: #cccccc;">
    
    <!-- Music library -->
     <div class="w3-container w3-content w3-center " style="max-width:800px" id="musicPage">
                 <div align = "center" >
<div style="max-width: 400px" >
    <img src="images/classic" style="max-width:100%;" />
    </div>
</div>
    <div class="w3-row w3-padding-32"></div>  
    <h2 class="w3-wide">MUSIC</h2>
    <p class="w3-opacity"><i></i></p>
    <p class="w3-justify"></p>
    <div class="container">

        <h2>Select Your Song</h2>
        <p>So Angry (Hy Bound Mix)</p>
    <audio controls>
        <source src="music/SoAngry.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio> 
        <p style="color: #2196F3">Remix of Binster's So Angry breakbeat track. Utilizes 80's styles in the intro and breaks out 
        into large bigroom sound for the drop.</p>
        
        <p>Perfect Mistake (Hy Bound Mix)</p>
    <audio controls>
        <source src="music/PerfectMistake.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>  
        <p style="color: #673ab7">Remix of Sofie Letitre's dark brooding song. Apart from the piano chords and vocals, everything 
            from the sound design to the melodies are mine</p>

        <p>Love on a Real Train (Cover)</p>
    <audio controls>
        <source src="music/LoveReal.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>  
        <p style="color: darkblue">Reinterpretation of the classic Tangerine Dream theme of the same name. Repeating synthwork layered
        with vintage digital synthesizers including the Yamaha DX-7</p>
        
            <p>Spirits of China</p>
    <audio controls>
        <source src="music/Spirits.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
    </audio>  
        <p style="color: #f44336">Epic orchestral soundtrack piece with a vaguely Eastern sound. Utilizes layered shouts and 46 seperate
            tracks of percussion.</p>
            
        <p>Drift the Light Fantastic</p>
    <audio controls>
        <source src="music/Drift.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
    </audio>  
    </div><p style="color: #3f51b5">Dark, brooding vintage synths layered with cutting edge sound design. Reminiscent of the works of 
    Vangelis on Bladerunner.</p>

</div>
    
        
         <!-- The Artist Section -->
  <div class="w3-black" id="artist">
    <div class="w3-container w3-content w3-padding-64" style="max-width:2000px">
      <h2 class="w3-wide w3-center">ARTIST</h2>
      <p class="w3-opacity w3-center"><i>Tyler Carson writes music in a variety of styles, ranging from Film to Dance to Rock. Listen above.</i></p><br>
      <div class="w3-row w3-padding-32"></div>
      <div class="w3-row w3-padding-32"></div>
      
    </div>
  </div>
</body>

 <?php
 require_once 'Footer.php';
 ?>

