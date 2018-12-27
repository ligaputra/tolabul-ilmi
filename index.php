
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
$(document).ready(function() {
	$("input[type=submit]").click(function(e) {
		var username = $("#txtusername").val();
		var password = $("#txtpassword").val();
	if (username == '') {
			e.preventDefault();
			alert("Masukan Username");
		}
	else
	if (password == '') {
			e.preventDefault();
			alert("Masukan Password");
		}
	});
});
</script>
<style>
.ui-bar-f {
    color: white;
    background-color: grey;
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
</head>
<body>
<!-------------- First page for form ----------->
<div data-role="page" id="login" data-theme="f">

<!-------------- First page header ----------->
<div data-role="header" data-theme="f">
<h1>Login Admin</h1>
</div>
<!-------------- First page main content ----------->
<div data-role="main" class="ui-content">

<form method="post" action="validasi_login.php" data-ajax="false">

<center><img src="./image/logosamping.png"></center>

<label for="username">Username : <span>*</span></label>
<input type="text" name="username" id="txtusername" placeholder="Masukan nama">

<label for="password">Password: <span>*</span></label>
<input type="password" name="password" id="txtpassword"  placeholder="Masukan password">


<div data-role="main" class="ui-content">
<input type="submit" name="btn-submit" value="masuk" data-icon="lock" data-theme="b">
<input type="reset" name="reset" value="batal" data-icon="carat-r" data-theme="b" >

</div>
</form>
</div>
<div data-role="footer" data-position="fixed" data-theme="f">
	<h5>Sistem Pakar IP-PBX Panasonic NS1000</h5>
</div>
<!-------------------------------------------------------------
Akhir dari halaman login
-------------------------------------------------------------->

</body>
</html>

