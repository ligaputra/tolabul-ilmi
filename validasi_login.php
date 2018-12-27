<?php

//memulai session
session_start();
$error = ''; // variable untuk menyimpan pesan error
 
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


<?php

        if(isset($_POST["username"]) || (isset($_POST["password"]))){
		
		// Define $username and $password
        $username = $_POST["username"];
        $password = $_POST["password"];
        
		// To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
		$username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);
        
		// SQL query to fetch information of registerd users and finds user match.
        $query = "SELECT * from login WHERE username='$username' and password='$password'";
        $result = mysql_query($query);
		$data = mysql_fetch_row($result);
		$count =  mysql_num_rows($result);
        
            
            $id = $data[0];
            $nama = $data[1];
            $username = $data[2];
			$password = $data[3];
			$type = $data[4];
		
			
		         		
        if($count == 1){
			$_SESSION["username"]=$username;
			$_SESSION["password"]=$password;
			$_SESSION["type"]=$type;
			if($type=='user'){
			
?>
			<!-------------- id halaman ----------->
			<div data-role="page" data-dialog="true" id="validasi_login">
			<div data-role="main" class="ui-content">
				<h4>Selamat datang <?php echo $nama?></h4>
				<p>anda login sebagai [<?php echo $type?>]<p>
			    <a href="menu_user.php" class="ui-btn">Lanjutkan</a>
			</div>
			
<?php			
		}
		else
		{
?>			<div data-role="page" data-dialog="true" id="validasi_login">
			<div data-role="main" class="ui-content">
				<h4>Selamat datang <?php echo $nama?></h4>
				<p>anda login sebagai [<?php echo $type?>]<p>
			    <a href="menu_admin.php" class="ui-btn">Lanjutkan</a>
			</div>
<?php		
		}}
		
		else
		
		{
?>			
			<div data-role="page" data-dialog="true" id="validasi_login">
			<div data-role="main" class="ui-content">
				<h4>Password anda salah</h4>
			    <a href="index.php" class="ui-btn">OK</a>
			</div>
<?php		
		}
		}
?>		
