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

<body>
<h1> Multiplication </h1>
<form class="" action="bodinoMultiply.php" method="POST" autocomplete="OFF">
	<?php
		include_once("bodinoConnection.php");
		
		if(isset($_POST['productCompute'])){
			$bodino_Fnum = $_POST['bodino_Fnum'];
			$bodino_Snum = $_POST['bodino_Snum'];
			$bodinoProduct = $bodino_Fnum * $bodino_Snum;
			$product = $bodinoProduct ?? '';

			$submitProduct = mysqli_query($bodino_conn, "INSERT INTO bodinomultiplication (bodino_Fnum, bodino_Snum, productCompute)
				VALUES ('$bodino_Fnum', '$bodino_Snum', '$bodinoProduct')");
		}
	?>
	<h2>
	<table>
	<!-- First Number -->
	<tr>
	<td> <label for="bodino_Fnum"> First number </label>  </td>
	<td> <input type="number" id="bodino_Fnum" name ="bodino_Fnum" required value =""></td>
	<td></td>
	</tr>

	<!-- Second Number -->
	<tr>
	<td> <label for="bodino_Snum"> Second number </label>  </td>
	<td> <input type="number" id="bodino_Snum" name ="bodino_Snum" required value =""></td>
	<td></td>
	</tr>

	</table>
	<div>
	<button type="submit" name="productCompute" class="bodinoCompute"> Compute </button>
	</div>
	<div>
	<tr>
	<td> <label for="bodinoProduct"> The product of two numbers is:</label> </td>
	<td> <input type="number" name="bodinoProduct" id="bodinoProduct" value ="<?php echo $product; ?>" readonly>
	<td></td>
	</tr>
	</div>
	</h2>
</form>
</body>
</html>