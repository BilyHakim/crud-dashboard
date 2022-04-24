<?php

    include 'koneksi.php';

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $semester = $_POST['semester'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO tb_mahasiswa VALUES ('', '$nim', '$nama', '$jurusan', '$semester', '$alamat')");

    if ($query) {
        ?>
            <script type="text/javascript">
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script>
        <?php
    }else {
        ?>
            <script type="text/javascript">
                alert('Data Gagal Ditambahkan');
                document.location.href = 'tambah.php';
            </script>
        <?php
    }

?>