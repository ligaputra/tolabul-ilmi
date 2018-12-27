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
  
</head>

<body>
<form id="a_star">

<!-------------- id halaman ----------->
<div data-role="page" id="proses_pelacakan">

<!-------------- tag div untuk menu panel ----------->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="edit">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>
	
<!-------------- tag header ----------->
		<div data-role="header" dapat-position="fixed">
	    	<h4>Proses Identifikasi</h4>
		</div>
		
<!-------------- tag main ----------->
		<div data-role="main" class="ui-content">
<?php
$query1 = mysql_query("select * from close_list a 
						  inner join node b on a.kode_node = b.kode_node 
						  where a.kode_node not like 'A%'
						  order by a.lastupdate desc limit 1");
						
						if(mysql_num_rows($query1) > 0){
						
							$data1 = mysql_fetch_object($query1);
							$kode = $data1->kode_node;
							$kategori = $data1->kategori;
							$isi = $data1->isi_node;
						}
						else
						{
							echo "Tabel Close_list kosong";
						}

?>	
		<label for="istruksi"><b>Lakukan pengecekan pada segment :</b></label>
		<input name="kategori" id="txtkategori" placeholder="kategori" readonly value="<?php echo $kategori;?>">
		
		
		<label for="istruksi"><b>Untuk mengidentifikasi gejala kerusakan dengan kondisi :</b></label>
		<textarea name="definisi" id="txtdefinisi" readonly><?php echo $isi;?></textarea>
	<!--	
		<label for="instruksi"><b>Prosedur Pengecekan :</b></label>
		<div data-role="collapsibleset">
			<div data-role="collapsible">
		        <h4>Prosedur</h4>
	
		</div> 
		</div>-->
		
		<div data-role="main" class="ui-content">
		
		<a href="a_star.php?langkah1=<?php echo $kode;?>" class="ui-btn ui-btn-b btn-corner-all">Langkah Selanjutnya</a>
<?php

		$query2 = mysql_query("select * from open_list where kode_node != '".$kode."'");

		if(mysql_num_rows($query2) > 0){
			
?>	
			<a href="a_star.php?langkah2=<?php echo $kode;?>" class="ui-btn ui-btn-b btn-corner-all">Langkah Alternatif</a>
			</div>
<?php
		}
		else
		{
?>			
			<a href="" class="ui-btn ui-btn-b btn-corner-all">Tidak ada Langkah Alternatif</a>
			</div>
<?php	
		}
?>
<label for="kode node"><small><i>engineering code : <?php echo $kode;?></i></small></label>
		
<!-------------- tag div untuk footer dengan posisi fixed ----------->
	<!-- footer-->		
	<div data-role="footer" data-position="fixed">
	<!-- Navigasi Bar -->
		<div data-role="navbar" data-iconpos="bottom">
			      <ul>
			        <li><a href="identifikasi_awal.php"><img src="image/history32.png"><center>Ulangi Identifikasi</center></a></li>
					<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
			      </ul>
		</div>
		<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
	</div>
	</form>
</div> 
</body>
</html>
