<?php
//memulai session
session_start();
if(empty($_SESSION['username']))
{
header('Location: login.php');
}

?>

<!DOCTYPE html>
<html>
<head>

  <!-- Include meta tag to ensure proper rendering and touch zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Include jQuery Mobile stylesheets -->
  <link rel="stylesheet" href="jquery/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  
  <!-- Include the jQuery library -->
  <script src="jquery/1.11.3/jquery.min.js"></script>
  
   <!-- Disable preloaded page-->
  <script type="text/javascript" src="js/init.js"></script>
  
  <!-- Include the jQuery Mobile library -->
  <script src="jquery/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
<!-------------- tag div untuk page ----------->
<div data-role="page" >

<!-------------- tag div untuk menu panel ----------->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>

<!-------------- tag div untuk header ----------->
	<div data-role="header" data-position="fixed">
		<h3>Menu Sistem Pakar</h3>
	</div>
	
<!-------------- tag div untuk main ----------->
	<div data-role="main" class="ui-content">
<!-------------- tag div untuk navigasi ----------->
	<div data-role="navbar" data-iconpos="bottom">
		<ul>
		    <li><a href="identifikasi_awal.php"><img src="image/01identifikasi128.png"><center>Identifikasi Masalah</center></a></li>
		</ul>
		<ul>
		    <li><a href="kamus_list.php"><img src="image/kamus128.png"><center>Kamus Pakar</center></a></li>
		</ul>
		<ul>
			<li><a href="#testPopup" data-rel="popup" data-position-to="window"><img src="image/android128.png"><center>Tentang Program</center></a></li>
		</ul>
		
<!-------------- Popup Tentang Program Pakar ----------->
	<div id="testPopup" data-role="popup" >
		<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-left">Close</a>
		<center><img src=image/logo.png></center>
	</div>
		
<!-------------- tag div untuk footer dengan posisi fixed ----------->
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="bottom">
		      <ul>
		        <li><a href="panel_admin.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
		      </ul>
		</div>
			<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
		</div>
    </div>
</div>
</body>
</html>


