<?php 
    


    //$item = file('item.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
    //$belian = file('belian.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );

    //$item_loop = (pow($item1,2) + $item1) / 2; // triangular number
include "koneksi.php";
include "convert.php";
include "enkrip.class.php";


function jumlah_barang (){

$host="localhost";
$username="root";
$password= "";
$dbname = "toko";
/*$koneksi= mysql_connect($host, $username, $password) or die(mysql_error());
$database= mysql_select_db($dbname, $koneksi);
*/
$koneksi=mysqli_connect($host, $username, $password, $dbname) or die(mysqli_connnect_error);






            $begitu = new proses();
            $key='yuyu';
            
    //$belian = file('belian.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );

//gunakan database universitas
    //$result=mysql_query('toko');
    $i=0;   
    $belian = array();        
//tampilkan tabel mahasiswa_ilkom
    $result=mysqli_query($koneksi, 'SELECT * FROM data_terenkripsi');
        while ($row=mysqli_fetch_array($result, MYSQL_NUM))
            {
                $barang = $row[9];
                $belian[$i] = $begitu->dekrip($barang,$key);
                $item[$i] = $begitu->dekrip($barang,$key);
                //$con=$con.",".$belian[$i];
                $i++;
            }
            
    //echo $belian[0];
    foreach ($item as $value) {
        $total_per_item[$value] = 0;
        foreach($belian as $item_belian) {            
            if(strpos($item_belian, $value) !== false) {
                 $total_per_item[$value]++;
            }
        }
    }

    return $total_per_item;
}



function   gabungan  (){
$host="localhost";
$username="root";
$password= "";
$dbname = "toko";
/*$koneksi= mysql_connect($host, $username, $password) or die(mysql_error());
$database= mysql_select_db($dbname, $koneksi);
*/
$koneksi=mysqli_connect($host, $username, $password, $dbname) or die(mysqli_connnect_error);





    $begitu = new proses();
    $key='yuyu';
    
    
    //$result=mysql_query('toko');
    $con="";

    $i=0;   
    $belian = array($con);        
//tampilkan tabel mahasiswa_ilkom
    $result=mysqli_query($koneksi,'SELECT * FROM data_terenkripsi');
        while ($row=mysqli_fetch_array($result, MYSQL_NUM))
            {
                $barang = $row[9];
                $belian[$i] = $begitu->dekrip($barang,$key);
                $item[$i] = $begitu->dekrip($barang,$key);
                $i++;

            }
    //echo "halo".$con;
    $item =  array($con);

    $item1 = count($item) - 1; // minus 1 from count
    $item2 = count($item);

    for($i = 0; $i < $item1; $i++) {
        for($j = $i+1; $j < $item2; $j++) {
            $item_pair = $item.'-'.$item; 
            $item_array[$item_pair] = 0;
            foreach($belian as $item_belian) {
                if((strpos($item_belian, $item) !== false) && (strpos($item_belian, $item) !== false)) {
                    $item_array[$item_pair]++;
                }
            }
        }
    }

    return $item_array[$i];

}





    



?>

