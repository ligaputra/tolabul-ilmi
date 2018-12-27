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
		var nama = $("#txtnama").val();
		var user = $("#txtuser").val();
		var password = $("#txtpassword").val();
		var type = $("#typeuser").val();
		
	if (nama == '') {
			e.preventDefault();
			alert("Harap masukan nama");
		}
	else
	if (user == '') {
			e.preventDefault();
			alert("Harap masukan isi");
		}
		else
	if (password == '') {
			e.preventDefault();
			alert("Harap masukan password");
		}
	});
	});
  </script>
  
</head>

<body>
<!-------------- First page for form ----------->
<div data-role="page" id="buatuser">
	<form id="buatuser" method="POST" action="create.php?id=buatuser">
	
<!-------------- Panel Samping ----------->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<a href="identifikasi_awal.php" class="ui-btn ui-corner-all ui-icon-carat-r ui-btn-icon-right ui-mini" type="button">identifikasi</a>
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>
	
<!-------------- Header content ----------->
		<div data-role="header" dapat-position="fixed">
	    	<h4>Tambah User</h4>
		</div>
		
<!-------------- main content ----------->
	<div data-role="main" class="ui-content">
					
			<label for="nama" class="required">Nama Lengkap</label>
			<input name="nama" id="txtnama" placeholder="masukan nama lengkap">
							
			<label for="username">Username</label>
			<input name="username" id="txtusername" placeholder="masukan username">
			
			<label for="password">Password</label>
			<input name="password" type="password" id="txtpassword" placeholder="masukan password">
			
			<fieldset class="ui-field-contain">
			<label for="type">Type User</label>
		        <select name="type" id="typeuser">
					  <option value="">---pilih---</option>
			          <option value="admin">admin</option>
			          <option value="operator">operator</option>
				</select>
			</fieldset>
			
		<div data-role="main" class="ui-content">
			<input type="submit"  name="btn-submit" value="Simpan" data-theme="b"></a>
			<input type="reset" name="btn-reset "value="Reset" data-theme="b"></a>
		</div>
		
<!-------------- footer-----------> 
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar" data-iconpos="bottom">
		      <ul>
		        <li><a href="user_list.php"><img src="image/history32.png"><center>Kembali</center></a></li>
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
