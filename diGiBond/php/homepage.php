<?php
//homepage
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'db_connect.php';
    $posts  = $_POST['post'];
    $email  = $_SESSION['email'];
    $sql    = "INSERT INTO `$email` (`status`, `time`) VALUES ('$posts', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "posted";
    }
}
?>
  <!DOCTYPE html>
  <html>
    
    <head>
      <title>
        Profile | diGibond
      </title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Anton&family=Barlow+Condensed:wght@500&family=Tilt+Warp&display=swap"
      rel="stylesheet">
      <link rel="stylesheet" href="homepagecss.css">
    </head>
    
    <body>
        <div class="nav">
            <div>
            <h2><a href="homepage.php" class="anchor_remove">diGibond</a></h2></div>
            <div class="navigation">
            <form action="search_result.php" method="post">
                <input type="text" name="fname" class="search_box" placeholder="Search by email">
                <input type="submit" value="Search">
            </form></div>
        </div>
        <!--cover area -->
        <div style="width: 800px; margin:auto;min-height:400px;">
          <div id="top" style="background-color: white; text-align:center;color:#405d9b">
            <img src="mountain.jpg" style="width:100%; height:70vh;">
            <img src="selfie.png" id="profile_pic"> <br>
            <div class="wlc_msg">
                <h2>HEllO <?php echo $_SESSION['email']?></h2>
            </div>
            <br>
            <b>
              <div class="menu_buttons">
                Timeline
              </div>
              <div class="menu_buttons">
                About
              </div>
              <div class="menu_buttons">
                Friends
              </div>
              <div class="menu_buttons">
                Photos
              </div>
            </b>
          </div>
          <!--below cover area-->
          <!--post area-->
          <div class="container" style="margin-top: 5vh;">
              <div class="status">
              <form action="homepage.php" method="post">
                <textarea name="post" placeholder="What's on your mind?">
                </textarea>
                <input type="submit" value="Post">
              </form>
              </div>
              <br>
            <br>
            <!--posts-->
          </div>
        </div>
      </div>
      <div class="info-table">
           <table border="1" cellspacing="0">
           <thead>
            <tr>
                <th>SN</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
           </thead>
           <tbody>
            <?php
                include 'db_connect.php';
                $email  = $_SESSION['email'];
                $sql="SELECT * FROM `digibond`.`$email`";
                $res=mysqli_query($conn,$sql);

                while($row=mysqli_fetch_assoc($res)){
                    echo "
                    <tr>
                    <th scope='row'>".$row['sno']."</th>
                    <td>".$row['status']."</td>
                    <td>".$row['time']."</td>
                    </tr>";
                }
            ?>
           </tbody>
           </table>
      </div>
      <br>
      <br>
      <div class="logout">
      <a href="logout.php">
                <button class="btn">LOG OUT</button>
             </a>
      </div>
    </body>
  
  </html>