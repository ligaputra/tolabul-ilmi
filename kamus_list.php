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
  
    <script>
		function delete_id(nil)
		{
		 if(confirm('Yakin dihapus ?'))
		 {
		  window.location.href='hapus_detail.php?id_kamus='+nil;
		 }
		}
   </script>
</head>
<body>

<div data-role="page" id="kamuspage">

<!-------------- tag div untuk menu panel ----------->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="edit">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>
	
<!-- Header-->  
	<div data-role="header" data-position="fixed">
		<h3>Kamus Pakar</h3>
	</div>
	
<!-- Logo-->	
	<div data-role="main" class="ui-content">
	<center><img src="image/kamus128.png"></center>
	
<!-- memanggil class filter-->
	<form class="uifilterable">
		<input id="myfilter" data-type="search">
	</form>
	
	<ul data-role="listview" data-filter="true" data-input="#myfilter" data-autodividers="true" data-inset="true">
	
	<?php

	  //get data dari db katalog
	  $hasil = mysql_query("select * from kamus order by kode_kata") or die (mysql_error());
	  

	  //pengecekan hasil
	  if(mysql_num_rows($hasil)>0){
	  
	  //looping hasil ke dalam object
		while ($row = mysql_fetch_object($hasil)) {
			
			$kode_kata = $row->kode_kata;
			$kata = $row->kata;
			$definisi = $row->definisi;
			
	
//validasi edit disesuaikan dengan tipe pengguna -->
//admin diberikan hak akses untuk edit -->
		
		
			if($_SESSION["type"] == 'admin'){
		?>	
			<li data-role="divider" data-inset="true">
			<a href="kamus_edit.php?type=<?=$kode_kata;?>">		
				<H4><?php echo $kata; ?></H4>
			    <p class="ui-li-aside">code : <?php echo $kode_kata;?></p>
			<a onclick="delete_id('<?=$kode_kata;?>')"id="editkamus" data-icon="delete">hapus</a>
			</a>
			</li>
		<?php
		}
		else
		{
		?>		
			<li data-role="divider" data-inset="true">
			<a href="kamus_detail.php?type=<?=$kode_kata;?>">
				<H4><?php echo $kata; ?></H4>
				<p class="ui-li-aside">code : <?php echo $kode_kata;?></p>
			</a>
			</li>
		
<!-- Akhir dari php while -->
		<?php
			}
		}
		?>
		
	</div>
	
<!-- Footer-->
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="bottom">
		      <ul>
		        <?php 
				if($_SESSION["type"] == 'admin'){
				?>
				<li><a href="panel_admin.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
				<li><a href="kamus_create.php"><img src="image/tambah32.png"><center>Tambah Kamus</center></a></li>
				<?php 
				}
				else
				{
				?>
				<li><a href="menu_user.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
				<?php
				}
		}
	
				?>
		      </ul>
		</div>
			<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>

	</div>
    </div>
</body>
</html>


