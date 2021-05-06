<?php

include "connect.php"; 

$string = $_REQUEST['data'];

$xml = simplexml_load_string($string);
$attribs = $xml->attributes();
// convert the '$attribs' to an array
foreach($attribs as $key=>$val) {
    $arrayOfAttribs[(string)$key] = "'".(string)$val."'";
}
$namesOfColumns = implode(",", array_keys($arrayOfAttribs));
$valuesOfColumns = implode(",", array_values($arrayOfAttribs));

// your database stuff
$query = "INSERT INTO adhar($namesOfColumns) VALUES ($valuesOfColumns);";

$insert = mysqli_query($conn,$query);

if($insert){
    echo "success";
}
else{
    echo "error";
}
?>