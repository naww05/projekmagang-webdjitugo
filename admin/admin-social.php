<?php
    require 'header.php';
    if($_SESSION['ulevel'] !== 'superadmin') {
        // Jika pengguna bukan role1, redirect atau tampilkan pesan kesalahan
        $_SESSION['ulogin'] = "Anda tidak mempunyai akses ke halaman tersebut!";
        header("Location:login.php");
    }
?>

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
        <h6 class="m-0 font-weight-bold text-primary fs-5">Client Social Media</h6>
        <a href="export/social.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Export All
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Brand Name</th>
                        <th>Whatsapp Number</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Brand Name</th>
                        <th>Whatsapp Number</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>

                <?php
                    $no = "1";
                    $social = mysqli_query($koneksi, "SELECT * FROM social ORDER BY id DESC");
                    if(mysqli_num_rows($social)>0){
                        while($p = mysqli_fetch_array($social)){
                            $soc = $p['id'];
                            
                ?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p['nama'] ?></td>
                        <td><?= $p['brand'] ?></td>
                        <td><?= $p['num'] ?></td>
                        <td><?= $p['hari'] ?></td>
                        <td>
                            <ul class="action-buttons">
                                <li>
                                    <a href="admin-view-social.php?id=<?= $p['id']?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="super-edit-social.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?=$soc;?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </li>
                            </ul>
                        </td>
                    </tr>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="delete<?=$soc;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                        <!-- modal body -->
                                <form method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data <?= $p['brand']?>?
                                    <input type="hidden" name="id" value="<?=$soc;?>">
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn-danger" name="super-delete-social">Hapus</button>
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