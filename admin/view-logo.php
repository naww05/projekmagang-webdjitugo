<?php
    require '../function.php';
    if($_SESSION['ulevel'] !== 'admin_logo') {
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admin-logo.php">
                <div class="sidebar-brand-icon">
                    <img class="img-fluid" src="../form/assets/logo.png" alt="">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../admin-logo.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Entries
            </div>

            <!-- Nav Item - Client Logo Menu -->
            <li class="nav-item">
                <a class="nav-link" href="logo.php">
                    <i class="fas fa-image"></i>
                    <span>Client Logo</span>
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
    .card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: white;
    border-bottom: 1px solid #e3e6f0;
    }

    .card-body {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #f8f9fc;
    border-bottom: 1px solid #e3e6f0;
    }

    .card-body h6{
        font-size: 14px;
    }

    .card-content{
        padding: 0.50rem 1.25rem;
        margin-bottom: 0;
        background-color: white;
        border-bottom: 1px solid #e3e6f0;
    }

    .card-content h6{
        font-size: 14px;
    }

    .card-option{
        padding: 0.50rem 1.25rem;
        margin-bottom: 0;
        background-color: white;
        /* border-bottom: 1px solid #e3e6f0; */
    }

    .card-option i a h6{
        font-size: 14px;
        font-family: 'Nunito', sans-serif;
        color: black;
    }


</style>

    <?php
        $idlogo = $_GET['id'];

        $logo = mysqli_query($koneksi, "SELECT * FROM logo WHERE id = '$idlogo' ");
        if(mysqli_num_rows($logo) == 0){
            echo "<script>window.location='graphic.php'</script>";
        }
        $p = mysqli_fetch_object($logo);
        
    ?>

    <!-- Content Area -->
    <div class="row">
        <div class="col-lg-9 ms-3">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary fs-4">View Entry Client Logo</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold">Brand Name</h6>
                </div>
                <div class="card-content">
                    <h6><?php echo $p->nama ?></h6>
                </div>
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold">Slogan</h6>
                </div>
                <div class="card-content flex-row">
                    <h6><?php echo $p->slogan ?></h6>
                </div>
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold">Product or Service</h6>
                </div>
                <div class="card-content flex-row">
                    <h6><?php echo $p->product ?></h6>
                </div>
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold">What kind of your Business</h6>
                </div>
                <div class="card-content flex-row">
                    <h6><?php echo $p->bisnis ?></h6>
                </div>
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold">Competitor References</h6>
                </div>
                <div class="card-content flex-row">
                    <h6><?php echo $p->competitor ?></h6>
                </div>
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold">Target Market</h6>
                </div>
                <div class="card-content flex-row">
                    <h6><?php echo $p->market ?></h6>
                </div>
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold">3 Main Logo Description</h6>
                </div>
                <div class="card-content flex-row">
                    <h6><?php echo $p->deskripsi ?></h6>
                </div>
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold">Logo Style (Based on your choice)</h6>
                </div>
                <div class="card-content flex-row">
                    <h6><?php echo $p->style ?></h6>
                </div>
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold">Brand Logo</h6>
                </div>
                <div class="card-content flex-row">
                    <a href="../uploads/logo/<?= $p->images ?>" target="_blank"><img src="../uploads/logo/<?= $p->images ?>" width="100px" class="mb-2"></a>
                    <a href="../uploads/logo/<?= $p->images ?>" target="_blank"><h6><?php echo $p->images ?></h6></a>
                </div>
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold">Choose Your Color</h6>
                </div>
                <div class="card-content flex-row">
                    <h6><?php echo $p->color ?></h6>
                </div>
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold">Positioning Your Logo (Name Card, Billboard, Letterhead, etc)</h6>
                </div>
                <div class="card-content flex-row">
                    <h6><?php echo $p->posisi ?></h6>
                </div>
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold">Additional Idea</h6>
                </div>
                <div class="card-content flex-row">
                    <h6><?php echo $p->ide ?></h6>
                </div>
                <div class="card-body">
                    <h6 class="m-0 font-weight-bold">Vision & Mision</h6>
                </div>
                <div class="card-content flex-row">
                    <h6><?php echo $p->visi ?></h6>
                </div>
            </div>
        </div>

        <!-- side options -->
        <div class="col-lg">
            <div class="card shadow mb-4 me-3">
                <div
                    class="card-body py-3 d-flex flex-row align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Entry Details</h6>
                </div>

                <!-- Card Body -->
                <div class="card-option">
                    <i class="fas fa-key text-dark d-flex"><h6 class="ms-2"> Entry ID: <span class="font-weight-bold"><?= $p->id ?></span></h6></i>
                </div>  
                <div class="card-option">
                    <i class="fas fa-calendar text-dark d-flex"><h6 class="ms-2"> Submitted: <span class="font-weight-bold"><?= $p->hari ?></span></h6></i>
                </div>
            </div>
            <div class="card shadow mb-4 me-3">
                <div
                    class="card-body py-3 d-flex flex-row align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
                </div>

                <!-- Card Body -->
                <div class="card-option">
                    <i class="fas fa-print text-dark d-flex"><a href="export/single-logo.php?id=<?= $p->id ?>" target="_blank"><h6 class="ms-2">Print</h6></i></a>
                </div>  
                <div class="card-option">
                    <i class="fas fa-file-csv text-dark d-flex"><a href="export/single-logo.php?id=<?= $p->id ?>" target="_blank"><h6 class="ms-2">Export (CSV)</span></h6></i></a>
                </div>
                <div class="card-option">
                    <i class="fas fa-file-excel text-dark d-flex"><a href="export/single-logo.php?id=<?= $p->id ?>" target="_blank"><h6 class="ms-2">Export (XLSX)</span></h6></i></a>
                </div>
                <div class="card-body py-3 d-flex flex-row align-items-center justify-content-between">
                    <a href="edit-logo.php?id=<?= $p->id?>" class="btn btn-primary btn-sm">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?=$p->id?>">Delete Entry</button>
                </div>
            </div>
        </div>
    </div>

<?php
    require "footer.php";
?>

<!-- Delete Modal -->
<div class="modal fade" id="delete<?=$idlogo;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

        <!-- modal body -->
                <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data <?= $p->nama?>?
                    <input type="hidden" name="id" value="<?=$p->id?>">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-danger" name="delete-logo">Hapus</button>
                </div>
                </form>
            </div>
        </div>
    </div>