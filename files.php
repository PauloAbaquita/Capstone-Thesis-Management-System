<?php
include 'db_connect.php';
$folder_parent = isset($_GET['fid']) ? $_GET['fid'] : 0;
$folders = $conn->query("SELECT * FROM folders WHERE parent_id = $folder_parent AND user_id = '" . $_SESSION['login_id'] . "' ORDER BY name ASC");

$search_value = isset($_GET['search']) ? $_GET['search'] : '';

$files_query = "SELECT * FROM files WHERE folder_id = $folder_parent AND user_id = '" . $_SESSION['login_id'] . "'";

if (!empty($search_value)) {
    $files_query .= " AND (name LIKE '%$search_value%' OR projectname LIKE '%$search_value%' OR advisersname LIKE '%$search_value%' OR yearpublished LIKE '%$search_value%' OR course LIKE '%$search_value%' OR authors LIKE '%$search_value%' OR dateuploaded LIKE '%$search_value%' OR description LIKE '%$search_value%')";
}

$files_query .= " ORDER BY name ASC";
$files = $conn->query($files_query);
?>
<style>
		     :root{
    --darkcolor:#393E46;
    --green:#6D9886;
    --darklight:#F2E7D5;
    --light:#F7F7F7;   
}
	.folder-item{
		cursor: pointer;
	}
	.folder-item:hover{
		background: #eaeaea;
	    color: black;
	    box-shadow: 3px 3px #0000000f;
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
.file-item{
	cursor: pointer;
}
a.custom-menu-list:hover,.file-item:hover,.file-item.active {
    background: #80808024;
}
/*table th,td{
	/*border-left:1px solid gray;
}*/
a.custom-menu-list span.icon{
		width:1em;
		margin-right: 5px
}
.breadcrumb-item a{
	color:#6D9886;
	font-size:2rem;
	font-weight:900;
	margin-left:350%;
}


.button-container{
	display:flex;
}
.button {	
	position:relative;
	overflow:hidden;
}
.button #new_folder{
   margin-top:-12px;
   padding:1rem;
   border-radius:10px;
   z-index: 1;
   color:var(--green);
   margin-top:2px;
   font-weight:900;
}

.button #new_folder::before{
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
.button #new_folder:hover::before{
   clip-path:circle(100px at center);

}

.button #new_file{
   margin-top:-12px;
   padding:1rem;
   border-radius:10px;
   z-index: 1;
   color:var(--green);
   margin-top:2px;
   font-weight:900;
}

