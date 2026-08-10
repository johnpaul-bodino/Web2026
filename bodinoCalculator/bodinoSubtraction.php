<!DOCTYPE html>
<html>
<head>
	<title> Subtraction </title>
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
<h1> Subtraction </h1>
<form class="" action="bodinoSubtraction.php" method="POST" autocomplete="OFF">
	<?php
		include_once("bodinoConnection.php");
		
		if(isset($_POST['differenceCompute'])){
			$bodino_Fnum = $_POST['bodino_Fnum'];
			$bodino_Snum = $_POST['bodino_Snum'];
			$bodinoDifference = $bodino_Fnum - $bodino_Snum;
			$difference = $bodinoDifference ?? '';

			$submitDifference = mysqli_query($bodino_conn, "INSERT INTO bodinosubtraction (bodino_Fnum, bodino_Snum, differenceCompute) VALUES ('$bodino_Fnum', '$bodino_Snum', '$bodinoDifference')");
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
	<button type="submit" name="differenceCompute" class="bodinoCompute"> Compute </button>
	</div>
	<div>
	<tr>
	<td> <label for="bodinoDifference"> The Difference of two numbers is:</label> </td>
	<td> <input type="number", name="bodinoDifference", id="bodinoDifference" value="<?php echo $difference; ?>" readonly> </td>
	<td></td>
	</tr>
	</div>
	</h2>
</form>
</body>
</html>