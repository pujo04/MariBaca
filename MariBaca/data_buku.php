<?php
  include "koneksi.php";
  session_start();
  
  include "header.php";
  $query=mysqli_query($db, "SELECT * FROM buku");

  if (isset($_POST['pinjam'])) {
    $id_buku = $_POST['id_buku'];
    $nama_buku = $_POST['nama_buku'];
    $_SESSION['id_buku'] = $id_buku;
    $_SESSION['nama_buku'] = $nama_buku;

    $query2 = mysqli_query($db, "INSERT INTO peminjaman (id_anggota, id_buku, status_pinjam) VALUES ('{$_SESSION['id_anggota']}', '{$_SESSION['id_buku']}', 'Dipinjam')");
    $query3 = mysqli_query($db, "UPDATE buku SET status_buku='Tidak Tersedia' WHERE id_buku={$_SESSION['id_buku']}");
    echo "<script>alert('Buku ".$_SESSION['nama_buku']." berhasil dipinjam. Lihat detail peminjaman di fitur Peminjaman');</script>";
  }
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
                <td>
                  <?php
                    if ($ambil_data['status_buku']=='Tersedia') {
                      echo '<a id='.$ambil_data["status_buku"].' class="btn btn-success">'.$ambil_data['status_buku'].'</a>';
                    } else {
                      echo '<a id='.$ambil_data["status_buku"].' class="btn btn-danger">'.$ambil_data['status_buku'].'</a>';
                    }
                  ?>
                <td>
                  <?php if ($ambil_data['status_buku']=='Tersedia') { ?>
                    <form action="data_buku.php" method="POST">
                      <input type="hidden" name="id_buku" value="<?php echo $ambil_data['id_buku']; ?>">
                      <input type="hidden" name="nama_buku" value="<?php echo $ambil_data['nama_buku']; ?>">
                      <button type="submit" class="btn btn-success" name="pinjam">Pinjam</button>
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