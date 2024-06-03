<?php
  include "koneksi.php";
  include "header.php";
  session_start();
  $query=mysqli_query($db, "SELECT * FROM peminjaman");

  if (isset($_POST['kembali'])) {
    $id_peminjaman = $_POST['id_peminjaman'];
    $_SESSION['id_peminjaman'] = $id_peminjaman;
    
    $query2 = mysqli_query($db, "INSERT INTO pengembalian (id_peminjaman) VALUES ('{$_SESSION['id_peminjaman']}')");
    
    $query3 = mysqli_query($db, "UPDATE buku SET status_buku='Tersedia' WHERE id_buku=(SELECT id_buku FROM peminjaman WHERE id_peminjaman={$_SESSION['id_peminjaman']})");
    $query4 = mysqli_query($db, "UPDATE peminjaman SET status_pinjam='Dikembalikan' WHERE id_peminjaman={$_SESSION['id_peminjaman']}");
    echo "<script>alert('Buku ".$_SESSION['nama_buku']." berhasil dikembalikan. Lihat detail pengembalian di fitur Pengembalian');</script>";
  }
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
                  <th>Aksi</th>
                  <?php
                  $no=1;
                  while ($ambil_data=mysqli_fetch_array($query)) {
                    ?>
                </tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $ambil_data['id_peminjaman']; ?></td>
                <td><?php echo $ambil_data['id_anggota']; ?></td>
                <td><?php echo $ambil_data['id_buku']; ?></td>
                <td><?php echo $ambil_data['tgl_peminjaman']; ?></td>
                <td><?php echo $ambil_data['status_pinjam']; ?></td>
                <td>
                  <?php if ($ambil_data['status_pinjam']=='Dipinjam') { ?>
                    <form action="peminjaman.php" method="POST">
                      <input type="hidden" name="id_peminjaman" value="<?php echo $ambil_data['id_peminjaman']; ?>">
                      <button type="submit" class="btn btn-success" name="kembali">Kembalikan</button>
                    </form>
                  <?php } ?>
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