<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
<style>
	:root{
    --darkcolor:#393E46;
    --green:#6D9886;
    --darklight:#F2E7D5;
    --light:#F7F7F7;   
}
	nav{
		padding-top:100px;
		z-index: 1 ;
	}
	#sidebar{
		margin-top:5px;
		background-color:var(--green);	
	}
	
	.sidebar-list{
		position:relative;
	}

</style>

<nav id="sidebar" >
		
		<div class="sidebar-list">

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Dashboard</a>
				<a href="index.php?page=files" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Records</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
				<a href="about-us.php" class="nav-item nav-about-us"><span class='icon-field'><i class="fa fa-info"></i></span> About Us</a>

			<?php endif; ?>
				
		</div>
	

</nav>


</body>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
	document.addEventListener("DOMContentLoaded", function() {
    const icon = document.querySelector('.hamburger img');
    const move = document.getElementById('sidebar');

    icon.addEventListener("click",function(){
        move.classList.toggle('active');
    });
});

</script>
	
</html>