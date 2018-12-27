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
<!-- First page for form -->
<div data-role="page" id="ident_awal">

<!--- tag div untuk menu panel -->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<a href="node_list.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="edit">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>

<!-- First page header -->
<div data-role="header">
   <h1>Identifikasi Awal</h1>
</div>

<!--=========== First page main content ============-->
<div data-role="main" class="ui-content">
    <h4>Tentukan titik permasalahan yang sedang dihadapi</h4>
	
<!--============= Filterisasi dengan search ========-->	
	<form class="uifilterable">
		<input id="myfilter" data-type="search">
	</form>
		
<?php

//get data dari db node
$query1 = mysql_query("truncate open_list");
$query2 = mysql_query("truncate close_list");

$query3 = mysql_query("select * from node where kode_node like'A%'");

//pengecekan hasil
if(mysql_num_rows($query3)>0){
	
	//looping hasil ke dalam object
		while ($row = mysql_fetch_object($query3)) {
			
			$kode_node = $row->kode_node;
			$isi_node = $row->isi_node;
			$nilai_h = $row->nilai_h;
?>
		
			<ul data-role="listview" data-filter="true" data-input="#myfilter" data-autodividers="true" data-inset="true">
				<li data-role="divider" data-inset="true">
				<a href="a_star.php?langkah1=<?php echo $kode_node;?>">
					<textarea readonly><?php echo $isi_node?></textarea>
					<p>kode : <?php echo $kode_node;?></p>
				</a>
			 
<?php

		}
}
else
{
?>
<!-- Notifikasi windows dialog jika tidak ditemukan data-->
			 <div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

			<div data-role="main" class="ui-content">
				<h4>Tidak ada data</h4>
			    <a href="logout.php" class="ui-btn">OK</a>
			</div>
<?php
		}
	
?>
</ul>
</div>

<!-------------- tag div untuk footer dengan posisi fixed ----------->
 <div data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="bottom">
		      <ul>
			  <!-------------- kondisi tombol back disesuaikan dengan session pengguna ----------->
			  <?php 
				if($_SESSION["type"] == 'admin'){
				?>
				<li><a href="menu_admin.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<?php 
				}
				else
				{
				?>
				<li><a href="menu_user.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<?php
				}
				?>
		       <li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
		      </ul>
		</div>
			<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5> 
</div>
</body>
</html>
