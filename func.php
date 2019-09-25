<?php
session_start();
$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['login_submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="SELECT * from logindb where username='$username' and password='$password'";
	$result=mysqli_query($con,$query);
	
	if(mysqli_num_rows($result)>=1){ 
		$_SESSION['username']=$username;
		header("Location:admin-panel.php");
	}
	else{
		echo "<script>alert('Wrong Details');</script>";
		echo "<script>window.open('index.php','_self');</script>";
		
	}
}

if(isset($_POST['sign_up_submit'])){
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$query="insert into logindb values('$username' , '$password')";
	$result=mysqli_query($con,$query);
	/*-------------------------------------Email----------------------------------------------------*/
	
	require 'PHPMailer/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587 or 465
   $mail ->IsHTML(false);
   $mail ->Username = "it1726.iiitbhopal@gmail.com";
   $mail ->Password = "nv11b10..$$$";
   $mail ->SetFrom("it1726.iiitbhopal@gmail.com");
   $mail ->Subject = 'Sign Up Sucessful';
   $mail ->Body = "You have Sucessfully Signed Up on Hospital Management System \n\n\n Your Username:\t $username \n Your Password:\t $password";
   $mail ->AddAddress($email);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }
	
	/*---------------------------------------------------------------------------------------------*/
	if($result){
		echo "<script>alert('Sign Up Sucessful');</script>";
		echo "<script>window.open('index.php','_self');</script>";
		
	}
}


if(isset($_POST['pat_submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$docapp=$_POST['docapp'];
	/**/
	$query="select * from doctorapp where docapp='$docapp'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)>=3)
	{
		echo "<script>alert('Doctor Is Busy');</script>";
		echo "<script>window.open('admin-panel.php','_self');</script>";
		return;
	}
	
	/**/
	$query="insert into doctorapp(fname, lname , email,  contact , docapp) values ('$fname', '$lname' , '$email',  '$contact' , '$docapp')";
	$result=mysqli_query($con,$query);
	/*-------------------------------------------Mail-----------------------------------------------*/
	require 'PHPMailer/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587 or 465
   $mail ->IsHTML(false);
   $mail ->Username = "it1726.iiitbhopal@gmail.com";
   $mail ->Password = "nv11b10..$$$";
   $mail ->SetFrom("it1726.iiitbhopal@gmail.com");
   $mail ->Subject = 'Appointment Set by Hospital Management System';
   $mail ->Body = "Your appointment has been made by Hospital Management System \n\n\n Your doctor:\t $docapp today";
   $mail ->AddAddress($email);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }
	/*--------------------------------------------Mail----------------------------------------------*/
	if($result){
		echo "<script>alert('Appointment Registered');</script>";
		echo "<script>window.open('admin-panel.php','_self');</script>";
		
	}	
}


function get_patient_details()
{
	global $con;
	$query = "select * from doctorapp";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$fname=$row['fname'];
		$lname=$row['lname'];
		$email=$row['email'];
		$contact=$row['contact'];
		$docapp=$row['docapp'];
		echo "<tr name='$contact'>
		  <td >$fname</td>
		  <td >$lname</td>
		  <td >$email</td>
		  <td >$contact</td>
		  <td >$docapp</td>
		  
		</tr>";
	}
}


function display_admin_panel()
{
	$img='images/4.jpg';
	echo '<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Hospital Management System</title>

</head>
<body>
<nav class="navbar navbar-dark bg-primary">
  <span class="navbar-brand mb-0 h1"><h2 style="color:#15FF0D;">Hospital Management System</h2></span>
</nav>
<div class="jumbotron" style="background:url('.$img.')no-repeat;height:200px;background-size:cover;"></div>
<div class="container-fluid">
<div class="row">
	<div class="col-md-3">
		<div class="list-group">
			<a href="" class="list-group-item active" style="background-color:#3387FF;color:#ffffff;border-color:#3387FF">Categories</a>
			<a href="patient_details.php" class="list-group-item">Patient Details</a>
			<a href="" class="list-group-item">Add New Patient</a>
			<!--<a href="" class="list-group-item">Payment/Checkout</a>-->
		</div>
		<hr>
		<div class="list-group">
			<a href="logout.php" class="list-group-item active" style="background-color:#3387FF;color:#ffffff;border-color:#3387FF">LOG OUT</a>
			<!--<a href="" class="list-group-item">Staff Details</a>
			<a href="" class="list-group-item">Add New Staff</a>
			<a href="" class="list-group-item">Remove Staff Member</a>-->
		</div>
	</div>	
	<div class="col-md-8">
		<div class="card">
			<div class="card-body" style="background-color:#3387FF;color:#ffffff;border-color:#3387FF">
				<h3>Book an Appointment</h3>
			</div>
			<div class="card-body">
				<form class="form-group" action="func.php" method="post">
					<label>First Name:</label>
					<input type="text" name="fname" class="form-control"><br>
					<label>Last Name:</label>
					<input type="text" name="lname" class="form-control"><br>
					<label>Email ID:</label>
					<input type="text" name="email" class="form-control"><br>
					<label>Contact:</label>
					<input type="text" name="contact" class="form-control"><br>
					<label>Doctor Appointment:</label>
					<select class="form-control" name="docapp">
						<option value="Dr Verma from 6pm to 8pm">Dr Verma from 6pm to 8pm</option>
						<option value="Dr Lekhrajni from 6pm to 8pm">Dr Lekhrajni from 6pm to 8pm</option>
						<option value="Dr Kushagra from 6pm to 8pm">Dr Kushagra from 6pm to 8pm</option>
						
					</select><br>
					<input type="submit" class="btn btn-primary" name="pat_submit" value="Enter Appointment">
					
				</form>
			
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>';
}


function delete_record($contact)
{
	$con=mysqli_connect("localhost","root","","hmsdb");
	$query="delete from doctorapp where contact='$contact'";
	$result=mysqli_query($con,$query);
	if($result)
		echo "<script>window.open('patient_details.php','_self');</script>";
		
}


if(isset($_POST['hidden_submit'])){
	delete_record($_POST['hiddenContact']);
}




?>