<!DOCTYPE html>
<?php

	//masukan class db connect
	require_once __DIR__. '/db_connect.php';
	
	//sambungkan db
	$db = new DB_CONNECT();
	
	//get data dari db katalog
	if(isset($_GET['type'])){
			
			
			$id = $_GET['type'];
			$query = mysql_query("select kode_goal,isi_goal,isi_solusi from goal where kode_goal = '$id'");
			while($data = mysql_fetch_object($query)){
				$kode_goal = $data->kode_goal;
				$isi_goal = $data->isi_goal;
				$isi_solusi = $data->isi_solusi;
			
	}
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
<div data-role="page" id="goal_edit">
<form method="post" action="edit.php">

<!-- Include jQuery Mobile stylesheets -->	
	<div data-role="header">
		<h1>Edit Goal</h1>
	</div>
	
<!-------------- tag div untuk menu panel ----------->
<div data-role="panel" id="MenuPanel" data-display="overlay"> 
	<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="edit">Logout</a>
	</br>
	<center><img src = "image/logosamping.png"</a></center>
</div>

<!-- Include jQuery Mobile stylesheets -->	
	<div data-role="main" class="ui-content">
	
		<input type="hidden" name="kode_awal" value="<?php echo $id;?>">
	
		<label for="kodekata">Kode Goal</label>
		<input type="text" name="kode_goal" readonly value="<?php echo $kode_goal;?>">
				
		<label for="isigoal">Isi Goal</label>
		<textarea name="isi_goal" id="isi_goal"><?php echo $isi_goal;?></textarea>
		
		<label for="isisolusi">Isi Solusi</label>
		<textarea name="isi_solusi" id="isisolusi"><?php echo $isi_solusi;?></textarea>

<!-- Tombol Update-->		
	<br>
	<div data-role="main" class="ui-content">
			<button class="ui-btn ui-corner-all ui-icon-carat-r ui-btn-icon-right" type="submit" name="update-goal"><center>Ubah</center></button>
	</div>
</div>
	
<!-- Footer-->
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="bottom">
		      <ul>
		        <li><a href="goal_list.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
		      </ul>
		</div>
			<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
	</div>
	
	</div>
</div>
</body>
</html>
