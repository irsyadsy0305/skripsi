<?php 


include "fungtion1.php";
include "koneksi.php";

$total_per_item=$Jumlah=jumlah_barang();
echo "<pre>";
echo "\r\nStep 1: Jumlah Mengikut Item\r\n";
print_r($Jumlah);

$item_array=$gabung=gabungan();
echo "\r\nStep 2: Jumlah Gabungan Item\r\n";
print_r($gabung);
/*$koneksi= mysql_connect($host, $username, $password) or die(mysql_error());
$database= mysql_select_db($dbname, $koneksi);
*/
echo "\r\nStep 3: Association Rule\r\n";
    // MENDAPATKAN KIRAAN UNTUK ASSOCIATION RULES
    foreach ($item_array as $ia_key => $ia_value) {
        $theitems = explode('-',$ia_key);
        for($x = 0; $x < count($theitems); $x++) {
            $item_name = $theitems[$x];
            $item_total = $total_per_item[$item_name];
            $in_float = $ia_value / $item_total;
            $in_percent = round($in_float * 100, 2);
            echo "$in_percent";
            $alt_item = $theitems[ ($x + 1) % count($theitems)];
            echo "[+] $ia_key($ia_value) --> $item_name($item_total) => ". $in_float ."\r\n";
            echo "    ". $in_percent ."% yang membeli $item_name juga membeli $alt_item\r\n\r\n";
        }


        
    }





 ?>