<?php
  include "koneksi.php";
  include "header.php";
  $query=mysqli_query($db, "SELECT * FROM pengembalian");
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12 mt-3" style="min-height: 462px";>
      <div class="card">
        <div class="card-header">
          Daftar Pengembalian
        </div>
        <div class="card-body">
          <div class="row">
             <div class="col-sm">
                  Daftar berikut merupakan histori pengembalian yang telah dilakukan
             </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <table class="table table-bordered tables-striped">
                <tr>
                  <th>No</th>
                  <th>ID Pengembalian</th>
                  <th>ID Peminjaman</th>
                  <th>Tanggal Pengembalian</th>
                  <?php
                    $no=1;
                    while ($ambil_data=mysqli_fetch_array($query)) {
                      ?>
                </tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $ambil_data['id_pengembalian']; ?></td>
                <td><?php echo $ambil_data['id_peminjaman']; ?></td>
                <td><?php echo $ambil_data['tgl_kembali']; ?></td>
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