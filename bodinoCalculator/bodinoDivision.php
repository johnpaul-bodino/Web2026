<!DOCTYPE html>
<html>
<head>
	<title> Division </title>
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
<h1> Division </h1>
<form action="bodinoDivision.php" method="POST" autocomplete="OFF">
	<?php
		include_once("bodinoConnection.php");

		if(isset($_POST['quotientCompute'])){
			$bodino_Fnum = $_POST['bodino_Fnum'];
			$bodino_Snum = $_POST['bodino_Snum'];
			$bodino = $bodino_Fnum / $bodino_Snum;
			$quotient = $bodino ?? '';
			$submitQuotient = mysqli_query($bodino_conn, "INSERT INTO bodinodivision (bodino_Fnum, bodino_Snum, quotientCompute) VALUES ('$bodino_Fnum', '$bodino_Snum', '$bodino')");
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
	<button type="submit" name="quotientCompute" class="bodinoCompute"> Compute </button>
	</div>
	<div>
	<tr>
	<td> <label for="bodinoQuotient"> The Quotient of two numbers is: </label>  </td>
	<td> <input type="number" name="bodinoQuotient" id="bodinoQuotient" value="<?php echo $quotient; ?>" readonly> </td>
	<td></td>
	</tr>
	</div>
	</h2>
</form>

</body>
</html>