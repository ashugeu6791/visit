<?php
include_once'lib/core.php';
auth();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
     if(isset($_POST['check']))
    {
         $id=$_POST['id'];
         $sql="select * from visitors where id=$id";
         $res=$conn->query($sql);
         if($res->num_rows > 0)
{
    while($row=$res->fetch_assoc())
    {
        $data[]=$row;
    }
}
         $exit=true;
     }
    
    if(isset($_POST['add']))
    {
       date_default_timezone_set("Asia/Calcutta");
        $id=test_input($_POST['id']);
        $out_time=date("h:i:sa");
        $out_time=date("h:i:sa");
        
       $sql="update visitors set out_time='$out_time' where id=$id";
        if($conn->query($sql)===true)
        {
            $success=true;
        }
        else
        {
             $error=$conn->error;
        }     
        
     
    }
}
?>
<!DOCTYPE html>
<html >
<head>
    <title>GEHU-Visitor  System</title>
    <link rel="shortcut icon" href="logo/lo.jpg" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link href="bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css" />
	<script src="file/bootstrap.min.js"></script>
    <script src="file/jquery.min.js"></script>
	
    <meta charset="utf-8">
    <meta name="description" content="This Portal is only for the use of faculty members and staff memebers of Graphic Era Hill University (Dehradun). ">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="gehu,gehuleave,leave portal,gehu leave portal,gehu leave,gehu faculty leave">
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
       <link href="file/time.css" rel="stylesheet">
    <!--Start of Tawk.to Script-->
</head>


<body bgcolor="#ffffff">
	

	
<div class="container" >
     <div class="row">
            <div class="col-sm-3 sidenav" ><a href="#">
                <img src="logo/22.png" align="left" style="width:95%;object-fit:contain;margin-top:10px"></a>
         </div>
        <div class="col-sm-8 sidenav" > 
          
			<h4 align="center" style="margin-bottom:23px;color:darkred">  Campus Visitors Portal
    
            </h4>
            <div style="float:right">
               <a href="logout.php">Logout</a>
            </div>
			
    </div>
    
         </div>

    </div>
  <hr>
	
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2" style="background-color:#f2f2f2;margin-top:-20px">
                <br>
                 <ul class="nav nav-pills nav-stacked">
    <li class="active"><a href="dashboard">Home</a></li>
  
    <li><a href="exit_visitors">Exit Visitors</a></li>
    <li><a href="visitors">Find Visitors</a></li>
  </ul>
            </div>
            
               <div class="col-sm-1">
            
            </div>
            
            
               <div class="col-sm-6">
                     <?php
            if(isset($success))
            {
                ?>
                <div class="alert alert-success"><strong>Success!</strong> Data Successfully Insert.</div>
                <?php
            }
            else if(isset($error))
            {
                ?>
                <div class="alert alert-danger"><strong>Error!</strong> <?=$error;?>.</div>
                <?php
            }
            ?>
                   <center>
                        <h2>Exit Visitor's </h2>
                       <br>
                   </center>
                   
                   <?php
                   if(isset($exit))
                   {
                       if(isset($data))
                       {
                       ?>
                          
                    <form method="post" enctype="multipart/form-data">
                   <div class="row">
                        <div class="col-sm-6">
                            <label>Student Name: </label>
                            <input type="text" name="name" class="form-control" value="<?=$data[0]['s_name'];?>" required>
                       </div>
                       <div class="col-sm-6">
                            <label>Parent Name: </label>
                            <input type="text" name="name" class="form-control" value="<?=$data[0]['p_name'];?>" required>
                            <input type="hidden" name="id" class="form-control" value="<?=$data[0]['id'];?>" required>
                       </div>
                         <br>
                    
                           <br><br>
                           <button type="submit" name="add" class="btn btn-primary" style="float:right">Submit Exit</button>
                       </div>
              
                   </form>
                   <?php
                       }
                       else
                       {
                           echo "No Record Found, Try Again";
                           ?>
                    <form method="post">
                        <div class="form-group">
                            <label>Visitors Id</label>
                            <input type="text" name="id" class="form-control" required> <br><button type="submit" class="btn btn-primary" name="check"> Find</button>
                        </div>
                   </form>
                            <?php
                           
                       }
                   }
                   else
                   {
                       
                   ?>
                    <form method="post">
                        <div class="form-group">
                            <label>Visitors Id</label>
                            <input type="text" name="id" class="form-control" required> <br><button type="submit" class="btn btn-primary" name="check"> Find</button>
                        </div>
                   </form>
                   
                   <?php
                   }
                   ?>
                   </div>
                   </div>
                   </div>
    </body></html>

<script src="file/time.js">

</script>
<script>
    $('.timepicker').wickedpicker();
</script>
