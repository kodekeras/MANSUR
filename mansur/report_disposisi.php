<?php
// Tentukan path yang tepat ke mPDF
$nama_dokumen='disposisi'; //Beri nama file PDF hasil.
define('_MPDF_PATH','assets/plugins/mpdf/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru

ob_start();
 
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
            table {
                background: #fff;
                padding: 5px;
            }
            tr, td {
                border: table-cell;
                border: 1px  solid #444;
            }
            tr,td {
                vertical-align: top!important;
            }
            #right {
                border-right: none !important;
            }
            #left {
                border-left: none !important;
            }
            .isi {
                height: 300px!important;
            }
            .disp {
                text-align: center;
                padding: 1.5rem 0;
                margin-bottom: .5rem;
            }
            .logodisp {
                float: left;
                position: relative;
                width: 110px;
                height: 110px;
                margin: 0 0 0 1rem;
            }
            #lead {
                width: auto;
                position: relative;
                margin: 25px 0 0 75%;
            }
            .lead {
                font-weight: bold;
                text-decoration: underline;
                margin-bottom: -10px;
            }
            .tgh {
                text-align: center;
            }
            #nama {
                font-size: 2.1rem;
                margin-bottom: -1rem;
            }
            #alamat {
                font-size: 16px;
            }
            .up {
                text-transform: uppercase;
                margin: 0;
                line-height: 2.2rem;
                font-size: 1.5rem;
            }
            .status {
                margin: 0;
                font-size: 1.3rem;
                margin-bottom: .5rem;
            }
            #lbr {
                font-size: 20px;
                font-weight: bold;
            }
            .separator {
                border-bottom: 2px solid #616161;
                margin: -1.3rem 0 1.5rem;
            }
            @media print{
                body {
                    font-size: 12px;
                    color: #212121;
                }
                
                #lbr {
                    font-size: 20px;
                }
                .isi {
                    height: 200px!important;
                }
                .tgh {
                    text-align: center;
                }
                .disp {
                    text-align: center;
                    margin: -.5rem 0;
                }
                .logodisp {
                    float: left;
                    position: relative;
                    width: 80px;
	                    height: 80px;
	                    margin: .5rem 0 0 .5rem;
	                }
	                #lead {
	                    width: auto;
	                    position: relative;
	                    margin: 15px 0 0 75%;
	                }
	                .lead {
	                    font-weight: bold;
	                    text-decoration: underline;
	                    margin-bottom: -10px;
	                }
	                #nama {
	                    font-size: 20px!important;
	                    font-weight: bold;
	                    text-transform: uppercase;
	                    margin: -10px 0 -20px 0;
	                }
	                .up {
	                    font-size: 17px!important;
	                    font-weight: normal;
	                }
	                .status {
	                    font-size: 17px!important;
	                    font-weight: normal;
	                    margin-bottom: -.1rem;
	                }
	                #alamat {
	                    margin-top: -15px;
	                    font-size: 13px;
	                }
	                #lbr {
	                    font-size: 17px;
	                    font-weight: bold;
	                }
	                .separator {
	                    border-bottom: 2px solid #616161;
	                    margin: -1rem 0 1rem;
	                }

	            }
	        </style>
