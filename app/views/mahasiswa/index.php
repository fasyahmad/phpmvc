<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
            Tambah Data Mahasiswa
            </button>
            <br> <br>
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach($data['mhs'] as $mhs) : ?>
                <li class="list-group-item d-flex justify-content-between align-item-center">
                    <!-- ketika detail di hover makan masing2 detail akan memiliki id yang berbeda -->
                    <?= $mhs['Nama'] ?> <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['Id'] ?>" class="badge badge-primary">
                        Detail
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="http://localhost/phpmvc/public/mahasiswa/tambah" method="post">

        <div class="form-group">
            <label for="Nama">Nama</label>
            <input type="text" class="form-control" id="Nama" name="Nama">
        </div>
        <div class="form-group">
            <label for="Nrp">Nomer Mahasiswa</label>
            <input type="number" class="form-control" id="Nrp" name="Nrp">
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="Email" name="Email">
        </div>
        <div class="form-group">
    <label for="Jurusan">Jurusan</label>
    <select class="form-control" id="Jurusan" name="Jurusan">
      <option value="Teknik Elektro">Teknik Elektro</option>
      <option value="Teknik Elektro">Teknik Mesin</option>
      <option value="Teknik Elektro">Teknik Sipil</option>
      <option value="Teknik Elektro">Teknik Informatika</option>
      <option value="Teknik Elektro">Teknik Industri</option>
    </select>
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>

      </div>
    </div>
  </div>
</div>