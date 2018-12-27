<?php
//memulai session
session_start();
if(empty($_SESSION['username']))
{
header('Location: login.php');
}
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


<?php
//-----------------KAMUS-------------------------------

if($_GET['id'] == 'buatkamus'){
	
	$kata = $_POST['kata'];
	$definisi = $_POST['definisi'];
	
	$querykamus = "insert into kamus (kata,definisi) values ('$kata','$definisi')";
	$tambahkamus = mysql_query($querykamus);

	if($tambahkamus) {
	?>
	  <div data-role="page" data-dialog="true" id="event">
				  <div data-role="header">
				    <h2>Informasi</h2>
				  </div>

			<div data-role="main" class="ui-content">
				<h4>Data Kamus telah berhasil ditambah</h4>
			    <a href="kamus_list.php" class="ui-btn">OK</a>
			</div>
	<?php
		
		}
	}
//-----------------------NODE------------------------------
//validasi penambahan untuk node	

if($_GET['id'] == 'buatnode'){
	
	$kodenode = $_POST['kodenode'];
	$kategori = $_POST{'kategori'};
	$isinode = $_POST['isinode'];
	$nilai_h = $_POST['nilai_h'];

//cek kesamaan data node	
	$ceknode = mysql_query("select kode_node from node where kode_node ='$kodenode'");
		if(mysql_num_rows($ceknode) > 0){
			$hasilcek = mysql_fetch_object($ceknode);
				$kode_node = $hasilcek->kode_node;
//jika sama maka akan mendapat warning	
			if($kodenode == $kode_node){
?>		
				<div data-role="page" data-dialog="true" id="event">
						  <div data-role="header">
						    <h2>Perhatian</h2>
						  </div>

				<div data-role="main" class="ui-content">
					<h4>Kode sudah pernah ada</h4>
					<a href="node_list.php" class="ui-btn">OK</a>
			
				</div>
				</div>
<?php
			}
			else
			{
// jika tidak sama maka node akan dimasukan ke db
				$querynode = "insert into node (kode_node,kategori,isi_node,nilai_h) values ('$kodenode','$kategori','$isinode','$nilai_h')";
				$tambahnode = mysql_query($querynode);

				if($querynode) {
?>
						<div data-role="page" data-dialog="true" id="event">
							  <div data-role="header">
							    <h2>Informasi</h2>
							  </div>

						<div data-role="main" class="ui-content">
							<h4>Data Node telah berhasil ditambahkan</h4>
						    <a href="node_list.php" class="ui-btn">OK</a>
						</div>
<?php
				}
			}
		}
		else
		{
//jika data tidak ada dalam db maka node dimasukan ke db
				$querynode = "insert into node (kode_node,kategori,isi_node,nilai_h) values ('$kodenode','$kategori','$isinode','$nilai_h')";
				$tambahnode = mysql_query($querynode);

				if($querynode) {
?>
						<div data-role="page" data-dialog="true" id="event">
							  <div data-role="header">
							    <h2>Informasi</h2>
							  </div>

						<div data-role="main" class="ui-content">
							<h4>Data Node telah berhasil ditambahkan</h4>
						    <a href="node_list.php" class="ui-btn">OK</a>
						</div>
<?php
				}
		}
}
//----------------------USER--------------------------------------------

if($_GET['id'] == 'buatuser'){
	
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$type = $_POST['type'];

//cek kesamaan data user	
	$ceklogin = mysql_query("select username from login where username ='$username'");
		if(mysql_num_rows($ceklogin) > 0){
			$hasilceklogin = mysql_fetch_object($ceklogin);
				$user_name = $hasilceklogin->username;

				if($username == $user_name){
				
?>		
						<div data-role="page" data-dialog="true" id="event">
								  <div data-role="header">
								    <h2>Perhatian</h2>
								  </div>

						<div data-role="main" class="ui-content">
							<h4>Username sudah pernah ada</h4>
							<a href="user_list.php" class="ui-btn">OK</a>
					
						</div>
						</div>
<?php		
				}
				else
				{
				$queryuser = mysql_query("insert into login (nama,username,password,type) values ('$nama','$username','$password','$type')");
					if($queryuser) {
?>
							<div data-role="page" data-dialog="true" id="event">
								<div data-role="header"><h2>Perhatian</h2></div>
								<div data-role="main" class="ui-content">
									<h4>Username sudah ditambahkan</h4>
									<a href="user_list.php" class="ui-btn">OK</a>
								</div>
							</div>
<?php					
					}
				}
		}
		else
		{
		$queryuser = mysql_query("insert into login (nama,username,password,type) values ('$nama','$username','$password','$type')");
			if($queryuser) {
?>
				<div data-role="page" data-dialog="true" id="event">
					<div data-role="header"><h2>Perhatian</h2></div>
					<div data-role="main" class="ui-content">
						<h4>Username sudah ditambahkan</h4>
						<a href="user_list.php" class="ui-btn">OK</a>
					</div>
				</div>
<?php
			}
		}
	}
//--------------------------GOAL------------------------------------

