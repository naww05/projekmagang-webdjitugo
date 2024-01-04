<?php
    require '../function.php';
    if($_SESSION['ulevel'] !== 'admin_graphic') {
        // Jika pengguna bukan role1, redirect atau tampilkan pesan kesalahan
        $_SESSION['ulogin'] = "Anda tidak mempunyai akses ke halaman tersebut!";
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="../assets/img/logo.png">
    <title>Admin Motion Graphic Djitugo Internasional</title>

    <!-- Export Plugin -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
    <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> -->

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-black sidebar sidebar-white accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admin-grap.php">
                <div class="sidebar-brand-icon">
                    <img class="img-fluid" src="../form/assets/logo.png" alt="">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../admin-grap.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Entries
            </div>

            <!-- Nav Item - Client Motion Graphic Menu -->
            <li class="nav-item">
                <a class="nav-link" href="graphic.php">
                    <i class="fas fa-camera"></i>
                    <span>Client Motion Graphic</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-black topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="d-none form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append d-none">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mb-2 mr-2 d-none d-lg-inline text-gray-600 medium">Hi, <?= $_SESSION['uname'] ?></span>
                                <i class="img-profile rounded-circle fas fa-user mt-2"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

<style>
    .action-buttons {
        list-style: none;
        padding: 0;
        display: flex;
        justify-content: center;
    }
    .action-buttons li {
        margin-right: 10px;
    }
    .action-buttons li:last-child {
        margin-right: 0;
    }

    .btn-orange {
        background: none;
        border: none;
        color: rgb(84,143,191);
        /* margin-right : 20rem; */
    }
</style>


<!-- Begin Page Content -->
<div class="container-fluid">
    <?php
        if (isset($_SESSION['notification'])) {
            echo '<div class="border-left-primary alert alert-primary alert-dismissible fade show role="alert">' . $_SESSION['notification'] . '</div>';
            unset($_SESSION['notification']);
            }
    ?>
    <?php
        if (isset($_SESSION['del'])) {
            echo '<div class="border-left-danger alert alert-danger alert-dismissible fade show role="alert">' . $_SESSION['del'] . '</div>';
            unset($_SESSION['del']);
            }
    ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary fs-5">Client Graphic Motion</h6>
        <a href="export/grap.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Export All
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Brand Name</th>
                        <th>Business Type</th>
                        <th>Product Service</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Brand Name</th>
                        <th>Business Type</th>
                        <th>Product Service</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>

                <?php
                    $no = "1";
                    $graphic = mysqli_query($koneksi, "SELECT * FROM graphic ORDER BY id DESC");
                    if(mysqli_num_rows($graphic)>0){
                        while($p = mysqli_fetch_array($graphic)){
                            $grap = $p['id'];
                            
                ?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p['nama'] ?></td>
                        <td><?= $p['bisnis'] ?></td>
                        <td><?= $p['product'] ?></td>
                        <td><?= $p['hari'] ?></td>
                        <td>
                            <ul class="action-buttons">
                                <li>
                                    <a href="view-grap.php?id=<?= $p['id']?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="edit-grap.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?=$grap;?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </li>
                            </ul>
                        </td>
                    </tr>

                    

                    <!-- Delete Modal -->
                    <div class="modal fade" id="delete<?=$grap;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                        <!-- modal body -->
                                <form method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data <?= $p['nama']?>?
                                    <input type="hidden" name="id" value="<?=$grap;?>">
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn-danger" name="delete-grap">Hapus</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                <?php }}else{ ?>
                    <tr>
                        <td colspan = "5">Empty</td>
                    </tr>
                <?php } ?>  

                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php

    include "footer.php";

?>