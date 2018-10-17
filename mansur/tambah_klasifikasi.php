<?php
    //cek session
    if(empty($_SESSION['admin'])){
        $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
        header("Location: ./");
        die();
    } else {

        if($_SESSION['admin'] != 1 AND $_SESSION['admin'] != 2){
            echo '<script language="javascript">
                    window.alert("ERROR! Anda tidak memiliki hak akses untuk menambahkan data");
                    window.location.href="./admin.php?page=ref";
                  </script>';
        } else {

            if(isset($_REQUEST['submit'])){

                //validasi form kosong
                if($_REQUEST['kode'] == "" || $_REQUEST['nama'] == "" || $_REQUEST['uraian'] == ""){
                    $_SESSION['errEmpty'] = 'ERROR! Semua form wajib diisi';
                    echo '<script language="javascript">window.history.back();</script>';
                } else {

                    $kode = $_REQUEST['kode'];
                    $nama = $_REQUEST['nama'];
                    $uraian = $_REQUEST['uraian'];
                    $id_user = $_SESSION['admin'];

                    //validasi input data
                    if(!preg_match("/^[a-zA-Z0-9. ]*$/", $kode)){
                        $_SESSION['kode'] = 'Form Kode hanya boleh mengandung karakter huruf, angka, spasi dan titik(.)';
                        echo '<script language="javascript">window.history.back();</script>';
                    } else {

                        if(!preg_match("/^[a-zA-Z0-9.,\/ -]*$/", $nama)){
                            $_SESSION['namaref'] = 'Form Nama hanya boleh mengandung karakter huruf, spasi, titik(.), koma(,) dan minus(-)';
                            echo '<script language="javascript">window.history.back();</script>';
                        } else {

                            if(!preg_match("/^[a-zA-Z0-9.,()\/\r\n -]*$/", $uraian)){
                                $_SESSION['uraian'] = 'Form Uraian hanya boleh mengandung karakter huruf, angka, spasi, titik(.), koma(,), minus(-), garis miring(/), dan kurung()';
                                echo '<script language="javascript">window.history.back();</script>';
                            } else {

                                $cek = mysqli_query($config, "SELECT * FROM tbl_klasifikasi WHERE kode='$kode'");
                                $result = mysqli_num_rows($cek);

                                if($result > 0){
                                    $_SESSION['duplikasi'] = 'Kode sudah ada, pilih yang lainnya!';
                                    echo '<script language="javascript">window.history.back();</script>';
                                } else {

                                    $query = mysqli_query($config, "INSERT INTO tbl_klasifikasi(kode,nama,uraian,id_user) VALUES('$kode','$nama','$uraian','$id_user')");

                                    if($query != false){
                                        $_SESSION['succAdd'] = 'SUKSES! Data berhasil ditambahkan';
                                        header("Location: ./admin.php?page=ref");
                                        die();
                                    } else {
                                        $_SESSION['errQ'] = 'ERROR! Ada masalah dengan query';
                                        echo '<script language="javascript">window.history.back();</script>';
                                    }
                                }
                            }
                        }
                    }
                }
            } else {?>
                <!-- Row Start -->
                <div class="row">
                    <!-- Secondary Nav START -->
                    <div class="col s12">
                        <nav class="secondary-nav">
                            <div class="nav-wrapper white darken-1">
                                <ul class="left">
                                    <li class="waves-effect waves-light"><a href="?page=ref&act=add" class="judul black-text">Tambah Klasifikasi Surat</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- Secondary Nav END -->
                </div>
                <!-- Row END -->


                <!-- Row form Start -->
                <div class="row jarak-form">

                    <!-- Form START -->
                    <form class="col s12" method="post" action="?page=ref&act=add">

                        <!-- Row in form START -->
                        <div class="row">
                            <div class="input-field col s3   tooltipped" data-position="top" data-tooltip="Isi dengan huruf, angka, spasi dan titik(.)">
                                <input id="kd" type="text" class="validate" maxlength="30" name="kode" required>
                                    <?php
                                        if(isset($_SESSION['kode'])){
                                            $kode = $_SESSION['kode'];
                                            echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$kode.'</div>';
                                            unset($_SESSION['kode']);
                                        }
                                        if(isset($_SESSION['duplikasi'])){
                                            $duplikasi = $_SESSION['duplikasi'];
                                            echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$duplikasi.'</div>';
                                            unset($_SESSION['duplikasi']);
                                        }
                                    ?>
                                <label for="kd">Kode</label>
                            </div>
                            <br><br><br><br>
                            <div class="input-field col s5">
                                <input id="nama" type="text" class="validate" name="nama" required>
                                    <?php
                                        if(isset($_SESSION['namaref'])){
                                            $namaref = $_SESSION['namaref'];
                                            echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$namaref.'</div>';
                                            unset($_SESSION['namaref']);
                                        }
                                    ?>
                                <label for="nama">Nama</label>
                            </div>
                            <div class="input-field col s10">
                                <textarea id="uraian" class="materialize-textarea" name="uraian" required></textarea>
                                    <?php
                                        if(isset($_SESSION['uraian'])){
                                            $uraian = $_SESSION['uraian'];
                                            echo '<div id="alert-message" class="callout bottom z-depth-1 red lighten-4 red-text">'.$uraian.'</div>';
                                            unset($_SESSION['uraian']);
                                        }
                                    ?>
                                <label for="uraian">Uraian</label>
                            </div>
                        </div>
                        <!-- Row in form END -->
                        <div class="row">
                            <div class="col 6">
                                <button type="submit" name="submit" class="btn-large waves-effect waves-light">SIMPAN <i class="material-icons">done</i></button>
                            </div>
                            <div class="col 6">
                                <a href="?page=ref" class="btn-large red waves-effect waves-light">BATAL <i class="material-icons">clear</i></a>
                            </div>
                        </div>

                    </form>
                    <!-- Form END -->

                </div>
                <!-- Row form END -->

<?php
            }
        }
    }
?>
