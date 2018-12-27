<!DOCTYPE html>
<?php

	//masukan class db connect
	require_once __DIR__. '/db_connect.php';
	
	//sambungkan db
	$db = new DB_CONNECT();
	
	//get data dari db katalog
	if(isset($_GET['type'])){
			
			$kode_node = $_GET['type'];
			$query = mysql_query("select * from node where kode_node = '$kode_node'");
			$data = mysql_fetch_object($query);
			
			$kode_node = $data->kode_node;
			$kategori = $data->kategori;
			$isi_node = $data->isi_node;
			$nilai_h = $data ->nilai_h;
	}
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
<style>
.ui-bar-f {
    color: black;
    background-color:orange;
}

</style>
</head>

<body>
<div data-role="page" id="node_edit">
<form method="post" action="edit.php">

<!-------------- Panel Samping ----------->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="edit">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>
<!-------------- Header ----------->	
	<div data-role="header" data-theme="f">
		<h1>Edit Node</h1>
	</div>
	
	<div data-role="main" class="ui-content">
	
		<label for="kodenode">Kode Node</label>
		<input type="text" name="kode_node" readonly value="<?php echo $kode_node;?>">
				
		<label for="kodenode">Kategori</label>
		<input type="text" name="kategori" value="<?php echo $kategori;?>">	
		
		<label for="kata">Isi Node</label>
		<textarea type="text" name="isi_node"><?php echo $isi_node;?></textarea>
		
		<label for="definisi">Nilai h(n)</label>
		<textarea name="nilai_h" id="nilai_h"><?php echo $nilai_h;?></textarea>
	<br>	
	<button class="ui-btn ui-btn-a ui-corner-all ui-icon-carat-r ui-btn-icon-right" 
		type="submit" name="update-node" data-icon="carat-r"><center>Ubah</center></button>
	
</div>
<!-- footer-->		
	<div data-role="footer" data-position="fixed" data-theme="f">
<!-- Navigasi Bar -->
	<div data-role="navbar" data-iconpos="bottom">
		      <ul>
		        <li><a href="node_list.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
		      </ul>
	</div>
		<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
	</div>
</div>
</body>
</html>
