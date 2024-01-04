<?php
$koneksi= mysqli_connect('localhost', 'root', '', 'db_djitugo');
session_start();

// Login
if(isset($_POST['login'])){
    $user = mysqli_real_escape_string($koneksi, $_POST['username']);
    $pass = $_POST['password'];

    $cek = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username = '".$user."'");
    if (mysqli_num_rows($cek) > 0){

        $d = mysqli_fetch_object($cek);
        if(MD5($pass) == $d->password){

            $_SESSION['status_login'] = true;
            // $_SESSION['ulogin'] = "Anda tidak mempunyai akses ke halaman tersebut!";
            $_SESSION['uid'] = $d->id;
            $_SESSION['uname'] = $d->nama;
            $_SESSION['ulevel']= $d->level;

            // Memeriksa level pengguna
            if($d->level === 'superadmin') {
                // Redirect role1 users to specific page
                header("Location: admin.php");
            } else if($d->level === 'admin_website') {
                // Redirect role2 users to their specific page
                header("Location: admin-web.php");
            } else if($d->level === 'admin_graphic') {
                // Redirect role2 users to their specific page
                header("Location: admin-grap.php");
            } else if($d->level === 'admin_logo') {
                // Redirect role2 users to their specific page
                header("Location: admin-logo.php");
            } else if($d->level === 'admin_social') {
                // Redirect role2 users to their specific page
                header("Location: admin-social.php");
            }
        } else {
            $_SESSION['status'] = "Password Salah";
            // header('Location:login.php');
        }
    } else {
        $_SESSION['status'] = "Username Tidak Ditemukan";
        // header('Location:login.php');
    }
}

