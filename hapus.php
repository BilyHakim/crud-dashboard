<?php

    include 'koneksi.php';

    $id_mahasiswa = $_POST['id_mahasiswa'];

    $query = mysqli_query($koneksi, "DELETE FROM tb_mahasiswa WHERE id_mahasiswa='$id_mahasiswa'");

    if ($query) {
        ?>
            <script type="text/javascript">
                alert('Data Berhasil Didelete');
                document.location.href = 'index.php';
            </script>
        <?php
    }else {
        ?>
            <script type="text/javascript">
                alert('Data Gagal Didelete');
                document.location.href = 'index.php';
            </script>
        <?php
    }

?>