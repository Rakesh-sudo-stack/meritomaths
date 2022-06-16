<?php
session_start();
include './connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='./img/logo.png' rel='icon' type='image/x-icon'/>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: #3598dc;
}
.form-control {
	min-height: 41px;
	background: #f2f2f2;
	box-shadow: none !important;
	border: transparent;
}
.form-control:focus {
	background: #e2e2e2;
}
.form-control, .btn {        
	border-radius: 2px;
}
.login-form {
	width: 350px;
	margin: 30px auto;
	text-align: center;
}
.login-form h2 {
	margin: 10px 0 25px;
}
.login-form form {
	color: #7a7a7a;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.login-form .btn {        
	font-size: 16px;
	font-weight: bold;
	background: #3598dc;
	border: none;
	outline: none !important;
}
.login-form .btn:hover, .login-form .btn:focus {
	background: #2389cd;
}
.login-form a {
	color: #fff;
	text-decoration: underline;
}
.login-form a:hover {
	text-decoration: none;
}
.login-form form a {
	color: #7a7a7a;
	text-decoration: none;
}
.login-form form a:hover {
	text-decoration: underline;
}
</style>
</head>
<body>
<div class="login-form">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <h2 class="text-center">Login</h2>   
        <div class="form-group has-error">
			<?php
				if(isset($_SESSION['email'])){

				
			?>
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required" value="<?php echo $_SESSION['email']; ?>">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required" value="<?php echo $_SESSION['password']; ?>">
			<?php
				}else{
					?><input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
			<?php
				}
			?>
        </div>        
        <div class="form-group">
            <button name="signin" type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
			
        </div>
        <p><a href="reset_pass.php">Lost your Password?</a></p>
    </form>
    <p class="text-center small">Don't have an account? <a href="signup.php">Sign up here!</a></p>
</div>
</body>
</html>
<?php
if(isset($_POST['signin'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	$selectquery = " SELECT * FROM `userslist` WHERE email='$email' ";
	$query = mysqli_query($con,$selectquery);
	$res = mysqli_fetch_assoc($query);

	if($res){
		$hashedpass = $res['password'];
		if(password_verify($password,$hashedpass)){
			$_SESSION['name'] = $res['name'];
			$_SESSION['email'] = $email;
			$_SESSION['post'] = $res['post'];
			?>
			<script>
				alert("Logged In");
			</script>
			<?php
			header("location:index.php");
		}else{
			?>
			<script>
				alert("Password is incorrect");
			</script>
			<?php
		}
	}else{
		?>
		<script>
			alert("Email Address not registered!!!");
		</script>
		<?php
	}
}
?>