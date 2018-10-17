<?php
// Tentukan path yang tepat ke mPDF
$nama_dokumen='disposisi'; //Beri nama file PDF hasil.
define('_MPDF_PATH','assets/plugins/mpdf/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru

ob_start();
 
?>
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
	        <div class="container">
				<div id="colres">
					<div class="disp">
	        <?php
	        include"include/config.php";
	        $query2 = mysqli_query($config, "SELECT institusi, nama, status, alamat, logo FROM tbl_instansi");
		                    list($institusi, $nama, $status, $alamat, $logo) = mysqli_fetch_array($query2);
		                    if(!empty($logo)){
		                        echo '<img class="logodisp" src="./upload/'.$logo.'"/>';
		                    } else {
		                        echo '<img class="logodisp" src="./asset/img/logo.png"/>';
		                    }
		                    if(!empty($institusi)){
		                        echo '<h6 class="
		                        up">'.$institusi.'</h6>';
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
		 <h1 class="up"><b>data surat masuk</b></h1>
		</div></div></div>
	           

	      <div style="margin-left: 90%">
	        <?php
	     $day = date ("D");
	switch ($day) {
	case 'Sun' : $hari = "Minggu"; break;
	case 'Mon' : $hari = "Senin"; break;
	case 'Tue' : $hari = "Selasa"; break;
	case 'Wed' : $hari = "Rabu"; break;
	case 'Thu' : $hari = "Kamis"; break;
	case 'Fri' : $hari = "Jum'at"; break;
	case 'Sat' : $hari = "Sabtu"; break;
	default : $hari = "Kiamat";
	}

	echo "<b>$hari</b>";
	$tgl = date("d/m/y");
	echo $tgl;
	     ?>
	   </div> <?php
	$tgl= date("l, d/m/Y , H:i:s");
	echo $tgl;
	?>
	<table border="1">
	    <tr>
		<th> Id Surat</th>
		<th> No Agenda</th>
		<th> No Surat</th>
		<th> Asal Surat</th>
		<th> Isi</th>
		<th> Kode</th>
		<th> Indeks</th>
		<th> Tgl surat</th>
		<th> Tgl diterima</th>
		<th> Keterangan</th>
		</tr>
	   <?php 
	    include 'include/config.php';
	   	$awal = $_GET['tgl_awal'];
		$akhir = $_GET['tgl_akhir'];

        $query = mysqli_query($config, "SELECT * FROM tbl_surat_masuk where tgl_surat between '$awal' and  '$akhir'");

        while($row = mysqli_fetch_array($query)){
	    echo "
	    <tr>
	        <td>$row[0]</td>
			<td>$row[1]</td>
			<td>$row[2]</td>
			<td>$row[3]</td>
			<td>$row[4]</td>
			<td>$row[5]</td>
			<td>$row[6]</td>
			<td>$row[7]</td>
			<td>$row[8]</td>
			<td>$row[10]</td>
	    </tr>";

	     } 
	     ?>
	   
	</table>
	<div style="float: right; margin-top: 40px; margin-left: 80%">
	  <h4>Bandung, .........</h4><br>
	  <br>
	  <h4>(..................)</h4>
	</div>

	 
	<?php
	 
	$mpdf->setFooter('{PAGENO}');
	//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
	$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
	ob_end_clean();
	//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
	$mpdf->WriteHTML(utf8_encode($html));
	$mpdf->Output($nama_dokumen.".pdf" ,'I');
	exit;
	?>