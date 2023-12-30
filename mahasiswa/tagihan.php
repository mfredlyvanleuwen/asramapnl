<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
  navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Mahasiswa</h6>
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
<script>
  function bayar(nilai) {
    document.getElementById('idtagihan').value = nilai;
  }
</script>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-warning shadow-warning border-radius-lg pt-4 pb-3">
            <div class="d-flex justify-content-between ">
              <h6 class="text-white text-capitalize ps-3">TAGIHAN AKTIF</h6>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead class="text-center">
                <tr>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">No</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">ID tagihan</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">Nama Tagihan</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">Bulan / Tahun</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">Tagihan</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">Tanggal tagih</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">Status Pembayaran</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">Aksi</th>
                  <!-- <th class="text-uppercase text-dark text-xxs font-weight-bolder">Tanggal bayar</th> -->
                </tr>
              </thead>
              <tbody class="text-center">
                <?php
                $no = 1;
                $nim = $_SESSION['nomor_identitas'];
                $kueri = mysqli_query($conn, "SELECT * FROM tagihan WHERE status = 'active'");
                while ($row = mysqli_fetch_array($kueri)) {
                  $idmhs = $_SESSION['nomor_identitas'];
                  $qq = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_mhs = $idmhs");
                  $q = mysqli_fetch_array($qq);
                  $cek = mysqli_num_rows($qq);
                  ?>
                  <tr>
                    <td>
                      <!-- No -->
                      <?php echo $no++; ?>
                    </td>
                    <td>
                      <?php echo $row['id_tagihan']; ?>
                    </td>
                    <td>
                      <?php echo $row['nama']; ?>
                    </td>
                    <td>
                      <!-- Bulan / Tahun -->
                      <?php echo $row['bulan']; ?> /
                      <?php echo $row['tahun']; ?>
                    </td>
                    <td>
                      <!-- Tagihan -->
                      <?php echo format_rupiah($row['tagihan']); ?>
                    </td>
                    <td>
                      <!-- Status -->
                      <?php echo $row['tgl_tagih']; ?>
                    </td>
                    <td>
                      <!-- Status -->
                      <?php if ($cek <= 0) {
                        echo 'Belum Bayar';
                      } else {
                        if ($q['status'] == 'confirmed') {
                          echo 'Sudah Bayar';
                        } else if ($q['status'] == 'pending') {
                          echo 'Menunggu Konfirmasi';
                        } else {
                          echo 'Tidak dikonfirmasi';
                        }
                      }

                      ?>
                    </td>
                    <td>
                      <?php if ($cek <= 0) { ?>
                        <a href="#" onclick="bayar(<?php echo $row['id_tagihan']; ?>)" data-bs-toggle="modal"
                          data-bs-target="#ModalBayar" class="btn btn-sm btn-success">Bayar</a>

                      <?php } ?>

                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL BAYAR -->
    <div class="modal fade" id="ModalBayar" tabindex="-1" aria-labelledby="ModalBayar" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Bayar Tagihan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="proses/bayar_tagihan.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="idtagihan" value="" id="idtagihan">
              <input type="file" name="upload_foto" class="form-control" required>
              <input type="submit" class="btn btn-primary m-2 w-100" value="Kirim" name="" id="">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>
    <!-- MODAL BAYAR -->




    <!-- RIWAYAT TAGIHAN -->
    <div class="col-12 d-none">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-secondary shadow-secondary border-radius-lg pt-4 pb-3">
            <div class="d-flex justify-content-between ">
              <h6 class="text-white text-capitalize ps-3">RIWAYAT TAGIHAN</h6>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead class="text-center">
                <tr>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">No</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">ID tagihan</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">Nama Tagihan</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">Bulan / Tahun</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">Tagihan</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">Tanggal tagih</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">Status Pembayaran</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder">Aksi</th>
                  <!-- <th class="text-uppercase text-dark text-xxs font-weight-bolder">Tanggal bayar</th> -->
                </tr>
              </thead>
              <tbody class="text-center">
                <?php
                $no = 1;
                $nim = $_SESSION['nomor_identitas'];
                $kueri = mysqli_query($conn, "SELECT * FROM tagihan");
                while ($row = mysqli_fetch_array($kueri)) {
                  $idmhs = $_SESSION['nomor_identitas'];
                  $qq = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_mhs = $idmhs ");
                  $q = mysqli_fetch_array($qq);
                  $cek = mysqli_num_rows($qq);
                  ?>
                  <tr>
                    <td>
                      <!-- No -->
                      <?php echo $no++; ?>
                    </td>
                    <td>
                      <?php echo $row['id_tagihan']; ?>
                    </td>
                    <td>
                      <?php echo $row['nama']; ?>
                    </td>
                    <td>
                      <!-- Bulan / Tahun -->
                      <?php echo $row['bulan']; ?> /
                      <?php echo $row['tahun']; ?>
                    </td>
                    <td>
                      <!-- Tagihan -->
                      <?php echo format_rupiah($row['tagihan']); ?>
                    </td>
                    <td>
                      <!-- Status -->
                      <?php echo $row['tgl_tagih']; ?>
                    </td>
                    <td>
                      <!-- Status -->
                      <?php if ($cek <= 0) {
                        echo 'Belum Bayar';
                      } else {
                        if ($q['status'] == 'confirmed') {
                          echo 'Sudah Bayar';
                        } else if ($q['status'] == 'pending') {
                          echo 'Menunggu Konfirmasi';
                        } else {
                          echo 'Tidak dikonfirmasi';
                        }
                      }
                      ?>
                    </td>
                    <td>
                      <a href="#" onclick="bayar(<?php echo $row['id_tagihan']; ?>)" data-bs-toggle="modal"
                        data-bs-target="#ModalBayar" class="btn btn-sm btn-success">Bayar</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- RIWAYAT TAGIHAN -->
  </div>
</div>

<!-- Isi Body -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="col-xl-3 col-sm-6">
        <hr class="dark horizontal my-0">
      </div>
    </div>
  </div>
</div>
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
</div>

<!-- End Body -->