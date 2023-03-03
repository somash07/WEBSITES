<?php
//dbconnect
     $servername="localhost";
     $username="root";
     $password="";
     $database="digibond";
 
     $conn=mysqli_connect($servername,$username,$password,$database);
 
     if(!$conn){
         echo "connection error<br>";
     }
?>