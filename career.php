<!doctype html>
<html lang="en" class="trans-html">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Rahman Group Careers</title>
   <link rel="shortcut icon" href="images/favicon.jpg" type="image/jpg"/>
   <meta name="description" content="Rahman Group offers exciting career opportunities in a range of domains from sales & marketing, production & sourcing to finance and HR.">
   <meta property="og:image" content="images/logo-og.png" />
   <meta property="og:title" content="" />
     <meta property="og:description" content="Rahman Group offers exciting career opportunities in a range of domains from sales & marketing, production & sourcing to finance and HR." />
   <meta property="twitter:image" content="images/logo-og.png" />
   <meta name="twitter:title" content="">
   <meta name="twitter:description" content="Rahman Group offers exciting career opportunities in a range of domains from sales & marketing, production & sourcing to finance and HR.">
   
   <?php  require("include/header-link.php");  
      require('include/function.php');
      $job_categories = getJobCategories();
      foreach($job_categories['getJobCategories'] as $row){
         $count[] = getcount($row['name']);
      }
      //   foreach($count[0]['count'] as $row2){
        //       print_r($row2);
        //   }die;

     ?>
  </head>
  <body class="homePage">
   <?php  require("include/header.php"); ?>
   <section class="insidePageBanner productBgImgcareer">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="txtBanner">
                  <h2 class="wow fadeInUp"><span>Careers</span>Opportunity<br>
                  to Excel</h2>
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
                  <a href="#" class="active">Careers</a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="pageContent pagecareer">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="contentBox">
                  <p class="wow fadeInUp">We consciously nurture a work culture that encourages innovation and passion for what we do. Our well-ingrained system of mentoring enables us to bring out the best in our people and enable them to soar.</p>
                  <p class="wow fadeInUp">With a great emphasis on collaboration in the workplace, we encouraged our people to achieve new conquests while working together as teams. </p>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="encourageBg">
      <div class="container">
         <div class="row">
            <div class="col-md-5">
               <div class="plainTxt">
                  <p class="wow fadeInUp">We encourage holistic growth of our people and lay great emphasis on work-life balance as a crucial determinant of personal and professional success.</p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="applyForJob">
      <div class="container">
         <div class="row">
           <div class="careers-sec">
              <div class="col-md-12">
                <div class="jobcategory">
                  <h2 class="wow fadeInUp">Browse by Job Category</h2>
                  <p class="wow fadeInUp">We are hiring. Select the domain of your core competency and explore the positions we are looking to fill.</p>
                  <h3 class="wow fadeInUp">Categories</h3>
               </div>
            </div>

            <?php $i=0; foreach($job_categories['getJobCategories'] as $row){ 

               foreach($count[$i]['count'] as $row1){
               ?> 
               <div class="col-md-4">
                  <div class="categorybox">
                     <img src="<?php echo $row['img'];?>" class="img-responsive wow zoomIn">
                     <div class="jodetailsflex">
                        <h4 class="wow fadeInUp"><?php echo $row['name'];?></h4>
                        <p class="wow fadeInUp">Job vacancy: <span><?php echo $row1['count'];?></span></p>
                     </div>
                     <div class="explore">
                        <a href="apply-job.php?job_cat_id=<?php echo $row['id'];?>" class="wow fadeInUp">Know More <img src="images/explore-icon.png"></a>
                     </div>
                  </div>
               </div>
               <?php $i++; } }?>


            </div>
            <div class="col-md-12">
               <h3 class="wow fadeInUp">Apply Now</h3>
               <p class="wow fadeInUp">Do you believe that you are a good fit for a position we are looking to fill? Please fill in this form below. We will review it and connect with you shortly. </p>
            </div>
            <div class="col-md-10">
               <?php if(isset($_GET['status'])){?>
               <span style="background: green;font-size: 27px;">Mail Sent Successfully!!</span>
               <?php }?>
               <div class="row">
                  <div class="applyform">
                     <form method="POST" action="mail.php" enctype="multipart/form-data">
                        <div class="col-md-6">
                           <label class="wow fadeInUp">First Name</label>
                           <input name="f_name" type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                           <label class="wow fadeInUp">Last Name</label>
                           <input name="l_name" type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                           <label class="wow fadeInUp">Email</label>
                           <input name="email" type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                           <label class="wow fadeInUp">Mobile Number</label>
                           <input name="mobile" type="text" class="form-control">
                        </div>

                        <div class="col-md-12">
                           <label class="wow fadeInUp">City</label>
                           <input name="city" type="text" class="form-control">
                        </div>
                        <div class="col-md-12">
                           <label class="wow fadeInUp">Post Applied For</label>
                           <input name="post" type="text" class="form-control">
                        </div>
                        <div class="col-md-12">
                           <label class="wow fadeInUp">Attach Resume</label>
                           <input name="file" type="file" class="form-control">
                        </div>
                        <div class="col-md-12">
                           <input type="hidden" value="career" name="frmname">
                           <!--<button class="sbmitbtn" type="button" data-toggle="modal" data-target="#sbmitform">Submit <img src="images/explore-icon.png"></button>-->
                           <input type="submit" class="sbmitbtn" value="Submit">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>


   <?php  require("include/footer.php"); ?>
   <?php  require("include/footer-links.php"); ?>
</body>
</html> 