<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin</title>
 	

<?php include('./header.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");
?>

</head>
<style>
	 :root{
    --darkcolor:#393E46;
    --green:#6D9886;
    --darklight:#F2E7D5;
    --light:#F7F7F7;   
}
body{
	overflow-x:hidden;

}
.whole{
		position: relative;
}
.backgroundimg img{
	position: absolute;
	backdrop-filter: blur(10px);
	width:100vw;
	height:100v;
}

section{
	position: absolute;
	top:50%;
	left:50%;
	transform:translate(-50%,25%)
	
}
#login-form{

	background-color:var(--green);
	padding:3rem;
	border-radius:20px;
	box-shadow:5px 5px 10px black;
}
</style>

<body>

  <main id="main">
	<div class ="whole">
		<div class ="backgroundimg">
			<img src="assets\img\background login.png">
	</div>
    <section>				
				<form id="login-form" >
								
								<div class="form-group">
								<h4 class=" text-center"><b>Admin Login</b></h4>
								<br>
									<br>
									<label for="username" class="control-label ">Username</label>
									<input type="text" id="username" name="username" class="form-control">
								</div>
								<div class="form-group">
									<label for="password" class="control-label">Password</label>
									<input type="password" id="password" name="password" class="form-control">
								</div>
								<center><button class="btn-sm btn-block btn-wave col-md-4 btn-success">Login</button></center>
							</form>
	</section>
	</div>
	
  	
  </main>



</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.reload('index.php?page=home');
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>