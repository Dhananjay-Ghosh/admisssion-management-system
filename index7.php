<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // include 'dbconnect.php';
    $username = "root";
    $password = "";
    $server = "localhost";
    $database = "ams";
    $conn = mysqli_connect($server,$username,$password,$database);
    if($conn){
        // echo "Successfully connected Database<br>";
        $username = $_POST["aid"];
        $password = $_POST["psw"];
        $sql = "Select * from ams where appid = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
            include 'student_dashboard.html';
        }
        else{
            echo "Invalid Credentials";
        }
    }
    else{
        die("Error" . mysqli_connect_error());
    }
}

?>