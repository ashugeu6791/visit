<?php
include_once'lib/core.php';
auto_redirect($conn);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    if(isset($_POST['login']))
    {
        
        $email=trim(test_input($_POST['email']));
        $password=md5($_POST['password']);
        echo "br><br><br><br>".$email. $password;
        if(!user_login($email,$password,$conn,$user))
           $error= "Invalid user & Password";
    }
}

?>
<!DOCTYPE html>
<html >
<head>
    <title> Graphic Era-Visitor  System</title>
    <link rel="shortcut icon" href="logo/lo.jpg" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css" />
	<script src="file/bootstrap.min.js"></script>
    <script src="file/jquery.min.js"></script>
	
    <meta charset="utf-8">
    <meta name="description" content="This Portal is only for the use of faculty members and staff memebers of Graphic Era  Deemed to-be University (Dehradun). ">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content=" Graphic Era, Graphic Eraleave,leave portal, Graphic Era leave portal, Graphic Era leave, Graphic Era faculty leave">
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- Code yard custom CSS -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="style/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="style/js/ie-emulation-modes-warning.js"></script>
        
        <script src="file/jquery.min.js"></script>
  <script src="file/bootstrap.min.js"></script>
      
</head>


<body bgcolor="#ffffff">
	
	
	<div class="header" data-spy="affix" style="background-color:#000000;color:#eeeeee;opacity:0.8;">
	<div class="collapse navbar-collapse" style="padding:10px;padding-left:100px">
	Excellent Infrastructure! It was a pleasure to visit and we look forward to visiting the campus in future.
		<a href="http:// Graphic Era.ac.in" target="_blank"><span style="float:right;color:#eeeeee">Visit Official Site here - 2017</span></a>

		</div>
	</div>
	
	<div class="collapse navbar-collapse">
	<br><br>
	</div>
	
	
<div class="container" >
     <div class="row">
            <div class="col-sm-4 sidenav" ><a href="#">
                <img src="logo/22.png" align="left" style="width:95%;object-fit:contain;margin-top:10px"></a>
         </div>
        <div class="col-sm-8 sidenav" > 
  
			<h2 align="center" style="margin-bottom:23px;color:darkred">  Campus Visitors Portal
    
            </h2>
			
    <marquee>This Portal is only for the use of  Visitors we want to visit campus  of Graphic Era  Deemed to-be University.</marquee>
    </div>
    
         </div>

    </div>
  <hr>
	

	
         <div class="container">
              <div class="row content">
            <div class="col-md-9 sidenav" >		  
				  
		
		  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
    <li data-target="#myCarousel" data-slide-to="6"></li>
    <li data-target="#myCarousel" data-slide-to="7"></li>
    
   
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
		
		
      <img src="logo/nm.jpg" alt="Chania">
      <div class="carousel-caption">
        
		  
      </div>
    </div>

    <div class="item">
      <img src="logo/b1.jpg" alt="Chania">
      <div class="carousel-caption">
       
      </div>
    </div>

	  
	   <div class="item">
      <img src="logo/b7.jpg" alt="Flower">
      <div class="carousel-caption">
        
      </div>
    </div>
	  <div class="item">
      <img src="logo/b8.jpg" alt="Flower">
      <div class="carousel-caption">
        
      </div>
    </div>
	   <div class="item">
      <img src="logo/b6.jpg" alt="Flower">
      <div class="carousel-caption">
        
      </div>
    </div>
	  
	  
	  
	  
	   <div class="item">
      <img src="logo/b5.png" alt="Flower">
      <div class="carousel-caption">
        
      </div>
    </div>
	  
    

    <div class="item">
      <img src="logo/b3.jpg" alt="Flower">
      <div class="carousel-caption">
        
      </div>
    </div>
	  
	  
	  
	 <div class="item">
      <img src="logo/b2.jpg" alt="Flower">
      <div class="carousel-caption">
       
      </div>
    </div>
	  
	 
	  
	  
  </div>

  <!-- Left and right controls -->
 
</div>	  
				  
				  
				  </div>
                  
                   
            <div class="col-md-3 sidenav">
				
				
				<?php if(isset($error)){ ?><center><span style="color:red;font-size:15px"><?=$error;  }?>
				
				</span>
				</center>
            <form method="post" style="object-fit:contain; padding:0px" >
        <table  align="" width="" border="0" style="min-width:100%;padding:1px;object-fit:contain; border:solid #dcdcdc 2px;border-top:solid darkred 5px;" >
           
    <tr><td align="center" style="padding-bottom:2px"><font color="" size="4">Login to your account</font></td></tr><tr>
<td><input type="text" name="email"  class="form-control" value="" placeholder="Your Name"  required /></td>
</tr>
<tr>
<td><input type="password" name="password" class="form-control" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" class="btn btn-danger" name="login">Sign In</button></td>
</tr>
                <!--<tr><td align="center" style="padding-top:2px;padding-bottom:12x">
					Don't have an account? <a href="sign.php"><font size="3" color="#4a81c3">Sign Up.</font></a>-->
					
					<br><br><br>Learn Simple, Keep Simple..!
</td></tr>
            
            
</table>
</form>
        </div>
    </div>
    </div>
	
	
	
<div class="container" style="padding:10px">
        
           
            <div class="row content" style="background-color:#ffe7d8">
            <div class="col-sm-4 sidenav" style=""><h3 align="center">The Vision</h3><p align="justify">We visualize  Graphic Era as a destination university, which is internationally recognized as an inquiry-driven,ethically engaged university with a diverse community, whose members work collaboratively, for the positive transformation of the world, through courageous leadership in teaching, research and social action.
				<br>
				<center> <a class="btn btn-danger btn-sm" href="http:// Graphic Era.ac.in/mission-and-vission" target="_blank" style="margin-bottom:15px">Read More</a><br></center>
            </div>
            <div class="col-sm-4 sidenav" ><h3 align="center">The Mission</h3><p align="justify">
               The mission of  Graphic Era is to promote learning in the true spirit. The university offers the knowledge and skills needed to sucessed as professionals, and the values and sensitivity needed to become responsible citizens of the world.
				<br><br>
				<center> <a class="btn btn-danger btn-sm" href="http:// Graphic Era.ac.in/mission-and-vission" target="_blank" style="margin-bottom:15px">Read More</a><br></center>
            </div>
            <div class="col-sm-4 sidenav" style=""><h3 align="center">Why  Graphic Era </h3><p align="justify">
              At Graphic Era  Deemed to-be University, with the help of our highly qualified staff and eminent faculty and with the world class facilities and infrastructure available, we strive to imbibe in our students the true spirit of learning and innovation and foster a learning ambiance which aids in this pursuit.<br>
				<center> <a class="btn btn-danger btn-sm" href="http:// Graphic Era.ac.in/ Graphic Era-advantage" target="_blank" style="margin-bottom:15px">Read More</a><br></center>
            </div>
          
        
    
    <div class="col-sm-12 sidenav" style="padding:10px;background-color:#ffffff"><br><p align="justify">
            Graphic Era Deemed to-be University (GEU) is ISO 9001: 2008 Qms certified for important education along with research facillties in school of engineering & technology,school of management,shool of business administration,school of computer application,school of allied science,school of humanities.All these campuses are designed as self - contained communities with academic and research facilities ,libraries,administrative offices etc.The unique of this university is that is proviedes 30% reservation and 25% concess in the fee structure for the student of the  Deemed to-be areas.
    </p>
          <hr>
		
       </div> 
		

            </div>
   
	</div>
	
	
<?php
    include_once 'footer.php';
    ?>
</body>
</html>