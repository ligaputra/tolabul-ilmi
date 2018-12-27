<!DOCTYPE html>

<?php

//memulai session
session_start();
if(empty($_SESSION['username']))
{
header('Location: login.php');
}

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
		var kode = $("#txtkodegoal").val();
		var isi = $("#txtisigoal").val();
		var solusi = $("#txtisisolusi").val();
	if (kode == '') {
			e.preventDefault();
			alert("Harap masukan kode");
		}
	else
	if (isi == '') {
			e.preventDefault();
			alert("Harap masukan isi goalnya");
		}
		else
	if (solusi == '') {
			e.preventDefault();
			alert("Harap masukan isi solusiya");
		}
	});
	});
  </script>
  
</head>

<body>

<div data-role="page" id="buatgoal">
	<form id="buatgoal" method="POST" action="create.php?id=buatgoal">
		<div data-role="header" dapat-position="fixed">
	    	<h4>Tambah Goal</h4>
		</div>

		<div data-role="main" class="ui-content">
		
		<label for="kode_goal" class="required">Kode Goal</label>
		<input name="kode_goal" id="txtkodegoal" placeholder="masukan kode goal">
	
					
		<label for="definisi">Isi Goal</label>
		<textarea name="isi_goal" id="txtisigoal" placeholder="masukan isi goal"></textarea>
		
		<label for="definisi">Isi solusi</label>
		<textarea name="isi_solusi" id="txtisisolusi" placeholder="masukan isi solusi"></textarea><br>
		
		<input type="submit"  name="btn-submit" value="Simpan"></a>
		<input type="reset" name="btn-reset "value="Reset"></a>
		
<!-------------- tag div untuk footer dengan posisi fixed ----------->
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="bottom">
		      <ul>
		        <li><a href="goal_list.php"><img src="image/history32.png"><center>Kembali</center></a></li>
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
