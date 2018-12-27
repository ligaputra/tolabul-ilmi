<!DOCTYPE html>
<!-- -=====================================================-->
<!-- USER LIST -->
<!-- -=====================================================-->
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
  
  <script>
	function myFunction(id) {
    var tombol = confirm("yakin akan dihapus??");
	//alert(anu);
		if (tombol == true){
			window.location.href='hapus_detail.php?id_node='+id;
	}}
		
   </script>
</head>
<body>

<div data-role="page" id="katalogpage">

<!-------------- header ----------->
	<div data-role="header" data-position="fixed">
		<h3>List User</h3>
	</div>
	
<!-------------- tag div untuk menu panel ----------->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<a href="node_list.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="edit">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>
	
<!-------------- main ----------->
	<div data-role="main" class="ui-content">
	
	<center><img src = "image/admin.png"</a></center>
<!------------ memanggil class filter--------------->
	<form class="uifilterable">
		<input id="myfilter" data-type="search">
	</form>
		<ul data-role="listview" data-filter="true" data-input="#myfilter" data-autodividers="true" data-inset="true">
	
	<?php

	  //get data dari db katalog
	  $query = mysql_query("select * from login") or die (mysql_error());

	  //pengecekan hasil
	  if(mysql_num_rows($query)>0){
	  
		   //looping hasil ke dalam object
			while ($data = mysql_fetch_object($query)) {
				
				$id = $data->id;
				$nama = $data->nama;
				$username = $data->username;
				$type = $data->type;
				
?>
				<li data-role="divider" <span class>
					<a href="user_edit.php?type=<?php echo $id;?>">
						<H4>Nama : <?php echo $nama; ?></H4>
						<p>Username : <?php echo $username; ?></p>
						<p class="ui-li-aside">tipe: <?php echo $type;?></p></a>
				
					<a onclick="myFunction('<?=$id?>')" id="hapus_user" data-icon="delete">hapus</a>
				</li>
			
<?php
			}
		}
?>
	</div>
 <!-------------- footer-----------> 
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="bottom">
		      <ul>
		        <li><a href="panel_admin.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
		        <li><a href="user_create.php"><img src="image/tambah32.png"><center>Tambah User</center></a></li>
		      </ul>
		</div>
			<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
	</div>

</div>
</body>
</html>


