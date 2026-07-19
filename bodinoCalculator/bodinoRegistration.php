<!DOCTYPE html>
<html>
<head>
	<title> Registration Page </title>
<style>

body {background:goldenrod;}
h1 {color:blue;}
h1 {font-family:Tahoma;}
h1 {text-align:Left;}
h1 {font-size: 40px;}

h2 {color:green;}
h2 {font-family:Monseratt;}
h2 {text-align:Left;}
h2 {font-size: 25px;}

p {color:whitesmoke;}
p {font-family:Arial;}
p {text-align:Left;}
p {font-size: 25px;}

a {text-decoration:none}

.center {text-align:center}

.bodinoClear {background-color:yellowgreen; 
border-color:green;
color: white; font-size:20px;
width:150px; height:40px;}

.bodinoRegister {background-color:cyan; 
border-color:green;
color: white; font-size:20px;
width:150px; height:40px;}
</style>
</head>
<body>

<h1> REGISTRATION FORM </h1>
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
<td> <input type="text" id="bodino_Email" name ="bodino_Email" required value =""></td>
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
<td> <input type="text" id="bodino_Password" name ="bodino_Passsword" required value =""></td>
<td></td>
</tr>

<!-- Confirmed Password -->
<tr>
<td> <label for="bodinoConfirmPassword"> Confirmed Password </label>  </td>
<td> <input type="text" id="bodino_ComfirmPassword" name ="bodino_ComfirmPasssword" required value =""></td>
<td></td>
</tr>

<!-- Phone Number -->
<tr>
<td> <label for="bodinoPnumber"> E-mail </label>  </td>
<td> <input type="text" id="bodino_Pnumber" name ="bodino_Pnumber" required value =""></td>
<td></td>
</tr>

<!-- Address -->
<tr> 
<td> <label for="bodinoAddress"> Address </label>  </td>
<td> <input type="text" id="bodino_Street" name ="bodino_Street" required value =""></td>
<td> <input type="text" id="bodino_Brgy" name ="bodino_Brgy" required value =""></td>
</tr>
<!--- Add 1 -->
<tr>
<td></td>
<td> <label for="bodinoStreet"> Street Add </label>  </td>
<td> <label for="bodinoBrgy"> Barangay </label>  </td>
</tr>


<!--- Add 2 label and inputbox -->
<tr> 
<td></td>
<td> <input type="text" id="bodino_City" name ="bodino_City" required value =""></td>
<td> <input type="text" id="bodino_State" name ="bodino_State" required value =""></td>
</tr>
<tr>
<td></td>
<td> <label for="bodinoCity"> City </label>  </td>
<td> <label for="bodinoState"> State/Province </label>  </td>
</tr>


<!--- Add 3 label and inputbox -->
<tr> 
<td></td>
<td> <input type="text" id="bodino_Zipcode" name ="bodino_Zipcode" required value =""></td>
<td> <input type="text" id="bodino_Country" name ="bodino_Country" required value =""></td>
</tr>
<tr>
<td></td>
<td> <label for="bsodinoZipcode"> Zip Code </label>  </td>
<td> <label for="bodinoCountry"> Country </label>  </td>
</tr>
</table>
<a href="bodinoLogin.php">
<button class="bodinoRegister"> REGISTER </button>
</a>
<a href=" ">
<button class="bodinoClear">CLEAR</button>
</a>
</h2>
</body>
</html>