<?php

    include 'koneksi.php';

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Bily Hakim</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Data Mahasiswa
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Mahasiswa</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  Tambah Mahasiswa
                </button>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Jurusan</th>
                      <th>Semester</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 0;
                      $sql = "SELECT * FROM tb_mahasiswa";
                      $result = mysqli_query($koneksi, $sql);
                      while($row = mysqli_fetch_assoc($result)){
                          $no++;
                      ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $row['nim'] ?></td>
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo $row['jurusan'] ?></td>
                            <td><?php echo $row['semester'] ?></td>
                            <td><?php echo $row['alamat'] ?></td>
                            <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" 
                            data-target="#modal-edit<?php echo $row['id_mahasiswa'] ?>">
                              Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" 
                            data-target="#modal-hapus<?php echo $row['id_mahasiswa'] ?>">
                              Hapus
                            </button>
                            </td>
                          </tr>
                          <div class="modal fade" id="modal-edit<?php echo $row['id_mahasiswa'] ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Edit Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <!-- form start -->
                                <form action="edit.php" method="post">
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">NIM</label>
                                      <input type="hidden" name="id_mahasiswa" value="<?php echo $row['id_mahasiswa'] ?>">
                                      <input type="number" class="form-control" name="nim" placeholder="Enter NIM" value="<?php echo $row['nim'] ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Nama</label>
                                      <input type="text" class="form-control" name="nama" placeholder="Enter Name" value="<?php echo $row['nama'] ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Jurusan</label>
                                      <input type="text" class="form-control" name="jurusan" placeholder="Enter Jurusan" value="<?php echo $row['jurusan'] ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Semester</label>
                                      <input type="text" class="form-control" name="semester" placeholder="Enter Semester" value="<?php echo $row['semester'] ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleInputPassword1">Alamat</label>
                                      <input type="text" class="form-control" name="alamat" placeholder="Enter Alamat" value="<?php echo $row['alamat'] ?>">
                                    </div>
                                  </div>
                                  <!-- /.card-body -->

                                  <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Update</button>
                                  </div>
                                </form>
                              </div>  
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                        <div class="modal fade" id="modal-hapus<?php echo $row['id_mahasiswa'] ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Hapus Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <!-- form start -->
                                <form action="hapus.php" method="post">
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Apakah anda yakin mau menghapus data a.n</label>
                                      <input type="hidden" name="id_mahasiswa" value="<?php echo $row['id_mahasiswa'] ?>">
                                      <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'] ?>"
                                      readonly>
                                    </div>
                                  </div>
                                  <!-- /.card-body -->

                                  <div class="card-footer">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                  </div>
                                </form>
                              </div>  
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form action="tambah.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIM</label>
                    <input type="number" class="form-control" name="nim" placeholder="Enter NIM">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jurusan</label>
                    <input type="text" class="form-control" name="jurusan" placeholder="Enter Jurusan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Semester</label>
                    <input type="text" class="form-control" name="semester" placeholder="Enter Semester">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Enter Alamat">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>  
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  <!-- Control Sidebar -->
  

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
