<?php

$connect = mysqli_connect ('localhost','root','','seasock') or die("db error");

//for session start
session_start();

function redirect($page){
    echo "<script>window.open('$page.php','_self')</script>";
} 


function insertdata($table,$fields){
    global $connect;
    $col = implode(",",array_keys($fields));
    $row = implode("','",array_values($fields));
    
    $query = mysqli_query($connect,"INSERT INTO $table($col) VALUE ('$row')");
    
    return ($query)?true:false;
}


function countdata($table,$cond){
    global $connect;
    
    $query = mysqli_query($connect,"SELECT * FROM $table where $cond");
    $count = mysqli_num_rows($query);
    return $count;
}

?>