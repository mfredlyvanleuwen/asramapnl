<?php include 'proses/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/logo.png" />
    <title>Data Mahasiswa</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />

    <!-- DATATABLES -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <!-- DATATABLES -->
</head>

<body class="g-sidenav-show bg-gray-200">

    <!-- SIDEBAR  -->
    <?php include 'sidebar.php'; ?>
    <!-- SIDEBAR -->


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data Mahasiswa</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Data Mahasiswa</h6>
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

        </nav>
        <!-- End Navbar -->

        <!-- Isi Body -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <a href="mahasiswa.php" class="btn btn-white shadow-sm"><i class="material-icons">arrow_back</i></a>
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                                <h5 class="text-white text-capitalize ps-3 text-center">DATA KAMAR MAHASISWA</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2 m-3">

                            <?php
                            $id = $_GET['id'];

                            $query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_mhs = $id");
                            $row = mysqli_fetch_array($query);

                            $query2 = mysqli_query($conn, "SELECT * FROM penghuni WHERE id_mhs = $id");
                            $row2 = mysqli_fetch_array($query2);
                            $cek2 = mysqli_num_rows($query2);


                            ?>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="images/<?php echo $row['foto'] ?>" width="100%" height="auto"
                                                class="rounded" alt="">

                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="" class="col-form-label me-3">NIM :</label>
                                                    <div class="input-group input-group-outline">
                                                        <input type="text" readonly value="<?php echo $row['nim'] ?>"
                                                            class="form-control" placeholder="NIM" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <label for="" class="col-form-label me-3">Nama Lengkap :</label>
                                                    <div class="input-group input-group-outline">
                                                        <input type="text" readonly
                                                            value="<?php echo $row['nama_mhs'] ?>" class="form-control"
                                                            placeholder="Nama Lengkap" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="" class="col-form-label me-3">Jenis Kelamin :</label>
                                                    <div class="input-group input-group-outline">
                                                        <input type="text" readonly value="<?php echo $row['jk'] ?>"
                                                            class="form-control" placeholder="Masukan Nama Lengkap" />
                                                    </div>
                                                </div>
                                                <!--  -->
                                                <div class="col-sm-3">
                                                    <label for="" class="col-form-label me-3">Jurusan :</label>
                                                    <div class="input-group input-group-outline">
                                                        <input type="text" readonly
                                                            value="<?php echo $row['jurusan'] ?>" class="form-control"
                                                            placeholder="Nomor NIK / NIM" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <label for="" class="col-form-label me-3">Prodi :</label>
                                                    <div class="input-group input-group-outline">
                                                        <input type="text" readonly value="<?php echo $row['prodi'] ?>"
                                                            class="form-control" placeholder="Nama Lengkap" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="" class="col-form-label me-3">Semester :</label>
                                                    <div class="input-group input-group-outline">
                                                        <input type="text" readonly
                                                            value="Semester <?php echo $row['semester'] ?>"
                                                            class="form-control" placeholder="Nama Lengkap" />
                                                    </div>
                                                </div>
                                                <!--  -->
                                                <hr class="my-2">

                                                <?php
                                                if ($cek2 > 0) {
                                                    $idkamar = $row2['id_kamar'];
                                                    ?>
                                                    <div class="col-sm-4">
                                                        <label for="" class="col-form-label me-3">ID Kamar :</label>
                                                        <div class="input-group input-group-outline">
                                                            <input type="text" readonly value="<?php echo $idkamar; ?>"
                                                                class="form-control" placeholder="Nama Lengkap" />
                                                            <a href="proses/hapus_pilih_kamar.php?idmhs=<?php echo $row['id_mhs'] ?>"
                                                                class="btn btn-danger m-0">Hapus</a>
                                                            <a href="#tb_pilih" onclick="tampil()"
                                                                class="btn btn-warning m-0">GANTI</a>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="alert alert-danger text-center" role="alert">
                                                        <strong class="text-white">MAHASISWA BELUM MEMILIKI KAMAR</strong>
                                                    </div>
                                                    <a href="#" onclick="tampil()" class="btn btn-info">Pilih Kamar</a>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <script>
                                function tampil() {
                                    document.getElementById('tb_pilih').style.display = '';
                                }
                            </script>


                            <?php if ($cek2 <= 0) { ?>
                                <script>
                                    document.getElementById('tb_pilih').style.display = '';
                                </script>

                            <?php } ?>
                            <!-- PILIH KAMAR -->


                            <div class="container" id="tb_pilih" style="display:none;">
                                <div class="alert alert-info text-center" role="alert">
                                    <strong class="text-white">PILIH KAMAR</strong>
                                </div>
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0 display" id="example">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kamar</th>
                                                <th>Lantai</th>
                                                <th>Kapasitas</th>
                                                <th>Status Kamar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                            $no = 1;
                                            $qkamar = mysqli_query($conn, "SELECT * FROM kamar");
                                            while ($q = mysqli_fetch_array($qkamar)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $no++; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $q['nama_kamar']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $q['lantai']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $q['kapasitas']; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($q['full'] == 'true') {
                                                            echo 'Penuh';
                                                        } else {
                                                            echo 'Tersedia';
                                                        } ?>
                                                    </td>
                                                    <td><a href="proses/pilih_kamar.php?id=<?php echo $row['id_mhs'] ?>&idkamar=<?php echo $q['id_kamar']; ?>"
                                                            class="btn btn-sm btn-info">Pilih Kamar</a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                                <script>
                                    $(document).ready(function () {
                                        $('#myTable').DataTable();
                                    });
                                </script>

                            </div>
                            <!-- PILIH KAMAR -->




                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- DATATABLES -->
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <!-- DATATABLES -->

    <!--   Core JS Files   -->
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>


    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>