<?php
  include "header.php";
  $query=mysqli_query($db, "SELECT * FROM buku");
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12 mt-3" style="min-height: 462px";>
      <div class="card">
        <div class="card-header">
          Data Buku
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <table class="table table-bordered tables-striped">
                <tr>
                  <th>No</th>
                  <th>ID Buku</th>
                  <th>Nama Buku</th>
                  <th>Pengarang</th>
                  <th>Penerbit</th>
                  <th>Tahun Terbit</th>
                  <th>ISBN</th>
                  <th>Status</th>
                  <th>Aksi</th>
                  <?php
                    $no=1;
                    while ($ambil_data=mysqli_fetch_array($query)) {
                        ?>
                </tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $ambil_data['id_buku']; ?></td>
                <td><?php echo $ambil_data['nama_buku']; ?></td>
                <td><?php echo $ambil_data['pengarang']; ?></td>
                <td><?php echo $ambil_data['penerbit']; ?></td>
                <td><?php echo $ambil_data['tahun_terbit']; ?></td>
                <td><?php echo $ambil_data['isbn']; ?></td>
                <td><?php echo $ambil_data['status']; ?></td>
                <td>
                  <a href="?id=<?php echo $ambil_data['id_buku'] ?>" class="btn btn-success">Tersedia</a>
                </td>
                <td>
                  <a href="peminjaman.php?id=<?php echo $ambil_data['id_buku', 'nama_buku', 'pengarang', 'penerbit', 'tahun_terbit',
                  'isbn', 'status'] ?>" class="btn btn-success">Pinjam</a>
                </td>
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