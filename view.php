<?php
include 'connection.php';
if($_POST){
}
if(isset($_POST['Submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amt'];
    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($con,$sql);
    $sql2 = mysqli_fetch_array($query);


    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['currentbalance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['currentbalance'] - $amount;
                $sql = "UPDATE customers set currentbalance=$newbalance where id=$from";
                mysqli_query($con,$sql);

                // adding amount to receiver's account
                $newbalance = $sql2['currentbalance'] + $amount;
                $sql = "UPDATE customers set currentbalance=$newbalance where id=$to";
                mysqli_query($con,$sql);
                
                $sender = $sql1['cname'];
                $receiver = $sql2['cname'];
                $sql = "INSERT INTO transaction(`sender`,`receiver`,`amt`)values('$sender','$receiver','$amount')";
                $query=mysqli_query($con,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='history.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}

?>

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
    <title>Customer Profile</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>


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
            <h2>Customer Profile:</h2>
            <img src="images/profile.png" alt="profile"><br>
        </center>
    </div>

    <div class="container">
 <div class="col-lg-12">
 <form form method = "POST" >
 <table  id="tabledata" class=" table table-hover table-bordered border-dark" style="padding:0px;">
 
 <tr class="bg-dark text-white text-center">
 
 <th>Customer Name </th>
 <th>A/c Number </th>
 <th>A/c Type </th>
 <th>Email</th>
 <th>Current Balance</th>
 
 
 
 


 </tr >
 
 <?php

include('connection.php');
if(isset($_GET["id"])){
$id = $_GET['id'];
}
$query='SELECT * FROM customers WHERE id ="'.$id.'"';
$query_run= mysqli_query($con,$query);


 while($res = mysqli_fetch_array($query_run)){
  ?>
 <tr class="text-white text-center text-bold">
 <td> <?php echo $res['cname'];  ?> </td>
 <td> <?php echo $res['accno'];  ?> </td>
 <td> <?php echo $res['acctype'];  ?> </td>
 <td> <?php echo $res['email'];  ?> </td>
 <td> <?php echo $res['currentbalance'];  ?> </td>
 
 
 
 </tr>

 <?php 
 }

 mysqli_error($con);
  ?>
 

 </table>
<center>
 <label style="color : white;"><b>Transfer To:</b></label>
        <select name="to" class="transact" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'connection.php';
                if(isset($_GET["id"])){
                  $sid = $_GET['id'];
                  }
                
                $sql = "SELECT * FROM customers where id!= '.$sid.'";
                $result=mysqli_query($con,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($con);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['cname'] ;?> (Balance: 
                    <?php echo $rows['currentbalance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : white;"><b>Amount (in <i class="fa fa-inr" aria-hidden="true"></i>):</b></label>
            <input type="number" class="transfer" name="amt" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn btn-primary" name="Submit" type="submit" id="myBtn">Transact Now</button>
            </div>
            </center>
    </form>
    </div>



<!-- Button trigger modal 
<center class="space">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><a class="decor" href="transaction.php">
  Transact Now</a>
</button>-->
</center>
<!-- Modal -->
<!--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-dark border-rounded">
      <div class="modal-header">
        <h5 class="modal-title text-white" id="exampleModalLabel">Make a transaction</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="transact" id="form" action="transact.php" form method="POST">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" name="sender" placeholder="Sender's Name" required id="sname">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Recipient's Name" name="receiver" required id="rname">
                </div>
               
            </div>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Sender's A/c Number" name="senderaccnum" required id="sacc">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Receiver`s A/c Number"  name="receiveraccnum" required id="racc">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <input type="number" class="form-control" placeholder="Amount" id="amt" name="amt" required >
                </div>
            </div>
            <div class="modal-footer">
        <script>
          function trans(){
            alert("Transaction Successful!!!");
          }
        </script>
        <button type="button"  value="Transaction" formaction="transact.php" name="Transact" class= "form control btn btn-primary"><a href="transact.html"> Confirm</a></button>
        <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cancel</button>
      </div>
        </form>
</div>
      
    </div>
  </div>
</div>
--> 
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<!--<script>

    //form validation with javascript
    function formValidation() {
        //Get Value
        var sname = document.getElementById('sname').value.trim();
        var rname = document.getElementById('rname').value.trim();
        var sacc = document.getElementById('sacc').value.trim();
        var racc = document.getElementById('racc').value.trim();
        var amt = document.getElementById('amt').value.trim();

        var isValidForm = true;

        //Validation Conditions here
        if (sname.length < 1) {
            alert(" your Name is Required!");
            var isValidForm = false;
        }
        else if (rname.length < 1) {
            alert("Recipients name is Required!");
            var isValidForm = false;
        }
        else if (racc.length < 1) {
            alert("Recipients Account number  is Required!");
            var isValidForm = false;
        }
        else if (sacc.length < 1) {
            alert("Sender's Account number is Required!");
            var isValidForm = false;
        }
        else if (amt.value < 1) {
            alert("Amount  is Required!");
            var isValidForm = false;
        }
        else {
            isValidForm = true;
        }

        return isValidForm;  //if isValidForm is true then form submits else submission is stopped

    }



    $(document).ready(function () {

        $('#form').submit(function (e) {

            //Get Value

            var sname = $('#sname').val().trim();
            var rname = $('#rname').val().trim();
            var sacc = $('#sacc').val().trim();
            var racc = $('#racc').val().trim();
            var amt = $('#amt').val().trim();

            //reset the errors
            $(".error").remove();

            var isValidForm = true;



            if (sname.length < 1) {
                $('#sname').after(alert('please enter your name'));
                var isValidForm = false;
            }

            if (rname.length < 1) {
                $('#rname').after(alert('please mention Recipients name'));
                var isValidForm = false;
            }
            if (sacc.length < 1) {
                $('#sacc').after(alert('please enter your Account Number'));
                var isValidForm = false;
            }

            if (racc.length < 1) {
                $('#racc').after(alert('please mention Recipients Account Number'));
                var isValidForm = false;
            }

            if (amt.value < 1) {
                $('#amt').after(alert('please Enter amount to debit'));
                var isValidForm = false;
            }
            if (isNaN(amt) || amt < 1 ) {
                alert("Input not valid");
            }




            return isValidForm;  //if isValidForm is true then form submits else submission is stopped

        });

    });

</script>-->