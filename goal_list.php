<!DOCTYPE html>

<?php

//memulai session
session_start();
if(empty($_SESSION['username']))
{
header('Location: login.php');
}

//include db connect 
require_once __DIR__. '/db_connect.php';

//koneksikan db
$db = new DB_CONNECT();
	  

?>

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
		  window.location.href='hapus_detail.php?id_goal='+nil;
		 }
		}
   </script>
</head>
<body>

<div data-role="page" id="goalpage">

	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<button class="ui-btn ui-btn-b ui-corner-all ui-icon-arrow-r ui-btn-icon-right ui-mini" type="button" name="edit">Logout</button>
	</div>
<!-- Header--> 
	<div data-role="header" data-position="fixed">
		<h3>List Goal</h3>
	</div>
	
	<div data-role="main" class="ui-content">
	<center><img src="image/05target128.png"></center>
	
<!-- memanggil class filter-->
	<form class="uifilterable">
		<input id="myfilter" data-type="search">
	</form>
	
	<ul data-role="listview" data-filter="true" data-input="#myfilter" data-autodividers="true" data-inset="true">
	
	<?php
	
	  //get data dari db katalog
	  $hasil = mysql_query("select * from goal order by kode_goal") or die (mysql_error());

	  //pengecekan hasil
	  if(mysql_num_rows($hasil)>0){
	  
	  //looping hasil ke dalam object
		while ($data = mysql_fetch_object($hasil)) {
			
			$kode_goal = $data->kode_goal;
			$isi_goal = $data->isi_goal;
			$isi_solusi = $data->isi_solusi;
			
	?>
<!-- katalog list -->
		<li data-role="divider" <span class>
			<a href="goal_edit.php?type=<?=$kode_goal;?>">
				<H4><?php echo $isi_goal; ?></H4>
				<p><?php echo $isi_solusi?></p> 
				<p>Kode : <?php echo $kode_goal;?></p>
			</a>
			<a onclick="delete_id('<?=$kode_goal;?>')"id="hapusgoal" data-icon="delete">hapus</a>
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
		        <li><a href="goal_create.php"><img src="image/tambah32.png"><center>Tambah Goal</center></a></li>
		      </ul>
		</div>
			<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>

	</div>
    </div>
</body>
</html>


