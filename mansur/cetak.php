<?php 
    // Tentukan path yang tepat ke mPDF
$nama_dokumen='Struk Pembayaran listrik'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../../assets/MPDF57/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
 
//Memulai proses untuk menyimpan variabel php dan html
ob_start();
 ?>
    <?php 
                include "../../koneksi/koneksi.php";
                $id = $_GET['id'];
                $sql = mysql_query("SELECT * from pembayaran INNER JOIN tagihan On tagihan.id_tagihan = pembayaran.id_tagihan inner join pelanggan on pelanggan.id_pelanggan = tagihan.id_pelanggan   where pembayaran.id_pembayaran = '$id'");
                $data = mysql_fetch_array($sql);
                $tarif = $data['id_pelanggan'];

                $sql1 = mysql_query("SELECT * from pelanggan INNER JOIN tarif on tarif.kode_tarif = pelanggan.kode_tarif where id_pelanggan = '$tarif'");
                $data1 = mysql_fetch_array($sql1);
              
        

             ?>
             <br><br>
     <img src="../../assets/MT.jpg" width="25%" style="margin-left:250px">
     <br><br>
     <h1 style="margin-left:100px "><u>BENTUK STRUK PEMBAYARAN LISTRIK</u></h1>
     
     <h2 style="margin-left:275px "><span><?= $data['tanggal_bayar'] ?></span></h2>
<br><br>

    = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =  
            
        
             <center>
                <table width="100%">

          
            <tr>
                <td><h1>ID Pelanggan</h1></td>
                <td><h1><span><?= $data['id_pelanggan'] ?></span></h1></td>
            </tr>
            <tr>
                <td><h1>Nama Pelanggan</h1></td>
                <td><h1><span><?= $data['nama'] ?></span></h1></td>
            </tr>
            <tr>
                <td><h1>Kode Tarif</h1></td>
                <td><h1><span><?= $data1['kode_tarif'] ?></span></h1></td>
            </tr>
            <tr>
                <td><h1>Daya</h1></td>
                <td><h1><span><?= $data1['daya'] ?>&nbsp;&nbsp;Watt</span></h1></td>
            </tr>
            <tr>
                <td><h1>Tarif </td>
                <td><h1><span>Rp. <?= $data1['tarif_perKWH'] ?></span></h1></td>
            </tr>
            <tr>
                <td><h1>Beban</td>
                <td><h1><span>Rp. <?= $data1['beban'] ?></span></h1></td>
            </tr>
            <tr>
                <td><h1>Pemakaian</td>
                <td><h1><span><?= $data['pemakaian'] ?>&nbsp;&nbsp;Watt</span></h1></td>
            </tr>
            
            <tr>
                <td><h1>Biaya Admin</td>
                <td><h1><span>Rp. 2500</span></td>
            </tr>
               
            <tr>
                <td><h1>Total</td>
                <td><h1><span>Rp. <?= $data['bayar'] ?></span></td>
            </tr>
               
          </center>
          </table>
           = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = 
           <br>
           <h2 >Struk ini sebagai bukti pembayaran yang sah info hubungi weh nu aya di kontak, mohon disimpan dengan baik</h2>  
             <?php

 
$mpdf->setFooter('{PAGENO}');
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'D');
exit;
?>       
   