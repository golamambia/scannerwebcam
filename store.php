<?php 

include "connect.php";

$name = $conn -> real_escape_string($_POST['name']);
$email = $conn -> real_escape_string($_POST['email']);
$phone = $conn -> real_escape_string($_POST['phone']);
$password = $conn -> real_escape_string($_POST['password']);

$sql = "select * from admin where email = '$email' or phone = '$phone'";  

$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result); 

if($count >= 1){  
    echo "1";
}  
else{  
    $query = mysqli_query($conn,"insert into admin(name,email,phone,password) values('$name','$email','$phone','$password')");
    if($query){
        echo "2";
    }
}    

?>