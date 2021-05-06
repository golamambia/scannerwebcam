<?php
error_reporting(0);
session_start();
if($_SESSION['id']){
     header("location: adharlist.php");
 }
include "connect.php";

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
    <title>Login</title>
</head>

<body>
    <div class="form-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-container">
                            <div class="left-content">
                                <h3 class="title">Admin Panel</h3>
                                <h4 class="sub-title">Lorem ipsum dolor sit amet.</h4>
                            </div>
                            <div class="right-content">
       
                                <h3 class="form-title">Login</h3>
        <?php 

if(isset($_REQUEST['login'])){
    $username = $_REQUEST['email'];
    $password = $_REQUEST['password'];

        $sql = "select * from admin where email = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result); 
        
        //session_start();

        if($count == 1){  
            $_SESSION['id']= $row['id'];
            header("location: adharlist.php");
        }  
        else{  
           echo ' <h6 class="title text-danger">Invalid Username Password</h6>';
        }    
    } 
    ?>
       
                                <form class="form-horizontal">
                                    <div class="form-group">
                                    <label>Username / Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                    <label>Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <button class="btn signin" type="submit" value="login" name="login">Login</button>
                                   <!-- <div class="remember-me">
                                        <input type="checkbox" class="checkbox">
                                        <span class="check-label">Remember Me</span>
                                    </div>
                                    <a href="" class="forgot">Forgot Password</a>-->
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>


</body>

