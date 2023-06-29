<style>
      :root{
    --darkcolor:#393E46;
    --green:#6D9886;
    --darklight:#F2E7D5;
    --light:#F7F7F7;
    
}
*{
    padding: 0;
    margin:0;
}
.box2{
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 3fr 1.5fr;
    min-height: 100vh;
    position: relative;
    background-color: var(--darkcolor);
    overflow:hidden;
}
span{
    min-height: 10%;
    width: 18.9vw;
    background-color: var(--green);
    position: absolute;
    border-radius: 0px 0px 30px 30px;
    box-shadow: 10px -15px 10px black;
    margin-left: 1px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 900;
    letter-spacing: -1px;
    cursor: pointer;
    transition: .5s cubic-bezier(0.455, 0.03, 0.515, 0.955);
    padding-bottom: 0rem;
}
.box2 a {
    text-decoration: none;
    color: var(--darkcolor);
    transition: .6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}
.box2 span:hover a {
    color: var(--light);
}
.box2 span:hover {
    padding-top: 15rem;
    padding-bottom: 5rem;

}
.box2-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    text-align: center;
}
.inside-container>h1{
    font-size: 4rem;
    font-weight: 900;
    letter-spacing: 15px;
    text-decoration: underline;
}

.box2-content p{
    margin: auto;
    text-align: left;
    color: var(--light);
    line-height: 25px;
    width: 80%;
    font-size:1.2rem;
    padding-top:5rem;
}
.flex{
    width:100%;
  
} 
.card{
    width: 100%;
    display: flex;
    justify-content: space-around;
    padding: 1rem;
    top: 100%;
    transform: translateY(-100%);
}
.card img{
    border-radius: 15px;
    width: 200px;
    height: 270px;
    object-fit: cover;
    margin-bottom: 1rem;
    box-shadow: 5px 5px 2px black;
}

.card-content ,h3,h4{
    text-align: center;
}






.rectangle{
    width: 100%;
    background-color: var(--darklight);
    margin: auto;
    position: absolute;
    top: 100%;
    transform: translateY(-95%);
    padding-top:5rem;
}

.marquee{

    display: flex;
    width: 100vw;
}
.card{
    display: flex;
    justify-content: space-around;
    min-width: 100%;
    animation: slide 20s linear infinite;
   
}
.card img{
    
    position:absolute;
    top:-340%;
    margin-left:30px;
    height: 250px;
}
@keyframes slide {
    0%{
        transform: translateX(0);
    }
    100%{
        transform: translateX(-100%);
    }
}
a{
    padding:2rem 1rem 1rem 1rem;
    background-color:var(--green);
    position:absolute;
    top:-3%;
    left:5%;
    z-index: 1;
    text-decoration:none;
    font-weight:900;
    font-size:1.4rem;
    color:var(--darkcolor);
    border-radius:0px 0px 10px 10px; 
    transition:1s;
    border:2px solid var(--darkcolor);
}
a::before{
    content:'';
    position:absolute;
    top:80%;
    transform:translateY(-100%);
    height:5px;
    width:0%;
    background-color:var(--green);
    transition:1s;
}
a:hover
{
    text-decoration:underline;
    color:var(--green);
    background-color:var(--darkcolor);
    top:0%;
    border:2px solid var(--darklight);

}

</style>


<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Home</title>
			<link rel="stylesheet" type="text/css" href="homepage.css">
		</head>
		
		<body>
        <a href="index.php">BACK</a>

		<section class ="box2"  id="about-us">
		 <div class ="box2-container">
			<div class ="inside-container">
			  <h1>ABOUT US</h1>
			   <div class="box2-content">
				 <h1>Created By BSIT-2B</h1>
				 <p> This management system is the brainchild of a dynamic group of BSIT-2B day students, united in their mission to craft a cutting-edge system within the university. Its purpose? To meticulously document and preserve the Capstone/Thesis projects brought to life by our talented peers. This system stands as a valuable resource, empowering students to delve into a treasure trove of knowledge, fueling their own project endeavors with
					 boundless inspiration and reference material.</p>
			   </div>
			</div>	
		 </div>

		 <div class ="rectangle">
            <div class="marquee-wrapper">
            <div class ="marquee">
					    <div class="card">
							<div class ="flex">
							  <img src="assets/img/jessie.jpg" alt="">
			            	    <div class ="card-content">
					              <h3>Jessie Jay Villareal</h3>
					              <h4>Graphics Designer</h4>
				                </div>
							</div>

							<div class ="flex">
							  <img src="assets\img\prel.jpg" alt="">
			            	    <div class ="card-content">
					              <h3>Apryl Mae Masayon</h3>
					              <h4>Php Developer</h4>
				                </div>
							</div>

							<div class ="flex">
							  <img src="assets\img\paulo.jpg" alt="">
			            	    <div class ="card-content">
					              <h3>Paulo Abaquita</h3>
					              <h4>Front-end Developer</h4>
				                </div>
							</div>

							<div class ="flex">
							  <img src="assets\img\jose.jpg" alt="">
			            	    <div class ="card-content">
					              <h3>Jose Rene Generosa</h3>
					              <h4>Php Developer</h4>
				                </div>
							</div>
							<div class ="flex">
							  <img src="assets\img\GELAH.jpg" alt="">
			            	    <div class ="card-content">
					              <h3>Gelah Cuizon Setenta</h3>
					              <h4>UI/UX Designer</h4>
				                </div>
							</div>
							<div class ="flex">
							  <img src="assets\img\gwen.jpg" alt="">
			            	    <div class ="card-content">
					              <h3>Gwyneth Tabliga</h3>
					              <h4>Php Developer</h4>
				                </div>
							</div>
			            </div>


                        <div class="card">
							<div class ="flex">
							  <img src="assets/img/jessie.jpg" alt="">
			            	    <div class ="card-content">
					              <h3>Jessie Jay Villareal</h3>
					              <h4>Graphics Designer</h4>
				                </div>
							</div>

							<div class ="flex">
							  <img src="assets\img\prel.jpg" alt="">
			            	    <div class ="card-content">
					              <h3>Apryl Mae Masayon</h3>
					              <h4>Php Developer</h4>
				                </div>
							</div>

							<div class ="flex">
							  <img src="assets\img\paulo.jpg" alt="">
			            	    <div class ="card-content">
					              <h3>Paulo Abaquita</h3>
					              <h4>Front-end Developer</h4>
				                </div>
							</div>

							<div class ="flex">
							  <img src="assets\img\jose.jpg" alt="">
			            	    <div class ="card-content">
					              <h3>Jose Rene Generosa</h3>
					              <h4>Php Developer</h4>
				                </div>
							</div>
							<div class ="flex">
							  <img src="assets\img\GELAH.jpg" alt="">
			            	    <div class ="card-content">
					              <h3>Gelah Cuizon Setenta</h3>
					              <h4>UI/UX Designer</h4>
				                </div>
							</div>
							<div class ="flex">
							  <img src="assets\img\gwen.jpg" alt="">
			            	    <div class ="card-content">
					              <h3>Gwyneth Tabliga</h3>
					              <h4>Php Developer</h4>
				                </div>
							</div>
			            </div>



						
					</div>
            </div>
					
		 </div>
		 </section>
	  
		</body>
		</html>