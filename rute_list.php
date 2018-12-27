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
		  window.location.href='hapus_detail.php?hapus_rute='+nil;
		 }
		}
   </script>
</head>
<body>

<div data-role="page" id="kamuspage">

	<!-- tag div untuk menu panel -->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<a href="identifikasi_awal.php" class="ui-btn ui-corner-all ui-icon-carat-r ui-btn-icon-right ui-mini" type="button" name="logout">Identifikasi</a>
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="logout">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
		
	</div>
  	<!-- tag div untuk header -->
	<div data-role="header" data-position="fixed">
		<h3>List Rute</h3>
	</div>
	
	<div data-role="main" class="ui-content">
	<center><img src="image/03rute128.png"></center>
	
<!-- memanggil class filter-->
	<form class="uifilterable">
		<input id="myfilter" data-type="search">
	</form>
	
	<ul data-role="listview" data-filter="true" data-input="#myfilter" data-autodividers="true" data-inset="true">
	
	<?php
	  
	  //get data dari db katalog
	  $hasil = mysql_query("select * from rute order by kode_node") or die (mysql_error());

	  //pengecekan hasil
	  if(mysql_num_rows($hasil)>0){
	  
	  //looping hasil ke dalam object
		while ($row = mysql_fetch_object($hasil)) {
			
			$kode_node = $row->kode_node;
			$kode_goal = $row->kode_goal;
			$type = $kode_node.'_'.$kode_goal;
	?>
<!-- katalog list -->
		<li data-role="divider" <span class>
			<a href="rute_edit.php?type=<?=$type;?>">
				<H4><?php echo $kode_node;?> -------- <?php echo $kode_goal;?></H4>
			</a>
			<a onclick="delete_id('<?=$type;?>')"id="editrute" data-icon="delete">hapus</a>
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
		        <li><a href="rute_create.php"><img src="image/tambah32.png"><center>Tambah Rute</center></a></li>
		      </ul>
		</div>
			<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>

	</div>
    </div>
</body>
</html>


