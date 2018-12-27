
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
			e.preventDefault(e);
			$("#myevent").click();
			
		}
	else
	if (password == "") {
			e.preventDefault();
			alert("Masukan Password");
		}
	});
});
</script>
</head>
<body>
<!-------------- First page for form ----------->
<div data-role="page" id="login">

<!-------------- First page header ----------->
<div data-role="header">
<h1>Login Admin</h1>
</div>
<!-------------- First page main content ----------->
<div data-role="main" class="ui-content">

<form method="post" action="validasi_login.php" data-ajax="false">

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
<div data-role="footer" data-position="fixed">
 <div data-role="navbar" >
   <ul>
     <li><a href="#" data-icon="mail" data-iconpos="notext" data-role="button"></a></li>
     <li><a href="#" data-icon="camera" data-iconpos="notext" data-role="button"></a></li>
     <li><a href="#" data-icon="heart" data-iconpos="notext" data-role="button"></a></li>
   </ul>
 </div>
 <div data-role="page" data-dialog="true" id="myevent">
		  <div data-role="header">
		    <h2>Masukan User Name</h2>
		  </div>
 
</div>
<!-------------------------------------------------------------
Akhir dari halaman login
-------------------------------------------------------------->

</body>
</html>

