<?php

    include 'koneksi.php';

    $id_mahasiswa = $_POST['id_mahasiswa'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $semester = $_POST['semester'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "UPDATE tb_mahasiswa SET 
    nim='$nim', nama='$nama', jurusan='$jurusan', semester='$semester', alamat='$alamat' WHERE id_mahasiswa='$id_mahasiswa'");

    if ($query) {
        ?>
            <script type="text/javascript">
                alert('Data Berhasil Diupdate');
                document.location.href = 'index.php';
            </script>
        <?php
    }else {
        ?>
            <script type="text/javascript">
                alert('Data Gagal Diupdate');
                document.location.href = 'index.php';
            </script>
        <?php
    }

?>