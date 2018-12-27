<?php

//memulai session
session_start();
if(empty($_SESSION['username']))
{
header('Location: login.php');
}

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
		var kata = $("#txtkata").val();
		var definisi = $("#txtdefinisi").val();
	if (kata == '') {
			e.preventDefault();
			alert("Harap masukan kata");
		}
	else
	if (definisi == '') {
			e.preventDefault();
			alert("Harap masukan definisi");
		}
	});
	});
  </script>
  
</head>

<body>

<div data-role="page" id="buatkamus">

	<form id="buatkamus" method="POST" action="create.php?id=buatkamus">
		<div data-role="header" dapat-position="fixed">
	    	<h4>Tambah Kamus</h4></div>
<!-------------- tag div untuk menu panel ----------->
<div data-role="panel" id="MenuPanel" data-display="overlay"> 
	<a href="node_list.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="logout">Logout</a>
	</br>
	<center><img src = "image/logosamping.png"></center>
</div>

<div data-role="main" class="ui-content">
		
		<label for="kata" class="required">Kata</label>
		<input name="kata" id="txtkata" placeholder="masukan kata" minlength="5">
	
		<label for="definisi">Definisi</label>
		<textarea name="definisi" id="txtdefinisi" placeholder="masukan definisi"></textarea><br>
		
		<input type="submit"  name="btn-submit" value="Simpan"></a>
		
<!-- footer-->		
	<div data-role="footer" data-position="fixed">
<!-- Navigasi Bar -->
	<div data-role="navbar" data-iconpos="bottom">
		      <ul>
		        <li><a href="menu_admin.php"><img src="image/history32.png"><center>Kembali</center></a></li>
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
