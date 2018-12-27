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
  
  <!-- validasi form -->
  <script>
  $(document).ready(function() {
	$("input[type=submit]").click(function(e) {
		var kode_node = $("#kode_node").val();
		var kode_goal = $("#kode_goal").val();
	if (kode_node == '') {
			e.preventDefault();
			alert("Harap masukan kode node");
		}
	else
	if (kode_goal == '') {
			e.preventDefault();
			alert("Harap masukan kode goal");
		}
	
	});
	});
  </script>
</head>
<body>

<div data-role="page" id="buatrute">
<form id="buatrute" method="post" action="create.php?id=buatrute">

<!-------------- tag div untuk menu panel ----------->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
	
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="logout">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>
 <!-------------- tag header -----------> 
	<div data-role="header" data-position="fixed">
		<h3>Tambah Rute</h3>
	</div>
<!-------------- tag main ----------->	
	<div data-role="main" class="ui-content">
		<center><img src="image/rute.png"></center>
<!------------------------ main ---------------------->			
		<div data-role="main" class="ui-content">

		<!------------------------ Combo 1 ---------------------->			
		<fieldset class="ui-field-contain">
		<label for="kodenode">Kode Node</label>
		<select name="kode_node" id="kode_node">
			<option value="">---Kode Node---</option>
<?php
			$query = mysql_query("select kode_node from node order by kode_node");
			while($data = mysql_fetch_object($query)){
			$kode_node = $data->kode_node;
?>		
			<option value="<?php echo $kode_node;?>"><?php echo $kode_node?></option>
		
<?php
		}
?>	
		</select>
	</fieldset>
	<!------------------------ Combo 1 ---------------------->	
	<fieldset class="ui-field-contain">			
		<label for="kode_goal">Kode Goal</label>
		<select name="kode_goal" id="kode_goal">
		<option value="">---Kode Goal---</option>
<?php
		$query = mysql_query("select kode_goal from goal order by kode_goal");
		while($data = mysql_fetch_object($query)){
		$kode_goal = $data->kode_goal;
?>		
		<option value="<?php echo $kode_goal;?>"><?php echo $kode_goal?></option>
		
<?php
		}
?>	
		</select>
	</fieldset>
		
			<br>
			<input type="submit" name="btn-submit" value="Simpan" data-theme="b"></a>
			<input type="reset" name="btn-reset "value="Reset"></a>
		
		<div data-role="footer" data-position="fixed">
			<div data-role="navbar" data-iconpos="bottom">
			      <ul>
			        <li><a href="rute_list.php"><img src="image/history32.png"><center>Kembali</center></a></li>
					<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
			      </ul>
			</div>
				<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
		</div>
    </div>
</form>	
</div>
</body>
</html>


