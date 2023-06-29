<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 5px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
#adminapryl{
  background-color:var(--darkcolor);
}
.container-fluid a{
   margin-top:-12px;
   position: absolute;
   padding:1rem;
   border-radius:10px;
   overflow:hidden;

}

.container-fluid a::before{
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
   isolation:isolate;
   z-index: -1;
}
.container-fluid a:hover::before{
   clip-path:circle(100px at center);

}
</style>

<nav class="navbar navbar-dark fixed-top " style="padding:0;" id="adminapryl">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<img width="45" src="assets/img/CTU_new_logo-removebg-preview.png">
  		</div>
	  	<div class="col-md-2 mt-2 float-right">
	  		<a class="text-light" href="ajax.php?action=logout"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
</nav>