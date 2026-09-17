<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bodinoStyle.css">
    <style>
        body{
            background-color: goldenrod;
        }
        .h1_login{
            text-align: left;
        }

        h2{
            text-align: left;
        }
        .bodinoLoginB{
            background-color: red; 
            border-color:green;
            color: white; 
            font-size:15px;
            width:130px; 
            height:30px;
            margin-top: 23px;
        }
    </style>
    <title>Login Page</title>
</head>
<body>
    <?php
        
        include_once('config/bodinoConnection.php');
        /** @var mysqli $bodino_conn */ 
        session_start();

        if (isset($_POST['bodinoLoginB'])){
            $bodino_Username = $_POST['bodino_Username'];
            $bodino_Password = $_POST['bodino_Password'];
            $login = mysqli_query($bodino_conn, 
            "SELECT * FROM register 
            WHERE bodino_Username='{$bodino_Username}' 
            AND bodino_Password='{$bodino_Password}'");
            $row = mysqli_fetch_assoc($login);

            if (mysqli_num_rows($login) > 0){
                if($bodino_Password == $row['bodino_Password']){
                    if($row['bodino_status'] == 1){
                        mysqli_query($bodino_conn, 
                        "UPDATE register 
                        SET bodino_isActive = 1 
                        WHERE bodino_Username='{$bodino_Username}'");
                        if($row['bodino_type'] == 1){
                            $_SESSION['bodino_login'] = true;
                            $_SESSION['bodino_type'] = $row['bodino_type'];
                            echo '<script>parent.location.href="bodinoMainPage.php"</script>';
                        } else {
                            $_SESSION['bodino_login'] = true;
                            $_SESSION['bodino_type'] = $row['bodino_type'];
                            echo '<script>parent.location.href="bodinoMainPage.php"</script>';
                        }
                    }   else {
                            echo '<script> alert ("your account is currently inactive."); </script>';
                    }
                } else{
                    echo '<script> alert ("Incorrect Password and Username"); </script>';
                }
            }   else{
                    echo '<script> alert ("User not Registered"); </script>';
            }
        }
		/*
	*/
    ?>
    <form action="bodinoLogin.php" method="POST">
        <h1 class="h1_login"> LOGIN FORM </h1>
        <h2>
            <table class="EditTable">
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
            <button type='submit' name="bodinoLoginB" class="bodinoLoginB"> LOGIN </button>
            <button type="reset" name="bodinoClear" class="bodinoClear"> CLEAR </button>    
            <br>
            <p><a href="bodinoForgotPassword.php">Forgot password?</a></p>
            <br>
            <br>
        </h2>
    </form>
</body>
</html>