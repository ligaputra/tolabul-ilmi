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
<style>
.ui-bar-f {
    color: black;
    background-color: orange;
}

.ui-body-f {
    font-weight: bold;
    color: white;
    background-color: purple;
}

.ui-page-theme-f {
    font-weight: bold;
    background-image: -moz-linear-gradient(top, #FFFFFF, #FFFFFF );
}


</style>
<body>

<!-- tag div untuk page -->
<div data-role="page" id="katalogpage" >

<!-- Panel Samping -->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<a href="identifikasi_awal.php" class="ui-btn ui-corner-all ui-icon-carat-r ui-btn-icon-right ui-mini" type="button">identifikasi</a>
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>
<!-- tag div untuk header -->	
	<div data-role="header" data-position="fixed" data-theme="f" >
		<h3>Panel Admin</h3>
	</div>
<!-- tag div untuk main -->	
	<div data-role="main" class="ui-content">
<!-- tag div untuk navigasi-->	
	<div data-role="navbar" data-iconpos="bottom">
		<ul>
		    <li><a href="node_list.php"><img src="image/rute128.png"><center>NODE</center></a></li>
		    <li><a href="goal_list.php"><img src="image/02target128.png"><center>GOAL</center></a></li>
		</ul>
		<ul>
		    <li><a href="koneksi_list.php"><img src="image/koneksi128.png"><center>KONEKSI</center></a></li>
		    <li><a href="rute_list.php"><img src="image/02rute128.png"><center>RUTE</center></a></li>
		</ul>
		<ul>
			<li><a href="kamus_list.php"><img src="image/kamus128.png"><center>KAMUS</center></a></li>
		    <li><a href="user_list.php"><img src="image/admin02.png"><center>PENGATURAN USER</center></a></li>
		</ul>
<!-- footer-->		
	<div data-role="footer" data-position="fixed" data-theme="f">
<!-- Navigasi Bar -->
	<div data-role="navbar" data-iconpos="bottom">
		      <ul>
		        <li><a href="menu_admin.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
		      </ul>
	</div>
		<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
	</div>
</div>
</body>
</html>


