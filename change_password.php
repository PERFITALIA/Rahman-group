<?php 
ob_start();
   session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require('include/config.php');
?>
<!doctype html>
<html lang="en" class="trans-html">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Rahman Group</title>
   <meta name="description" content="">
   <meta property="og:title" content="" />
   <meta property="og:description" content="" />
   <meta name="twitter:title" content="">
   <meta name="twitter:description" content="">
   <?php  require("include/header-link.php"); ?>
</head>
<body class="homePage">
   <?php  require("include/header.php"); ?>
   <section class="insidePageBanner investor-relations">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="txtBanner">
                  <h2><span>Investor Relations</span>Rewarding<br>
                     Confidence<br>
                     with Returns <span>with utmost business integrity and governance </span></h2>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="pageBreadcrumb">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="sitemaplink">
                     <a href="index.php">Home</a>&gt;
                     <a href="#" class="active">Investor Relations</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
 <?php
 
            global $mysqli;
            $query = "SELECT email,password FROM `user`";
            $result = mysqli_query($mysqli, $query);
            while ($row = mysqli_fetch_array($result)) {
               $email = $row[0];
               $password = $row[1];
            }
            
            
           
            $msg = '';
           
            if (isset($_POST['login']) && !empty($_POST['old_password']) 
               && !empty($_POST['password'])) {
				 $new_password = md5($_POST['password']);
               if ($_POST['password'] == $_POST['c_password'] && 
                  md5($_POST['old_password']) == $password) {
                    $sql="UPDATE user SET password = '$new_password'";
                    $query=mysqli_query($mysqli,$sql);
                    if($query){
                     echo 'Password successfully changed' ;?>
                  <a href="investor-relations.php">Click here to login</a>
                   <?php die; } else{
                      echo mysqli_error($mysqli);
                    }
                 
                  
                  
                }else {
                 echo 'Wrong Password Please Try Again';
               }
            
            }
         ?>
      <section class="applyForJobI">
         <div class="container">
            <div class="row">
               <div class="investRelate">
                  <div class="col-md-12">
                     <h3>Login</h3>
                  </div>
                  <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Old Password</label>
                           <input type="text" name="old_password" class="form-control" required>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>New Password</label>
                           <input type="password" name="password" class="form-control" required>
                        </div>
                     </div>
                      <div class="col-md-12">
                        <div class="form-group">
                           <label>Confimr Password</label>
                           <input type="password" name="c_password" class="form-control" required>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <button type="submit" name = "login" class="btn btn-default">Submit</button>
                     </div>  
                     <div class="col-md-6">
                        <!--<div class="actionCreate">-->
                        <!--   <a href="">Create account</a>-->
                        <!--</div>-->
                     </div>             
                     <!--<div class="col-md-6">-->
                     <!--   <div class="actionLogin">-->
                     <!--      <a href="">Forgot your password?</a>-->
                     <!--   </div>-->
                     </div>             
                  </form> 
               </div>
            </div>
         </div>
      </section>


      <?php  require("include/footer.php"); ?>
      <?php  require("include/footer-links.php"); ?>
   </body>
   </html> 