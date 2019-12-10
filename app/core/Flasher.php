<?php 
// biar kelas ini jalan panggil di init
class Flasher {

    // untuk memberikan notifikasi ex. pesan : data berhasil di tambahkan
    // ex. aksi : tambah, hapus, edit
    // ex. tipe : untuk kelas bootstrap cantoh class danger
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash']))
        {
            echo '<div class="alert alert-' .$_SESSION['flash']['tipe']. ' alert-dismissible fade show" role="alert">
                Data Mahasiswa
                <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            // untuk menghapus session 

            unset($_SESSION['flash']);
        }
    }


}