<html>

<title>Hy Bound Header</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
    <!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card-2">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="/Hybound/Index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="/HyBound/MusicPage.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">MUSIC</a>
    <a href="/HyBound/ArtistPage.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ARTIST</a>
    <a href="Signup.php" class="w3-padding-large w3-hover-green w3-hide-small w3-right">SIGN UP</a>
    <a href="Login.php" class="w3-padding-large w3-hover-blue-grey w3-hide-small w3-right">LOG IN</a>
  </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="/HyBound/MusicPage.php" class="w3-bar-item w3-button w3-padding-large">MUSIC</a>
  <a href="/HyBound/ArtistPage.php" class="w3-bar-item w3-button w3-padding-large">ARTIST</a>
  <a href="Logout.php" class="w3-bar-item w3-button w3-padding-large">LOG OUT</a>
</div>
</html>
   
<script>
    // STEP 1: setup xml http request
			var ajax = new XMLHTTPRequest();
			
			// STEP 2: prepare the open ajax request
			ajax.open('GET', 'content.html');
			
			//STEP 3: 
			ajax.onreadystatechange = function(){
				if (ajax.readyState === 4) {
					document.getElementById('content').innerHTML = ajax.responseText;
				}	
			};
			
			//STEP 4:
			function getContent(){
				ajax.send();
				document.getElementById('btn_content').syle.display = 'none';
				}
    </script>