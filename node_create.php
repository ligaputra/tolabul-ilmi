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
		var kodenode = $("#txtkodenode").val();
		var kategori = $("#txtkategori").val();
		var isinode = $("#txtisinode").val();
		var nilai_h = $("#txtnilai_h").val();

	if (kodenode == '') {
			e.preventDefault();
			alert("Harap masukan kode");
		}
	else
	if (kategori == '') {
			e.preventDefault();
			alert("Harap masukan kategorinya");
		}
	else
	if (isinode == '') {
			e.preventDefault();
			alert("Harap masukan isi");
		}
		else
	if (nilai_h == '') {
			e.preventDefault();
			alert("Harap masukan nilai_h");
		}
	});
	});
  </script>
  <style>
.ui-bar-f {
    color: black;
    background-color: orange;
}


</style>
</head>

<body>
//-------------- First page for form -----------
<div data-role="page" id="buatnode">
	<form id="buatnode" method="POST" action="create.php?id=buatnode">

//-------------- tag div untuk menu panel ----------->
	<div data-role="panel" id="MenuPanel" data-display="overlay">
		<a href="logout.php" class="ui-btn ui-corner-all ui-icon-lock ui-btn-icon-right ui-mini" type="button" name="edit">Logout</a>
		</br>
		<center><img src = "image/logosamping.png"</a></center>
	</div>

//-------------- Header content ----------->
		<div data-role="header" dapat-position="fixed">
	    	<h4>Tambah Node</h4>
		</div>

//-------------- main content ----------->
	<div data-role="main" class="ui-content">

			<label for="kodenode" class="required">Kode Node</label>
			<input name="kodenode" id="txtkodenode" placeholder="masukan kode node">

			<label for="kategori" class="required">Kategori Identifikasi</label>
			<input name="kategori" id="txtkategori" placeholder="masukan kategori">

			<label for="isinode">Isi Node</label>
			<textarea name="isinode" id="txtisinode" placeholder="masukan isi node"></textarea>

			<label for="nilai_h" class="required">Nilai hyphotesis Cost h(n)</label>
			<input name="nilai_h" id="txtnilai_h" placeholder="masukan nilai h(x)"></br>

		<div data-role="main" class="ui-content">
			<input type="submit" name="btn-submit-node" value="Simpan" data-icon="check"></a>
			<input type="reset" name="btn-reset "value="Reset" data-icon="info"></a>
		</div>

        //-------------- tag div untuk footer dengan posisi fixed ----------->
        	<!-- footer-->
        	<div data-role="footer" data-position="fixed">
        	     //-- Navigasi Bar -->
            		<div data-role="navbar" data-iconpos="bottom" data-theme="f">
            			      <ul>
            			        <li><a href="node_list.php"><img src="image/history32.png"><center>Kembali</center></a></li>
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
