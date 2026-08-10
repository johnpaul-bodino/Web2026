<?php 
include_once ('bodinoConnection.php');

if(isset($_POST['bodinoRegister'])) {
	$bodino_Fname = $_POST['bodino_Fname'];
	$bodino_Lname = $_POST['bodino_Lname'];
	$bodino_Email = $_POST['bodino_Email'];
	$bodino_Username = $_POST['bodino_Username'];
	$bodino_Password = $_POST['bodino_Password'];
	$bodino_ConfirmPassword = $_POST['bodino_ConfirmPassword'];
	$bodino_Pnumber = $_POST['bodino_Pnumber'];
	$bodino_Street = $_POST['bodino_Street'];
	$bodino_Brgy = $_POST['bodino_Brgy'];
	$bodino_City = $_POST['bodino_City'];
	$bodino_State = $_POST['bodino_State'];
	$bodino_Zipcode = $_POST['bodino_Zipcode'];
	$bodino_Country = $_POST['bodino_Country'];

	$registration = mysqli_query($bodino_conn, "INSERT INTO  bodinoregistration (bodino_Fname, bodino_Lname, bodino_Email, bodino_Username, bodino_Password, bodino_ConfirmPassword, bodino_Pnumber, bodino_Street, bodino_Brgy, bodino_City, bodino_State, bodino_Zipcode, bodino_Country) VALUES	
		('$bodino_Fname','$bodino_Lname','$bodino_Email','$bodino_Username','$bodino_Password', '$bodino_ConfirmPassword', 
			'$bodino_Pnumber', '$bodino_Street', '$bodino_Brgy', '$bodino_City', '$bodino_State', '$bodino_Zipcode', '$bodino_Country')");

if($registration){
	echo '<script> alert ("account registered successfully!") </script>';

header("location:bodinoLogin.php");
}
else{
	echo '<script> alert ("account registered failed!") </script>';
}
}



?>
