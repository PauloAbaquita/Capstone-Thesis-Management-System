<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
            <style>
            :root{
    --darkcolor:#393E46;
    --green:#6D9886;
    --darklight:#F2E7D5;
    --light:#F7F7F7;
    
}

*{
    padding: 0;
    box-sizing: 0;
    margin: 0;
    
}
.center{
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: radial-gradient(circle, var(--darkcolor), var(--green),var(--darkcolor));

}
.box{
    background-color: var(--darklight);
    border-radius: 50px;
    width: 80%;
    height: 80vh;
    overflow: hidden;
    box-shadow: 2px 2px 60px black;
}
.header1{
   display: flex;
   justify-content: space-between;
   align-items: center  ;
   padding: 0rem 5rem;
   margin-top: 20px;
   position: relative;
}
.header1 img{
    width: 8%;
    background-color: var(--darkcolor);
    padding:.5rem;
    border-radius: 20px 20px 0px 0px;
    box-shadow: 4px -8px 10px black;
}
.header1 a{
    position: absolute;
    top: 34px;
    left: 1078px;
    transform: translate(-92%,0);
    border-radius: 20px 20px 0px 0px;
    background-color: var(--green);
    padding: 2.2rem;
    color: var(--light);
    text-decoration: none;
    width: 9%;
    font-size: 1.2rem;
    box-shadow: 6px 2px 10px black;
    text-align: center;
    transition: 1s cubic-bezier(0.19, 1, 0.22, 1);
    font-family: poppins,sans-serif;
}
.header1 a:hover{
    top: 13%;
    color: var(--darkcolor);
}
.content{
    height: 100%;
    width: 1150px;
    background-color: var(--darkcolor);
     display: grid;
    grid-template-columns:1fr 1fr;
}
.box1{
    width: 200px;
    position: relative;
    
}
.box1 h1{
    position: absolute;
    top: 40%;
    left: 150%;
    transform: translate(-50%,-50%);
    font-size: 40px;
    width: 400px;
    font-family: poppins,sans-serif;
    color: var(--light);
}

.box2{
    position: relative;
    margin-left:300px;
}
.box2-content{
    position: absolute;
    top: 41%;
    transform: translateY(-50%);
    width: 529px;
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
    width: 650px;
}
.marquee-group{
    display: flex;
    justify-content: space-around;
    min-width: 90%;
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
        </style>
		</head> 
		<body>
			<div class = "center">
			 <div class = "box">
				<header class = "header1">
					<img src="assets/img/CTU_new_logo-removebg-preview.png" alt="">
					<a href="login.php">Admin Login</a>
				</header>
				<section class = "content">
					<div class = "box1">
						<h1>All Capstone/Thesis Project are all in one in Ctu-Naga Extension campus</h1>
					</div>
					<div class = "box2">
					 <svg id="visual" viewBox="50 5 790 560" width="760" height="540" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><rect x="0" y="0" width="760" height="540" fill="#F2E7D5"></rect><path d="M581 540L580.7 495C580.3 450 579.7 360 563.2 270C546.7 180 514.3 90 498.2 45L482 0L760 0L760 45C760 90 760 180 760 270C760 360 760 450 760 495L760 540Z" fill="#6D9886" stroke-linecap="round" stroke-linejoin="miter"></path></svg>\
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
					  
					</div>
				</section>
			</div>
			</div>
			
</body>
</html>	