</head>
<body>
	<div class="container">
		<div id="colres">
			<div class="disp">
			<?php 
				include('include/config.php');
				$query2 = mysqli_query($config, "SELECT institusi, nama, status, alamat, logo FROM tbl_instansi");
		                    list($institusi, $nama, $status, $alamat, $logo) = mysqli_fetch_array($query2);
		                    if(!empty($logo)){
		                        echo '<img class="logodisp" src="./upload/'.$logo.'"/>';
		                    } else {
		                        echo '<img class="logodisp" src="./asset/img/logo.png"/>';
		                    }
		                    if(!empty($institusi)){
		                        echo '<h6 class="up">'.$institusi.'</h6>';
		                    } else {
		                        echo '<h6 class="up">Yayasan Pendidikan Dan Sosial Al - Husna</h6>';
		                    }
		                    if(!empty($nama)){
		                        echo '<h5 class="up" id="nama">'.$nama.'</h5><br/>';
		                    } else {
		                        echo '<h5 class="up" id="nama">SMK Al - Husna Loceret Nganjuk</h5><br/>';
		                    }
		                    if(!empty($status)){
		                        echo '<h6 class="status">'.$status.'</h6>';
		                    } else {
		                        echo '<h6 class="status">Akta Notaris: SLAMET , SH, M.Hum No. 119/2013</h6>';
		                    }
		                    if(!empty($alamat)){
		                        echo '<span id="alamat">'.$alamat.'</span>';
		                    } else {
		                        echo '<span id="alamat">Jalan Raya Kediri Gg. Kwagean No. 04 Loceret Telp/Fax. (0358) 329806 Nganjuk 64471</span>';
		                    }
			?>
			</div>
			<?php 
				$id_surat = mysqli_real_escape_string($config, $_REQUEST['id_surat']);
                $query = mysqli_query($config, "SELECT * FROM tbl_surat_masuk WHERE id_surat='$id_surat'");

                if(mysqli_num_rows($query) > 0){
                $no = 0;
                while($row = mysqli_fetch_array($query)){
			?>
			<table class="bordered" id="tbl">
                <tbody>
                    <tr>
                        <td class="tgh" id="lbr" colspan="3">LEMBAR DISPOSISI</td>
                    </tr>
                    <tr>
                        <td id="right" width="18%"><strong>Indeks Berkas</strong></td>
                        <td id="left" colspan="2" style="border-right: none;" width="57%">: <?php echo $row['indeks']; ?></td>
                     </tr>
                     <tr>
                        <td id="left" colspan="3" width="25"><strong>Kode</strong> : <?php echo $row['kode'];?> </td>
                    </tr>
                    <tr>
                        <td id="right"><strong>Nomor Surat</strong></td>
                        <td id="left" colspan="2">: <?php echo $row['no_surat'];?></td>
                    </tr>
                    <tr>
                        <td id="right"><strong>Asal Surat</strong></td>
                        <td id="left" colspan="2">: <?php echo $row['asal_surat'];?></td>
                    </tr>
                    <tr>
                        <td id="right"><strong>Isi Ringkas</strong></td>
                        <td id="left" colspan="2">: <?php echo $row['isi'];?></td>
                    </tr>
                    <tr>
                        <td id="right"><strong>Diterima Tanggal</strong></td>
                        <td id="left" style="border-right: none;">: <?php echo $d." ".$nm." ".$y ?></td>
                    </tr>
                    <tr>
                        <td id="left" colspan="3"><strong>No. Agenda</strong> : <?php echo $row['no_agenda'];?></td>
                    </tr>
                    <tr>
                        <td id="right"><strong>Tanggal Penyelesaian</strong></td>
                        <td id="left" colspan="2">: </td>
                    </tr>
                    <?php 
                    	$query3 = mysqli_query($config, "SELECT * FROM tbl_disposisi JOIN tbl_surat_masuk ON tbl_disposisi.id_surat = tbl_surat_masuk.id_surat WHERE tbl_disposisi.id_surat='$id_surat'");

                            if(mysqli_num_rows($query3) > 0){
                                $no = 0;
                                $row = mysqli_fetch_array($query3);{
                    ?>
                    <tr class="isi">
                    	<td colspan="3">
                            <strong>Isi Disposisi :</strong><br/><?php echo $row['isi_disposisi'];?>
                            <div style="height: 50px;"></div>
                            <strong>Batas Waktu</strong> : <?php echo $d." ".$nm." ".$y?><br/>
                            <strong>Sifat</strong> : <?php $row['sifat']?><br/>
                            <strong>Catatan</strong> :<br/> <?php $row['catatan'];?>
                            <div style="height: 25px;"></div>
                        <strong>Diteruskan Kepada</strong> : <br/><?php echo $row['tujuan']?>
                        </td>
                    </tr>
                    <?php 
                    	}
                    }else{
                    ?>
                    <tr class="isi">
                        <td colspan="2"><strong>Isi Disposisi :</strong>
                        </td>
                        <td><strong>Diteruskan Kepada</strong> : </td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
            <div id="lead">
                <p>Kepala Sekolah</p>
                <div style="height: 50px;"></div>
                <?php
                $query = mysqli_query($config, "SELECT kepsek, nip FROM tbl_instansi");
                list($kepsek,$nip) = mysqli_fetch_array($query);
                if(!empty($kepsek)){
                    echo '<p class="lead">'.$kepsek.'</p>';
                } else {
                    echo '<p class="lead">H. Riza Fachri, S.Kom.</p>';
                }
                if(!empty($nip)){
                    echo '<p>NIP. '.$nip.'</p>';
                } else {
                    echo '<p>NIP. -</p>';
                }
                ?>
            </div>
		</div>
		<div class="jarak2"></div>
		<img class="logodisp" src="upload/surat_masuk/4255-surat resmi sekolah.jpg"/ width="500px" height="800px">
	</div>
</body>
<?php } ?>
</html>

<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
