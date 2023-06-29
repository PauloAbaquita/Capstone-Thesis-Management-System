<style>
	<style>
	:root{
    --darkcolor:#393E46;
    --green:#6D9886;
    --darklight:#F2E7D5;
    --light:#F7F7F7;   
}
body{
}
	.breadcrumb{
		color:#6D9886;
		font-weight:900;
		font-size:2rem;
	    padding-left: 45%;
		margin-top:100px;
	}
.btn {	
	position:relative;
	overflow:hidden;
}
 #new_user{
   margin-top:-12px;
   padding:1rem;
   border-radius:10px;
   z-index: 1;
   color:#6D9886;
   margin-top:2px;
   font-weight:900;
}

 #new_user::before{
   content:'';
   position:absolute;
   top:50%;
   left:0%;
   transform:translate(-50%,-50%);
   width:500px;
   height:100%;
   clip-path:circle(0px at center);
   background-color:#393E46;
   transition:.4s;
z-index: -1;
}
 #new_user:hover::before{
   clip-path:circle(100px at center);
}
.card{
	background-color:transparent;
    border:transparent;
	color:#393E46;
}
table{
	background-color:#6D9886;

}
.dropdown-menu a{
	position: relative;
	padding:1rem;
}
.box2-content{
    position: absolute;
    top: 17%;
	left:15%;
    transform: translateY(-50%);
    width: 100vw;
    height: 100%;
    border-radius: 46% 54% 100% 0% / 0% 100% 0% 100% ;
   overflow: hidden;

}
.marquee-wrapper{
    margin: auto;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}
.marquee{
    display: flex;
    width: 100vw;
}
.marquee-group{
    display: flex;
    justify-content: space-around;
    min-width: 100%;
    animation: slide 10s linear infinite;
   
}

.marquee-group img{
    height: 100px;

}
@keyframes slide {
    0%{
        transform: translateX(0);
    }
    100%{
        transform: translateX(-100%);
    }
}
body{
	 overflow:hidden;
}

</style>

<div class = "box2-content">
	
					  <div class = "marquee-wrapper">
						<div class = "marquee">
							<div class = "marquee-group">
							  <img src="assets/img/CTU_new_logo-removebg-preview.png" alt="">
						      <img src="assets/img/educ-removebg-preview.png" alt="">
						   	  <img src="assets/img/logo-removebg-preview.png" alt="">
							</div>
							<div class = "marquee-group">
							  <img src="assets/img/CTU_new_logo-removebg-preview.png" alt="">
						      <img src="assets/img/educ-removebg-preview.png" alt="">
						   	  <img src="assets/img/logo-removebg-preview.png" alt="">
							</div>
						</div>
					  </div>
					 </div>

<nav aria-label="breadcrumb ">
  <ol class="breadcrumb">
  <li class="breadcrumb-item ">USERS</li>
  </ol>
</nav>
<div class="container-fluid">
	
	<div class="row">
	<div class="col-lg-12">
			<button class="btn float-right btn-md" id="new_user"><i class="fa fa-plus"></i> New user</button>
	</div>
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Name</th>
					<th class="text-center">Username</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include 'db_connect.php';
 					$users = $conn->query("SELECT * FROM users order by name asc");
 					$i = 1;
 					while($row= $users->fetch_assoc()):
				 ?>
				 <tr>
				 	<td>
				 		<?php echo $i++ ?>
				 	</td>
				 	<td>
				 		<?php echo $row['name'] ?>
				 	</td>
				 	<td>
				 		<?php echo $row['username'] ?>
				 	</td>
				 	<td>
				 		<center>
								<div class="btn-group">
								  <button type="button" class="btn ">Action</button>
								  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
								    <div class="dropdown-divider"></div>
								    <a class="dropdown-item delete_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
								  </div>
								</div>
								</center>
								
				 	</td>
				 </tr>
				<?php endwhile; ?>
			</tbody>
		</table>
			</div>
		</div>
	</div>

</div>
<script>
	
$('#new_user').click(function(){
	uni_modal('New User','manage_user.php')
})
$('.edit_user').click(function(){
	uni_modal('Edit User','manage_user.php?id='+$(this).attr('data-id'))
})

$('.delete_user').click(function(){
        var user_id = $(this).attr('data-id');
        if(confirm('Are you sure you want to delete this user?')){
            $.ajax({
                url: 'delete_user.php',
                method: 'POST',
                data: { id: user_id },
                success:function(resp){
                    if(resp == 1){
                        alert('User deleted successfully.');
                        location.reload();
                    } else {
                        alert('Error deleting user.');
                    }
                }
            });
        }
    });
</script>

</script>