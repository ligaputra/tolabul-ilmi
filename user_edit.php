<!DOCTYPE html>
<?php

	//masukan class db connect
	require_once __DIR__. '/db_connect.php';
	
	//sambungkan db
	$db = new DB_CONNECT();
	
	//get data dari db katalog
	if(isset($_GET['type'])){
			
			$id = $_GET['type'];
			$query = mysql_query("select * from login where id = '$id'");
				$data = mysql_fetch_object($query);
				
				$id = $data->id;
				$nama = $data->nama;
				$username = $data->username;
				$password = $data->password;
				$type = $data ->type;
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
		var nama = $("#nama").val();
		var user = $("#user").val();
		var password = $("#password").val();
		var type = $("#type").val();
		
	if (nama == '') {
			e.preventDefault();
			alert("Harap masukan nama");
		}
	else
	if (user == '') {
			e.preventDefault();
			alert("Harap masukan username");
		}
		else
	if (password == '') {
			e.preventDefault();
			alert("Harap masukan password");
		}
		else
	if (type == '') {
			e.preventDefault();
			alert("Harap masukan type user");
		}
	});
	});
  </script>
<style>
.ui-bar-f {
    color: black;
    background-color: orange;
}

.ui-body-f {
    font-weight: bold;
    color: white;
    background-color: purple;
}

.ui-page-theme-f {
    font-weight: bold;
    background-image: -moz-linear-gradient(top, #FFFFFF, #FFFFFF );
}


</style>
</head>

<body>
<div data-role="page" id="user_edit">
<form method="post" action="edit.php">

<!-------------- Panel Samping ----------->
	<div data-role="panel" id="MenuPanel" data-display="overlay"> 
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="edit">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>
<!-------------- Header ----------->	
	<div data-role="header" data-theme="f">
		<h1>Edit User Login</h1>
	</div>
	
	<div data-role="main" class="ui-content">
		
		<input type="hidden" name="id" value="<?php echo $id;?>">	
		
		<label for="kodenode">Nama</label>
		<input type="text" name="nama" id="nama" value="<?php echo $nama;?>">
				
		<label for="kata">Username</label>
		<input type="text" name="username" id="user" value= "<?php echo $username;?>">
		
		<label for="password">Password</label>
		<input type="text" name="password" id="password" value="<?php echo $password;?>">
			
		<fieldset class="ui-field-contain">
		<label for="type">Type User</label>
		        <select name="type" id="type">
					  <option value="<?php echo $type;?>"><?php echo $type;?></option>
			          <option value="superuser">admin</option>
			          <option value="user">user</option>
				</select>
			</fieldset><br>
	<br>	
	<button class="ui-btn ui-btn-a ui-corner-all ui-icon-carat-r ui-btn-icon-right" 
		type="submit" name="update-login" data-icon="carat-r"><center>Ubah</center></button>
	
</div>
<!-- footer-->		
	<div data-role="footer" data-position="fixed" data-theme="f">
<!-- Navigasi Bar -->
	<div data-role="navbar" data-iconpos="bottom">
		      <ul>
		        <li><a href="panel_admin.php"><img src="image/history32.png"><center>Kembali</center></a></li>
				<li><a href="#MenuPanel"><img src="image/02android32.png"><center>Menu</center></a></li>
		      </ul>
	</div>
		<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
	</div>
</div>
</body>
</html>
