<?php
//include db connect 
require_once __DIR__. '/db_connect.php';

//koneksikan db
$db = new DB_CONNECT();

if($_GET['id']){

	$kode_node = $_GET['id'];
	
	$query = mysql_query("select nilai_g,node_tujuan from koneksi where kode_node = '$kode_node'");
	while ($row = mysql_fetch_object($query)) {
				
	}}
	
	
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
  
</head>

<body>
<!-------------- First page for form ----------->
<div data-role="page" id="ident_awal">

<!-------------- First page header ----------->
<div data-role="header">
   <h1>Identifikasi Awal</h1>
</div>

<!-------------- First page main content ----------->
<div data-role="main" class="ui-content">
    <h4>Pilih Kategori</h4>
		<div data-role="collapsible">
			<h4>Daftar Kategori</h4>
	<ul data-role="listview">
		
		<li><a href="identifikasi_kedua.php?id=<?php echo $kode_node;?>"><?php echo $hasil5?></a></li>
	</ul>
</div>

<!-------------- tag div untuk footer dengan posisi fixed ----------->
 <div data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="bottom">
		      <ul>
		        <li><a href="menu_utama.php"><img src="image/history32.png"><center>Kembali</center></a></li>
		        <li><a href="katalog_create.php"><img src="image/tambah32.png"><center>Mulai</center></a></li>
		      </ul>
		</div>
			<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5> 
</div>
</body>
</html>
