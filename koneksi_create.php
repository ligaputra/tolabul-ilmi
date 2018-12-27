<!---------------------------------------------------------
FORM TAMBAH KONEKSI                                            
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
  
  <!-- validasi form -->
  <script>
  $(document).ready(function() {
	$("input[type=submit]").click(function(e) {
		var kode_node = $("#kode_node").val();
		var kode_tujuan = $("#node_tujuan").val();
		var nilai_g = $("#txtnilai_g").val();
	if (kode_node == '0') {
			e.preventDefault();
			alert("Harap masukan kode node");
		}
	else
	if (kode_tujuan == '0') {
			e.preventDefault();
			alert("Harap masukan kode node tujuan");
		}
		else
	if (nilai_g == '') {
			e.preventDefault();
			alert("Harap masukan nilai g(x)");
		}
	});
	});
  </script>
  
</head>

<body>

<div data-role="page" id="buatkamus">

<!-------------- tag div untuk menu panel ----------->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
	
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="logout">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>

	<form id="buatkoneksi" method="POST" action="create.php?id=buatkoneksi">
		<div data-role="header" dapat-position="fixed">
	    	<h4>Tambah Koneksi</h4>
		</div>
		
<!-------------- main ----------->
		<div data-role="main" class="ui-content">
		
<!--  Combo 1 -->			
		<fieldset class="ui-field-contain">
		<label for="kodenode">Kode Node</label>
		<select name="kode_node" id="kode_node">
		<option value="0">---kode node---</option>
<?php
		$query = mysql_query("select kode_node from node order by kode_node");
		while($data = mysql_fetch_object($query)){
		$kode_node = $data->kode_node;
?>		
		<option value="<?php echo $kode_node;?>"><?php echo $kode_node?></option>
		
<?php
		}
?>	
		<select>
		<fieldset>
<!--  Combo 2  -->	
		<fieldset class="ui-field-contain">
		<label for="nodetujuan">Node Tujuan</label>
		<select name="node_tujuan">
			<option value="0">---node tujuan---</option>
<?php
			$query1 = mysql_query("select kode_node from node order by kode_node");
			while($data = mysql_fetch_object($query1)){
			$kode_node = $data->kode_node;
?>		
			<option value="<?php echo $kode_node;?>"><?php echo $kode_node?></option>
<?php
			}
?>					
		<select>
		<fieldset>
		
		<br>
		<label for="nilai_g" class="required">Nilai Geographical g(n)</label>
		<input name="nilai_g" id="txtnilai_g" placeholder="masukan nilai g(n)"><br>
		
<!-------------------------------------------------BUTTON----------------------------------------------------->		
		<input type="submit"  name="btn-submit" value="Simpan"></a>
		<input type="reset" name="btn-reset "value="Reset"></a>
</div>

<!-------------------------------------------------Footer----------------------------------------------------->
		<div data-role="footer" data-position="fixed">
			<div data-role="navbar" data-iconpos="bottom">
			      <ul>
			        <li><a href="koneksi_list.php"><img src="image/history32.png"><center>Kembali</center></a></li>
					<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
			      </ul>
			</div>
				<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
		</div>
</form>
</div> 
</div>
</body>
</html>
