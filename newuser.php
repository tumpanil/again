<html>
	<head>
		<title>new user</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h2 align="center">Create your account</h2>
					<div class="well">
						<form  method="post">
							<div class="form-group">
								<label for="name">name</label>
								<input type="text" class="form-control" placeholder="enter your name" name="name" required>
							</div>
							<div class="form-group">
								<label for="email">email</label>
								<input type="email" class="form-control" placeholder="enter your email" name="email" required>
							</div>
							<div class="form-group">
								<label for="password">password</label>
								<input type="password" class="form-control" placeholder="enter your password" name="pass" required>
							</div>
							<button class="btn btn-success btn-block" type="submit" name="submit">
							Create account
							</button>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"phpform");
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=md5($_POST['pass']);
	$query1="select * from us where user_email='$email'";
	$run=mysqli_query($conn,$query1);
	if(mysqli_num_rows($run)==1){
		echo "<script>alert('email already exits','_self')</script>";
		exit();
	}
	else
	{
		$query="insert into us(user_email,	user_name,user_pass)values('$email','$name',' $password')";
		if(mysqli_query($conn,$query)){
            echo "<script>alert('you are registered successfully','afterlogin.php')</script>";
			echo "<script>window.open('afterlogin.php','_self')</script>";
            
		}
	}
}
?>