// input data client website
if(isset($_POST['save-web'])){
    $nama = ucwords($_POST['nama']);
    $brand = $_POST['brand'];
    $number = $_POST['num'];
    $email = $_POST['email'];
    $drive = $_POST['drive'];
    $prodinto = $_POST['prodinto'];
    $fb = $_POST['fb'];
    $ig = $_POST['ig'];
    $competitor = $_POST['competitor'];
    date_default_timezone_set('Asia/Makassar');
    $currentDateTime = date('Y-m-d H:i:s A');

    // pengecekan inputan kosong
    $nama = empty($nama) ? "Empty" : $nama;
    $brand = empty($brand) ? "Empty" : $brand;
    $number = empty($number) ? "Empty" : $number;
    $email = empty($email) ? "Empty" : $email;
    $drive = empty($drive) ? "Empty" : $drive;
    $prodinto = empty($prodinto) ? "Empty" : $prodinto;
    $fb = empty($fb) ? "Empty" : $fb;
    $ig = empty($ig) ? "Empty" : $ig;
    $competitor = empty($competitor) ? "Empty" : $competitor;
    
    // logo
    $name = $_FILES['file']['name'];
    // $dot = explode('.', $name);
    // $ekstensi = strtolower(end($dot));
    // $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $logo = $name;

    $cek = mysqli_query($koneksi, "SELECT * FROM website WHERE nama='$nama'");
    $hitung = mysqli_num_rows($cek);

    if($hitung<1){
        // proses up foto
        move_uploaded_file($file_tmp, "../uploads/web/".$logo);

        $addtotable = mysqli_query($koneksi, "INSERT INTO website (nama, brand, num, email, drive, prodinto, fb, ig, competitor, hari, logo) 
        VALUES('$nama', '$brand', '$number', '$email', 
        '$drive', '$prodinto', '$fb', 
        '$ig', '$competitor', '$currentDateTime', '$logo')");
        
        if($addtotable){
            $_SESSION['status'] = "Submit Successfull";
            header('location.form-web.php');
        }else{
            $_SESSION['status'] = "Submit Failed";
            header('location.form-web.php');
        }
    }
}

// update data client website
if(isset($_POST['update-web'])){

    $idweb = $_POST['web'];
    $nama = ucwords($_POST['nama']);
    $brand = $_POST['brand'];
    $number = $_POST['num'];
    $email = $_POST['email'];
    $drive = $_POST['drive'];
    $prodinto = $_POST['prodinto'];
    $fb = $_POST['fb'];
    $ig = $_POST['ig'];
    $competitor = $_POST['competitor'];
    date_default_timezone_set('Asia/Makassar');
    $currentDateTime = date('Y-m-d H:i:s A');

    // pengecekan inputan kosong
    $nama = empty($nama) ? "Empty" : $nama;
    $brand = empty($brand) ? "Empty" : $brand;
    $number = empty($number) ? "Empty" : $number;
    $email = empty($email) ? "Empty" : $email;
    $drive = empty($drive) ? "Empty" : $drive;
    $prodinto = empty($prodinto) ? "Empty" : $prodinto;
    $fb = empty($fb) ? "Empty" : $fb;
    $ig = empty($ig) ? "Empty" : $ig;
    $competitor = empty($competitor) ? "Empty" : $competitor;

    // up logo
    if($_FILES['file']['name']!= ''){

        $name = $_FILES['file']['name'];
        // $dot = explode('.', $name);
        // $ekstensi = strtolower(end($dot));
        // $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];

        $logo = $name;
        

        if(file_exists("../uploads/web/".$_POST['logo2'])){
            unlink("../uploads/web/".$_POST['logo2']);
        }

        move_uploaded_file($file_tmp, "../uploads/web/".$logo);
    }else{

        $logo = $_POST['logo2'];
    }

        $update = mysqli_query($koneksi, "UPDATE website SET
        nama='$nama',
        brand='$brand',  
        num='$number',
        email='$email',  
        drive='$drive',
        prodinto='$prodinto',
        fb='$fb',
        ig='$ig',
        competitor='$competitor',
        hari='$currentDateTime',
        logo='$logo'
        WHERE id='$idweb'
        ");
        if($update){
            $_SESSION['notification'] = 'Update Berhasil';
            header("Location: website.php");
            exit();
        }else{
            $_SESSION['notification'] = 'Update Gagal';
            header("Location: website.php");
            exit();
        }
}

// hapus data client website
if(isset($_POST['delete-web'])){
    $idw = $_POST['id'];

    $delWeb=mysqli_query($koneksi, "SELECT logo FROM website WHERE id = '$idw'");
    if(mysqli_num_rows($delWeb) > 0){
        $web = mysqli_fetch_object($delWeb);
        if(file_exists("../uploads/web/" .$web->logo)){
            unlink("../uploads/web/" .$web->logo);
        }
    }

    $delWeb2 = mysqli_query($koneksi, "DELETE FROM website WHERE id='$idw'");
    if($delWeb2){
        $_SESSION['del'] = "Delete Berhasil";
        header('location:website.php');
    }else{
        $_SESSION['del'] = "Delete Gagal";
        header('location:website.php');
    }
}

// input data client graphic
if(isset($_POST['save-grap'])){
    $nama = ucwords($_POST['nama']);
    $bisnis = $_POST['bisnis'];
    $product = $_POST['product'];
    $color = $_POST['color'];
    $market = $_POST['market'];
    $video = $_POST['video'];
    $slogan= $_POST['slogan'];
    $competitor = $_POST['competitor'];
    date_default_timezone_set('Asia/Makassar');
    $currentDateTime = date('Y-m-d H:i:s A');

    // pengecekan inputan kosong
    $nama = empty($nama) ? "Empty" : $nama;
    $bisnis = empty($bisnis) ? "Empty" : $bisnis;
    $product = empty($product) ? "Empty" : $product;
    $color = empty($color) ? "Empty" : $color;
    $market= empty($market) ? "Empty" : $market;
    $video = empty($video) ? "Empty" : $video;
    $slogan = empty($slogan) ? "Empty" : $slogan;
    $competitor = empty($competitor) ? "Empty" : $competitor;
    
    // logo
    $name = $_FILES['file']['name'];
    // $dot = explode('.', $name);
    // $ekstensi = strtolower(end($dot));
    // $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $logo = $name;

    $cek = mysqli_query($koneksi, "SELECT * FROM graphic WHERE nama='$nama'");
    $hitung = mysqli_num_rows($cek);

    if($hitung<1){
        // proses up foto
                move_uploaded_file($file_tmp, "../uploads/graphic/".$logo);

                $addtotable = mysqli_query($koneksi, "INSERT INTO graphic (nama, bisnis, product, color, market, video, slogan, competitor, hari, logo) 
                VALUES('$nama', '$bisnis', '$product', '$color', 
                '$market', '$video', '$slogan', 
                '$competitor', '$currentDateTime', '$logo')");
                
                if($addtotable){
                    $_SESSION['status'] = "Submit Successfull";
                    header('location.form-graphic.php');
                }else{
                    $_SESSION['status'] = "Submit Failed";
                    header('location.form-graphic.php');
                }
    }
}

// update data client graphic
if(isset($_POST['update-grap'])){

    $idgrap = $_POST['grap'];
    $nama = $_POST['nama'];
    $bisnis = $_POST['bisnis'];
    $product = $_POST['product'];
    $color = $_POST['color'];
    $market = $_POST['market'];
    $video = $_POST['video'];
    $slogan= $_POST['slogan'];
    $competitor = $_POST['competitor'];
    date_default_timezone_set('Asia/Makassar');
    $currentDateTime = date('Y-m-d H:i:s A');

    // pengecekan inputan kosong
    $nama = empty($nama) ? "Empty" : $nama;
    $bisnis = empty($bisnis) ? "Empty" : $bisnis;
    $product = empty($product) ? "Empty" : $product;
    $color = empty($color) ? "Empty" : $color;
    $market= empty($market) ? "Empty" : $market;
    $video = empty($video) ? "Empty" : $video;
    $slogan = empty($slogan) ? "Empty" : $slogan;
    $competitor = empty($competitor) ? "Empty" : $competitor;

    // up logo
    if($_FILES['file']['name']!= ''){

        $name = $_FILES['file']['name'];
        // $dot = explode('.', $name);
        // $ekstensi = strtolower(end($dot));
        // $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];

        $logo = $name;
        

        if(file_exists("../uploads/graphic/".$_POST['logo2'])){
            unlink("../uploads/graphic/".$_POST['logo2']);
        }

        move_uploaded_file($file_tmp, "../uploads/graphic/".$logo);
    }else{

        $logo = $_POST['logo2'];
    }

        $update = mysqli_query($koneksi, "UPDATE graphic SET
        nama='$nama',
        bisnis='$bisnis',  
        product='$product',
        color='$color',  
        market='$market',
        video='$video',
        slogan='$slogan',
        competitor='$competitor',
        hari='$currentDateTime',
        logo='$logo'
        WHERE id='$idgrap'
        ");
        if($update){
            $_SESSION['notification'] = 'Update Berhasil';
            header("Location: graphic.php");
            exit();
        }else{
            $_SESSION['notification'] = 'Update Gagal';
            header("Location: graphic.php");
            exit();
        }
}

// hapus data client graphic
if(isset($_POST['delete-grap'])){
    $idgrap = $_POST['id'];

    $delgrap=mysqli_query($koneksi, "SELECT logo FROM graphic WHERE id = '$idgrap'");
    if(mysqli_num_rows($delgrap) > 0){
        $grap = mysqli_fetch_object($delgrap);
        if(file_exists("../uploads/graphic/" .$grap->logo)){
            unlink("../uploads/graphic/" .$grap->logo);
        }
    }

    $delgrap2 = mysqli_query($koneksi, "DELETE FROM graphic WHERE id='$idgrap'");
    if($delgrap2){
        $_SESSION['del'] = "Delete Berhasil";
        header('location:graphic.php');
    }else{
        $_SESSION['del'] = "Delete Gagal";
        header('location:graphic.php');
    }
}

// input data client logo
if(isset($_POST['save-logo'])){
    $nama = ucwords($_POST['nama']);
    $slogan = $_POST['slogan'];
    $product = $_POST['product'];
    $bisnis = $_POST['bisnis'];
    $competitor = $_POST['competitor'];
    $market = $_POST['market'];
    $deskripsi = $_POST['deskripsi'];
    $style= $_POST['style'];
    $color= $_POST['color'];
    $posisi= $_POST['posisi'];
    $ide= $_POST['ide'];
    $visi= $_POST['visi'];
    date_default_timezone_set('Asia/Makassar');
    $currentDateTime = date('Y-m-d H:i:s A');

    // pengecekan inputan kosong
    $nama = empty($nama) ? "Empty" : $nama;
    $slogan = empty($slogan) ? "Empty" : $slogan;
    $product = empty($product) ? "Empty" : $product;
    $bisnis = empty($bisnis) ? "Empty" : $bisnis;
    $competitor = empty($competitor) ? "Empty" : $competitor;
    $market= empty($market) ? "Empty" : $market;
    $deskripsi = empty($deskripsi) ? "Empty" : $deskripsi;
    $style = empty($style) ? "Empty" : $style;
    $color = empty($color) ? "Empty" : $color;
    $posisi = empty($posisi) ? "Empty" : $posisi;
    $ide = empty($ide) ? "Empty" : $ide;
    $visi = empty($visi) ? "Empty" : $visi;
    
    // logo
    $name = $_FILES['file']['name'];
    // $dot = explode('.', $name);
    // $ekstensi = strtolower(end($dot));
    // $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $logo = $name;

    $cek = mysqli_query($koneksi, "SELECT * FROM logo WHERE nama='$nama'");
    $hitung = mysqli_num_rows($cek);

    if($hitung<1){
        // proses up foto
                move_uploaded_file($file_tmp, "../uploads/logo/".$logo);

                $addtotable = mysqli_query($koneksi, "INSERT INTO logo (nama, slogan, product, bisnis, competitor, market, deskripsi, style, color, posisi, ide, visi, hari, images) 
                VALUES('$nama', '$slogan', '$product', '$bisnis', '$competitor', '$market', 
                '$deskripsi', '$style', '$color', 
                '$posisi', '$ide', '$visi', '$currentDateTime', '$logo')");
                
                if($addtotable){
                    $_SESSION['status'] = "Submit Successfull";
                    header('location.form-logo.php');
                }else{
                    $_SESSION['status'] = "Submit Failed";
                    header('location.form-logo.php');
                }
    }
}

// update data client logo
if(isset($_POST['update-logo'])){

    $idlogo = $_POST['logg'];
    $nama = $_POST['nama'];
    $slogan = $_POST['slogan'];
    $product = $_POST['product'];
    $bisnis = $_POST['bisnis'];
    $competitor = $_POST['competitor'];
    $market = $_POST['market'];
    $deskripsi = $_POST['deskripsi'];
    $style= $_POST['style'];
    $color= $_POST['color'];
    $posisi= $_POST['posisi'];
    $ide= $_POST['ide'];
    $visi= $_POST['visi'];
    date_default_timezone_set('Asia/Makassar');
    $currentDateTime = date('Y-m-d H:i:s A');

    // pengecekan inputan kosong
    $nama = empty($nama) ? "Empty" : $nama;
    $slogan = empty($slogan) ? "Empty" : $slogan;
    $product = empty($product) ? "Empty" : $product;
    $bisnis = empty($bisnis) ? "Empty" : $bisnis;
    $competitor = empty($competitor) ? "Empty" : $competitor;
    $market= empty($market) ? "Empty" : $market;
    $deskripsi = empty($deskripsi) ? "Empty" : $deskripsi;
    $style = empty($style) ? "Empty" : $style;
    $color = empty($color) ? "Empty" : $color;
    $posisi = empty($posisi) ? "Empty" : $posisi;
    $ide = empty($ide) ? "Empty" : $ide;
    $visi = empty($visi) ? "Empty" : $visi;

    // up logo
    if($_FILES['file']['name']!= ''){

        $name = $_FILES['file']['name'];
        // $dot = explode('.', $name);
        // $ekstensi = strtolower(end($dot));
        // $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];

        $logo = $name;
        

        if(file_exists("../uploads/logo/".$_POST['logo2'])){
            unlink("../uploads/logo/".$_POST['logo2']);
        }

        move_uploaded_file($file_tmp, "../uploads/logo/".$logo);
    }else{

        $logo = $_POST['logo2'];
    }

        $update = mysqli_query($koneksi, "UPDATE logo SET
        nama='$nama',
        slogan='$slogan',  
        product='$product',
        bisnis='$bisnis',  
        competitor='$competitor',
        market='$market',
        deskripsi='$deskripsi',
        style='$style',
        color='$color',
        posisi='$posisi',
        ide='$ide',
        visi='$visi',
        hari='$currentDateTime',
        images='$logo'
        WHERE id='$idlogo'
        ");
        if($update){
            $_SESSION['notification'] = 'Update Berhasil';
            header("Location: logo.php");
            exit();
        }else{
            $_SESSION['notification'] = 'Update Gagal';
            header("Location: logo.php");
            exit();
        }
}

// hapus data client logo
if(isset($_POST['delete-logo'])){
    $idlogo = $_POST['id'];

    $dellogo=mysqli_query($koneksi, "SELECT images FROM logo WHERE id = '$idlogo'");
    if(mysqli_num_rows($dellogo) > 0){
        $logo = mysqli_fetch_object($dellogo);
        if(file_exists("../uploads/logo/" .$logo->images)){
            unlink("../uploads/logo/" .$logo->images);
        }
    }

    $dellogo2 = mysqli_query($koneksi, "DELETE FROM logo WHERE id='$idlogo'");
    if($dellogo2){
        $_SESSION['del'] = "Delete Berhasil";
        header('location:logo.php');
    }else{
        $_SESSION['del'] = "Delete Gagal";
        header('location:logo.php');
    }
}

// input data client social
if(isset($_POST['save-social'])){
    $nama = ucwords($_POST['nama']);
    $brand = $_POST['brand'];
    $number = $_POST['num'];
    $email = $_POST['email'];
    $drive = $_POST['drive'];
    $prodinto = $_POST['prodinto'];
    $fb = $_POST['fb'];
    $ig = $_POST['ig'];
    $competitor = $_POST['competitor'];
    date_default_timezone_set('Asia/Makassar');
    $currentDateTime = date('Y-m-d H:i:s A');

    // pengecekan inputan kosong
    $nama = empty($nama) ? "Empty" : $nama;
    $brand = empty($brand) ? "Empty" : $brand;
    $number = empty($number) ? "Empty" : $number;
    $email = empty($email) ? "Empty" : $email;
    $drive = empty($drive) ? "Empty" : $drive;
    $prodinto = empty($prodinto) ? "Empty" : $prodinto;
    $fb = empty($fb) ? "Empty" : $fb;
    $ig = empty($ig) ? "Empty" : $ig;
    $competitor = empty($competitor) ? "Empty" : $competitor;
    
    // logo
    $name = $_FILES['file']['name'];
    // $dot = explode('.', $name);
    // $ekstensi = strtolower(end($dot));
    // $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $logo = $name;

    $cek = mysqli_query($koneksi, "SELECT * FROM social WHERE nama='$nama'");
    $hitung = mysqli_num_rows($cek);

    if($hitung<1){
        // proses up foto
                move_uploaded_file($file_tmp, "../uploads/social/".$logo);

                $addtotable = mysqli_query($koneksi, "INSERT INTO social (nama, brand, num, email, drive, prodinto, fb, ig, competitor, hari, logo) 
                VALUES('$nama', '$brand', '$number', '$email', 
                '$drive', '$prodinto', '$fb', 
                '$ig', '$competitor', '$currentDateTime', '$logo')");
                
                if($addtotable){
                    $_SESSION['status'] = "Submit Successfull";
                    header('location.form-social.php');
                }else{
                    $_SESSION['status'] = "Submit Failed";
                    header('location.form-social.php');
                }
    }
}

// update data client website
if(isset($_POST['update-social'])){

    $idsocial = $_POST['social'];
    $nama = ucwords($_POST['nama']);
    $brand = $_POST['brand'];
    $number = $_POST['num'];
    $email = $_POST['email'];
    $drive = $_POST['drive'];
    $prodinto = $_POST['prodinto'];
    $fb = $_POST['fb'];
    $ig = $_POST['ig'];
    $competitor = $_POST['competitor'];
    date_default_timezone_set('Asia/Makassar');
    $currentDateTime = date('Y-m-d H:i:s A');

    // pengecekan inputan kosong
    $nama = empty($nama) ? "Empty" : $nama;
    $brand = empty($brand) ? "Empty" : $brand;
    $number = empty($number) ? "Empty" : $number;
    $email = empty($email) ? "Empty" : $email;
    $drive = empty($drive) ? "Empty" : $drive;
    $prodinto = empty($prodinto) ? "Empty" : $prodinto;
    $fb = empty($fb) ? "Empty" : $fb;
    $ig = empty($ig) ? "Empty" : $ig;
    $competitor = empty($competitor) ? "Empty" : $competitor;

    // up logo
    if($_FILES['file']['name']!= ''){

        $name = $_FILES['file']['name'];
        // $dot = explode('.', $name);
        // $ekstensi = strtolower(end($dot));
        // $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];

        $logo = $name;
        

        if(file_exists("../uploads/social/".$_POST['logo2'])){
            unlink("../uploads/social/".$_POST['logo2']);
        }

        move_uploaded_file($file_tmp, "../uploads/social/".$logo);
    }else{

        $logo = $_POST['logo2'];
    }

        $update = mysqli_query($koneksi, "UPDATE social SET
        nama='$nama',
        brand='$brand',  
        num='$number',
        email='$email',  
        drive='$drive',
        prodinto='$prodinto',
        fb='$fb',
        ig='$ig',
        competitor='$competitor',
        hari='$currentDateTime',
        logo='$logo'
        WHERE id='$idsocial'
        ");
        if($update){
            $_SESSION['notification'] = 'Update Berhasil';
            header("Location: social.php");
            exit();
        }else{
            $_SESSION['notification'] = 'Update Gagal';
            header("Location: social.php");
            exit();
        }
}

// hapus data client social
if(isset($_POST['delete-social'])){
    $idsocial = $_POST['id'];

    $delsocial=mysqli_query($koneksi, "SELECT logo FROM social WHERE id = '$idsocial'");
    if(mysqli_num_rows($delsocial) > 0){
        $social = mysqli_fetch_object($delsocial);
        if(file_exists("../uploads/social/" .$social->logo)){
            unlink("../uploads/social/" .$social->logo);
        }
    }

    $delsocial2 = mysqli_query($koneksi, "DELETE FROM social WHERE id='$idsocial'");
    if($delsocial2){
        $_SESSION['del'] = "Delete Berhasil";
        header('location:social.php');
    }else{
        $_SESSION['del'] = "Delete Gagal";
        header('location:social.php');
    }
}

// edit super admin

// update data client website
if(isset($_POST['super-update-web'])){

    $idweb = $_POST['web'];
    $nama = ucwords($_POST['nama']);
    $brand = $_POST['brand'];
    $number = $_POST['num'];
    $email = $_POST['email'];
    $drive = $_POST['drive'];
    $prodinto = $_POST['prodinto'];
    $fb = $_POST['fb'];
    $ig = $_POST['ig'];
    $competitor = $_POST['competitor'];
    date_default_timezone_set('Asia/Makassar');
    $currentDateTime = date('Y-m-d H:i:s A');

    // pengecekan inputan kosong
    $nama = empty($nama) ? "Empty" : $nama;
    $brand = empty($brand) ? "Empty" : $brand;
    $number = empty($number) ? "Empty" : $number;
    $email = empty($email) ? "Empty" : $email;
    $drive = empty($drive) ? "Empty" : $drive;
    $prodinto = empty($prodinto) ? "Empty" : $prodinto;
    $fb = empty($fb) ? "Empty" : $fb;
    $ig = empty($ig) ? "Empty" : $ig;
    $competitor = empty($competitor) ? "Empty" : $competitor;

    // up logo
    if($_FILES['file']['name']!= ''){

        $name = $_FILES['file']['name'];
        // $dot = explode('.', $name);
        // $ekstensi = strtolower(end($dot));
        // $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];

        $logo = $name;
        

        if(file_exists("../uploads/web/".$_POST['logo2'])){
            unlink("../uploads/web/".$_POST['logo2']);
        }

        move_uploaded_file($file_tmp, "../uploads/web/".$logo);
    }else{

        $logo = $_POST['logo2'];
    }

        $update = mysqli_query($koneksi, "UPDATE website SET
        nama='$nama',
        brand='$brand',  
        num='$number',
        email='$email',  
        drive='$drive',
        prodinto='$prodinto',
        fb='$fb',
        ig='$ig',
        competitor='$competitor',
        hari='$currentDateTime',
        logo='$logo'
        WHERE id='$idweb'
        ");
        if($update){
            $_SESSION['notification'] = 'Update Berhasil';
            header("Location: admin-web.php");
            exit();
        }else{
            $_SESSION['notification'] = 'Update Gagal';
            header("Location: admin-web.php");
            exit();
        }
}

// hapus data client website
if(isset($_POST['super-delete-web'])){
    $idw = $_POST['id'];

    $delWeb=mysqli_query($koneksi, "SELECT logo FROM website WHERE id = '$idw'");
    if(mysqli_num_rows($delWeb) > 0){
        $web = mysqli_fetch_object($delWeb);
        if(file_exists("../uploads/web/" .$web->logo)){
            unlink("../uploads/web/" .$web->logo);
        }
    }

    $delWeb2 = mysqli_query($koneksi, "DELETE FROM website WHERE id='$idw'");
    if($delWeb2){
        $_SESSION['del']= "Hapus data berhasil";
        header('location:admin-web.php');
    }else{
        $_SESSION['del']= "Hapus data gagal";
        header('location:admin-web.php');
    }
}

// update data client graphic
if(isset($_POST['super-update-grap'])){

    $idgrap = $_POST['grap'];
    $nama = $_POST['nama'];
    $bisnis = $_POST['bisnis'];
    $product = $_POST['product'];
    $color = $_POST['color'];
    $market = $_POST['market'];
    $video = $_POST['video'];
    $slogan= $_POST['slogan'];
    $competitor = $_POST['competitor'];
    date_default_timezone_set('Asia/Makassar');
    $currentDateTime = date('Y-m-d H:i:s A');

    // pengecekan inputan kosong
    $nama = empty($nama) ? "Empty" : $nama;
    $bisnis = empty($bisnis) ? "Empty" : $bisnis;
    $product = empty($product) ? "Empty" : $product;
    $color = empty($color) ? "Empty" : $color;
    $market= empty($market) ? "Empty" : $market;
    $video = empty($video) ? "Empty" : $video;
    $slogan = empty($slogan) ? "Empty" : $slogan;
    $competitor = empty($competitor) ? "Empty" : $competitor;

    // up logo
    if($_FILES['file']['name']!= ''){

        $name = $_FILES['file']['name'];
        // $dot = explode('.', $name);
        // $ekstensi = strtolower(end($dot));
        // $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];

        $logo = $name;
        

        if(file_exists("../uploads/graphic/".$_POST['logo2'])){
            unlink("../uploads/graphic/".$_POST['logo2']);
        }

        move_uploaded_file($file_tmp, "../uploads/graphic/".$logo);
    }else{

        $logo = $_POST['logo2'];
    }

        $update = mysqli_query($koneksi, "UPDATE graphic SET
        nama='$nama',
        bisnis='$bisnis',  
        product='$product',
        color='$color',  
        market='$market',
        video='$video',
        slogan='$slogan',
        competitor='$competitor',
        hari='$currentDateTime',
        logo='$logo'
        WHERE id='$idgrap'
        ");
        if($update){
            $_SESSION['notification'] = 'Update Berhasil';
            header("Location: admin-graphic.php");
            exit();
        }else{
            $_SESSION['notification'] = 'Update Gagal';
            header("Location: admin-graphic.php");
            exit();
        }
}

// hapus data client graphic
if(isset($_POST['super-delete-grap'])){
    $idgrap = $_POST['id'];

    $delgrap=mysqli_query($koneksi, "SELECT logo FROM graphic WHERE id = '$idgrap'");
    if(mysqli_num_rows($delgrap) > 0){
        $grap = mysqli_fetch_object($delgrap);
        if(file_exists("../uploads/graphic/" .$grap->logo)){
            unlink("../uploads/graphic/" .$grap->logo);
        }
    }

    $delgrap2 = mysqli_query($koneksi, "DELETE FROM graphic WHERE id='$idgrap'");
    if($delgrap2){
        $_SESSION['del'] = 'Delete Berhasil';
        header('location:admin-graphic.php');
    }else{
        $_SESSION['del'] = 'Delete Gagal';
        header('location:admin-graphic.php');
    }
}

// update data client website
if(isset($_POST['super-update-social'])){

    $idsocial = $_POST['social'];
    $nama = ucwords($_POST['nama']);
    $brand = $_POST['brand'];
    $number = $_POST['num'];
    $email = $_POST['email'];
    $drive = $_POST['drive'];
    $prodinto = $_POST['prodinto'];
    $fb = $_POST['fb'];
    $ig = $_POST['ig'];
    $competitor = $_POST['competitor'];
    date_default_timezone_set('Asia/Makassar');
    $currentDateTime = date('Y-m-d H:i:s A');

    // pengecekan inputan kosong
    $nama = empty($nama) ? "Empty" : $nama;
    $brand = empty($brand) ? "Empty" : $brand;
    $number = empty($number) ? "Empty" : $number;
    $email = empty($email) ? "Empty" : $email;
    $drive = empty($drive) ? "Empty" : $drive;
    $prodinto = empty($prodinto) ? "Empty" : $prodinto;
    $fb = empty($fb) ? "Empty" : $fb;
    $ig = empty($ig) ? "Empty" : $ig;
    $competitor = empty($competitor) ? "Empty" : $competitor;

    // up logo
    if($_FILES['file']['name']!= ''){

        $name = $_FILES['file']['name'];
        // $dot = explode('.', $name);
        // $ekstensi = strtolower(end($dot));
        // $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];

        $logo = $name;
        

        if(file_exists("../uploads/social/".$_POST['logo2'])){
            unlink("../uploads/social/".$_POST['logo2']);
        }

        move_uploaded_file($file_tmp, "../uploads/social/".$logo);
    }else{

        $logo = $_POST['logo2'];
    }

        $update = mysqli_query($koneksi, "UPDATE social SET
        nama='$nama',
        brand='$brand',  
        num='$number',
        email='$email',  
        drive='$drive',
        prodinto='$prodinto',
        fb='$fb',
        ig='$ig',
        competitor='$competitor',
        hari='$currentDateTime',
        logo='$logo'
        WHERE id='$idsocial'
        ");
        if($update){
            $_SESSION['notification'] = 'Update Berhasil';
            header("Location: admin-social.php");
            exit();
        }else{
            $_SESSION['notification'] = 'Update Gagal';
            header("Location: admin-social.php");
            exit();
        }
}

// hapus data client social
if(isset($_POST['super-delete-social'])){
    $idsocial = $_POST['id'];

    $delsocial=mysqli_query($koneksi, "SELECT logo FROM social WHERE id = '$idsocial'");
    if(mysqli_num_rows($delsocial) > 0){
        $social = mysqli_fetch_object($delsocial);
        if(file_exists("../uploads/social/" .$social->logo)){
            unlink("../uploads/social/" .$social->logo);
        }
    }

    $delsocial2 = mysqli_query($koneksi, "DELETE FROM social WHERE id='$idsocial'");
    if($delsocial2){
        $_SESSION['del'] = 'Delete Berhasil';
        header("Location: admin-social.php");
    }else{
        $_SESSION['del'] = 'Delete Gagal';
        header("Location: admin-social.php");
    }
}

// update data client logo
if(isset($_POST['super-update-logo'])){

    $idlogo = $_POST['logg'];
    $nama = $_POST['nama'];
    $slogan = $_POST['slogan'];
    $product = $_POST['product'];
    $bisnis = $_POST['bisnis'];
    $competitor = $_POST['competitor'];
    $market = $_POST['market'];
    $deskripsi = $_POST['deskripsi'];
    $style= $_POST['style'];
    $color= $_POST['color'];
    $posisi= $_POST['posisi'];
    $ide= $_POST['ide'];
    $visi= $_POST['visi'];
    date_default_timezone_set('Asia/Makassar');
    $currentDateTime = date('Y-m-d H:i:s A');

    // pengecekan inputan kosong
    $nama = empty($nama) ? "Empty" : $nama;
    $slogan = empty($slogan) ? "Empty" : $slogan;
    $product = empty($product) ? "Empty" : $product;
    $bisnis = empty($bisnis) ? "Empty" : $bisnis;
    $competitor = empty($competitor) ? "Empty" : $competitor;
    $market= empty($market) ? "Empty" : $market;
    $deskripsi = empty($deskripsi) ? "Empty" : $deskripsi;
    $style = empty($style) ? "Empty" : $style;
    $color = empty($color) ? "Empty" : $color;
    $posisi = empty($posisi) ? "Empty" : $posisi;
    $ide = empty($ide) ? "Empty" : $ide;
    $visi = empty($visi) ? "Empty" : $visi;

    // up logo
    if($_FILES['file']['name']!= ''){

        $name = $_FILES['file']['name'];
        // $dot = explode('.', $name);
        // $ekstensi = strtolower(end($dot));
        // $ukuran = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];

        $logo = $name;
        

        if(file_exists("../uploads/logo/".$_POST['logo2'])){
            unlink("../uploads/logo/".$_POST['logo2']);
        }

        move_uploaded_file($file_tmp, "../uploads/logo/".$logo);
    }else{

        $logo = $_POST['logo2'];
    }

        $update = mysqli_query($koneksi, "UPDATE logo SET
        nama='$nama',
        slogan='$slogan',  
        product='$product',
        bisnis='$bisnis',  
        competitor='$competitor',
        market='$market',
        deskripsi='$deskripsi',
        style='$style',
        color='$color',
        posisi='$posisi',
        ide='$ide',
        visi='$visi',
        hari='$currentDateTime',
        images='$logo'
        WHERE id='$idlogo'
        ");
        if($update){
            $_SESSION['notification'] = 'Update Berhasil';
            header("Location: admin-logo.php");
            exit();
        }else{
            $_SESSION['notification'] = 'Update Gagal';
            header("Location: admin-logo.php");
            exit();
        }
}

// hapus data client logo
if(isset($_POST['super-delete-logo'])){
    $idlogo = $_POST['id'];

    $dellogo=mysqli_query($koneksi, "SELECT images FROM logo WHERE id = '$idlogo'");
    if(mysqli_num_rows($dellogo) > 0){
        $logo = mysqli_fetch_object($dellogo);
        if(file_exists("../uploads/logo/" .$logo->images)){
            unlink("../uploads/logo/" .$logo->images);
        }
    }

    $dellogo2 = mysqli_query($koneksi, "DELETE FROM logo WHERE id='$idlogo'");
    if($dellogo2){
        $_SESSION['del'] = 'Delete Berhasil';
        header('location:admin-logo.php');
    }else{
        $_SESSION['del'] = 'Delete Gagal';
        header('location:admin-logo.php');
    }
}

?>