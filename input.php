
<?php
include"koneksi.php";
include"convert.php";


			$key="yuyu";
			$$plaintext=$_POST['MREK'];
			$service= $_POST['SERVICE_CENTER'];
			$customer=$_POST['PELANGGAN'];
			$hape=$_POST['TELPHONE'];
			$email=$_POST['EMAIL_ID'];
			$date=$_POST['TGL_MASUK'];	
			$type=$_POST['MACHINE_TYPE'];
			$serial=$_POST['SERIAL_NUMBER'];
			$servicetype=$_POST['SERVICE_TYPE'];
			$kerusakan=$_POST['KERUSAKAN'];
			$tindakan=$_POST['TINDAKAN'];
			$keluar=$_POST['TGL_KELUAR'];
	//$hurup=array("enol","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan");
	//$angka=array(0,1,2,3,4,5,6,7,8,9);
	//$conval=str_replace($angka,$hurup,$hp);
	//echo $no; //ke enkripsi
			
					$PRINCIPLE=$begitu->enkrip($plaintext,$key);
					$SC=$begitu->enkrip($service,$key);
					$cus=$begitu->enkrip($customer,$key);
					$hp=$begitu->enkrip($hape,$key);
					$surat=$begitu->enkrip($email,$key);
					$ds=$begitu->enkrip($date,$key);
					$mt=$begitu->enkrip($type,$key);
					$sn=$begitu->enkrip($serial,$key);
					$st=$begitu->enkrip($servicetype,$key);
					$trobel=$begitu->enkrip($kerusakan,$key);
					$action=$begitu->enkrip($tindakan,$key);
					$exit=$begitu->enkrip($keluar,$key)
   
   			



	//$dekrip=str_replace($h urup, $angka, $enkrip);
	//echo $dekrip;
$sql =  "INSERT INTO data_enkripsi values('','$PRINCIPLE','$SC','$cus','$hp','$surat','$ds','$mt','$sn','$st','$trobel','$action','$exit')";
//$sql1 =  "INSERT INTO data_dekripsi values ('','$hasil','$hasil1','$hasil2','$hasil3','$dekripsi','$hasil5')";

//mysqli_query($koneksi,$sql);
if (mysqli_query($koneksi, $sql)) 
echo "data berhasil di masukan ";

else {
    echo "data tidak berhasil di masukan ";
   }

function enkrip($plaintext,$key){
			$concat="";

			$len_key=strlen($key);
			$len_plantext=strlen($plaintext);
			$split_key=str_split($key);
			$split_plantext=str_split($plaintext);
			
			$i=0;
			for($j=0;$j<$len_plantext;$j++){
				if ($i==$len_key){
					$i=0;
				}
				$split_key2[$j]=$split_key[$i];
				$i++;
			}

			for($k=0;$k<$len_plantext;$k++){
				$a=char_to_dec($split_key2[$k]);
				$b=char_to_dec($split_plantext[$k]);
				if (($a && $b)!=null){
					// echo (tabel_vigenere_encrypt($a, $b));
					$concat= $concat."".tabel_vigenere_encrypt($a, $b);
				} else {
					//lawas
					// echo $split_plantext[$k];

					//anyar
					$concat= $concat."".$split_plantext[$k];
				}
			}
			return $concat;
		}

		




		//function dekripsi ($plaintext,$key);
		/*include ('koneksi.php');
 
 $nama = $_POST['nama'];
 $enkripsi = base64_decode($nama);
 $query = mysql_query("insert into pegawai values('','$enkripsi')") or die (mysql_error());

*/
 ?>