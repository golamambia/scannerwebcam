<?php

include "connect.php";

$selcity = mysqli_query($conn,"select * from city");


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="dist/css/login.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script> 
    <title>Register</title>
</head>


<style>

form h6{
    font-weight: 500;
    opacity: 0.9;
    font-size: 15px;
    margin-bottom: 10px;
}
form .signin{
    color: #fff;
    background: linear-gradient(to right, #FF638E, #FF97A8);
    font-size: 15px;
    font-weight: 500;
    letter-spacing: 0.5px;
    text-transform: capitalize;
    width: 100%;
    padding: 9px 11px;
    margin: 0 0 20px;
    border-radius: 50px;
    transition: all 0.3s ease 0s;
}
}

</style>
<body>
    <div class="form-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-container">
                            <div class="left-content">
                                <h3 class="title">Site Name</h3>
                                <h4 class="sub-title">Lorem ipsum dolor sit amet.</h4>
                            </div>
                            <div class="right-content">
                                <h3 class="form-title">Register</h3>
        <h6 id="error_msg" class="text-danger" style="display:none">Email or Phone Already Exist</h6>
    <h6 id="show_message" class="text-success" style="display:none">Register Successfully</h6>
                                <form class="form" id="ajax-form" method="post" action="">
                                    <div class="form-group">
                                    <h6 class="text-dark text-left">Username</h6>
                                        <input type="name" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                    <h6 class="text-dark text-left">Email</h6>
                                        <input type="email" class="form-control" name="email">
                                    </div>
        <div class="form-group">
                                    <h6 class="text-dark text-left">Phone</h6>
                                        <input type="phone" class="form-control" name="phone">
                                    </div>
        <div class="form-group">
                                     <h6 class="text-dark text-left">Password</h6>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <button class="btn signin mt-4" type="submit" value="submit">Register</button>
                                   <!-- <div class="remember-me">
                                        <input type="checkbox" class="checkbox">
                                        <span class="check-label">Remember Me</span>
                                    </div>-->
                                    <a href="" class="forgot">Forgot Password</a>
                                </form>
                                <span class="separator">OR</span>
                                
                                <span class="signup-link">Do have an account? Login <a href="index.php">here</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>


</body>

</html>




<script type="text/javascript">
$(document).ready(function($){


$('#ajax-form').submit(function(e){

e.preventDefault();

$.ajax({
type:"POST",
url: "store.php",
data: $(this).serialize(), 
success: function(response){

if(response==1){
$("#error_msg").fadeIn();
$("#error_msg").fadeOut(3000);
}
else{
$("#show_message").fadeIn();
$("#show_message").fadeOut(3000);
$("#ajax-form")[0].reset();
setTimeout(function() {
  window.location.href = "index.php";
}, 2000);
    }
}
});
});  
return false;
});
</script>

</body>
</html>
