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

<h1> LOGIN FORM </h1>
<h2>
<table>
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

</table>
<div>
<a href="bodinoCalculator.php">
<button class="bodinoLogin"> LOGIN </button>
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