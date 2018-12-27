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
		  window.location.href='hapus_detail.php?hapus_koneksi='+nil;
		 }
		}
   </script>
</head>
<body>

<div data-role="page" id="koneksipage">

	<!-------------- tag div untuk menu panel ----------->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<a href="identifikasi_awal.php" class="ui-btn ui-corner-all ui-icon-carat-r ui-btn-icon-right ui-mini" type="button" name="logout">Identifikasi</a>
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="logout">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>
  	<!-------------- tag div untuk header ----------->
	<div data-role="header" data-position="fixed">
		<h3>List Koneksi</h3>
	</div>
	
	<div data-role="main" class="ui-content">
	
	<center><img src="image/koneksi128.png"></center>
	
	<!-- memanggil class filter-->
	<form class="uifilterable">
		<input id="myfilter" data-type="search">
	</form>
	
	<ul data-role="listview" data-filter="true" data-input="#myfilter" data-autodividers="true" data-inset="true">
	
	<?php

	//get data dari db katalog
	  $query = mysql_query("select * from koneksi order by kode_node") or die (mysql_error());

	  //pengecekan hasil
	  if(mysql_num_rows($query)>0){
	  
	  //looping hasil ke dalam object
		while ($data = mysql_fetch_object($query)) {
			
			$kode_node = $data->kode_node;
			$node_tujuan = $data->node_tujuan;
			$nilai_g = $data->nilai_g;
			$type = $kode_node.'_'.$node_tujuan;
	?>
<!-- katalog list -->
		<li data-role="divider" data-inset="true">
		<a href="koneksi_edit.php?type=<?=$type?>">
			<H4><?php echo $kode_node; ?> -------- <?php echo $node_tujuan;?></H4>
			<p class="ui-li-aside">nilai g(n): <?php echo $nilai_g;?></p>		
		</a>
			<a onclick="delete_id('<?=$type;?>')"id="editkoneksi" data-icon="delete">hapus</a>
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
		        <li><a href="panel_admin.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
		        <li><a href="koneksi_create.php"><img src="image/tambah32.png"><center>Tambah Koneksi</center></a></li>
		      </ul>
		</div>
			<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
		</div>
	</div>
	
</div>
</body>
</html>