.button #new_file::before{
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
.button #new_file:hover::before{
   clip-path:circle(100px at center);
}
.searchbar{
	position: absolute;
	width:100vw;
	z-index: 1;
	caret-color:var(--green);
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
.card{
	background-color:var(--green);
	transition:.5s;
}
.dropdown-menu a{
	position: relative;
	padding:1rem;
}
.files-and-folders{
	color:var(--darklight)
}
body{
	overflow-x:hidden;
}
.action{
	pointer-events:none;
	
}
</style>
<nav aria-label="breadcrumb ">
  <ol class="breadcrumb">
  
<?php 
	$id=$folder_parent;
	while($id > 0)
	{ 

	$path = $conn->query("SELECT * FROM folders where id = $id  order by name asc")->fetch_array(); 
?>
	<li class="breadcrumb-item "><?php echo $path['name']; ?></li>
<?php
	$id = $path['parent_id'];	
	} 
?> 
	<li class="breadcrumb-item">
		<a class="" href="index.php?page=files">RECORDS</a>
	</li>
  </ol>
</nav>

<div class = "box2-content">
	
					  <div class = "marquee-wrapper">
						<div class = "marquee">
							<div class = "marquee-group"> <
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
<div class="container-fluid">
	<div class="col-lg-12">

		<div class="button-container" >
			<div class="button">
			<button class="btn btn-sm" id="new_folder"><i class="fa fa-plus"></i> New Folder</button>
			</div>
			<div class="button">
			<button class="btn  btn-sm ml-4" id="new_file"><i class="fa fa-upload"></i> Upload Record</button>
			</div>
		</div>
		<hr>
		<div class="searchbar">
			<div class="col-lg-12">
			<div class="col-md-4 input-group offset-5">
                  <input type="text" placeholder="search" class="form-control" id="search" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?php echo $search_value; ?>">
                       <div class="input-group-append">
                             <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-search"></i></span>
                       </div>
            </div>
			</div>
		</div>
		<div class="files-and-folders">
			<div class="col-md-12" ><h4><b>Files and Folders</b></h4></div>
		</div>
		<hr>
		<div class="row">
			<?php 
			while($row=$folders->fetch_assoc()):
			?>
				<div class="card col-md-3 mt-2 ml-2 mr-2 mb-2 folder-item" data-id="<?php echo $row['id'] ?>">
					<div class="card-body">	
							<large><span><i class="fa fa-folder"></i></span><b class="to_folder"> <?php echo $row['name'] ?></b></large>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<hr>
		<div class="wholebody" >
			<div class="card col-md-12" id="oten">
				<div class="card-body">
					<table width="100%">
						<tr>
							<th width="10%" class="">File</th>	
							<th width="13%" class="">Project Name</th>
							<th width="16%" class="">Adviser's Name</th>					
							<th width="16%" class="">Year Published</th>													
							<th width="11%" class="">Course</th>
							<th width="10%" class="">Author</th>
							<th width="10%" class="">Date Uploaded</th>
							<th width="20%" class="">Abstract</th>
							<th width="10%" class="">Action</th>
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
							<td><large><span><i class="fa <?php echo $icon ?>"></i></span><b class="to_file"> <?php echo $name ?></b></large>
							<input type="text" class="rename_file" value="<?php echo $row['name'] ?>" data-id="<?php echo $row['id'] ?>" data-type="<?php echo $row['file_type'] ?>" style="display: none">
							
						</td>
							<td class="to_file"><?php echo $row['projectname'] ?></td>
							<td class="to_file"><?php echo $row['advisername'] ?></td>
							<td class="to_file"><?php echo $row['yearpub'] ?></td>
							<td class="to_file"><?php echo $row['course'] ?></td>
							<td class="to_file"><?php echo $row['author'] ?></td>			
							<td class="to_file"><?php echo date('Y/m/d h:i A',strtotime($row['date_updated'])) ?></td>
							<td class="to_file"><?php echo $row['description'] ?></td>
							<!--<td class="action"><a href="#" class="update-file">Update</a></td>
							<td class="action"><a href="#" class="delete-file">Delete</a></td>-->
							<td>
				 		<center>
								<div class="btn-group">
								  <button type="button" class="action btn-success">Action</button>
								  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item update-file" href="javascript:void(0)">Update</a>
								    <div class="dropdown-divider"></div>
								    <a class="dropdown-item delete-file" href="javascript:void(0)">Delete</a>
								  </div>
								</div>
								</center>			
				 	    </td>
						</tr>	
					<?php endwhile; ?>
					</table>
				</div>
			</div>	
		</div>
	</div>
</div>
<div id="menu-folder-clone" style="display: none;">
	<a href="javascript:void(0)" class="custom-menu-list file-option edit">Update</a>
	<a href="javascript:void(0)" class="custom-menu-list file-option delete">Delete</a>
</div>
<div id="menu-file-clone" style="display: none;">
	<a href="javascript:void(0)" class="custom-menu-list file-option edit"><span><i class="fa fa-edit"></i> </span>Edit File Name</a>
	<a href="javascript:void(0)" class="custom-menu-list file-option download"><span><i class="fa fa-download"></i> </span>Download</a>
	<a href="javascript:void(0)" class="custom-menu-list file-option delete"><span><i class="fa fa-trash"></i> </span>Delete</a>
</div>

<script>
	$('#new_folder').click(function(){
		uni_modal('','manage_folder.php?fid=<?php echo $folder_parent ?>')
	})
	$('#new_file').click(function(){
		uni_modal('','manage_files.php?fid=<?php echo $folder_parent ?>')
	})
	$('.folder-item').dblclick(function(){
		location.href = 'index.php?page=files&fid='+$(this).attr('data-id')
	})
	$('.folder-item').bind("contextmenu", function(event) { 
    event.preventDefault();
    $("div.custom-menu").hide();
    var custom =$("<div class='custom-menu'></div>")
        custom.append($('#menu-folder-clone').html())
        custom.find('.edit').attr('data-id',$(this).attr('data-id'))
        custom.find('.delete').attr('data-id',$(this).attr('data-id'))
    custom.appendTo("body")
	custom.css({top: event.pageY + "px", left: event.pageX + "px"});

	$("div.custom-menu .edit").click(function(e){
		e.preventDefault()
		uni_modal('Rename Folder','manage_folder.php?fid=<?php echo $folder_parent ?>&id='+$(this).attr('data-id') )
	})
	$("div.custom-menu .delete").click(function(e){
		e.preventDefault()
		_conf("Are you sure to delete this Folder?",'delete_folder',[$(this).attr('data-id')])
	})
})

// Delete file
$('.delete-file').click(function(e) {
    e.preventDefault();
    var fileId = $(this).closest('.file-item').attr('data-id');
    _conf("Are you sure to delete this file?", 'delete_file', [fileId]);
  });

  $('.update-file').click(function(e) {
	var fileId = $(this).closest('.file-item').attr('data-id');
		if($(this).find('input.rename_file').is(':visible') == true)
    	return false;
		uni_modal($(this).attr('data-name'),'manage_files.php?<?php echo $folder_parent ?>&id='+[fileId])
	})
	$(document).bind("click", function(event) {
    $("div.custom-menu").hide();
    $('#file-item').removeClass('active')
  });

	//FILE
	$('.file-item').bind("contextmenu", function(event) { 
    event.preventDefault();

    $('.file-item').removeClass('active')
    $(this).addClass('active')
    $("div.custom-menu").hide();
    var custom =$("<div class='custom-menu file'></div>")
        custom.append($('#menu-file-clone').html())
        custom.find('.edit').attr('data-id',$(this).attr('data-id'))
        custom.find('.delete').attr('data-id',$(this).attr('data-id'))
        custom.find('.downsload').attr('data-id',$(this).attr('data-id'))
    custom.appendTo("body")
	custom.css({top: event.pageY + "px", left: event.pageX + "px"});
	/*
	$("div.file.custom-menu .edit").click(function(e){
		e.preventDefault()
		$('.rename_file[data-id="'+$(this).attr('data-id')+'"]').siblings('large').hide();
		$('.rename_file[data-id="'+$(this).attr('data-id')+'"]').show();
	})
	$("div.file.custom-menu .delete").click(function(e){
		e.preventDefault()
		_conf("Are you sure to delete this file?",'delete_file',[$(this).attr('data-id')])
	})
	$("div.file.custom-menu .download").click(function(e){
		e.preventDefault()
		window.open('download.php?id='+$(this).attr('data-id'))
	})

	$('.rename_file').keypress(function(e){
		var _this = $(this)
		if(e.which == 13){
			start_load()
			$.ajax({
				url:'ajax.php?action=file_rename',
				method:'POST',
				data:{id:$(this).attr('data-id'),name:$(this).val(),type:$(this).attr('data-type'),folder_id:'<?php echo $folder_parent ?>'},
				success:function(resp){
					if(typeof resp != undefined){
						resp = JSON.parse(resp);
						if(resp.status== 1){
								_this.siblings('large').find('b').html(resp.new_name);
								end_load();
								_this.hide()
								_this.siblings('large').show()
						}
					}
				}
			})
		}
	})
*/
})
/*
//FILE
	$('.file-item').click(function(){
		if($(this).find('input.rename_file').is(':visible') == true)
    	return false;
		uni_modal($(this).attr('data-name'),'manage_files.php?<?php echo $folder_parent ?>&id='+$(this).attr('data-id'))
	})
	$(document).bind("click", function(event) {
    $("div.custom-menu").hide();
    $('#file-item').removeClass('active')
});
*/
	$(document).keyup(function(e){

    if(e.keyCode === 27){
        $("div.custom-menu").hide();
    $('#file-item').removeClass('active')

    }

});
	$(document).ready(function(){
		$('#search').keyup(function(){
			var _f = $(this).val().toLowerCase()
			$('.to_folder').each(function(){
				var val  = $(this).text().toLowerCase()
				if(val.includes(_f))
					$(this).closest('.card').toggle(true);
					else
					$(this).closest('.card').toggle(false);		
			})
			$('.to_file').each(function(){
				var val  = $(this).text().toLowerCase()
				if(val.includes(_f))
					$(this).closest('tr').toggle(true);
					else
					$(this).closest('tr').toggle(false);

				
			})
		})
	})
	function delete_folder($id){
		start_load();
		$.ajax({
			url:'ajax.php?action=delete_folder',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp == 1){
					alert_toast("Folder successfully deleted.",'success')
						setTimeout(function(){
							location.reload()
						},1500)
				}
			}
		})
	}
	
	function delete_file($id){
		start_load();
		$.ajax({
			url:'ajax.php?action=delete_file',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp == 1){
					alert_toast("Files successfully deleted.",'success')
						setTimeout(function(){
							location.reload()
						},1500)
				}
			}
			
		})
	}
