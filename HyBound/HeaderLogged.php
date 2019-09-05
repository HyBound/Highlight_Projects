    <!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card-2">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="/Hybound/Index.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="/HyBound/MusicPage.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">MUSIC</a>
    <a href="/HyBound/ArtistPage.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ARTIST</a>
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button w3-black" title="Style">STYLE <i class="fa fa-caret-down"></i></button>     
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
          <button onclick="nextPic()" class="w3-bar-item w3-button">Next Style</button>
      </div>
    </div>
    <a href="Logout.php" class="w3-padding-large w3-hover-green w3-hide-small w3-right">LOG OUT</a>
  </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="/HyBound/MusicPage.php" class="w3-bar-item w3-button w3-padding-large">MUSIC</a>
  <a href="/HyBound/ArtistPage.php" class="w3-bar-item w3-button w3-padding-large">ARTIST</a>
  <a href="Signup.php" class="w3-bar-item w3-button w3-padding-large">SIGN UP</a>
  <a href="Login.php" class="w3-bar-item w3-button w3-padding-large">LOG IN</a>
</div>
</html>