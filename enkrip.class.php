<?php

class proses 
{

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

		function dekrip($plaintext,$key){
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
					$concat= $concat."".tabel_vigenere_decrypt($b, $a);
				} else {
					//lawas
					// echo $split_plantext[$k];

					//anyar
					$concat= $concat."".$split_plantext[$k];
				}
			}
			return $concat;
		}

		//function pencarian ()
		//{
		//		$plaintext= $_POST['nama'];
		//		$alamat = $_POST['alamat'];
		//	$q = "SELECT * from data _enkripsi where nama like '%$plaintext%' or alamat like '%$alamat' ";
				//	$result = mysql_query($q);
		
		//}


}