<?php
    require "../function.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="../assets/img/logo.png">
    <title>Form Client Logo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- style -->
    <!-- <link href="assets/style.css" rel="stylesheet" /> -->
    
    <!-- style form-logo -->
    <style>
    *{
        font-family: 'Lexend Deca', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body{
        background-color: #ff8909;
        background: linear-gradient(to right, #ffa75a, #ffffff);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        height: 120vh;

    }

    .container {
        background-color: #ffeddf;
        background: linear-gradient(to left, #ffeddf, #fff9f3, #ffffff);
        border-radius: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
        
    }

    h1 {
        color: #000;
        text-align: center;
        font-size: 64px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    .header p{
        color: rgb(77, 77, 77);
        text-align: center;
        font-size: 16px;
        font-style: normal;
        font-weight: 300;
        line-height: 35px;
    }

    .img-header{
        width: 282px;
        height: 97px;
        margin-left: 135px;
    }

    .login-right span{
        color: red;
    }
    </style>

  </head>
  <body>
    <div class="container">
        <div class="form-container">
            <section class="login d-flex p-5 justify-content-center align-items-center">
                <div class="login-left w-50 ">
                    <div class="row">
                        <div class="header">
                            <img class="img-header" src="assets/logo.png">
                            <h1>Hello</h1>
                            <p>Please fill the form below for your brand information profile. 
                                This data is confidential and will not be disseminated to unrelated 
                                parties for the security of your social media accounts and our future 
                                collaboration.
                            </p>
                        </div>
                    </div>                
                </div>
                <div class="login-right w-50 ms-5">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-header mb-3">
                            <?php
                                if (isset($_SESSION['status'])) {
                                    echo '<div class="shadow-sm alert alert-warning alert-dismissible fade show role="alert">' . $_SESSION['status'] . '</div>';
                                    unset($_SESSION['status']);
                                    }
                            ?>
                            <h2 class="fw-medium">Form Client Logo</h2>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label class="form-label">Brand Name<span>*</span></label>
                                <input type="text" name="nama" class="form-control" placeholder="Write your name">
                            </div>
                            <div class="mb-3 col">
                                <label class="form-label">Slogan<span>*</span></label>
                                <input type="text" name="slogan" class="form-control" placeholder="Write your slogan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label class="form-label">Product or Service<span>*</span></label>
                                <input type="text" name="product" class="form-control" placeholder="Write your product or service">
                            </div>
                            <div class="mb-3 col">
                                <label class="form-label">What kind of your Business<span>*</span></label>
                                <input type="text" name="bisnis" class="form-control" placeholder="Write your what kind of your business">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label class="form-label">Competitor References</label>
                                <input type="text" name="competitor" class="form-control" placeholder="Write your competitor references">
                            </div>
                            <div class="mb-3 col">
                                <label class="form-label">Target Market</label>
                                <input type="text" name="market" class="form-control" placeholder="Write your target market">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label class="form-label">3 Main Logo Description</label>
                                <input type="text" name="deskripsi" class="form-control" placeholder="Write your 3 Main Logo Description">
                            </div>
                            <div class="mb-3 col">
                                <label class="form-label">Logo Style (Based on your choice)</label>
                                <input type="text" name="style" class="form-control" placeholder="Write your Logo Style">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="formFileMultiple" name="image" class="form-label">Sampel Logo</label>
                                <input class="form-control" name="file" type="file">
                            </div>
                            <div class="mb-3 col">
                                <label class="form-label">Choose Your Color</label>
                                <input type="text" name="color" class="form-control" placeholder="Write your Color">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label class="form-label">Positioning Your Logo (Name Card, Billboard, Letterhead, etc)</label>
                                <input type="text" name="posisi" class="form-control" placeholder="Write your Positioning Logo">
                            </div>
                            <div class="mb-3 col">
                                <label class="form-label">Additional Idea</label>
                                <input type="text" name="ide" class="form-control" placeholder="Write your Additional Idea">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col">
                                <label class="form-label">Vision & Mision</label>
                                <textarea type="text" name="visi" class="form-control" placeholder="Write your Vision & Mision" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <button type="submit" name="save-logo" class="btn btn-warning">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>