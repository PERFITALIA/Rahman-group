<?php
     require('include/config.php');
     require('include/function.php');
     $job_cat_id = $_GET['job_cat_id'];
     
     $jobs = getJobs($job_cat_id);
     $job_count = count($jobs['Jobs']);
     $job_location = getlocation();
      
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
   <section class="insidePageBanner applyJobpage">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="txtBanner">
                  <h2><span>Careers</span>Join us on our <br>journey
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
   
<section class="insidepage apply-sec">
   <div class="container">
       <div class="row">
           <div class="apply-sec">
   <div class="col-md-4">
   <select id="location" class="cstmselect cstmselectlocatn">
   <option>Location</option>
  <?php foreach($job_location['getJoblocations'] as $row){?>
 <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
 <?php }?>
    </select>
   </div>
   <div class="col-md-2">
  <a  onclick="jobs_filter(<?php echo $job_cat_id;?>)" class="applyFilter filternew">Apply</a>
   </div>
   
   <div class="col-md-6">
   <div class="share-attach">
   <a href="#"><img src="images/share-icon.png"></a>
   <a href="#"><img src="images/link-icon.png"></a>
   </div>
   </div>
   <div class="col-md-12">
   <div class="job-vacancy">
   <h2><?php echo $jobs['Jobs'][0]['category_id']; ?></h2>
   <p>Job vacancy: <span><?php echo $job_count;?></span></p>
   </div>
   </div>
   <div id="jobs">
  <?php foreach($jobs['Jobs'] as $row){?>
    <div class="col-md-4">
   <div class="vacancy-details">
   <div class="designation">
   <h3><?php echo $row['title'];?></h3>
   <p>Location :  <?php echo $row['location_id'];?></p>
   </div>
   <div class="vacancypara">
   <?php echo $row['text'];?>
   </div>
   <div class="explore">
	<a href=""  data-toggle="modal" data-target="#applymdl">Apply Now <img src="images/explore-icon.png"></a>
   </div>
   </div>
   </div>
   <?php }?>
      
      </div>
 </div>
   </div>
   </div>
   </section>

<!-- Modal2 -->   
<div id="applymdl" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal">×</button>
	  <div class="col-md-12">
   <div class="applyhdng">
   <h2>Apply Now</h2>
   <p>Do you believe that you are a good fit for a position we are looking to fill? Please fill in this form below. We will review it and connect with you shortly. </p>
   </div>
   </div>
   <div class="col-md-12">
   <div class="row">
   <div class="applyform">
   <form>
   <div class="col-md-6">
   <label>First Name</label>
   <input type="text" class="form-control">
   </div>
   <div class="col-md-6">
   <label>Last Name</label>
   <input type="text" class="form-control">
   </div>
   <div class="col-md-6">
   <label>Email</label>
   <input type="text" class="form-control">
   </div>
   <div class="col-md-6">
   <label>Mobile Number</label>
   <input type="text" class="form-control">
   </div>
  
   <div class="col-md-12">
   <label>City</label>
   <input type="text" class="form-control">
   </div>
   <div class="col-md-12">
   <label>Post Applied For</label>
   <input type="text" class="form-control">
   </div>
    <div class="col-md-12">
   <label>Message</label>
   <textarea class="form-control"></textarea>
   </div>
   <div class="col-md-12">
   <label>Attach Resume</label>
   <input type="file" class="form-control">
   </div>
   <div class="col-md-12">
   <button class="sbmitbtn" type="button" data-toggle="modal" data-target="#sbmitform">Submit <img src="images/explore-icon.png"></button>
   </div>
   </form>
   </div>
   </div>
   </div>
   <div class="col-md-12">
   <p>In case a suitable position is not open right now but you can contribute meaningfully to what we do and are a good fit for our work culture, please upload your application. We are always open to expanding our teams and will certainly review your application and revert. </p>
   </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal2 --> 

<?php  require("include/footer.php"); ?>
<?php  require("include/footer-links.php"); ?>
</body>
</html> 