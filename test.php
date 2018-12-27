
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
		var name = $("#nama").val();
		var email = $("#surat").val();
	if (name == '') {
			e.preventDefault();
			alert("ngaran poho");
		}
	else
	if (email == '') {
			e.preventDefault();
			alert("suratna poho");
		}
	});
});
</script>

</head>
<body>
<!-------------- First page for form ----------->
<div data-role="page">

<!-------------- First page header ----------->
<div data-role="header">
<h1>jQuery Mobile Form</h1>
</div>

<!-------------- First page main content ----------->
<div data-role="main" class="ui-content">
<form method="post" action="#pageone" data-ajax="false">

<label for="name">Name : <span>*</span></label>
<input type="text" name="name" id="nama" placeholder="Name">

<label for="email">Email: <span>*</span></label>
<input type="email" id="surat" name="email" placeholder="Email"/>

<fieldset data-role="controlgroup">
	<legend>Gender:</legend>
	<label for="male">Male</label>
	<input type="radio" name="gender" id="male" value="male">

	<label for="female">Female</label>
	<input type="radio" name="gender" id="female" value="female">
</fieldset>

<fieldset data-role="controlgroup">
	<legend>Qualification:</legend>
	<label for="graduation">Graduation</label>
	<input type="checkbox" id="graduation" value="graduation">

	<label for="postgraduation">Post Graduation</label>
	<input type="checkbox" id="postgraduation" value="postgraduation">

	<label for="other">Other</label>
	<input type="checkbox" id="other" value="other">
</fieldset>

<label for="info">Message:</label>
<textarea name="addinfo" id="info" placeholder="Message"></textarea>

<input type="submit" data-inline="true" value="Submit" data-theme="b">
</form>
</div>

<!-------------------------------------------------------------
End of First page
-------------------------------------------------------------->


<!-------------- Second page ----------->
<div data-role="page" id="pageone">
<!-------------- Second page header ----------->
<div data-role="header">
<h1>JQuery Mobile Form</h1>
</div>
<!-------------- Second page main content ----------->
<div data-role="main" class="ui-content">
<h2>Form Submitted Successfully...!!</h2>
</div>
</div>
<!-------------------------------------------------------------
End of Second page
-------------------------------------------------------------->
</body>
</html>

