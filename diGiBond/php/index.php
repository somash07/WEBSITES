<?php
//loginphp
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'db_connect.php';
        $email=$_POST['mail'];
        $password=$_POST['pass'];

        $sql="SELECT * FROM `signup` WHERE email='$email' AND password='$password'";

        $result=mysqli_query($conn,$sql);

        $num=mysqli_num_rows($result);
        if($num==1){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['email']=$email;  
            header("Location: homepage.php");
            exit;
        }
        else{
            echo"password error";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logincss.css">
    <link rel="stylesheet" href="loginresp.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Barlow+Condensed:wght@500&family=Tilt+Warp&display=swap" rel="stylesheet">
    <title>Facebook-log in or sign up</title>
</head>
<body>
    <div class="box">
        <div class="container">
            <div class="left-container">
                <h2>diGibond</h2>
            </div>
            <div class="right-container">
               <div class="login-card">
                    <form action="" method="post">
                        <div>
                            <input type="text" placeholder="Email or phone number" name="mail" id="email">
                        </div>
                        <div>
                            <input type="password" placeholder="Password" name="pass" minlength="8" id="password">
                        </div>
                        <div>
                            <input type="submit" value="Log In" class="common">
                        </div>
                        <div class="signup">
                            <button class="signup-btn"><a href="signup.php" target="_blank" class="anchor_remove">Create new account</a></button>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>