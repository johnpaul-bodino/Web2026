<!DOCTYPE html>
<html>
<head>
	<title> Multiplication </title>
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

div {padding-top:30px;
	color: green;}
.center {text-align:center}

.bodinoCompute {background-color:gray; 
border-color:green;
color: white; font-size:20px;
width:150px; height:40px;}
</style>
</head>

<?php
	error_reporting(0);
	$compute = $_POST['bodino_Fnum'] * $_POST['bodino_Snum'];
?>
<body>
<h1> Multiplication </h1>
<form action="bodinoMultiply.php" method="POST">
<h2>
<table>
<!-- Username -->
<tr>
<td> <label for="bodinoFnum"> First number </label>  </td>
<td> <input type="number" id="bodino_Fnum" name ="bodino_Fnum" required value =""></td>
<td></td>
</tr>

<!-- Passsword -->
<tr>
<td> <label for="bodinoSnum"> Second number </label>  </td>
<td> <input type="number" id="bodino_Snum" name ="bodino_Snum" required value =""></td>
<td></td>
</tr>

</table>
<div>
<a href="bodinoCalculator.php">
<button type="submit" name="compute" class="bodinoCompute"> Compute </button>
</div>
<div>
<tr>
<td> <label for="bodinoSum"> The Multiply of two numbers is: <?php echo $compute;?> </label>  </td>
<td></td>
</tr>
</div>
</h2>
</form>
</body>
</html>