<?php
session_start();
if(empty($_SESSION['username']))
{
header('Location: index.php');
}

//include db connect 
require_once __DIR__. '/db_connect.php';

//koneksikan db
$db = new DB_CONNECT();

if($_GET['id']){

	//masukan variable untuk get data
	$kode_node = $_GET['id'];
	
	//eliminasi best_node from open_list	
	$q1 = mysql_query("delete from open_list where kode_node ='$kode_node'");

	//eliminasi best_node from close_list
	$q2 = mysql_query("delete from close_list where kode_node = '$kode_node'");

	//cek kesediaan data di open_list
	$q3 = mysql_query("select * from open_list");
	if(mysql_num_rows($q3) < 1){
			
				echo "Tidak ada data alternatif";
				echo "<script>window.location='./hasil_identifikasi_2.php?id=$kode_node'</script>";
	}
	else
	{
		//melakukan pelacakan nilai alternatif node suksesor terbaik dilihat dari nilai F terkecil pada open_list
		$query4 = mysql_query("select kode_node, nilai_f, nilai_g, nilai_h from open_list order by nilai_f asc limit 1");
		if($query4){
			echo "proses data";
			while ($data4 = mysql_fetch_object($query4)){
				
				$best_node = $data4->kode_node;
				$f_terkecil = $data4->nilai_f;
				$nilai_g = $data4->nilai_g;
				$nilai_h = $data4->nilai_h;
				//echo $best ."</br>";
				//echo $best_f ."</br>";
			}
				//tambah variable lastupdate
		$lastupdate = date("Y-m-d h:i:s");
		//$query = "insert into close_list (kode_node, nilai_f, nilai_g, nilai_h,lastupdate) 
									//values ('$best_node','$f_terkecil','$best_g','$best_h','$lastupdate')";
		//menyimpan best node ke dalam close_list										
		$query5 = mysql_query("insert into close_list (kode_node, nilai_f, nilai_g, nilai_h,lastupdate) 
									values ('$best_node','$f_terkecil','$nilai_g','$nilai_h','$lastupdate')");
				if($query5){	
							echo "<script>window.location='./proses_identifikasi.php'</script>";
				}
		}
				
	}
}



?>
