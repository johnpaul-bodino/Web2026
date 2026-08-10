<!DOCTYPE html>
<html>
<head>
	<title> Login Page </title>
<style>

body {background:goldenrod;}
h1 {color:blue;}
h1 {font-family:Tahoma;}
h1 {text-align:Left;}
h1 {font-size: 40px;}

h2 {color:green;}
h2 {font-family:Arial;}
h2 {text-align:Left;}
h2 {font-size: 25px;}


p {color:whitesmoke;}
p {font-family:Arial;}
p {text-align:Left;}
p {font-size: 25px;}

a {text-decoration:none;}

div {padding-top:30px;}
.center {text-align:center}

.bodinoClear {background-color:yellowgreen; 
border-color:green;
color: white; font-size:20px;
width:150px; height:40px;}

.bodinoLogin {background-color:red; 
border-color:green;
color: white; font-size:20px;
width:150px; height:40px;}
</style>
</head>

<body>
<?php
	$bodino_conn = mysqli_connect("localhost", "root", "", "bodinocalculator");

	if (isset($_POST['bodinoLoginn'])){
		$bodino_Username = $_POST['bodino_Username'];
		$bodino_Password = $_POST['bodino_Password'];
		$login = mysqli_query($bodino_conn, "SELECT * FROM bodinoregistration WHERE bodino_Username='{$bodino_Username}' AND bodino_Password='{$bodino_Password}'");
		$row = mysqli_fetch_assoc($login);

		if (mysqli_num_rows($login) > 0){
			$_SESSION["login"] = true;
			header("Location: bodinoCalculator.php");
			exit();
		} else {
			echo "<script> alert ('Incorrect Password and Username'); </script>";
		}
		}
		/*
	*/
?>

<form action="bodinoLogin.php" method="POST">
	<h1> LOGIN FORM </h1>
	<h2>
	<table>
	<!-- Username -->
	<tr>
	<td> <label for="bodino_Username"> Username </label>  </td>
	<td> <input type="text" id="bodino_Username" name ="bodino_Username" required value= ""></td>
	<td></td>
	</tr>

	<!-- Passsword -->
	<tr>
	<td> <label for="bodino_Password"> Password </label>  </td>
	<td> <input type="password" id="bodino_Password" name ="bodino_Password" required value =""></td>
	<td></td>
	</tr>

	</table>
	<div>
	<button type='submit' name="bodinoLoginn" class="bodinoLogin"> LOGIN </button>

	</a><a href=" ">
	<button class="bodinoClear">CLEAR</button>
	</a>
	</div>
	<div>
	<a href="bodinoRegistration.php"> <u>REGISTRATION </u> </a>
	</div>
	</h2>
	</body>
</html>