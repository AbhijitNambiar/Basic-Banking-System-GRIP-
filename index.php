<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./styles/style.css">
    <title>CITI Bank</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/citi_logo.png" alt="" width="70" height="40" class="d-inline-block">
                CITI Bank
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"><i class="fa fa-home" aria-hidden="true"></i>
                </i>Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="customers.php"><i class="fa fa-users" aria-hidden="true"></i>
                    Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="history.php"><i class="fa fa-exchange" aria-hidden="true"></i>
                    Transfer History</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <section>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/ban3.png" width="100%" height="400px" alt="...">
              </div>
              <div class="carousel-item">
                <img src="images/ban2.jpg" width="100%" height="400px" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>      
        </section>

        <div class="container">
          <div class="row side">
            <div class="col">
              <div class="card text-center" style="width: 18rem;">
                <img src="images/users.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">View All Customers</h5>
                <a href="customers.php" class="btn btn-primary">View</a>
              </div>
              </div>
            </div>


            <div class="col">
              <div class="card text-center" style="width: 18rem;">
                <img src="images/history.jpg" class="card-img-top" width="240" height="285" alt="...">
              <div class="card-body">
                <h5 class="card-title">Transaction History</h5>
                <a href="history.php" class="btn btn-primary">View</a>
              </div>
              </div>
            </div>
          </div>
        </div>

        <div class="foot">
          <div class="row sidebot">
          <div class="col">
              <h3>SUPPORT</h3>
              <a href="#"><p>Contact Us</p></a>
              <a href="#"><p>Find bank near you</p></a>
              <a href="#"><p>24 x 7 ATM</p></a>
          </div>
  
          <div class="col">
              <h3>FOLLOW US:</h3>
              <p><a href="https://www.facebook.com/citiindia/"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></p>
              <p><a href="https://twitter.com/citibank?lang=en"><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter</a></p>
          </div>
  
          <div class="col">
              <h3>Easy banking on CitiMobile</h3>
              <a href="https://play.google.com/store/apps/details?id=com.citi.citimobile&hl=en_IN&gl=US"><img src="images/play.png" alt="Play Store"></a><br>
              <a href="https://apps.apple.com/us/app/citi-mobile/id301724680"><img src="images/app.svg" alt="App store"></a>
          </div>
        </div>
        </div>
  

        <div class="copy">
          <p>2021 &copy; Citi Bank Pvt. Ltd. All Rights Reserved</p>
        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>