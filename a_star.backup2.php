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
	
//inisialisasi open_list	
	$q1 = mysql_query("truncate open_list");	
	
//masukan state awal ke dalam close_list	
	$query1 = mysql_query("insert into close_list (kode_node, nilai_f) values ('$kode_node','0')");
	
//melakukan pengecekan nilai g terhadap node tujuan 
	$query2 = mysql_query("select node_tujuan, nilai_g from koneksi where kode_node = '$kode_node'");
	//jika tidak ada koneksi maka
		if(mysql_num_rows($query2) < 1){
			echo "tidak ada";
			$query1 = mysql_query("select kode_node from close_list group by kode_node desc limit 1");
				$data1 = mysql_fetch_object($query1);
				$kode = $data1->kode_node;
			
			$query2 = mysql_query("select kode_goal from rute where kode_node = '$kode'");
				$data2 = mysql_fetch_object($query2);
				$goal = $data2->kode_goal;
				if(mysql_num_rows($query2) > 0)
				{
						echo "<script>window.location='./hasil_identifikasi.php?id=$goal'</script>";
				}
				else
				{
						echo "teu aya goalna";
				}
		}
		else
		{
			echo "Proses data";
			while ($data_open = mysql_fetch_object($query2)) {
						
				$node_tujuan = $data_open->node_tujuan;
				$nilai_g = $data_open->nilai_g;
				
				//echo $node_tujuan ."</br>";
				//echo $g ."</br>";
				
								
				//melakukan pengecekan nilai h pada kode tujuan	
				$query3 = mysql_query("select kode_node,nilai_h from node where kode_node = '$node_tujuan'");
				while ($data3 = mysql_fetch_object($query3)) {
						
						$kode = $data3->kode_node;
						$nilai_h = $data3->nilai_h;
										
						//melakukan perhitungan  nilai f		
						$nilai_f = $nilai_g + $nilai_h;
						
						//	echo $f ."</br>";
						//	echo $kode ."</br>";
				
					//node-node suksesor dimasukan ke dalam open_list 		
					$query4 = mysql_query("insert into open_list (kode_node,nilai_f,nilai_g,nilai_h) values ('$kode','$nilai_f','$nilai_g','$nilai_h')");
				}

//melakukan pelacakan nilai node suksesor terbaik dilihat dari nilai F terkecil
				$query5 = mysql_query("select kode_node as best_node, min(nilai_f) as f_terkecil, nilai_g, nilai_h from open_list group by kode_node asc limit 1");
				while ($data5 = mysql_fetch_object($query5)){
						
						$best_node = $data5->best_node;
						$f_terkecil = $data5->f_terkecil;
						
						//echo $best ."</br>";
						//echo $best_f ."</br>";
						
					}
			
//menyimpan best node ke dalam close_list		
				$query6 = mysql_query("insert into close_list (kode_node, nilai_f, nilai_g, nilai_h) values ('$best_node','$f_terkecil','$nilai_g','$nilai_h')");
				if($query6){	
						//	$query7 = mysql_query("delete from open_list where kode_node ='$best_node'");	
						//	mysql_query($query7);
						//		if($query7){
									echo "<script>window.location='./proses_identifikasi.php'</script>";
								}
				
			}
		}
	}



?>


