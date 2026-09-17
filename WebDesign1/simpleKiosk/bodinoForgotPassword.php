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
        .bodinoResetB{
            background-color: red; 
            border-color:green;
            color: white; 
            font-size:15px;
            width:130px; 
            height:30px;
            margin-top: 23px;
            cursor: pointer;
        }
        .bodinoClear{
            background-color: green; 
            border-color:green;
            color: white; 
            font-size:15px;
            width:130px; 
            height:30px;
            margin-top: 23px;
            cursor: pointer;
        }
        .EditTable td{
            border: none;
            padding: 4px 6px;
        }
        .h_info{
            font-size: 16px;
            color: black;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 12px;
        }
    </style>
    <title>Forgot Password</title>
</head>
<body>
    <?php
    include_once('config/bodinoConnection.php');
    /** @var mysqli $bodino_conn */ 
    session_start();
        if (isset($_GET['action']) && $_GET['action'] == 'cancel') {
        unset($_SESSION['bodino_reset_step']);
        unset($_SESSION['bodino_reset_email']);
    // Redirect back to login
    echo '<script>parent.location.href="bodinoLogin.php"</script>';
    exit(); // Stop the rest of the script from executing
}
    date_default_timezone_set('Asia/Manila');
    if (!isset($_SESSION['bodino_reset_step'])) {
        $_SESSION['bodino_reset_step'] = 1;
    }
    $current_step = $_SESSION['bodino_reset_step'];
    // SEND OTP
    if (isset($_POST['bodinoSendOtp'])){
        $bodino_Email = $_POST['bodino_Email'];
        $check = mysqli_query($bodino_conn, 
                "SELECT * FROM register 
                WHERE bodino_Email='{$bodino_Email}'");
        $row = mysqli_fetch_assoc($check);
        if (mysqli_num_rows($check) > 0){
            $otp = strval(rand(100000, 999999));
            $expires_at = date("Y-m-d H:i:s", strtotime("+5 minutes"));
            mysqli_query($bodino_conn, 
                        "DELETE FROM resetpassword 
                        WHERE bodino__email='{$bodino_Email}'");
            mysqli_query($bodino_conn, 
                        "INSERT INTO 
                        resetpassword 
                        (bodino__email, 
                        otp, 
                        expires_at, 
                        is_verified, 
                        attemps) 
                        VALUES 
                        ('{$bodino_Email}', 
                        '{$otp}', 
                        '{$expires_at}', 0, 0)");

            $_SESSION['bodino_reset_email'] = $bodino_Email;
            $_SESSION['bodino_reset_step'] = 2;
            $current_step = 2;
            echo '<script> alert ("OTP sent to your email."); </script>';
        } else {
            echo '<script> alert ("No account found with that email."); </script>';
        }
    }
    
    // RESEND OTP
    
    if (isset($_GET['action']) && $_GET['action'] == 'resend' && isset($_SESSION['bodino_reset_email'])){
        $bodino_Email = $_SESSION['bodino_reset_email'];
        $otp = strval(rand(100000, 999999));
        $expires_at = date("Y-m-d H:i:s", strtotime("+5 minutes"));

        mysqli_query($bodino_conn, 
                    "INSERT 
                    INTO 
                    resetpassword 
                    (bodino__email, 
                    otp, 
                    expires_at, 
                    is_verified, 
                    attemps) 
                    VALUES 
                    ('{$bodino_Email}', 
                    '{$otp}', 
                    '{$expires_at}', 0, 0)");
  
        $_SESSION['bodino_reset_step'] = 2;
        $current_step = 2;

        echo '<script> alert ("A new OTP has been sent."); </script>';
    }

    //  VERIFY OTP
   
    if (isset($_POST['bodinoVerifyOtp'])){
        $entered_otp = $_POST['bodino_OTP'];
        $bodino_Email = $_SESSION['bodino_reset_email'];

        $check = mysqli_query($bodino_conn, 
                "SELECT * 
                FROM resetpassword 
                WHERE bodino__email='{$bodino_Email}' 
                ORDER BY reset_id DESC LIMIT 1");
        $row = mysqli_fetch_assoc($check);

        if (mysqli_num_rows($check) > 0){
            if (strtotime($row['expires_at']) < time()){
                echo '<script> alert ("This OTP has expired. Please resend a new one."); </script>';

            } else if ($row['attemps'] >= 5){
                echo '<script> alert ("Too many incorrect attempts. Please resend a new OTP."); </script>';

            } else if ($entered_otp == $row['otp']){
                mysqli_query($bodino_conn, 
                            "UPDATE resetpassword 
                            SET is_verified = 1 
                            WHERE reset_id = {$row['reset_id']}");

                $_SESSION['bodino_reset_step'] = 3;
                $current_step = 3;
            } else {
                mysqli_query($bodino_conn, 
                            "UPDATE resetpassword 
                            SET attemps = attemps + 1 
                            WHERE reset_id = {$row['reset_id']}");
                echo '<script> alert ("Incorrect OTP. Please try again."); </script>';
            }
        } else {
            echo '<script> alert ("No OTP request found. Please start over."); </script>';
        }
    }
    // SUBMIT NEW PASSWORD
    
    if (isset($_POST['bodinoSubmitNewPass'])){
        $bodino_NewPassword = $_POST['bodino_NewPassword'];
        $bodino_ConfirmPassword = $_POST['bodino_ConfirmPassword'];
        $bodino_Email = $_SESSION['bodino_reset_email'];

        $check = mysqli_query($bodino_conn, 
                "SELECT * FROM resetpassword 
                WHERE bodino__email='{$bodino_Email}' 
                AND is_verified = 1 
                AND expires_at > NOW() 
                ORDER BY reset_id DESC LIMIT 1");
        $row = mysqli_fetch_assoc($check);

        if (mysqli_num_rows($check) > 0){
            if ($bodino_NewPassword != $bodino_ConfirmPassword){
                echo '<script> alert ("Passwords do not match."); </script>';
            } else {
                mysqli_query($bodino_conn, 
                        "UPDATE register 
                        SET bodino_Password='{$bodino_NewPassword}' 
                        WHERE bodino_Email='{$bodino_Email}'");

                unset($_SESSION['bodino_reset_email']);
                unset($_SESSION['bodino_reset_step']);

                echo '<script> alert ("Password reset successful. Please login."); 
                parent.location.href="bodinoMainPage.php"</script>';
            }
        } else {
            echo '<script> alert ("Your verification has expired. Please start over."); 
            parent.location.href="bodinoForgotPassword.php"</script>';
        }
    }
    ?>
    <?php if ($current_step == 1): ?>
        <!--  ENTER EMAIL -->
        <form action="bodinoForgotPassword.php" method="POST">
            <h1 class="h1_login">FORGOT PASSWORD</h1>
            <h2>
                <!-- <p class="h_info">
                    Please enter your registered Gmail / E-mail to receive a verification OTP code.
                </p> -->
                <table class="EditTable">
                    <tr>
                        <td>
                            <label for="bodino_Email">Enter your E-mail</label>
                        </td>
                        <td>
                            <input
                                type="email"
                                id="bodino_Email"
                                name="bodino_Email"
                                required
                            >
                        </td>
                        <td></td>
                    </tr>
                </table>
                <button type="submit" name="bodinoSendOtp" class="bodinoResetB">
                    SEND OTP
                </button>
                <button type="reset" class="bodinoClear">
                    CLEAR
                </button>
                <br>
                <p>
                    <a href="components/bodinoLogout.php">Back</a>
                </p>
                <br>
                <br>
            </h2>
        </form>
    <?php elseif ($current_step == 2): ?>
        <!-- ENTER OTP -->
        <form action="bodinoForgotPassword.php" method="POST">
            <h1 class="h1_login">VERIFY OTP</h1>
            <h2>
                <p class="h_info">

                    <b><?= htmlspecialchars($_SESSION['bodino_reset_email']) ?></b>
                </p>
                <table class="EditTable">
                    <tr>
                        <td>
                            <label for="bodino_OTP">Enter OTP Code</label>
                        </td>
                        <td>
                            <input
                                type="text"
                                id="bodino_OTP"
                                name="bodino_OTP"
                                maxlength="6"
                                required
                                placeholder="6-digit OTP"
                            >
                        </td>
                        <td></td>
                    </tr>
                </table>
                <button type="submit" name="bodinoVerifyOtp" class="bodinoResetB">
                    VERIFY OTP
                </button>
                <button type="reset" class="bodinoClear">
                    CLEAR
                </button>
                <br>
                <p>
                    <a href="bodinoForgotPassword.php?action=resend">Resend OTP</a> |
                    <a href="components/bodinoLogout.php">Back</a>
                    
                </p>
                <br>
                <br>
            </h2>
        </form>
    <?php elseif ($current_step == 3): ?>
        <!-- STEP 3: ENTER NEW PASSWORD -->
        <form action="bodinoForgotPassword.php" method="POST">
            <h1 class="h1_login">RESET PASSWORD</h1>
            <h2>
                <p class="h_info">
                    Enter your new password.
                </p>
                <table class="EditTable">
                    <!-- New Password -->
                    <tr>
                        <td>
                            <label for="bodino_NewPassword">New Password</label>
                        </td>

                        <td>
                            <input
                                type="password"
                                id="bodino_NewPassword"
                                name="bodino_NewPassword"
                                required
                            >
                        </td>
                        <td></td>
                    </tr>
                    <!-- Confirm Password -->
                    <tr>
                        <td>
                            <label for="bodino_ConfirmPassword">Confirm Password</label>
                        </td>

                        <td>
                            <input
                                type="password"
                                id="bodino_ConfirmPassword"
                                name="bodino_ConfirmPassword"
                                required
                            >
                        </td>
                        <td></td>
                    </tr>
                </table>
                <button type="submit" name="bodinoSubmitNewPass" class="bodinoResetB">
                    ENTER 
                </button>
                <button type="reset" class="bodinoClear">
                    CLEAR
                </button>
                <br>
                <p>
                    <a href="components/bodinoLogout.php">Back</a>
                </p>
                <br>
                <br>
            </h2>
        </form>
    <?php endif; ?>
</body>
</html>