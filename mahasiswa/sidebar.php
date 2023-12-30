<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#">
            <div class="row">
                <div class="col-3">

                    <?php
                    $id_mhs = $_SESSION['nomor_identitas'];
                    $kuerii = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = $id_mhs");
                    $roww = mysqli_fetch_array($kuerii);
                    $foto_user = $roww["foto"];
                    ?>

                    <img src="../images/<?php if ($foto_user != '') {
                                            echo $foto_user;
                                        } else {
                                            echo 'nul-avatar.png';
                                        } ?>" class="navbar-brand-img h-100" a l t="main_logo" style="aspect-ratio: 1/1; object-fit: cover"/>
                </div>
                <div class="col">
                    <span class="ms-1 font-weight-bold text-white">
                        <?php
                        if (isset($_SESSION['nama_user'])) {
                            echo $_SESSION['nama_user'];
                        } else {
                            echo 'Username';
                        }
                        ?>
                    </span>
                    <br />
                    <span class="ms-1 text-white">
                        <?php
                        if (isset($_SESSION['nomor_identitas'])) {
                            echo $_SESSION['nomor_identitas'];
                        } else {
                            echo 'Nomor ID';
                        }
                        ?>
                    </span>
                </div>
            </div>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2" />
    <div class="collapse navbar-collapse w-auto max-height-vh-100" style="height: 100%" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">User</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if (isset($_GET['x']) && $_GET['x'] == 'home') {
                                        echo 'text-white active bg-gradient-warning';
                                    } ?>" href="index.php?x=home">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">house</i>
                    </div>
                    <span class="nav-link-text ms-1">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if (isset($_GET['x']) && $_GET['x'] == 'tagihan') {
                                        echo 'text-white active bg-gradient-warning';
                                    } ?>" href="index.php?x=tagihan">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">local_atm</i>
                    </div>
                    <span class="nav-link-text ms-1">Data Tagihan</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if (isset($_GET['x']) && $_GET['x'] == 'profil') {
                                        echo 'text-white active bg-gradient-warning';
                                    } ?>" href="index.php?x=profil">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../proses/logout.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>
                    <span class="nav-link-text ms-1">Log Out</span>
                </a>
            </li>
        </ul>
    </div>
</aside>