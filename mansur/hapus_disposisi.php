<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {


    	$id_disposisi = mysqli_real_escape_string($config, $_REQUEST['id_disposisi']);

    	$query = mysqli_query($config, "SELECT * FROM tbl_disposisi WHERE id_disposisi='$id_disposisi'");

    	if(mysqli_num_rows($query) > 0){
            $no = 1;
            while($row = mysqli_fetch_array($query)){

    		  echo '<!-- Row form Start -->
    				<div class="row jarak-card">
    				    <div class="col m12">
                            <div>
                                <div>
            				        <table>
                                        <center><h3 class="red-text">Apakah anda yakin?</h3></center>
            				            <tbody>
            				                <tr>
            				                    <td width="13%">Tujuan</td>
            				                    <td width="1%">:</td>
            				                    <td width="86%">'.$row['tujuan'].'</td>
            				                </tr>
            				                <tr>
            				                    <td width="13%">Isi Disposis</td>
            				                    <td width="1%">:</td>
            				                    <td width="86%">'.$row['isi_disposisi'].'</td>
            				                </tr>
            				                <tr>
            				                    <td width="13%">Sifat</td>
            				                    <td width="1%">:</td>
            				                    <td width="86%">'.$row['sifat'].'</td>
            				                </tr>
            				                <tr>
            				                    <td width="13%">Batas Waktu</td>
            				                    <td width="1%">:</td>
            				                    <td width="86%">'.date('d M Y', strtotime($row['batas_waktu'])).'</td>
            				                </tr>
                                            <tr>
                                                <td width="13%">Catatan</td>
                                                <td width="1%">:</td>
                                                <td width="86%">'.$row['catatan'].'</td>
                                            </tr>
            				            </tbody>
            				   		</table>
        				        </div>
                                <center>
                                <br><br>
                                <div class="card-action">
        		                     <a href="?page=tsm&act=disp&id_surat='.$row['id_surat'].'&sub=del&submit=yes&id_disposisi='.$row['id_disposisi'].'" class="btn-large red waves-effect waves-light white-text">HAPUS <i class="material-icons">delete</i></a>
        		                    <a href="?page=tsm&act=disp&id_surat='.$row['id_surat'].'" class="btn-large grey-light waves-effect waves-light white-text">BATAL <i class="material-icons">clear</i></a>
                                </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Row form END -->';

                	if(isset($_REQUEST['submit'])){
                		$id_disposisi = $_REQUEST['id_disposisi'];

                		$query = mysqli_query($config, "DELETE FROM tbl_disposisi WHERE id_disposisi='$id_disposisi'");

                		if($query == true){
                            $_SESSION['succDel'] = 'SUKSES! Data berhasil dihapus ';
                            echo '<script language="javascript">
                                    window.location.href="./admin.php?page=tsm&act=disp&id_surat='.$row['id_surat'].'";
                                  </script>';
                		} else {
                            $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
                            echo '<script language="javascript">
                                    window.location.href="./admin.php?page=tsm&act=disp&id_surat='.$row['id_surat'].'&sub=del&id_disposisi='.$row['id_disposisi'].'";
                                  </script>';
                		}
                	}
    		    }
    	    }
        }
?>
