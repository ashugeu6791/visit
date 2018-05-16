<?php
include_once'lib/core.php';
auth();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    if(isset($_POST['filter']))
    {
        $date=date("d/m/Y",strtotime($_POST['date']));
        $sql="select * from visitors where date='$date'";
    }
}
else
{
    $sql="select * from visitors";
    
}

$res=$conn->query($sql);
if($res->num_rows > 0)
{
    while($row=$res->fetch_assoc())
    {
        $data[]=$row;
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
    <style>
        th{
            text-align: center;
        }
    </style>
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
            
            
            
            
               <div class="col-sm-9">
                   <form method="post">
                    Filter By date <input type="date" name="date"><button type="submit" name="filter">Find Now</button>
                   </form>
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
                        <h2>Visitors List </h2>
                       <br>
                   </center>
                   <?php
                   if(isset($data))
                   {
                       ?>
                    <table class="table table-hover">
    <thead>
      <tr>
        <th>Sno</th>
        <th>Visitors_Id</th>
        <th>Student Name</th>
        <th>Parent Name</th>
        <th>City</th>
        <th>Contact No</th>
        <th>Email</th>
        <th>Date</th>
        <th>In_Time</th>
        <th>Out_Time</th>
        <th>Gender</th>
        <th>Purpose</th>
      </tr>
    </thead>
  
                        <?php
                        $x=1;
                   foreach($data as $data)
                   {
                       ?>
                       <tr>
                        <td><?=$x;?></td>
                        <td><?=$data['id'];?></td>
                        <td><?=$data['s_name'];?></td>
                        <td><?=$data['p_name'];?></td>
                        <td><?=$data['city'];?></td>
                       
                        <td><?=$data['contact'];?></td>
                            <td><?=$data['email'];?></td>
                        <td><?=$data['date'];?></td>
                        <td><?=$data['in_time'];?></td>
                        <td><?=$data['out_time'];?></td>
                        <td><?=$data['gender'];?></td>
                        <td><?=$data['purpose'];?></td>
                    </tr>
                   <?php
                       $x++;
                   }
                   ?>
                   </table>
                   <?php
                   }
                   else
                   {
                       echo "No record Found";
                       
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

