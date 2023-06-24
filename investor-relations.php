<?php 
ob_start();
   session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
//require('include/config.php');
?>
<!doctype html>
<html lang="en" class="trans-html">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Rahman Group Investor Relations</title>
   <link rel="shortcut icon" href="images/favicon.jpg" type="image/jpg"/>
   <meta name="description" content="We thank our investors for their support and encouragement and reward them with growth, expansion and returns.">
   <meta property="og:title" content="Rahman Group Investor Relations" />
   <meta property="og:description" content="We thank our investors for their support and encouragement and reward them with growth, expansion and returns." />
   <meta property="og:image" content="images/logo-og.png" />
   <meta name="twitter:title" content="Rahman Group Investor Relations">
   
   <meta property="twitter:image" content="images/logo-og.png" />
   <meta name="twitter:description" content="We thank our investors for their support and encouragement and reward them with growth, expansion and returns.">
   <?php  require("include/header-link.php"); ?>
</head>
<body class="homePage">
   <?php  require("include/header.php"); ?>
   <section class="insidePageBanner investor-relations">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="txtBanner">
                  <h2 class="wow fadeInUp"><span>Investor Relations</span>Rewarding<br>
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
                  <div class="sitemaplink wow fadeInUp">
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
            
            if (isset($_POST['login']) && !empty($_POST['email']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['email'] == $email && 
                  md5($_POST['password']) == $password) {
                     // echo "here";die;
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'tutorialspoint';
                  
                  echo 'You have entered valid use name and password' ;?>
                  <a href="logout.php">Click here to logout</a>
              <?php die;  }else {
                 echo 'Wrong username or password';
               }
            
            }
         ?>
      <section class="applyForJobI">
         <div class="container">
            <div class="row">
               <div class="investRelate">
                  <div class="col-md-12">
                     <h3 class="wow fadeInUp">Login</h3>
                  </div>
                  <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="wow fadeInUp">User ID</label>
                           <input type="text" name="email" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="wow fadeInUp">Password</label>
                           <input type="text" name="password" class="form-control">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <button type="submit" name = "login" class="btn btn-default">Sign In</button>
                     </div>  
                     <div class="col-md-6">
                        <!--<div class="actionCreate">-->
                        <!--   <a href="">Create account</a>-->
                        <!--</div>-->
                     </div>             
                     <div class="col-md-6">
                        <div class="actionLogin">
                           <a href="change_password.php">Change Password</a>
                        </div>
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