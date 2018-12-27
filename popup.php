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
<!-------------- tag div untuk page ----------->
<div data-role="page" style="background-image: url('image/-history32.png'); background-attachment: fixed; background-repeat:none; background-size: 10% 10%;" id="katalogpage">

<!-------------- tag div untuk header ----------->
	<div data-role="header" data-position="fixed">
		<h3>Menu Sistem Pakar</h3>
	</div>
<!-------------- tag div untuk main ----------->
	<div data-role="main" class="ui-content">

		
		<div data-role="content">
			<a href="#testPopup" data-rel="popup" data-role="button">Show Popup</a>
		</div>		
		
		<div id="testPopup" data-role="popup">This is a popup</div>
		
		<div data-role="panel" data-display="overlay" data-position-fixed="true">panel content</div>
	</div>
	
</div>