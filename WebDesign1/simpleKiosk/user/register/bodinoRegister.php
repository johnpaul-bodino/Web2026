<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
	<style>
		body {background:goldenrod;}
		.bodinoRegister {
			background-color:cyan; 
			border-color:green;
			color: white; 
			font-size:15px;
			width:130px; 
			height:30px;
			margin-left: 10px;
		}
		.bodinoClear {
			background-color:green; 
			border-color:green;
			color: white; 
			font-size:15px;
			width:130px; 
			height:30px;
			margin-top: 23px;
		}
		h1{
			color: blue;
			font-family: Tahoma;
			font-size: 35px;
			
		}
		h2{
			color: green;
			font-size: 25px;
			font-family: Arial, Helvetica;
			
		}
	</style>
</head>
<body>
	<form class="" action="bodinoInsert.php" method="POST" autocomplete="off">
		<h1 class="h1_login"> REGISTRATION FORM </h1>
		<h2>
		<table>
		<!-- Full name -->
		<tr> 
		<td> <label for="bodinoFullname"> Full Name </label>  </td>
		<td> <input type="text" id="bodino_Fname" name ="bodino_Fname" required value =""></td>
		<td> <input type="text" id="bodino_Lname" name ="bodino_Lname" required value =""></td>
		</tr>
		<tr>
		<td></td>
		<td> <label for="bodinoFirstname"> First Name </label>  </td>
		<td> <label for="bodinoLastname"> Last Name </label>  </td>
		</tr>

		<!-- Email -->
		<tr>
		<td> <label for="bodinoEmail"> E-mail </label>  </td>
		<td> <input type="email" id="bodino_Email" name ="bodino_Email" required value =""></td>
		<td></td>
		</tr>

		<!-- Username -->
		<tr>
		<td> <label for="bodinoUsername"> Username </label>  </td>
		<td> <input type="text" id="bodino_Username" name ="bodino_Username" required value =""></td>
		<td></td>
		</tr>

		<!-- Passsword -->
		<tr>
		<td> <label for="bodinoPassword"> Password </label>  </td>
		<td> <input type="password" id="bodino_Password" name ="bodino_Password" required value =""></td>
		<td></td>
		</tr>

		<!-- Confirmed Password -->
		<tr>
		<td> <label for="bodinoConfirmPassword"> Confirmed Password </label>  </td>
		<td> <input type="password" id="bodino_ConfirmPassword" name ="bodino_ConfirmPassword" required value =""></td>
		<td></td>
		</tr>
        <br>
		</table>
		</h2>
        <input type="submit" name="bodinoRegister" class="bodinoRegister" value="REGISTER">
        <input type="reset" name="bodinoClear" class="bodinoClear" value="CLEAR">
	</form>
    <br>
</body>
</html>