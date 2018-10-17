<?php
    //cek session
    if(!empty($_SESSION['admin'])){
?>
<nav class="green darken-1">
    <center><a href="./" class="ams hide-on-med-and-down" style="font-size: 40px;">< / MANSUR ></a></center>
</nav>
<nav class="green darken-1">
    <div class="nav-wrapper">
        <a href="./" class="brand-logo center hide-on-large-only"><i class="material-icons md-36">school</i> MANSUR</a>
        <ul id="slide-out" class="side-nav" data-simplebar-direction="vertical">
            <li class="no-padding">
                <div class="logo-side center green darken-1">
                    <?php
                        $query = mysqli_query($config, "SELECT * FROM tbl_instansi");
                        while($data = mysqli_fetch_array($query)){
                            if(!empty($data['logo'])){
                                echo '<img class="logoside" src="./upload/'.$data['logo'].'"/>';
                            } else {
                                echo '<img class="logoside" src="./asset/img/logo.png"/>';
                            }
                            if(!empty($data['nama'])){
                                echo '<h5 class="smk-side">'.$data['nama'].'</h5>';
                            } else {
                                echo '<h5 class="smk-side">SMK Bakti Nusantara 666</h5>';
                            }
                            if(!empty($data['alamat'])){
                                echo '<p class="description-side">'.$data['alamat'].'</p>';
                            } else {
                                echo '<p class="description-side">SMK Bakti Nusantara 666</p>';
                            }
                        }
                    ?>
                </div>
            </li>
            <li class="no-padding green darken-1">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">account_circle</i><?php echo $_SESSION['nama']; ?></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=pro">Profil</a></li>
                                <li><a href="logout.php">Keluar</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="green darken-1"><a href="./"><i class="material-icons middle">dashboard</i> Beranda</a></li>
            <li class="no-padding green darken-1">
                <?php
                    if($_SESSION['admin'] == 1 || $_SESSION['admin'] == 3){ ?>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">repeat</i> Keluar Masuk Surat</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=tsm">Surat Masuk</a></li>
                                <li><a href="?page=tsk">Surat Keluar</a></li>
                            </ul>
                        </div>
                   </li>
                </ul>
                <?php
                    }
                ?>
            </li>
            <li class="green darken-1"><a href="?page=ref"><i class="material-icons middle">class</i> Klasifikasi Surat</a></li>
            <li class="green darken-1"><a href="?page=sett&sub=usr">User</a></li>
            <li class="no-padding">
            <?php
                if($_SESSION['admin'] == 1){ ?>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">settings</i> Pengaturan</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=sett">Instansi</a></li>
                                <li><a href="?page=sett&sub=back">Backup Database</a></li>
                                <li><a href="?page=sett&sub=rest">Restore Database</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <?php
                }
            ?>
            <?php
                if($_SESSION['admin'] == 2){ ?>
            <li class="no-padding green darken-1">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header"><i class="material-icons">settings</i> Pengaturan</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?page=sett">Instansi</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            <?php
                }
            ?>
            </li>
        </ul>
        <!-- Menu on medium and small screen END -->

        <!-- Menu on large screen START -->
        <ul class="center hide-on-med-and-down" id="nv">
            <li style="margin-left: 90px;"><a href="./"><i class="material-icons"></i>&nbsp; Beranda</a></li>
            <?php
                if($_SESSION['admin'] == 1 || $_SESSION['admin'] == 3){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="transaksi">Keluar Masuk Surat <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='transaksi' class='dropdown-content green'>
                    <li><a href="?page=tsm">Surat Masuk</a></li>
                    <li><a href="?page=tsk">Surat Keluar</a></li>
                </ul>
            <?php
                }
            ?>
            <li><a href="?page=ref">Klasifikasi Surat</a></li>
            <li><a href="?page=sett&sub=usr">Pegawai</a></li>
            <?php
                if($_SESSION['admin'] == 1){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="pengaturan">Pengaturan <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='pengaturan' class='dropdown-content green'>
                    <li><a href="?page=sett">Instansi</a></li>
                    <li class="divider"></li>
                    <li><a href="?page=sett&sub=back">Backup Database</a></li>
                    <li><a href="?page=sett&sub=rest">Restore Database</a></li>
                </ul>
            <?php
                }
            ?>
            <?php
                if($_SESSION['admin'] == 2){ ?>
            <li><a class="dropdown-button" href="#!" data-activates="pengaturan">Pengaturan <i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='pengaturan' class='dropdown-content'>
                    <li><a href="?page=sett">Instansi</a></li>
                </ul>
            <?php
                }
            ?>
            <li class="right" style="margin-right: 10px;"><a class="dropdown-button" href="#!" data-activates="logout"> <?php echo $_SESSION['nama']; ?><i class="material-icons md-18">arrow_drop_down</i></a></li>
                <ul id='logout' class='dropdown-content green darken-1'>
                    <li><a href="?page=pro">Profil</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="material-icons">settings_power</i> Logout</a></li>
                </ul>
        </ul>
        <!-- Menu on large screen END -->
        <a href="#" data-activates="slide-out" class="button-collapse" id="menu"></a>
    </div>
</nav>

<?php
    } else {
        header("Location: ../");
        die();
    }
?>
