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

//---------------------------LANGKAH SELANJUTNYA----------------------------------------------
if(isset($_GET['langkah1'])){

//masukan variable untuk get data
	$kode_node = $_GET['langkah1'];

//inisialisasi open_list
$inisialisasi = mysql_query("truncate open_list");

$kode_awal = substr($kode_node,0,1);
//tambah variable lastupdate
$lastupdate = date("Y-m-d h:i:s");

	if($kode_awal == 'A'){
		$query = mysql_query("insert into close_list (kode_node, nilai_f, nilai_g, nilai_h, lastupdate)
								values ('$kode_node','0','0','0','$lastupdate')");
	}
	//melakukan pengecekan nilai g terhadap node tujuan
	$query1 = mysql_query("select * from koneksi a
					left join node b on a.node_tujuan = b.kode_node
					where a.kode_node ='$kode_node' order by a.kode_node ");
	//cek kesediaan data
	if(mysql_num_rows($query1) < 1){
	//jika tidak ada koneksi maka
			echo "tidak ada";
			echo "<script>window.location='./hasil_identifikasi.php?id=$kode_node'</script>";

	}
	else
	{
		echo "Proses data"."<br>";
		while ($data_open = mysql_fetch_object($query1)) {

			$node_tujuan = $data_open->node_tujuan;
			$nilai_g = $data_open->nilai_g;
			$kode = $data_open->kode_node;
			$nilai_h = $data_open->nilai_h;

			$query3 = mysql_query("select nilai_g from close_list group by kode_node desc limit 1");
			if(mysql_num_rows($query3) > 0){
				$dataqu1 = mysql_fetch_object($query3);
				$nilai_g_sebelumnya = $dataqu1->nilai_g;
			}
			else
			{
				$nilai_g_sebelumnya = "0";
			}

			//melakukan perhitungan  nilai f
			$nilai_f = $nilai_g_sebelumnya + $nilai_g + $nilai_h;

			//tambah variable lastupdate
			$lastupdate = date("Y-m-d h:i:s");

			//node-node suksesor dimasukan ke dalam open_list
			$query4 = mysql_query("insert into open_list (kode_node,nilai_f,nilai_g,nilai_h,lastupdate)
									values ('$kode','$nilai_f','$nilai_g','$nilai_h','$lastupdate')");
		}

		//melakukan pelacakan nilai node suksesor terbaik dilihat dari nilai F terkecil
		$query5 = mysql_query("select kode_node, nilai_f, nilai_g, nilai_h,lastupdate from open_list order by nilai_f asc limit 1");
		$data5 = mysql_fetch_object($query5);
				$best_node = $data5->kode_node;
				$f_terkecil = $data5->nilai_f;
				$best_g = $data5->nilai_g;
				$best_h = $data5->nilai_h;
				$tanggal = $data5->lastupdate;


		//$query = "insert into close_list (kode_node, nilai_f, nilai_g, nilai_h,lastupdate)
									//values ('$best_node','$f_terkecil','$best_g','$best_h','$lastupdate')";
		//menyimpan best node ke dalam close_list
		$query6 = mysql_query("insert into close_list (kode_node, nilai_f, nilai_g, nilai_h,lastupdate)
									values ('$best_node','$f_terkecil','$best_g','$best_h','$tanggal')");

			if($query6){
				echo "<script>window.location='./proses_identifikasi.php'</script>";
			}
		}

}

//-----------------------------------------------------------------------LANGKAH ALTERNATIF--------------------------------------------------------------
if(isset($_GET['langkah2'])){

	//masukan variable untuk get data
	$kode_node = $_GET['langkah2'];

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
		if($query4)
		{
			echo "proses data";
			while ($data4 = mysql_fetch_object($query4))
			{

				$best_node = $data4->kode_node;
				$f_terkecil = $data4->nilai_f;
				$nilai_g = $data4->nilai_g;
				$nilai_h = $data4->nilai_h;
				//echo $best ."</br>";
				//echo $best_f ."</br>";
			}
				//tambah variable lastupdate
			$lastupdate = date("Y-m-d h:i:s");

			//menyimpan best node ke dalam close_list
			$query5 = mysql_query("insert into close_list (kode_node, nilai_f, nilai_g, nilai_h,lastupdate)
									values ('$best_node','$f_terkecil','$nilai_g','$nilai_h','$lastupdate')");
				if($query5)
				{
					echo "<script>window.location='./proses_identifikasi.php'</script>";
				}
		}

	}
}



?>
