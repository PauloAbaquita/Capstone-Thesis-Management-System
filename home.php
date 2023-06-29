<style>
	     :root{
    --darkcolor:#393E46;
    --green:#6D9886;
    --darklight:#F2E7D5;
    --light:#F7F7F7;   
}

	.custom-menu {
        z-index: 1000;
	    position: absolute;
	    background-color: #ffffff;
	    border: 1px solid #0000001c;
	    border-radius: 5px;
	    padding: 8px;
	    min-width: 13vw;
}
a.custom-menu-list {
    width: 100%;
    display: flex;
    color: #4c4b4b;
    font-weight: 600;
    font-size: 1em;
    padding: 1px 11px;
}
	span.card-icon {
    position: absolute;
    font-size: 3em;
    bottom: .2em;
    color: #ffffff80;
}
.file-item{
	cursor: pointer;
}
a.custom-menu-list:hover,.file-item:hover,.file-item.active {
    background: #80808024;
}
table th,td{
	border-left:1px solid gray;
}
a.custom-menu-list span.icon{
		width:1em;
		margin-right: 5px
}
#home-box .card{
	background-color:var(--green);
	box-shadow:2px 2px 10px black;
	transform:scale(1)
	transition: 1s;
}
#home-box .card:hover{
	transform:scale(1.04);
}
nav li{
	color:var(--green);
	width:100%;
	margin-left:130px;
	font-size:2rem;
	font-weight:900;
}
tr{
	text-align:left;
}
th{
	border-bottom:2px solid  var(--green);
}
td{
	border-right:2px solid  var(--green);
	border-left:2px solid  var(--green);
	border-bottom:2px solid  var(--green);
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
.card-body a{
    color:white;
	font-weight:900;
	letter-spacing:-3px;
	transition:.5s; 	
	white-space:nowrap;
}
.card-body a::before{
    content:'';
	position:absolute;
    top:40%;
	width:0%;
	border:0px 10px 10px 0;
	transition:1s;
	border-bottom:5px solid var(--darkcolor);
}
.card-body:hover a::before{
	width:80%;
}
.card-body:hover a{
	letter-spacing:5px;
	color:red;
}
body{
	overflow-x:hidden;
}
.cardflex{
	background-color:var(--green);
	box-shadow:2px 2px 10px black;
	transform:scale(1)
	transition: 1s;
	margin-top:1rem;
	border-radius:5px;
	width:100vw;
	overflow:hidden;
	margin-top:100px;
}
.courses{
}
.courses h2{
	position:absolute;
	width:100%;
	top: 50%;
	left:50%;
	transform:translate(-50%,-50%);
	background-color: white;
	text-align:center;
	font-weight:900;
	color:var(--green);
}
.breadcrumb-item{
	white-space:nowrap;
	text-align:center;
	margin:0px;
	padding-left:1.2rem;
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
  <li class="breadcrumb-item ">Capstone Project/Thesis Documents Records Management System</li>
  </ol>
</nav>
<div class="containe-fluid">
	<?php include('db_connect.php') ;
	$files = $conn->query("SELECT f.*,u.name as uname FROM files f inner join users u on u.id = f.user_id where  f.is_public = 1 order by date(f.date_updated) desc");

	?>
	<div class="row" id="home-box">
		<div class="col-lg-12">
			<div class="card col-md-4 offset-2  float-left">
				<div class="card-body text-white">
					<h4><a href="index.php?page=users">User</a></h4>
					<hr>
					<span class="card-icon"><i class="fa fa-users"></i></span>
					<h3 class="text-right"><b><?php echo $conn->query('SELECT * FROM users')->num_rows ?></b></h3>
				</div>
			</div>
			<div class="card col-md-4 offset-2  ml-4 float-left" >
				<div class="card-body text-white">
					<h4><a href="index.php?page=files">No.Uploaded Records</a></h4>
					<hr>
					<span class="card-icon"><i class="fa fa-file"></i></span>
					<h3 class="text-right"><b><?php echo $conn->query('SELECT * FROM files')->num_rows ?></b></h3>
				</div>
			</div>




				<!--For Courses -->
			<div class="courses">
				<h2>Uploaded Records per Course:</h2>

				<div class="cardflex col-md-2 offset-10 ml-5 float-left">
					<div class="card-body text-white">
						<?php
						// Assuming you have already established a MySQL connection

						// Define the courses and their corresponding labels
						$courses = [
							'BSIT' => 'BSIT',
							
						];

						// Loop through each course and display the count
						foreach ($courses as $course => $label) {
							// Execute the query to get the count for the current course
							$query = "SELECT COUNT(*) as count FROM files WHERE course = '$course'";
							$result = $conn->query($query);

							// Check if the query was successful
							if ($result) {
								// Fetch the count from the result set
								$row = $result->fetch_assoc();
								$count = $row['count'];

								// Display the course label and count
								echo "<h4><a href='index.php?page=files'>$label</a></h4>";
								echo "<hr>";
								echo "<span class='card-icon'><i class='fa fa-file'></i></span>";
								echo "<h3 class='text-right'><b>{$count}</b></h3>";
							} else {
								// Handle the query error
								echo "Error executing query: " . $conn->error;
							}

							// Close the result set
							$result->close();
						}

						
						?>
					</div>
				</div>
				<div class="cardflex col-md-2 offset-2 ml-2 float-left">
					<div class="card-body text-white">
						<?php
						// Assuming you have already established a MySQL connection

						// Define the courses and their corresponding labels
						$courses = [
							'BIT-CT' => 'BIT-CT',
						
						];

						// Loop through each course and display the count
						foreach ($courses as $course => $label) {
							// Execute the query to get the count for the current course
							$query = "SELECT COUNT(*) as count FROM files WHERE course = '$course'";
							$result = $conn->query($query);

							// Check if the query was successful
							if ($result) {
								// Fetch the count from the result set
								$row = $result->fetch_assoc();
								$count = $row['count'];

								// Display the course label and count
								echo "<h4><a href='index.php?page=files'>$label</a></h4>";
								echo "<hr>";
								echo "<span class='card-icon'><i class='fa fa-file'></i></span>";
								echo "<h3 class='text-right'><b>{$count}</b></h3>";
							} else {
								// Handle the query error
								echo "Error executing query: " . $conn->error;
							}

							// Close the result set
							$result->close();
						}


						?>
					</div>
				</div>

				<div class="cardflex col-md-2 offset-2 ml-2 float-left">
					<div class="card-body text-white">
						<?php
						// Assuming you have already established a MySQL connection

						// Define the courses and their corresponding labels
						$courses = [
							'BEED' => 'BEED',
							
						];

						// Loop through each course and display the count
						foreach ($courses as $course => $label) {
							// Execute the query to get the count for the current course
							$query = "SELECT COUNT(*) as count FROM files WHERE course = '$course'";
							$result = $conn->query($query);

							// Check if the query was successful
							if ($result) {
								// Fetch the count from the result set
								$row = $result->fetch_assoc();
								$count = $row['count'];

								// Display the course label and count
								echo "<h4><a href='index.php?page=files'>$label</a></h4>";
								echo "<hr>";
								echo "<span class='card-icon'><i class='fa fa-file'></i></span>";
								echo "<h3 class='text-right'><b>{$count}</b></h3>";
							} else {
								// Handle the query error
								echo "Error executing query: " . $conn->error;
							}

							// Close the result set
							$result->close();
						}

					
						?>
					</div>
				</div>

				<div class="cardflex col-md-2 offset-2 ml-2 float-left">
					<div class="card-body text-white">
						<?php
						// Assuming you have already established a MySQL connection

						// Define the courses and their corresponding labels
						$courses = [
							'BSED-MATH' => 'BSED-MATH',
						];

						// Loop through each course and display the count
						foreach ($courses as $course => $label) {
							// Execute the query to get the count for the current course
							$query = "SELECT COUNT(*) as count FROM files WHERE course = '$course'";
							$result = $conn->query($query);

							// Check if the query was successful
							if ($result) {
								// Fetch the count from the result set
								$row = $result->fetch_assoc();
								$count = $row['count'];

								// Display the course label and count
								echo "<h4><a href='index.php?page=files'>$label</a></h4>";
								echo "<hr>";
								echo "<span class='card-icon'><i class='fa fa-file'></i></span>";
								echo "<h3 class='text-right'><b>{$count}</b></h3>";
							} else {
								// Handle the query error
								echo "Error executing query: " . $conn->error;
							}

							// Close the result set
							$result->close();
						}

					
						?>
					</div>
				</div>

				<div class="cardflex col-md-2 offset-2 ml-2 float-left">
					<div class="card-body text-white">
						<?php
						// Assuming you have already established a MySQL connection

						// Define the courses and their corresponding labels
						$courses = [
							'BTLED' => 'BTLED'
						];

						// Loop through each course and display the count
						foreach ($courses as $course => $label) {
							// Execute the query to get the count for the current course
							$query = "SELECT COUNT(*) as count FROM files WHERE course = '$course'";
							$result = $conn->query($query);

							// Check if the query was successful
							if ($result) {
								// Fetch the count from the result set
								$row = $result->fetch_assoc();
								$count = $row['count'];

								// Display the course label and count
								echo "<h4><a href='index.php?page=files'>$label</a></h4>";
								echo "<hr>";
								echo "<span class='card-icon'><i class='fa fa-file'></i></span>";
								echo "<h3 class='text-right'><b>{$count}</b></h3>";
							} else {
								// Handle the query error
								echo "Error executing query: " . $conn->error;
							}

							// Close the result set
							$result->close();
						}

					
						?>
					</div>
				</div>
			</div>


				



		</div>
		
	</div>

	<div class="row mt-3 ml-3 mr-3">
			<div class="card col-md-12">
				<div class="card-body">
					<table width="100%">
						
						<tr>
							<th  width="12%" class="">Uploader</th>
							<th width="21%" class="">File</th>
							<th width="20%" class="">Project Name</th>
							<th width="25%" class="">Date Upload</th>
							<th width="40%" class="">Abstract</th>
							
						</tr>
						<?php 
					while($row=$files->fetch_assoc()):
						$name = explode(' ||',$row['name']);
						$name = isset($name[1]) ? $name[0] ." (".$name[1].").".$row['file_type'] : $name[0] .".".$row['file_type'];
						$img_arr = array('png','jpg','jpeg','gif','psd','tif');
						$doc_arr =array('doc','docx');
						$pdf_arr =array('pdf','ps','eps','prn');
						$icon ='fa-file';
						if(in_array(strtolower($row['file_type']),$img_arr))
							$icon ='fa-image';
						if(in_array(strtolower($row['file_type']),$doc_arr))
							$icon ='fa-file-word';
						if(in_array(strtolower($row['file_type']),$pdf_arr))
							$icon ='fa-file-pdf';
						if(in_array(strtolower($row['file_type']),['xlsx','xls','xlsm','xlsb','xltm','xlt','xla','xlr']))
							$icon ='fa-file-excel';
						if(in_array(strtolower($row['file_type']),['zip','rar','tar']))
							$icon ='fa-file-archive';

					?>
						<tr class='file-item' data-id="<?php echo $row['id'] ?>" data-name="<?php echo $name ?>">
							<td><i><?php echo ucwords($row['uname']) ?></i></td>
							<td><large><span><i class="fa <?php echo $icon ?>"></i></span><b> <?php echo $name ?></b></large>
							<input type="text" class="rename_file" value="<?php echo $row['name'] ?>" data-id="<?php echo $row['id'] ?>" data-type="<?php echo $row['file_type'] ?>" style="display: none">

							</td>
							<td><i><?php echo $row['projectname'] ?></i></td>
							<td><i><?php echo date('Y/m/d h:i A',strtotime($row['date_updated'])) ?></i></td>
							<td><i><?php echo $row['description'] ?></i></td>
						</tr>
							
					<?php endwhile; ?>
					</table>
					
				</div>
			</div>
			
		</div>
	</div>

</div>


<!--<div id="menu-file-clone" style="display: none;">
	<a href="javascript:void(0)" class="custom-menu-list file-option download"><span><i class="fa fa-download"></i> </span>Download</a>
</div>
<script>
	//FILE
	$('.file-item').bind("contextmenu", function(event) { 
    event.preventDefault();

    $('.file-item').removeClass('active')
    $(this).addClass('active')
    $("div.custom-menu").hide();
    var custom =$("<div class='custom-menu file'></div>")
        custom.append($('#menu-file-clone').html())
        custom.find('.download').attr('data-id',$(this).attr('data-id'))
    custom.appendTo("body")
	custom.css({top: event.pageY + "px", left: event.pageX + "px"});

	
	$("div.file.custom-menu .download").click(function(e){
		e.preventDefault()
		window.open('download.php?id='+$(this).attr('data-id'))
	})

	

})
	$(document).bind("click", function(event) {
    $("div.custom-menu").hide();
    $('#file-item').removeClass('active')

});
	$(document).keyup(function(e){

    if(e.keyCode === 27){
        $("div.custom-menu").hide();
    $('#file-item').removeClass('active')

    }
})
</script>-->
<script>
	$(document).ready(function(){

	//Add this code to handle click event on files
	$('.file-item').on('click', function() {
		var fileName = $(this).data('name');
		var fileExt = fileName.split('.').pop().toLowerCase();
		if (fileExt === 'docx') {
			//For docx files, trigger download by creating an anchor element dynamically
			var fileUrl = 'assets/uploads/' + fileName;
			var link = document.createElement("a");
			link.download = fileName;
			link.href = fileUrl;
			document.body.appendChild(link);
			link.click();
			document.body.removeChild(link);
		} else if (['pdf', 'png', 'jpg', 'jpeg', 'gif'].includes(fileExt)) {
			//For pdf and image files, open a new tab and show preview
			var fileUrl = 'assets/uploads/' + fileName;
			window.open(fileUrl, '_blank');
		}
	});
});

</script>
