<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">

    <!-- Profil Navbar -->
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#">
            <div class="row">
                <div class="col-3">

                    <img src="images/<?php if ($_SESSION['foto'] != '') {
                        echo $_SESSION['foto'];
                    } else {
                        echo 'nul-avatar.png';
                    } ?>" class="navbar-brand-img h-100" a l t="main_logo"
                        style="aspect-ratio: 1/1; object-fit: cover" />
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
    <!-- End Profil Navbar -->



    <hr class="horizontal light mt-0 mb-2" />
    <div class="collapse navbar-collapse w-auto max-height-vh-100" style="height: 100%" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white
            <?php if (isset($_GET['x']) && $_GET['x'] == 'home') {
                echo "bg-gradient-warning";
            } ?>" href="index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>

            </li>
            <li class="nav-item">

                <a class="nav-link text-white
            <?php if (isset($_GET['x']) && $_GET['x'] == 'mahasiswa') {
                echo "bg-gradient-warning";
            } ?>" href="index.php?x=mahasiswa">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Mahasiswa</span>
                </a>

            </li>
            <li class="nav-item">

                <a class="nav-link text-white
            <?php if (isset($_GET['x']) && $_GET['x'] == 'kamar') {
                echo "bg-gradient-warning";
            } ?>" href="index.php?x=kamar">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">king_bed</i>
                    </div>
                    <span class="nav-link-text ms-1">Data Kamar</span>
                </a>

            </li>
            <li class="nav-item">

                <a class="nav-link text-white
            <?php if (isset($_GET['x']) && $_GET['x'] == 'pembayaran') {
                echo "bg-gradient-warning";
            } ?>" href="index.php?x=pembayaran">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">payments</i>
                    </div>
                    <span class="nav-link-text ms-1">Data Pembayaran</span>
                </a>

            </li>
            <li class="nav-item">

                <a class="nav-link text-white
            <?php if (isset($_GET['x']) && $_GET['x'] == 'tagihan') {
                echo "bg-gradient-warning";
            } ?>" href="index.php?x=tagihan">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">confirmation_number</i>
                    </div>
                    <span class="nav-link-text ms-1">Tagihan</span>
                </a>

            </li>


            <?php if ($_SESSION['level'] != 'pengelola') { ?>
                <li class="nav-item">

                    <a class="nav-link text-white
            <?php if (isset($_GET['x']) && $_GET['x'] == 'kelola_user') {
                echo "bg-gradient-warning";
            } ?>" href="index.php?x=kelola_user">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">manage_accounts</i>
                        </div>
                        <span class="nav-link-text ms-1">Kelola User</span>
                    </a>

                </li>
            <?php } ?>


            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">

                <a class="nav-link text-white
            <?php if (isset($_GET['x']) && $_GET['x'] == 'profiladm') {
                echo "bg-gradient-warning";
            } ?>" href="index.php?x=profiladm">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>

            </li>
            <li class="nav-item">

                <?php
                if (isset($_SESSION['nama_user'])) { ?>
                    <a class="nav-link text-white" href="#" onclick="logout()">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">login</i>
                        </div>
                        <span class="nav-link-text ms-1">Logout</span>
                    </a>
                <?php } else { ?>
                    <a class="nav-link text-white" href="login.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">login</i>
                        </div>
                        <span class="nav-link-text ms-1">Sign In</span>
                    </a>
                    <?php
                }
                ?>

            </li>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function logout() {
                    Swal.fire({
                        title: "Logout",
                        text: "Konfirmasi Logout?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        confirmButtonText: 'Logout',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'proses/logout.php';
                        }

                    })
                }
            </script>


        </ul>
    </div>

</aside>