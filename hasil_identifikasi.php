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
<style>
.ui-bar-f {
    color: white;
    background-color:#808080;
}
.ui-body-f {
    font-weight: bold;	`
    color: white;
    background-color: purple;
}

.ui-page-theme-f {
    background-image: -moz-linear-gradient(top,#FF9900 ,#FFFFFF);
	background-image: -webkit-gradient(linear,left top,left bottom, color-stop(0, #FF9900), color-stop(1, #FFFFFF));
}
.ui-btn {
    background: #FF9900;
    background-image: -moz-linear-gradient(top, #FF9900, #FF9900);
    background-image: -webkit-gradient(linear,left top,left bottom, color-stop(0, #FF9900), color-stop(1, #FF9900));
	color:#FFFFFF;
	text-shadow:0px 0px 0px ;
	font-size: 16px;
	border: none;
}
</style>
<body>

<div data-role="page" id="hasil_identifikasi" data-theme="f">

	<div data-role="header" data-position="fixed" data-theme="f">
		<h1>.:Hasil Identifikasi:.</h1>
	</div>
	
	<div data-role="main" class="ui-content">
	
<?php

if($_GET['id']){
	
	$kode_goal = $_GET['id'];
	//ambil parameter node indentifikasi awal
		$query = mysql_query("select node.isi_node from close_list 
								inner join node 
								on close_list.kode_node = node.kode_node and close_list.kode_node like 'A%'");
				$data = mysql_fetch_object($query);
					$isi_node = $data->isi_node;
								
								
		$query1 = mysql_query("select goal.isi_goal, goal.isi_solusi from rute 
					inner join goal
					on rute.kode_goal = goal.kode_goal 
					where rute.kode_node = '$kode_goal'");
					$data1 = mysql_fetch_object($query1);
						$isi_goal = $data1->isi_goal;
						$isi_solusi = $data1->isi_solusi;		
	
							
?>	
	<label for="kode node"><strong>Permasalahan yang dihadapi :</strong></label>
	<input name="awal" readonly value="<?php echo $isi_node?>"><br>
	<label for="kode node"><strong>Kerusakan dapat teridentifikasi setelah memastikan kondisi :</strong></label>
	
<?php	
			
		$query2 = mysql_query("select node.kode_node, node.isi_node from close_list 
								inner join node 
								on close_list.kode_node = node.kode_node and close_list.kode_node not like 'A%'
								group by close_list.lastupdate asc");
			
		if(mysql_num_rows($query2) > 1){
			while($data2 = mysql_fetch_object($query2)){
				$kode = $data2->kode_node;
				$isinya = $data2->isi_node;
			
?>	
	
	<textarea name="hasil" id="txthasil" placeholder="step pengecekan" readonly><?php echo $isinya?></textarea>
	<label for="kode"><small><i>engineering code :<?php echo $kode;?></i></small></label>
	
<?php
				}
			
				$query3 = mysql_query("select SUM(nilai_f) as total_nilai_f from close_list ");
				$data3 = mysql_fetch_object($query3);
					$total_nilai_f = $data3->total_nilai_f;
	}
	else
	{
		echo "Tidak ada data";
	}
}
?>
	<br>
	<label for="kesimpulan"><strong>Hasil Kesimpulan :</strong></label>
	<textarea name="kesimpulan" id="txtkesimpulan" placeholder="kesimpulan" readonly><?php echo $isi_goal?></textarea>
	
	<label for="solusi"><strong>Solusi yang dapat dilakukan :</strong></label>
	<textarea name="solusi" id="txtsolusi" placeholder="solusi" readonly><?php echo $isi_solusi?></textarea>
	
	<label for="total_f"><strong>Total nilai heuristik :</strong></label>
	<input name="totalcost" id="txttotalcost placeholder="total_cost" readonly value="<?php echo $total_nilai_f?>">

	<br>
	<a href="identifikasi_awal.php" class="ui-btn ui-corner-all ui-btn-b">Kembali ke identifikasi</a>
	
	<div data-role="footer" data-position="fixed" data-theme="f">
		<h1>Sistem Pakar IP-PBX Panasonic NS1000</h1>
	</div>
</div>
</body>
</html>


