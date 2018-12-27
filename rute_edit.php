<!DOCTYPE html>
<?php

	//masukan class db connect
	require_once __DIR__. '/db_connect.php';
	
	//sambungkan db
	$db = new DB_CONNECT();
	
	//get data dari db katalog
	if(isset($_GET['type'])){
			
			$id = explode('_',$_GET['type']);
				
			$kodenode = $id[0];
			$kodegoal = $id[1];
			
			$query = mysql_query("select kode_node,kode_goal from rute where kode_node = '$kodenode' and kode_goal = '$kodegoal'");
			$data = mysql_fetch_object($query);
						
			$kode_node = $data->kode_node;
			$kode_goal = $data->kode_goal;
			
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
<div data-role="page" id="rute_edit">
<form method="post" action="edit.php">

<!--Panel Samping -->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="edit">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>
<!-- Header -->	
	<div data-role="header">
		<h1>Edit Rute</h1>
	</div>
<!-- Main-->	
	<div data-role="main" class="ui-content">
	
		<input type="hidden" name="kode_awal" value="<?php echo $kodenode;?>">
		<input type="hidden" name="kode_tujuan" value="<?php echo $kodegoal;?>">
		
		<fieldset class="ui-field-contain">
		<label for="kodenode">Kode Node</label>
		<select name="kode_node" id="txtkode_node">
		<?php
		$query = mysql_query("select kode_node from node order by kode_node = '$kode_node' desc");
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
		<label for="kodenode">kode Goal</label>
		<select name="kode_goal" id="kode_goal">


<?php
	 $query2 = mysql_query("select kode_goal from goal order by kode_goal = '$kode_goal' desc");
	 while($data2 = mysql_fetch_object($query2)){
						
			$kode_goal = $data2->kode_goal;
?>		
		<option value="<?php echo $kode_goal;?>"><?php echo $kode_goal?></option>
			
<?php 
	}
?>

		</select>
		</fieldset>
	
		<br>
		<button class="ui-btn ui-btn-a ui-corner-all ui-icon-carat-r ui-btn-icon-right" 
		type="submit" name="update-rute" data-icon="carat-r"><center>Ubah</center></button>
	</div>	

		<!-- footer-->		
	<div data-role="footer" data-position="fixed">
<!-- Navigasi Bar -->
	<div data-role="navbar" data-iconpos="bottom">
		      <ul>
		        <li><a href="rute_list.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
		      </ul>
	</div>
		<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
	</div>
	</div>
</div>
</body>
</html>
