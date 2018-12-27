<?php
//memulai session
session_start();
if(empty($_SESSION['username']))
{
header('Location: login.php');
}
//masukan class db connect
require_once __DIR__. '/db_connect.php';

//sambungkan db
$db = new DB_CONNECT();


if($_GET['id']){
	$kode_node = $_GET['id'];
}

?>


<!HASIL IDENTIFIKASI 2>
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

<div data-role="page" id="hasil_identifikasi">

	<div data-role="header" data-position="fixed">
		<h3>Perhatian</h3>
	</div>
	
	<div data-role="main" class="ui-content">
	<center><img src="image/01cross.png"></center>
	
	<center><h4>Masalah tidak teridentifikasi</h4></center>
	<br>
	<label for="kode node"><center><strong>ulangi proses identifikasi</center></strong></label>
	<a href="identifikasi_awal.php" class="ui-btn ui-corner-all ui-btn-b">Ulangi Proses</a>
	
	<div data-role="footer" data-position="fixed">
		<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
	</div>
</div>
</body>
</html>


