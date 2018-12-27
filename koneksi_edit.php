<!DOCTYPE html>
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

<!-- Include jQuery Mobile stylesheets -->
<div data-role="page" id="katalog_edit">
<form method="post" action="edit.php">

<!-- Include jQuery Mobile stylesheets -->	
	<div data-role="header">
		<h1>Edit Koneksi</h1>
	</div>

<!-------------- tag div untuk menu panel ----------->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<a href="identifikasi_awal.php" class="ui-btn ui-corner-all ui-icon-carat-r ui-btn-icon-right ui-mini" type="button" name="logout">Identifikasi</a>
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="logout">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>

<?php
	//get data dari db koneksi
	if(isset($_GET['type'])){
			
			$id = explode('_',$_GET['type']);
			$kd_node = $id[0];
			$kd_tujuan = $id[1];
			
			//$test = "select kode_node,node_tujuan,nilai_g from koneksi where kode_node = '$kd_node' and node_tujuan = '$kd_tujuan'";
			
			
?>
<!-- Include jQuery Mobile stylesheets -->	
	<div data-role="main" class="ui-content">
		
		
		<input type="hidden" name="id_awal" value="<?php echo $kd_node;?>">
		<input type="hidden" name="id_tujuan" value="<?php echo $kd_tujuan;?>">
		
		<fieldset class="ui-field-contain">
		<label for="kodenode">Kode Node</label>
		<select name="kode_node" id="txtkode_node">
<?php
		$query = mysql_query("select kode_node from node order by kode_node = '$kd_node' desc");
		while($data = mysql_fetch_object($query)){
		$kode_node = $data->kode_node;
?>		
		<option value="<?php echo $kode_node;?>"><?php echo $kode_node?></option>
			
<?php 
	
	}
?>
		</select>
		</fieldset>
		
		<fieldset class="ui-field-contain">
		<label for="kodenode">Node tujuan</label>
		<select name="node_tujuan" id="txtnode_tujuan">


<?php
	 $query2 = mysql_query("select kode_node from node order by kode_node = '$kd_tujuan' desc");
	 while($data2 = mysql_fetch_object($query2)){
						
			$node_tujuan = $data2->kode_node;
			
	
?>		
		<option value="<?php echo $node_tujuan;?>"><?php echo $node_tujuan?></option>
			
<?php 
	}
	$query3 = mysql_query("select nilai_g from koneksi where kode_node = '$kd_node' and node_tujuan='$kd_tujuan'");
		$data3 = mysql_fetch_object($query3);
		$nilai_g = $data3->nilai_g;	

}
	
	
?>	
	</select>
	</fieldset>
			
		<label for="nilai_g">Nilai Geographical g(n)</label>
		<textarea name="nilai_g" id="nilai_g"><?php echo $nilai_g;?></textarea>

<!-- Tombol Update-->		
	</div>
	<div data-role="main" class="ui-content">
			<button type="submit" name="update-koneksi"><img src="image/history32.png"><center>UPDATE</center></button>
	</div>
	
		<!-- Footer-->
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="bottom">
		      <ul>
		        <li><a href="koneksi_list.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
		     </ul>
		</div>
			<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
		</div>
	</div>

</div>
</body>
</html>
