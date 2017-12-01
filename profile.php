<?php
include('session.php');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
        <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
          </li>
        
          
          <li>
                    <a  href="home.php" class="active"><i class="fa fa-dashboard fa-3x"></i> home</a>
                    </li>

                    <li>
                        <a  href="profile.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                      <li>
                        <a  href="pencarian.php"><i class="fa fa-desktop fa-3x"></i> pencarian </a>
                    </li>
                   
                             
                   
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    
                    <center>


<h1> pencarian data </h1>


<form class="form-inline" method="get" target="_self">
  <div class="form-group">
    <label class="sr-only" for="PELANGGAN"></label>
    <input type="text" class="form-control" id="PELANGGAN" placeholder="nama" name="PELANGGAN"">
  </div>
  <div class="form-group">
    <label class="sr-only" for="CENTER"></label>
    <input type="text" class="form-control" id="SERVICE_CENTER" placeholder="alamat" name="SERVICE_CENTER">
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-default">cari</button>
</form>
</center>



	<table class="table table-bordered">
		<thead>
			<tr>

				<th>PRINCIPLE </th>
				<th>SERVICE CENTER</th>
				<th>CUSTOMER NAME </th>	
				<th> TELPHONE NUMBER </th>
				<th>EMAIL ID</th>
				<th>DATE SUBMITTED</th>
				<th>MACHINE TYPE</th>
				<th>SERIAL NUMBER</th>
				<th>SERVICE TYPE</th>
				<th>SYMPTOMS</th>
				<th>ACTION TAKEN BY TECHNICIAN'</th>
				<th>DATE CASE CLOSED</th>

			</tr>
		</thead>
		<tbody>
			<?php
				include "convert.php";
				include "koneksi.php";
				include "enkrip.class.php";
			


					
					$begitu = new proses();
				$key='yuyu';
				/*$nama=$_GET['nama'];
				$alamat=$_GET['alamat'];*/
				//echo $nama.' '.$alamat;	 
				//$nama = $begitu->enkrip($_POST['nama']);
				//echo "$nama";
				

				if(isset($_GET['PELANGGAN']) || isset($_GET['SERVICE_CENTER']))
				{
					$customer = $_GET['PELANGGAN'];
					$service = $_GET['SERVICE_CENTER'];
					$plainNama = $begitu->enkrip($customer,$key);
					$plainAlamat = $begitu->enkrip($service,$key);
				
							
						if ($customer!=null && $service!=null) {
							$sql=$koneksi->prepare($koneksi,"SELECT * FROM `data_terenkripsi` WHERE `SERVICE_CENTER` LIKE '%$plainAlamat%' AND `PELANGGAN` LIKE '%$plainNama%' ");
							

						}
						elseif ($customer!=null) {
							$sql = $koneksi->prepare($koneksi,"SELECT * FROM `data_terenkripsi` WHERE `PELANGGAN` LIKE '%$plainNama%'");
						 
						}
						else{
							//$sql = mysqli_query($koneksi,"SELECT * FROM `data_terenkripsi` WHERE `SERVICE_CENTER` LIKE '%$plainAlamat%'");
							$sql = $koneksi->prepare("SELECT * FROM `data_terenkripsi` WHERE `SERVICE_CENTER` LIKE '%$plainAlamat%' ");
						}
				}


				elseif ((!isset($_GET['CENTER']))||(!isset($_GET['PELANGGAN']))) 
				{

					$sql = $koneksi->prepare("SELECT * FROM data_terenkripsi");
					//$sql=mysqli_query($koneksi, "select * from data_terenkripsi");

				}     


					
		$page = (isset($_POST['page']))? $_POST['page'] : 1;

		$limit = 5; // Jumlah data per halamannya

		// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
		$limit_start = ($page - 1) * $limit;
		
		// Cek apakah variabel data search tersedia
		// Artinya cek apakah user telah mengklik tombol search atau belum
		
			// Buat query untuk menghitung semua jumlah data
			// dengan keyword yang telah di input
			$sql2 = $koneksi->prepare("SELECT COUNT(*) AS jumlah FROM data_terenkripsi WHERE MREK LIKE :MR OR  SERVICE_CENTER LIKE :SC OR PELANGGAN LIKE :PE OR TELPHONE LIKE :TEL OR EMAIL_ID LIKE :EI OR TGL_MASUK LIKE :TM OR MACHINE_TYPE LIKE :MT OR SERIAL_NUMBER LIKE :SN OR SERVICE_TYPE LIKE :ST OR KERUSAKAN LIKE :KR  OR TINDAKAN LIKE :TI OR TGL_KELUAR LIKE :TK");
			$sql2->bindParam(':MR', $param);
			$sql2->bindParam(':SC', $param);
			$sql2->bindParam(':PE', $param);
			$sql2->bindParam(':TEL', $param);
			$sql2->bindParam(':EI', $param);
			$sql2->bindParam(':TM', $param);
			$sql2->bindParam(':MT', $param);
			$sql2->bindParam(':SN', $param);
			$sql2->bindParam(':ST', $param);
			$sql2->bindParam(':KR', $param);
			$sql2->bindParam(':TI', $param);
			$sql2->bindParam(':TK', $param);
			$sql2->execute(); // Eksekusi querynya
			$get_jumlah = $sql2->fetch();
		 //Jika user belum mengklik tombol search (PROSES TANPA AJAX)
			// Buat query untuk menampilkan semua data siswa
			$sql = $koneksi->prepare("SELECT * FROM data_terenkripsi LIMIT ".$limit_start.",".$limit);
			$sql->execute(); // Eksekusi querynya
			
			// Buat query untuk menghitung semua jumlah data
			$sql2 = $koneksi->prepare("SELECT COUNT(*) AS jumlah FROM data_terenkripsi");
			$sql2->execute(); // Eksekusi querynya
			$get_jumlah = $sql2->fetch();
		

		while($row = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
					$plaintext=$row['MREK'];
					$service=$row['SERVICE_CENTER'];
					$customer=$row['PELANGGAN'];
					$hape=$row['TELPHONE'];
					$email=$row['EMAIL_ID'];
					$date=$row['TGL_MASUK'];
					$type=$row['MACHINE_TYPE'];
					$serial=$row['SERIAL_NUMBER'];
					$servicetype=$row['SERVICE_TYPE'];
					$kerusakan=$row['KERUSAKAN'];
					$tindakan=$row['TINDAKAN'];
					$keluar=$row['TGL_KELUAR'];
	
					//hurup=array("enol","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan");
					//$angka=array(0,1,2,3,4,5,6,7,8,9);
	//$enkrip=str_replace($hurup,$angka,$hape);
	//echo $enkrip; //ke enkripsi

	
	//echo $dekrip;
	

					$hasil = $begitu->dekrip($plaintext,$key);
					$hasil1 = $begitu->dekrip($service,$key);
					$hasil2 = $begitu->dekrip($customer,$key);
					$hasil3 = $begitu->dekrip($hape,$key);
    				//$dekripsi = str_replace($hurup, $angka, $hasil4);
    				$hasil4= $begitu->dekrip($email,$key);
    				$hasil5 = $begitu->dekrip($date,$key);
    				$hasil6 = $begitu->dekrip($type,$key);
    				$hasil7 = $begitu->dekrip($serial,$key);
    				$hasil8 = $begitu->dekrip($servicetype,$key);
    				$hasil9 = $begitu->dekrip($kerusakan,$key);
    				$hasil10 = $begitu->dekrip($tindakan,$key);

    				$hasil11 = $begitu->dekrip($keluar,$key);

					 echo "<tr>
					 <td>".$hasil."</td>
					<td>".$hasil1."</td>
					 <td>".$hasil2."</td>
					 <td>".$hasil3."</td>
					 <td>".$hasil4."</td>
					 <td>".$hasil5."</td>
					 <td>".$hasil6."</td>
					 <td>".$hasil7."</td>
					 <td>".$hasil8."</td>
					 <td>".$hasil9."</td>
					 <td>".$hasil10."</td>
					  <td>".$hasil11."</td>
					</tr>";
		}
		?>
	</table>
