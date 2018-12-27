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
			
			$id = $_GET['type'];
			$hasil = mysql_query("select * from kamus where kode_kata = $id");
			$row = mysql_fetch_array($hasil);
			//$kodekata = $row->kodekata;
			//$kata = $row->kata;
			//$definisi = $row->definisi;
			
	}
	if(isset($_POST['btn-update'])){
			
			$kode_kata = $_POST['kode_kata'];
			$kata = $_POST['kata'];
			$definisi = $_POST['definisi'];
			
			$sql_query = "UPDATE katalog SET kamus='$kata', definisi='$definisi' WHERE kode_kata =".$kode_kata;
			mysql_query($sql_query);
};
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

<!-- TAG Form-->
<div data-role="page" id="kamus_detail">
<form method="" action="">

<!-- TAG Header -->	
	<div data-role="header"><h1>Detail Kamus</h1></div>
	
<!-------------- tag div untuk menu panel ----------->
<div data-role="panel" id="MenuPanel" data-display="overlay"> 
	<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="edit">Logout</a>
	</br>
	<center><img src = "image/logosamping.png"</a></center>
</div>

<!-- TAG Main content -->	
	<div data-role="main" class="ui-content">
	<center><img src = "image/kamus.png"</a></center>
		<input type="hidden" name="kodekata" readonly value="<?php echo $id;?>">
				
		<label for="kata">Kata</label>
		<input type="text" name="kata" readonly value="<?php echo $row['kata'];?>">
		
		<label for="definisi">Definisi</label>
		<textarea name="definisi" id="definisi" readonly><?php echo $row['definisi'];?></textarea>

	
	</div>
	
<!-- footer-->		
	<div data-role="footer" data-position="fixed">
	<div data-role="navbar" data-iconpos="bottom">
			 <ul>
				<li><a href="kamus_list.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
		     </ul>
		
	</div>
		<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
	</div>
</div>

</body>
</html>
