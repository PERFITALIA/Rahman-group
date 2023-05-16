<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
 require("include/config.php"); 

$action = $_POST['frmname'];
if($action == "get_in_touch"){
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

global $mysqli;
$data = array();
$query = "INSERT into get_in_touch(name,email,subject,message) VALUES ('$f_name $l_name','$email','$subject','$message')";

$mysqli->query($query);
  

        
$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.office365.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = 'info@rahman-group.com';
$mail->Password = 'KJIUYHNBbowh@7654rt@!';
$mail->setFrom('info@rahman-group.com', 'Rahman Gropu');
$mail->addAddress('info@rahman-group.com', 'Rahman Group');
$mail->Subject = 'New Get In Touch Enquiry';
$mail->msgHTML("
    				'<html>
                        <head>
                        <title>Contact Information</title>
                        </head>
                        <body>
                        <div>
                        <p>Dear Sir/Mam,</p>
                        <p>There is a new request from your website Get In Touch section. Details are as follows:<br></br></p>
                        <table border='1' bordercolor='#FFFFFF'>
                        <tr>
                        <td>Name</td><td>$f_name $l_name</td>
                        </tr>
                        <tr>
                        <td>Email </td><td>$email</td>
                        </tr>
                        <tr>
                        <td>Phone Number </td><td>$subject</td>
                        </tr>
                        <tr>
                        <td>Message </td><td>$message</td>
                        </tr>
                        </table>
                        <p>Thanks & Regards <br> Perf</p>
                        </div>
                        </body>
                        </html>"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
  header("Location: https://coolkaki.com/2021-22/rahman-group/contact-us?status=true");

}    
    
}else if($action == "enquiry"){
    
    $f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$category = $_POST['category'];
$message = $_POST['message'];
$a = $_POST['slug'];

global $mysqli;
$data = array();
$query = "INSERT into contact_us(enquiry_type,name,email,comment) VALUES ('$category','$f_name $l_name','$email','$message')";

$mysqli->query($query);
  

        
$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.office365.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = 'info@rahman-group.com';
$mail->Password = 'KJIUYHNBbowh@7654rt@!';
$mail->setFrom('info@rahman-group.com', 'Rahman Group');
$mail->addAddress('info@rahman-group.com', 'Rahman Group');
$mail->Subject = 'New Product Enquiry';
$mail->msgHTML("
    				'<html>
                        <head>
                        <title>Contact Information</title>
                        </head>
                        <body>
                        <div>
                        <p>Dear Sir/Mam,</p>
                        <p>There is a new request from your website for Product Enquiry. Details are as follows:<br></br></p>
                        <table border='1' bordercolor='#FFFFFF'>
                        <tr>
                        <td>Name</td><td>$f_name $l_name</td>
                        </tr>
                        <tr>
                        <td>Email </td><td>$email</td>
                        </tr>
                        <tr>
                        <td>Category </td><td>$category</td>
                        </tr>
                        <tr>
                        <td>Message </td><td>$message</td>
                        </tr>
                        </table>
                        <p>Thanks & Regards <br> Perf</p>
                        </div>
                        </body>
                        </html>"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
   
  header("Location: https://coolkaki.com/2021-22/rahman-group/product-listing/$a?status=true");

}    
}else if($action == "career"){
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$city = $_POST['city'];
$post = $_POST['post'];

if(isset($_FILES['file'])){
      $errors= array();
      $file_name = $_FILES['file']['name'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $extensions= array("jpeg","jpg","png","doc","pdf");
      move_uploaded_file($file_tmp,"resume/".$file_name);     
   }

global $mysqli;
$data = array();
$query = "INSERT into join_us(f_name,l_name,email,phone,city,resume,post) VALUES ('$f_name','$l_name $email','$mobile','$city','$file_name','$post')";

$mysqli->query($query);
  

        
$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.office365.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = 'info@rahman-group.com';
$mail->Password = 'KJIUYHNBbowh@7654rt@!';
$mail->setFrom('info@rahman-group.com', 'Rahman Group');
$mail->addAddress('hrho.recruitment@rahman-group.com', 'Rahman HR');
$mail->Subject = 'New Career Enquiry';
$mail->msgHTML("
    				'<html>
                        <head>
                        <title>Contact Information</title>
                        </head>
                        <body>
                        <div>
                        <p>Dear Sir/Mam,</p>
                        <p>There is a new request from your website for Product Enquiry. Details are as follows:<br></br></p>
                        <table border='1' bordercolor='#FFFFFF'>
                        <tr>
                        <td>Name</td><td>$f_name $l_name</td>
                        </tr>
                        <tr>
                        <td>Email </td><td>$email</td>
                        </tr>
                        <tr>
                        <td>Mobile </td><td>$mobile</td>
                        </tr>
                        <tr>
                        <td>City </td><td>$city</td>
                        </tr>
                        <tr>
                        <td>Post </td><td>$post</td>
                        </tr>
                        </table>
                        <p>Thanks & Regards <br> Perf</p>
                        </div>
                        </body>
                        </html>"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
 $mail->addAttachment('resume/'.$file_name); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
   
  header("Location: https://coolkaki.com/2021-22/rahman-group/careers.php?status=true");

}   
}

