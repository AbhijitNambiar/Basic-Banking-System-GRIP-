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
    <title>Transaction History</title>
  </head>
  <body class="back">
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

    <div>
        <center>
            <h2>Transaction History:</h2>
            <h4>All the details of transactions done till date</h4>
        </center>
    </div>

    <div class="container cs">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center"  >  </h1>
 <br>
 <table  id="tabledata" class=" table pb-0 pt-0 table-hover cs"  style="padding:0px; border:black solid 2px; vertical-align: middle;">
 
 <tr class="bg-dark text-white text-center" style="padding:0px; vertical-align: middle; font-size:bold; border:black solid 2px;">
 
 <th>Transaction ID</th>
 <th>Transaction Date</th>
 <th>Sender's Name </th>
 <th>Recipient Name </th>
 <th>Amount</th>
 
 </tr >

 <?php

include('connection.php');


$query="SELECT * FROM transaction ";
$query_run= mysqli_query($con,$query);


 while($res = mysqli_fetch_array($query_run)){
  ?>
 <tr class="text-center" style="font-weight:bold;border:black solid 2px;">
 <td> <?php echo $res['tid'];  ?> </td>
 <td><?php echo $res['date']?></td>
 <td > <?php echo $res['sender'];  ?> </td>
 <td> <?php echo $res['receiver'];  ?> </td>
 <td> <?php echo $res['amt'];  ?> </td>
 
 
 
 </tr>

 <?php 
 }

 mysqli_error($con);
  ?>
 

 </table>  


</div>
</div>
 
 <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script>


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