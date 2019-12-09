<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $data['mhs']['Nama']?></h5>
            <p class="card-text">No. Nrp : <?= $data['mhs']['Nrp']?></p>
            <a href="#" class="card-link">Email : <?= $data['mhs']['Email']?></a>
            <p href="#" class="card-text">Jurusan : <?= $data['mhs']['Jurusan']?></p>
            <a href="<?= BASEURL; ?> /mahasiswa" class="card-link">Kembali</a>
        </div>
    </div>
</div>