</div>

<!--
-- Buat Paginationnya
-- Dengan bootstrap, kita jadi dimudahkan untuk membuat tombol-tombol pagination dengan design yang bagus tentunya
-->
<ul class="pagination">
	<!-- LINK FIRST AND PREV -->
	<?php
	if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
	?>
		<li class="disabled"><a href="#">First</a></li>
		<li class="disabled"><a href="#">&laquo;</a></li>
	<?php
	}else{ // Jika page bukan page ke 1
		$link_prev = ($page > 1)? $page - 1 : 1;
	?>
		<li><a href="javascript:void(0);" onclick="searchWithPagination(1, false)">First</a></li>
		<li><a href="javascript:void(0);" onclick="searchWithPagination(<?php echo $link_prev; ?>, false)">&laquo;</a></li>
	<?php
	}
	?>
	
	<!-- LINK NUMBER -->
	<?php
	$jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
	$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
	$start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
	$end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
	
	for($i = $start_number; $i <= $end_number; $i++){
		$link_active = ($page == $i)? ' class="active"' : '';
	?>
		<li<?php echo $link_active; ?>><a href="javascript:void(0);" onclick="searchWithPagination(<?php echo $i; ?>, false)"><?php echo $i; ?></a></li>
	<?php
	}
	?>
	
	<!-- LINK NEXT AND LAST -->
	<?php
	// Jika page sama dengan jumlah page, maka disable link NEXT nya
	// Artinya page tersebut adalah page terakhir 
	if($page == $jumlah_page){ // Jika page terakhir
	?>
		<li class="disabled"><a href="#">&raquo;</a></li>
		<li class="disabled"><a href="#">Last</a></li>
	<?php
	}else{ // Jika Bukan page terakhir
		$link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
	?>
		<li><a href="javascript:void(0);" onclick="searchWithPagination(<?php echo $link_next; ?>, false)">&raquo;</a></li>
		<li><a href="javascript:void(0);" onclick="searchWithPagination(<?php echo $jumlah_page; ?>, false)">Last</a></li>
	<?php
	}
	?>
</ul>



						



			?>


		
		</tbody>
	</table>


<iframe id="kalkulator" src="tampil.php" width="100%" height="500"></iframe>




                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>