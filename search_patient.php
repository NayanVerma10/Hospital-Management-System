<?php
include("func.php");

if(isset($_POST['patient_search_submit']))
{
	$contact=$_POST['search'];
	$query="select * from doctorapp where contact ='$contact'";
	$result=mysqli_query($con,$query);
	$image='images/4.jpg';
	
	echo "<!DOCTYPE html>
<?php include('func.php');  ?>
<html>
<head>
	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
	

</head>
<body>
<div class='jumbotron' style='background:url($image)no-repeat;height:200px;background-size:cover;'></div>
<div class='container'>
<div class='card'>
	<div class='card-body' style='background-color:#3387FF;color:#ffffff;border-color:#3387FF ;'>
		<div class='row'>
		<div class='col-md-1'>
			<a href='admin-panel.php' class='btn btn-light'>Back</a>
		</div>
		<div class='col-md-3'><h3>Patient Details</h3></div>
		<div class='col-md-8'>
			<form class='form-group' action='search_patient.php' method='post'>
			<div class='row'>
				<div class='col-md-3'></div>
				<div class='col-md-7'><input type='text' name='search' class='form-control' placeholder='enter contact...'></div>
				<div class='col-md-2'><input type='submit' name='patient_search_submit' class='btn btn-light' value='Search'></div></div >
			</form>
			
		</div>
	</div></div>
	<div class='card-body' style='background-color:#3387FF;color:#ffffff;border-color:#3387FF ;'>
		<table class='table table-hover'>
		  <thead>
			<tr>
				<th scope='col'>First Name</th>
				<th scope='col'>Last Name</th>
				<th scope='col'>Email ID</th>
				<th scope='col'>Contact</th>
				<th scope='col'>Doctor Appointment</th>
				
				
			</tr>
		</thead>
		<tbody>
		
		
		";
	
	
	while($row=mysqli_fetch_array($result))
	{
		$fname=$row['fname'];
		$lname=$row['lname'];
		$email=$row['email'];
		$contact=$row['contact'];
		$docapp=$row['docapp'];
	
		echo "<tr>
		  <td>$fname</td>
		  <td>$lname</td>
		  <td>$email</td>
		  <td>$contact</td>
		  <td>$docapp</td>
		  
		</tr>";
	}
	
	echo "</tbody>
		</table>
	</div>
	
</div>
</div>	
	
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script> 
	<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
</body>
</html>";
	
}


?>