if($_GET['id'] == 'buatgoal'){
	
	$kodegoal = $_POST['kode_goal'];
	$isigoal = $_POST['isi_goal'];
	$isisolusi = $_POST['isi_solusi'];
	
	$query1 = "select kode_goal from goal where kode_goal = '$kodegoal'";
	$cekdata = mysql_query($query1);
	
	if(mysql_num_rows($cekdata) > 0){
		 $hasildata = mysql_fetch_object($cekdata);
			$kode_goal = $hasildata->kode_goal;
			
			if($kodegoal == $kode_goal){
			?>
				<div data-role="page" data-dialog="true" id="event">
						  <div data-role="header">
						    <h2>Perhatian</h2>
						  </div>

					<div data-role="main" class="ui-content">
						<h4>Kode sudah pernah ada</h4>
					    <a href="goal_list.php" class="ui-btn">OK</a>
					</div>
			<?php
			}
			else
			{
			
				$querygoal = "insert into goal (kode_goal,isi_goal,isi_solusi) values ('$kodegoal','$isigoal','$isisolusi')";
				$tambahgoal = mysql_query($querygoal);

				if($tambahgoal) {
				?>
					<div data-role="page" data-dialog="true" id="event">
						  <div data-role="header">
						    <h2>Informasi</h2>
						  </div>

					<div data-role="main" class="ui-content">
						<h4>Data Goal telah berhasil ditambahkan</h4>
					    <a href="goal_list.php" class="ui-btn">OK</a>
					</div>
				<?php
				}
			}
		}
		else
		{
		$querygoal = "insert into goal (kode_goal,isi_goal,isi_solusi) values ('$kodegoal','$isigoal','$isisolusi')";
				$tambahgoal = mysql_query($querygoal);

				if($tambahgoal) {
				?>
					<div data-role="page" data-dialog="true" id="event">
						  <div data-role="header">
						    <h2>Informasi</h2>
						  </div>

					<div data-role="main" class="ui-content">
						<h4>Data Goal<h4> 
						<h4>berhasil ditambahkan</h4>
					    <a href="goal_list.php" class="ui-btn">OK</a>
					</div>
				<?php
				}
		}
	}
	
//-------------------KONEKSI----------------------------------------

if($_GET['id'] == 'buatkoneksi'){
	
	$kode_node = $_POST['kode_node'];
	$node_tujuan = $_POST['node_tujuan'];
	$nilai_g = $_POST['nilai_g'];
		
	$query1 = "select kode_node from koneksi where kode_node = '$kode_node' and node_tujuan='$node_tujuan'";
	$cekdata = mysql_query($query1);
	
	if(mysql_num_rows($cekdata) > 0){
		 $hasildata = mysql_fetch_object($cekdata);
			$kodenode = $hasildata->kode_node;
			
			if($kode_node == $kodenode){
			?>
				<div data-role="page" data-dialog="true" id="event">
						  <div data-role="header">
						    <h2>Perhatian</h2>
						  </div>

					<div data-role="main" class="ui-content">
						<h4>Koneksi sudah pernah ada</h4>
					    <a href="koneksi_list.php" class="ui-btn">OK</a>
					</div>
			<?php
			}
			else
			{
			
				$querykoneksi = "insert into koneksi (kode_node, node_tujuan, nilai_g) values ('$kode_node','$node_tujuan','$nilai_g')";
				$tambahkoneksi = mysql_query($querykoneksi);

				if($tambahkoneksi) {
				?>
					<div data-role="page" data-dialog="true" id="event">
						  <div data-role="header">
						    <h2>Informasi</h2>
						  </div>

					<div data-role="main" class="ui-content">
						<h4>koneksi telah ditambah</h4>
					    <a href="koneksi_list.php" class="ui-btn">OK</a>
					</div>
				<?php
				}
			}
		}
		else
		{
		$querykoneksi = "insert into koneksi (kode_node, node_tujuan, nilai_g) values ('$kode_node','$node_tujuan','$nilai_g')";
				$tambahkoneksi = mysql_query($querykoneksi);

				if($tambahkoneksi) {
				?>
					<div data-role="page" data-dialog="true" id="event">
						  <div data-role="header">
						    <h2>Informasi</h2>
						  </div>

					<div data-role="main" class="ui-content">
						<h4>koneksi telah ditambah</h4>
					    <a href="koneksi_list.php" class="ui-btn">OK</a>
					</div>
				<?php
				}
		}
	}
	
//------------------------RUTE---------------------------------------

if($_GET['id'] == 'buatrute'){
	
	$kode_node = $_POST['kode_node'];
	$kode_goal = $_POST['kode_goal'];
			
	$query1 = "select kode_node from rute where kode_node = '$kode_node' and kode_goal='$kode_goal'";
	$cekdata = mysql_query($query1);
	
	if(mysql_num_rows($cekdata) > 0){
		 $hasildata = mysql_fetch_object($cekdata);
			$kdnode = $hasildata->kode_node;
			
			if($kode_node == $kdnode){
			?>
				<div data-role="page" data-dialog="true" id="event">
						  <div data-role="header">
						    <h2>Perhatian</h2>
						  </div>

					<div data-role="main" class="ui-content">
						<h4>Rute sudah pernah ada</h4>
					    <a href="rute_list.php" class="ui-btn">OK</a>
					</div>
			<?php
			}
			else
			{
			
				$queryrute = "insert into rute (kode_node, kode_goal) values ('$kode_node','$kode_goal')";
				$tambahrute = mysql_query($queryrute);

				if($tambahrute) {
				?>
					<div data-role="page" data-dialog="true" id="event">
						  <div data-role="header">
						    <h2>Informasi</h2>
						  </div>

					<div data-role="main" class="ui-content">
						<h4>Rute telah ditambah</h4>
					    <a href="rute_list.php" class="ui-btn">OK</a>
					</div>
				<?php
				}
			}
		}
		else
		{
		$queryrute = "insert into rute (kode_node, kode_goal) values ('$kode_node','$kode_goal')";
				$tambahrute = mysql_query($queryrute);

				if($tambahrute) {
				?>
					<div data-role="page" data-dialog="true" id="event">
						  <div data-role="header">
						    <h2>Informasi</h2>
						  </div>

					<div data-role="main" class="ui-content">
						<h4>Rute telah ditambah</h4>
					    <a href="rute_list.php" class="ui-btn">OK</a>
					</div>
				<?php
				}
		}
	}
	
//-----------------------------------------------------------------
?>

