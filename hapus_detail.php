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

	<script>
		$(document).ready(function () {
		$('#event').popup('open');
		setTimeout(function(){$('#event').popup('close');},2000);
		//window.location='./katalog_list.php';
	});
	</script>

</head>

<body>

<?php
//masukan class db connect
require_once __DIR__. '/db_connect.php';

//sambungkan db
$db = new DB_CONNECT();


//-----------------------------KAMUS----------------------
if(isset($_GET['id_kamus'])){
			
		$kode_kata = $_GET['id_kamus'];
		$hapuskamus = mysql_query("DELETE FROM kamus WHERE kode_kata ='$kode_kata'");
			if($hapuskamus){
?>			
			<div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

			<div data-role="main" class="ui-content">
				<h4>Data Kamus Pakar telah dihapus</h4>
			    <a href="kamus_list.php" class="ui-btn">OK</a>
			</div>
<?php
			}
			else
			{
?>
			<div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

			<div data-role="main" class="ui-content">
				<h4>Gagal dihapus</h4>
			    <a href="kamus_list.php" class="ui-btn">OK</a>
			</div>
<?php
			}
		}

//---------------------NODE--------------------------------------

if(isset($_GET['id_node'])){
			
			$kode_node = $_GET['id_node'];
			
				$hapusnode = mysql_query("DELETE FROM node WHERE kode_node = '$kode_node'");
				if($hapusnode){
?>			
					<div data-role="page" data-dialog="true" id="event">
						  <div data-role="header">
						    <h2>Informasi</h2>
						  </div>

					<div data-role="main" class="ui-content">
						<h4>Data Node telah dihapus</h4>
					    <a href="node_list.php" class="ui-btn">OK</a>
					</div>
<?php
				}
				else
				{
?>
					<div data-role="page" data-dialog="true" id="event">
						  <div data-role="header">
						    <h2>Informasi</h2>
						  </div>

					<div data-role="main" class="ui-content">
						<h4>Gagal dihapus</h4>
					    <a href="node_list.php" class="ui-btn">OK</a>
					</div>
<?php
				
				}
}
//-----------------------------GOAL-----------------------------------------

if(isset($_GET['id_goal'])){
			
		$kode_goal = $_GET['id_goal'];
		
		$hapusgoal = mysql_query("DELETE FROM goal WHERE kode_goal ='$kode_goal'");
		
			if($hapusgoal){
?>			
			<div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

			<div data-role="main" class="ui-content">
				<h4>Data telah dihapus</h4>
			    <a href="goal_list.php" class="ui-btn">OK</a>
			</div>
<?php
			}
			else
			{
?>
			<div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

			<div data-role="main" class="ui-content">
				<h4>Gagal dihapus</h4>
			    <a href="goal_list.php" class="ui-btn">OK</a>
			</div>
<?php
			}
		}
//------------------KONEKSI-------------------------------

if(isset($_GET['hapus_koneksi'])){
			
		$id = explode('_',$_GET['hapus_koneksi']);
			$kd_node = $id[0];
			$kd_tujuan = $id[1];
		
		echo $kd_tujuan;
	
		$hapusgoal = mysql_query("DELETE FROM koneksi WHERE kode_node ='$kd_node' and node_tujuan ='$kd_tujuan'");
		
			if($hapusgoal){
?>			
			<div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

			<div data-role="main" class="ui-content">
				<h4>Data telah dihapus</h4>
			    <a href="koneksi_list.php" class="ui-btn">OK</a>
			</div>
<?php
			}
			else
			{
?>
			<div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

			<div data-role="main" class="ui-content">
				<h4>Gagal dihapus</h4>
			    <a href="koneksi_list.php" class="ui-btn">OK</a>
			</div>
<?php
			}
	}
	
//------------------------RUTE------------------------------------
if(isset($_GET['hapus_rute'])){
			
		$id = explode('_',$_GET['hapus_rute']);
			$kd_node = $id[0];
			$kd_goal = $id[1];
		
		$hapusrute = mysql_query("DELETE FROM rute WHERE kode_node ='$kd_node' and kode_goal ='$kd_goal'");
		
			if($hapusrute){
?>			
			<div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

			<div data-role="main" class="ui-content">
				<h4>Data telah dihapus</h4>
			    <a href="rute_list.php" class="ui-btn">OK</a>
			</div>
<?php
			}
			else
			{
?>
			<div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

			<div data-role="main" class="ui-content">
				<h4>Gagal dihapus</h4>
			    <a href="rute_list.php" class="ui-btn">OK</a>
			</div>
<?php
			}
	}