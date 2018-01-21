<html>
	<head>
		<title>afterlogin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<h2 align="center">Fill the following details</h2>
					<div class="well">
						<form action="afterlogin.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="name">name</label>
								<input type="text" class="form-control" name="name">
							</div>
							<div class="form-group">
								<label for="email">email</label>
								<input type="text" class="form-control" name="email">
							</div>
							<div class="form-group">
								<label for="city">city/town</label>
								<input type="text" class="form-control" name="city">
							</div>
							<div class="form-group">
								<label for="district">district</label>
								<input type="text" class="form-control" name="district">
							</div>
							<div class="form-group">
								<label for="state">state</label>
								<input type="text" class="form-control" name="state">
							</div>
							<div class="form-group">
								<label for="pin">pin</label>
								<input type="text" class="form-control" name="pin">
							</div>
							<div class="form-group">
								<label for="contact">contact no</label>
								<input type="text" class="form-control" name="contact_no">
							</div>
							<div class="form-group">
								<label for="file">upload your photo</label>
								<input type="file" class="form-control" name="file">
							</div>
							<div class="form-group">
							<button class="btn btn-success btn-block" type="submit" name="submit">
							submit
							</button>
                            </div>
                            <div class="form-group">
							<button class="btn btn-success btn-block" type="submit" name="submit">
							<a href="login.php">logout</a>
							</button>
                            </div>
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
	$city=$_POST['city'];
	$district=$_POST['district'];
	$state=$_POST['state'];
	$pin=$_POST['pin'];
	$contact_no=$_POST['contact_no'];
	$filename=$_FILES['file']['name'];
	$type=$_FILES['file']['type'];
	$size=$_FILES['file']['size'];
	$tmp=$_FILES['file']['tmp_name'];
	if($filename=='')
	{
		echo "<script>alert('select a file')</script>";
		exit();
	}
	if(($type=="image/jpeg") || ($type=="image/png") || ($type=="image/gif"))
	{
		if($size<=1024000)
		{
			move_uploaded_file($tmp,"$filename");
		}
		else
		{
			echo "<script>alert('file size must not greater than 10 mb')</script>";
		}
	}
	else
	{
		echo "<script>alert('$type is not valid file type <br> upload only jpeg,png and gif type file')</script>";
	}
	
	$query="insert into profile(NAME,EMAIL,CITY,DISTRICT,STATE,PIN,PHONE)values('$name','$email','$city','$district','$state','$pin','$contact_no')";
	
	if(mysqli_query($conn,$query))
	{
		echo "<script>alert('data submitted successfully')</script>";
	}
}
?>