<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include('config.php');
$rand = rand(9999, 1000);
if (isset($_REQUEST['login'])) {
    $userName = $_REQUEST['userName'];
    $password = $_REQUEST['password'];
    $captcha  = $_REQUEST['captcha'];
    $captcharandom = $_REQUEST['captcha-rand'];
    if ($captcha != $captcharandom) { ?>
        <script type="text/javascript">
            alert("Invalid captcha value");
        </script>
        <?php
    } else {
        $select_query = mysqli_query($conn, "SELECT * FROM register WHERE Username ='$userName'and Password ='$password'");
        $result = mysqli_num_rows($select_query);
        if($result > 0) {
            header ("location:job-listing.php");
        } 
        else 
        { ?>
            <script type="text/javascript">
                alert("Invalid username or password");
            </script>
         <?php
        }
    }
} 
?>
<head>
    <style>
        .captcha{
            width:70%;
            background:"yellow";
            text-align:"center";
            font-size:24px;
            font-weight:700;
        }
        </style>
        </head>

<link rel="stylesheet" href="css/recruitment.css">
<div class="wrapper">
  <div class="logo">
      <img src="images/hire me (1).png" alt="HIRE ME">
  </div>
  <div class="text-center mt-4 name">
      LOGIN
  </div>
  <form class="p-3 mt-3">
      <div class="form-field d-flex align-items-center">
          <span class="far fa-user"></span>
          <input type="text" name="userName" id="userName" placeholder="Username">
      </div>
      <div class="form-field d-flex align-items-center">
          <span class="fas fa-key"></span>
          <input type="password" name="password" id="pwd" placeholder="Password">
      </div>
      <div class="form-field d-flex align-items-center">
          <span class="fas fa-key"></span>
          <input type="text" name="captcha" id="captcha" placeholder="Enter Captcha">
          <input type="hidden" name="captcha-rand" value="<?php echo $rand; ?>">
      </div>

      <div class="form-field d-flex align-items-center">
          <span class="fas fa-key"></span>
         <label for="captcha-code">Captcha Code</label>
         <div class="captcha"><?php echo $rand; ?></div>
      </div>
      <div class="form-group">
                    <input type="submit" id="login" name="login" value="LogIn" class="btn-btn-success" />
            
                </div>
  </form>
  <div class="text-center fs-6">
       <a href="login.php">Register</a>
  </div>
</div>