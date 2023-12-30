<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Home</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Home</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
        </div>
        <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0">
                    <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                </a>
            </li>
        </ul>
    </div>
    </div>
</nav>
<!-- End Navbar -->


<?php
$kueri1 = mysqli_query($conn, "SELECT * FROM tagihan");
$num1 = mysqli_num_rows($kueri1);

$nim = $_SESSION['nomor_identitas'];
$kueri2 = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = $nim");
$row = mysqli_fetch_array($kueri2);
$num2 = mysqli_num_rows($kueri2);

$idmhs = $row['id_mhs'];
$kueri3 = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_mhs = $idmhs");
$num3 = mysqli_num_rows($kueri3);


$belum_bayar = $num1 - $num3;
$sudah_bayar = $num3;

?>

<!-- Isi Body -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">credit_card_off</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Belum Bayar</p>
                        <h1 class="mb-0">
                            <?php echo $belum_bayar; ?>
                        </h1>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">credit_card</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Sudah Bayar</p>
                        <h1 class="mb-0">
                            <?php echo $sudah_bayar; ?>
                        </h1>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    </div>
</div>