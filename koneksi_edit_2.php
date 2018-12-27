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
	
	//get data dari db katalog
	if(isset($_GET['type'])){
			
			$id = explode('_',$_GET['type']);
			$kd_node = $id[0];
			$kd_tujuan = $id[1];
			
			//$test = "select kode_node,node_tujuan,nilai_g from koneksi where kode_node = '$kd_node' and node_tujuan = '$kd_tujuan'";
			$query = mysql_query("select kode_node,node_tujuan,nilai_g from koneksi where kode_node = '$kd_node' and node_tujuan = '$kd_tujuan'");
			$data = mysql_fetch_object($query);
						
			$kode_node = $data->kode_node;
			$node_tujuan = $data->node_tujuan;
			$nilai_g = $data->nilai_g;
			
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

</head>

<body>

<!-- Include jQuery Mobile stylesheets -->
<div data-role="page" id="katalog_edit">
<form method="post" action="edit.php">

<!-- Include jQuery Mobile stylesheets -->	
	<div data-role="header">
		<h1>Edit Koneksi</h1>
	</div>

<!-- Include jQuery Mobile stylesheets -->	
	<div data-role="main" class="ui-content">
		
		
		<input type="hidden" name="id_awal" value="<?php echo $kd_node;?>">
		<input type="hidden" name="id_tujuan" value="<?php echo $kd_tujuan;?>">
		
		<label for="kodenode">Kode Node</label>
		<input type="text" name="kode_node" value="<?php echo $kd_node;?>">
				
		<label for="nodetujuan">Node Tujuan</label>
		<input type="text" name="node_tujuan" value="<?php echo $node_tujuan;?>">
		
		<label for="nilai_g">Nilai g(x)</label>
		<textarea name="nilai_g" id="nilai_g"><?php echo $nilai_g;?></textarea>

<!-- Tombol Update-->		
	</div>
	<div data-role="main" class="ui-content">
			<button type="submit" name="update-koneksi"><img src="image/history32.png"><center>UPDATE</center></button>
	</div>
	
		<div data-role="footer" data-position="fixed">
			<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
		</div>	
	</div>
</div>
</body>
</html>
