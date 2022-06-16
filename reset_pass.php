<?php
session_start();
include './connection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form-gap {
            padding-top: 70px;
}
    </style>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" style="background:#000;">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</body>
</html>
<?php
if(isset($_POST['recover-submit'])){
    $email = $_POST['email'];
    $selectquery = " SELECT * FROM `userslist` WHERE email='$email' ";
    $query = mysqli_query($con,$selectquery);
    $data = mysqli_fetch_assoc($query);
    if($data){
        $to = $email;
        $subject = "Reset Your Password";

        $message = "Click the link below to reset your password."  .  "\r\n"  .
            "<h5>Click here: <a href='localhost/phpprojects/meritomaths/pass_reset.php?token=".$data['token']."'>Reset</a>" . "</h5>";
        $headers = 'From: rakeshkumar1957830@gmail.com'       . "\r\n" .
        'Reply-To: rakeshkumar1957830@gmail.com' . "\r\n" .
        "Content-type: text/html" . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
            
        if( mail($to, $subject, $message, $headers) == true ) {
          echo "Check your email to reset the password.";
        }else {
        ?>
        <script>
          alert("Email not sent!!!");
        </script>
        <?php
        }
    }else{
        ?>
        <script>
            alert("Email not registered!!!");
        </script>
        <?php
    }
}
?>