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
<!-------------- First page for form ----------->
<div data-role="page" id="ident_awal">

<!-------------- tag div untuk menu panel ----------->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="edit">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>

<!-------------- First page header ----------->
<div data-role="header">
   <h1>Diagnosa Goal</h1>
</div>

<!-------------- First page main content ----------->
<div data-role="main" class="ui-content">
    <h4>Berdasarkan identifikasi Permasalahan</h4>
	<h4>Sistem Pakar telah mendiagnosa kerusakan yang terjadi yaitu</h4>
	
<!-------------- Filterisasi dengan search ----------->	
	<form class="uifilterable">
		<input id="myfilter" data-type="search">
	</form>
		
<?php

if(isset($_GET['id'])){
	
	$kode_identifikasi = $_GET['id'];

//get data dari db node

$query1 = mysql_query("select kode_goal from rute where kode_node = '$kode_identifikasi'");
	while($data1 = mysql_fetch_object($query1)){
		$kode_goal = $data1->kode_goal;
		
$query2 = mysql_query("select isi_goal from goal where kode_goal = '$kode_goal'");
	while($data2 = mysql_fetch_object($query2)){
		$isi_goal = $data2->isi_goal;
	
?>
		
	<ul data-role="listview" data-filter="true" data-input="#myfilter" data-autodividers="true" data-inset="true">
		<li data-role="divider" data-inset="true">
		<a href="identifikasi_goal.php?goal=<?php echo $kode_identifikasi;?>">
			<p><h4><?php echo $isi_goal?></h4></p>
			<p>kode : <?php echo $kode_goal;?></p>
		</a>
			 
<?php

	}
  }
}
if(isset($_GET['goal'])){
		$kode_goal = $_GET['goal'];
		
		$query = mysql_query("select kode_node from rute where kode_goal = '$kode_goal'");
			$data1 = mysql_fetch_object($query);
				$kode = $data1->kode_node;
				
				echo "<script>windows.location = './a_star_test_4.php?id=<?php echo $kode;?>'></script>";
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
				if($_SESSION["type"] == 'superuser'){
				?>
				<li><a href="identifikasi_awal.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<?php 
				}
				else
				{
				?>
				<li><a href="identifikasi_awal.php"><img src="image/history32.png"><center>Kembali</center></a></li>
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
