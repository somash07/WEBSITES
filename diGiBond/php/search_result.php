<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'db_connect.php';
        $key=$_POST['fname'];
        $sql="SELECT * FROM `signup` WHERE email='$key'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo"person found.";
        }
    }
?>