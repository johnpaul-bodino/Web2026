<?php 
include_once ('../../config/bodinoConnection.php');
/** @var mysqli $bodino_conn */ 

if(isset($_POST['bodinoRegister'])) {
	$bodino_Fname = $_POST['bodino_Fname'];
	$bodino_Lname = $_POST['bodino_Lname'];
	$bodino_Email = $_POST['bodino_Email'];
	$bodino_Username = $_POST['bodino_Username'];
	$bodino_Password = $_POST['bodino_Password'];
	$bodino_ConfirmPassword = $_POST['bodino_ConfirmPassword'];
	$bodino_type = 0;
	$bodino_status = 0;
	$registration = '';
	$exist = mysqli_query($bodino_conn, "SELECT 
										bodino_Username
										FROM
										register
										WHERE bodino_Username = '$bodino_Username' 
										LIMIT 1");
	$exist2 = mysqli_query($bodino_conn, "SELECT 
										bodino_Email
										FROM
										register
										WHERE bodino_Email= '$bodino_Email' 
										LIMIT 1");
	if($exist->num_rows >= 1){
		echo '<script> alert ("Username Already Exist!");
		window.location.href = "bodinoRegister.php";
		</script>';}
	elseif($exist2->num_rows >= 1){
		echo '<script> alert ("Email Already Exist!");
		window.location.href = "bodinoRegister.php";
		</script>';
		}
	elseif($bodino_ConfirmPassword != $bodino_Password){
		echo '<script> alert ("Password Mismatch. Try Again!");
		window.location.href = "bodinoRegister.php";
		</script>';
	}
	else{
		$registration = mysqli_query($bodino_conn, 
									"INSERT INTO register 
									(bodino_Fname, 
									bodino_Lname, 
									bodino_Email, 
									bodino_Username, 
									bodino_Password, 
									bodino_type,
									bodino_status) 
									VALUES ('$bodino_Fname',
									'$bodino_Lname',
									'$bodino_Email',
									'$bodino_Username',
									'$bodino_Password', 
									'$bodino_type',
									'$bodino_status')");
	};

	
if($registration){
		echo '<script> alert("account registered successfully!");  
		window.location.href = "../../bodinoLogin.php";
		</script>';
}
else{
	echo '<script> alert ("account registered failed!") </script>';
};


}



?>
