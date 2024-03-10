<?php
	include('header.php');
	
	if (isset($_POST['Login'])) {
		$Username = get_safe_value($_POST['Username']);
		$Password = get_safe_value($_POST['Password']);

		$res = mysqli_query($con, "SELECT * FROM USER WHERE USERNAME='$Username' AND PASSWORD='$Password'");

		if (mysqli_num_rows($res) > 0) {
			$rows = mysqli_fetch_assoc($res);
			$_SESSION['UID'] = $rows['USER ID'];
			$_SESSION['UNAME'] = $rows['USERNAME'];
			redirect('dashboard.php');
		} else {
			$error_message = "Invalid username or password. Please try again.";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="index.css">
    <title>Personal Finance Tracker</title>
    <style>
        /* Paste the CSS code provided above here */
    </style>
</head>
<body>
    <form method="post">
        <div class="wrapper">
            <nav class="nav">
                <div class="nav-logo">
                    <p>PFT  .</p>
                </div>
                <div class="nav-menu" id="navMenu">
                    <ul>
                        <li><a href="#" class="link active">Home</a></li>
                        <li><a href="#" class="link">Blog</a></li>
                        <li><a href="#" class="link">Services</a></li>
                        <li><a href="#" class="link">About</a></li>
                    </ul>
                </div>
                <div class="nav-button">
                    <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
                    <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
                </div>
                <div class="nav-menu-btn">
                    <i class="bx bx-menu" onclick="myMenuFunction()"></i>
                </div>
            </nav>

            <div class="form-box">
                <div class="login-container" id="login">
                    <div class="top">
                        <?php if (isset($error_message)) : ?>
                            <p style="color: red;"><?php echo $error_message; ?></p>
                        <?php else : ?>
                            <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                        <?php endif; ?>
                        <header>Login</header>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Username or Email" name="Username">
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Password" name="Password">
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" value="Sign In" name="Login">
                    </div>
                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="login-check">
                            <label for="login-check"> Remember Me</label>
                        </div>
                        <div class="two">
                            <label><a href="#">Forgot password?</a></label>
                        </div>
                    </div>
                </div>

                <div class="register-container" id="register">
                    <!-- Registration form content from the provided HTML code -->
                </div>
            </div>
        </div>
    </form>

    <script>
        // Paste the JavaScript code provided above here
    </script>
</body>
</html>

<?php
    include('footer.php');
?>
