<?php
    require '../../function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../assets/img/logo.png">
    <title>Data Client Social Media</title>

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
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
<div class="container-fluid mt-4">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary fs-5">Client Social Media</h6>
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
                        <th>Email</th>
                        <th>Brand Logo</th>
                        <th>Photo of Products</th>
                        <th>Products Into (if Any)</th>
                        <th>Facebook Username and Password</th>
                        <th>Instagram Username and Password</th>
                        <th>Competitor References</th>
                        <th>Date</th>
                    </tr>
                </thead>
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
                        <td><?= $p['email'] ?></td>
                        <td><?= $p['logo'] ?></td>
                        <td><?= $p['drive'] ?></td>
                        <td><?= $p['prodinto'] ?></td>
                        <td><?= $p['fb'] ?></td>
                        <td><?= $p['ig'] ?></td>
                        <td><?= $p['competitor'] ?></td>
                        <td><?= $p['hari'] ?></td>
                    </tr>

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

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'print','pdf','csv','excel'
                ]
            } );
        } );
    </script>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>

    <!-- bootstrap -->
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    

</body>

</html>