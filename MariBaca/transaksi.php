<?php
  include "header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12 mt-3" style="min-height: 462px";>
      <div class="card">
        <div class="card-header">
          Tambah Data Kategori
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <form action=""> 
                <div class="form-group">
                  <label for="">Kode Kategori</label>
                  <input type="text" class="form-control" placeholder="Kode Kategori">
                </div>
                <div class="form-group">
                  <label for="">Nama Kategori</label>
                  <input type="text" class="form-control" placeholder="Nama Kategori">
                </div>    
                <input type="submit" name="" id="" class="btn btn-primary" value="Simpan">
              </form>
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