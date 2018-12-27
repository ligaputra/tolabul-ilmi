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

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>Collapsible Sets</h1>
  </div>

  <div data-role="main" class="ui-content">
    <div data-role="collapsibleset">
      <div data-role="collapsible">
        <h3>Click me - I'm collapsible!</h3>
        <p>I'm the expanded content.</p>
	</div>
      <div data-role="collapsible">
        <h3>Click me - I'm collapsible!</h3>
        <p>I'm the expanded content.</p>
      </div>
      <div data-role="collapsible">
        <h3>Click me - I'm collapsible!</h3>
        <p>I'm the expanded content.</p>
      </div>
      <div data-role="collapsible">
        <h3>Click me - I'm collapsible!</h3>
        <p>I'm the expanded content.</p>
      </div>
    </div>
  </div>

  <div data-role="footer">
    <h1>Insert Footer Text Here</h1>
  </div>
</div> 

</body>

</html>
