<?php
// Tentukan path yang tepat ke mPDF
$nama_dokumen='disposisi'; //Beri nama file PDF hasil.
define('_MPDF_PATH','assets/plugins/mpdf/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru

ob_start();
 
?>
<html>
<head>
  <title>Data Disposisi</title>
  
</head>
<body>

<?php include 'koneksi.php';
$id = $_GET['id'];


$sql1 = "SELECT * FROM surat_masuk where no_surat = '$id'";
$query1 = mysql_query($sql1);
if(mysql_num_rows($query1) > 0){
        while ($data1 = mysql_fetch_array($query1)) {?>

    <center>  <h1><?php echo $data1[7];?></h1></center>

      <?php } } ?>
<hr>



<?php include"koneksi.php";
$id = $_GET['id'];
        $sql = "SELECT * FROM disposisi where no_surat = '$id'";
        $query = mysql_query($sql);
        if(mysql_num_rows($query) > 0){
        while ($data = mysql_fetch_array($query)) {
      ?>
     <?php
    $tgl = date("l, d/m/y ");
    echo $tgl;
     ?>
      <h3>No Disposisi</h3>
      <p><?php echo $data[0]; ?></p>
      <h3>No Agenda</h3>
      <p><?php echo $data[1]; ?></p>
      <h3>No Surat</h3>
      <p><?php echo $data[2]; ?></p>
        <h3>Kepada</h3>
        <p><?php echo $data[3]; ?></p>
        <h3>Keterangan</h3>
        <p><?php echo $data[4]; ?></p>
        <h3>Status</h3>
        <p><?php echo $data[5]; ?></p>
        <h3>Tanggapan</h3>
        <p><?php echo $data[6]; ?></p>


<?php      
    }
}
?>

<div style="float: right; margin-top: 40px; margin-left: 80%">
  <h4>Bandung, .........</h4><br>
  <br>
  <h4>(..................)</h4>
</div>

</body>
</html>
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