</script>

<script>
    $(document).ready(function(){
        $('#search').keyup(function(){
            var _f = $(this).val().toLowerCase();
            $('table tr:gt(0)').each(function(){ // Start from the second row (index 1)
                var found = false;
                $(this).find('td').each(function(){
                    var val = $(this).text().toLowerCase();
                    if (val.includes(_f)) {
                        found = true;
                        return false; // Exit the inner loop if a match is found in any cell
                    }
                });
                if (found) {
                    $(this).fadeIn();
                } else {
                    $(this).fadeOut();
                }
            });
        });
    });
</script>

<!-- For Viewing or Downloading 
<script>
	$(document).ready(function() {
  // Add click event handler for file items
  $('.view.file-item').on('click', function(event) {
    event.preventDefault();

    var fileName = $(this).text().trim().substring(5); // Extract the file name from the link text
    var fileExt = fileName.split('.').pop().toLowerCase();

    if (fileExt === 'docx') {
      // For docx files, trigger download by creating an anchor element dynamically
      var fileUrl = 'assets/uploads/' + fileName;
      var link = document.createElement('a');
      link.download = fileName;
      link.href = fileUrl;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    } else if (['pdf', 'png', 'jpg', 'jpeg', 'gif'].includes(fileExt)) {
      // For pdf and image files, open a new tab and show preview
      var fileUrl = 'assets/uploads/' + fileName;
      window.open(fileUrl, '_blank');
    }
  });
});
</script> -->




