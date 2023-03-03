<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername="localhost";
    $username="root";
    $password="";
    $database="digibond";
    $exists=false;

    $conn=mysqli_connect($servername,$username,$password,$database);

    if(!$conn){
        echo "connection error<br>";
    }
    $fname= $_POST["fname"]; 
    $lname = $_POST["lname"]; 
    $email= $_POST["mail"];
    $password=$_POST["pass"];
    $cpassword=$_POST["cpass"];
    
    $sql = "SELECT * FROM `signup` WHERE email='$email'";
    
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
   
    if($num == 0) {
        if(($password == $cpassword) && $exists==false) {
            $hash = password_hash($password, 
                 PASSWORD_DEFAULT);
                
            // Password Hashing is used here. 
            $sql = "INSERT INTO `signup` (`fname`, `lname`, `email`, `password`, `cpassword`) VALUES ( '$fname', '$lname', '$email', '$password', '$cpassword')";
            $result2 = mysqli_query($conn, $sql);
           
            if ($result2) {
                echo"<h3>Account Created Successfully!<a href='index.php'>Login</a></h3><br>";
            }

            $acc="CREATE TABLE `digibond`.`$email`(`sno` INT NOT NULL AUTO_INCREMENT , `status` TEXT NOT NULL , `time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sno`)) ENGINE = InnoDB";

            $result3=mysqli_query($conn,$acc);
        } 
        else { 
            echo"password mismatch";
        }      
    }// end if 
    
}//end if   
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=NTR&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anton&family=Barlow+Condensed:wght@500&family=Tilt+Warp&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="signupstyle.css">
    <style>
        h3{
            color: green;      
            width: 100vw;
            background-color:#CCC5B9;

        }
        h3:before {
    content: "";
    background-color:#CCC5B9;
    position: absolute;
    height: 100%;
    width: 100vw;
    z-index: -1;
}
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">

            <h2>diGibond</h2>

        </div>
        <div class="form">
            <form action="signup.php" method="post">
                <div>
                    <input type="text" name="fname" placeholder="Enter your first name">
                </div>

                <div>
                    <input type="text" name="lname" placeholder="Enter your last name" autocomplete="off">
                </div>

                <div><input class="common" type="email" name="mail" placeholder="Enter your Email Id">
                </div>

                <div><input type="password" name="pass" placeholder="Enter your password">
                </div>

                <div>
                    <input type="password" name="cpass" placeholder="Confirm your password">
                </div>

                <div class="sign-up">
                    <input class="common btn" type="submit" value="Sign Up">
                </div>

                <div class="confirmation">
                    <a href="index.php">Already have an account?</a>
                </div>

            </form>

        </div>
    </div>


</body>

</html>