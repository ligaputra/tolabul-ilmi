<!---------------------------------------------------------
 VALIDASI EDIT                                                
---------------------------------------------------------->
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
  <script type="text/javascript">

</script>
</head>

<body>

<script>
$(document).ready(function () {
$('#event').popup('open');
setTimeout(function(){$('#event').popup('close');},2000);
//window.location='./katalog_list.php';
});
</script>


<?php

//------------------------------KAMUS------------------------------------
	if(isset($_POST['update-kamus'])){
			
			$kodekata = $_POST['kodekata'];
			$kata = $_POST['kata'];
			$definisi = $_POST['definisi'];
			
			$querykamus = mysql_query("UPDATE kamus SET kata='$kata', definisi='$definisi' WHERE kode_kata ='$kodekata'");
			if($querykamus){
?>			
			
				<div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

				  <div data-role="main" class="ui-content">
					<p>Data Kamus telah dirubah</p>
				    <a href="kamus_list.php" class="ui-btn">OK</a>
				  </div>
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
					<p>Gagal dirubah</p>
				    <a href="kamus_list.php" class="ui-btn">OK</a>
				  </div>
			</div>
<?php
			}
	}
//----------------------------------NODE----------------------------------------
	if(isset($_POST['update-node'])){
			
			$kode_node = $_POST['kode_node'];
			$kategori = $_POST['kategori'];
			$isi_node = $_POST['isi_node'];
			$nilai_h = $_POST['nilai_h'];
			
			$querynode = mysql_query("UPDATE node SET kode_node='$kode_node',kategori='$kategori', isi_node='$isi_node', nilai_h='$nilai_h' 
								WHERE kode_node ='$kode_node'");
		
			if($querynode){
	
?>
				<div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

				  <div data-role="main" class="ui-content">
					<p>Data Node telah dirubah</p>
				    <a href="node_list.php" class="ui-btn">OK</a>
				  </div>
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
					<p>Gagal dirubah</p>
				    <a href="node_list.php" class="ui-btn">OK</a>
				  </div>
			</div>
<?php
			}
	}
//----------------------------------KONEKSI----------------------------------------
	if(isset($_POST['update-koneksi'])){
			
			$kd_node = $_POST['id_awal'];
			$kd_tujuan = $_POST['id_tujuan'];
			$kode_node = $_POST['kode_node'];
			$node_tujuan = $_POST['node_tujuan'];
			$nilai_g = $_POST['nilai_g'];
			
		/*	echo $kode_node;
			echo $node_tujuan;
			echo $nilai_g;
			echo $kd_node;
			echo $kd_tujuan;           */
			
			
			$querykoneksi = mysql_query("UPDATE koneksi SET kode_node='$kode_node', node_tujuan='$node_tujuan', nilai_g='$nilai_g' 
								WHERE kode_node='$kd_node' and node_tujuan='$kd_tujuan'");
			if($querykoneksi){
?>
			<div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

				  <div data-role="main" class="ui-content">
					<p>Data Koneksi telah dirubah</p>
				    <a href="koneksi_list.php" class="ui-btn">OK</a>
				  </div>
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
					<p>Gagal dirubah</p>
				    <a href="koneksi_list.php" class="ui-btn">OK</a>
				  </div>
			</div>
<?php			

			}
	}
//----------------------------------GOAL----------------------------------------
	if(isset($_POST['update-goal'])){
			
			$kode_awal = $_POST['kode_awal'];
			$kode_goal = $_POST['kode_goal'];
			$isi_goal = $_POST['isi_goal'];
			$isi_solusi = $_POST['isi_solusi'];
			
			$querygoal = mysql_query("UPDATE goal SET kode_goal='$kode_goal', isi_goal='$isi_goal', isi_solusi='$isi_solusi' 
								WHERE kode_goal = '$kode_awal'");
			if($querygoal){
			//echo $querygoal;
?>			
			<div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

				  <div data-role="main" class="ui-content">
					<p>Data Goal telah dirubah</p>
				    <a href="goal_list.php" class="ui-btn">OK</a>
				  </div>
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
					<p>Data Goal telah dirubah</p>
				    <a href="goal_list.php" class="ui-btn">OK</a>
				  </div>
			</div>
<?php			
			}
	}
//--------------------------RUTE--------------------------------

if(isset($_POST['update-rute'])){
			
			$kode_awal = $_POST['kode_awal'];
			$kode_tujuan = $_POST['kode_tujuan'];
			$kode_node = $_POST['kode_node'];
			$kode_goal = $_POST['kode_goal'];
			
			$queryrute = mysql_query("UPDATE rute SET kode_node='$kode_node', kode_goal='$kode_goal' 
								WHERE kode_node = '$kode_awal' and kode_goal='$kode_tujuan'");
			if($queryrute){
			//echo $querygoal;
?>			
			
			<div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

				  <div data-role="main" class="ui-content">
					<p>Data Rute telah dirubah</p>
				    <a href="rute_list.php" class="ui-btn">OK</a>
				  </div>
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
					<p>Gagal dirubah</p>
				    <a href="rute_list.php" class="ui-btn">OK</a>
				  </div>
			</div>
<?php
			}
	}

//--------------------------USER-------------------------------

if(isset($_POST['update-login'])){
			
			$id = $_POST['id'];
			$nama = $_POST['nama'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$type = $_POST['type'];
			
			$querylogin = mysql_query("UPDATE login SET nama='$nama', username='$username', password='$password', type='$type' 
								WHERE id = '$id'");
			if($querylogin){
			//echo $querygoal;
?>			
			
			<div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

				  <div data-role="main" class="ui-content">
					<p>Data user telah dirubah</p>
				    <a href="user_list.php" class="ui-btn">OK</a>
				  </div>
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
					<p>Gagal dirubah</p>
				    <a href="user_list.php" class="ui-btn">OK</a>
				  </div>
			</div>
<?php
			}
	}	
	
?>