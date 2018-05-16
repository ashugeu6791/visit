<?php
include_once'lib/core.php';
auth();
if(isset($_SESSION['lastid']))
{
    $id=$_SESSION['lastid'];
}
else
{
    header("location: dashboard.php");
}

$sql="select * from visitors where id=$id";
$res=$conn->query($sql);
if($res->num_rows > 0)
{
    while($row=$res->fetch_assoc())
    {
        $data[]=$row;
    }
}

$email=$_SESSION['signed_in'];

$sql="select * from users where email='$email'";
$res=$conn->query($sql);
if($res->num_rows > 0)
{
    while($row=$res->fetch_assoc())
    {
        $data2[]=$row;
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
     <link href='https://fonts.googleapis.com/css?family=Lato:400,100' rel='stylesheet' type='text/css'>
     <link href='file/card.css' rel='stylesheet' type='text/css'>
      
        <script src="file/jquery.min.js"></script>
  <script src="file/bootstrap.min.js"></script>
       <link href="file/time.css" rel="stylesheet">
</head>
<body>
    <div id="invc">
    <aside class="profile-card" >
        <center><img src="logo/22.png" style="width:200px"></center>
  <header>
     
    <!-- here’s the avatar -->
   
      <img src="<?=$data[0]['img'];?>" style="width:100px;height:100px">


    <!-- the username -->
    <h5>Student Name:  <?=$data[0]['s_name'];?></h5>
    <h5>Parent Name: <?=$data[0]['p_name'];?></h5>

    <!-- and role or location -->
    <h6>Contact No:- <?=$data[0]['contact'];?> </h6>
    <h6>Email:- <?=$data[0]['email'];?> </h6>

  </header>

  <!-- bit of a bio; who are you? -->
  <div class="profile-bio">

    <p style="font-size:12px">Valid For One Day</p>
    <p style="color:#eee;font-size:12px"><?=$data[0]['date'];?>, <?=$data[0]['in_time'];?>, V-Id:- <?=$data[0]['id'];?></p>
        </div>
    </aside>
    <br>
    </div>
     <center><button class="btn btn-primary" onclick="print();">Print</button>
    <a href="dashboard" class="btn btn-primary">New Entry</a>
    </center>
<!-- that’s all folks! -->
</body>
</html>

<script>
function print()
    {
       var DocumentContainer = document.getElementById('invc');
    var WindowObject = window.open('', 'PrintWindow', 'width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes');
    var strHtml = "<html>\n<head>\n <link rel=\"stylesheet\" type=\"text/css\" href=\"file/card.css\">\n</head><body><div style=\"testStyle\">\n" + DocumentContainer.innerHTML + "\n</div>\n</body>\n</html>";
    WindowObject.document.writeln(strHtml);
    WindowObject.document.close();
    WindowObject.focus();
    WindowObject.print();
    WindowObject.close();

    }
</script>