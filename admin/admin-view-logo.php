<?php
    require 'header.php';
    if($_SESSION['ulevel'] !== 'superadmin') {
        // Jika pengguna bukan role1, redirect atau tampilkan pesan kesalahan
        $_SESSION['ulogin'] = "Anda tidak mempunyai akses ke halaman tersebut!";
        header("Location:login.php");
    }
?>

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
                    <a href="super-edit-logo.php?id=<?= $p->id?>" class="btn btn-primary btn-sm">Edit</a>
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
                <button type="submit" class="btn btn-danger" name="super-delete-logo">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>