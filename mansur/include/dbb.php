<?php
//hosting
$host ='localhost';
//username mysql/mariadb/sejenisnya

$user ='root';
//password mysql/mariadb/sejenisnya
$pass ='';
$drive = 'D:';
$lewati = array('mysql', 'information_schema','test','performance_schema','phpmyadmin');
$conn=mysqli_connect($host,$user,$pass);
if (mysqli_connect_errno())
{echo "Koneksi Gagal: " . mysqli_connect_error();}
$goummi = null;$ummigo=0;$hitung = time();
$sql = 'show databases';
$hasil = mysqli_query($conn,$sql);
if(!$hasil){die('Tidak dapat menemukan database: '. mysqli_connect_error());}
$db = array();
while ($row = mysqli_fetch_assoc($hasil)) {$db[] = $row['Database'];}
foreach($db as $database) {
if(in_array($database, $lewati)) {continue;}
exec("c:/xampp/mysql/bin/mysqldump --complete-insert --create-options --add-locks --disable-keys --extended-insert --quick --quote-names -u $user --password=$pass $database -c>{$drive}/$database.sql 2>&1", $goummi, $hasil);
if($hasil){
	echo("Error $drive: $hasil");}$ummigo=$ummigo+1;}
	header("Location: ../backup.php");
?>