<?php
  include "header.php";
  $query=mysqli_query($db, "SELECT * FROM data_buku");
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12 mt-3" style="min-height: 462px";>
      <div class="card">
        <div class="card-header">
          Daftar Peminjaman
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <a href="data_buku.php" class="btn btn-primary">Tambah Peminjaman</a>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <table class="table table-bordered tables-striped">
                <tr>
                  <th>No</th>
                  <th>ID Peminjaman</th>
                  <th>ID Anggota</th>
                  <th>ID Buku</th>
                  <th>Tanggal Peminjaman</th>
                  <th>Status Peminjamman</th>
                  </tr>
                  <?php
                    $no=1;
                    while ($ambil_data=mysqli_fetch_array($query)) {
                  ?>
                <td><?php echo $no++ ?></td>
                <td><?php echo $ambil_data['id_peminjaman']; ?></td>
                <td><?php echo $ambil_data['id_anggota']; ?></td>
                <td><?php echo $ambil_data['id_buku']; ?></td>
                <td><?php echo $ambil_data['tgl_peminjaman']; ?></td>
                <td><?php echo $ambil_data['status_pinjam']; ?></td>
               <?php
                  }
               ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  Include "footer.html";
?>