<?php
  include "header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12 mt-3" style="min-height: 462px";>
      <div class="card">
        <div class="card-header">
          Data Kategori
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <a href="" class="btn btn-primary">Tambah Data</a>
            </div>
            <div class="col">
              <form action="" class="form-inline float-right">
                <input type="text" class="form-control">
                <input type="submit" class="btn btn-primary ml-2">
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <table class="table table-bordered tables-striped">
                <tr>
                  <th>No</th>
                  <th>Kode Kategori</th>
                  <th>Nama Kategori</th>
                </tr>
                <td>1</td>
                <td>K-001</td>
                <td>Komputer</td>
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