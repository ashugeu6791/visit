<?php
include_once'lib/core.php';
 include_once 'generate_otp.php';
date_default_timezone_set("Asia/Calcutta");
auth();
if($_SERVER["REQUEST_METHOD"] == "POST")
{

    if(isset($_POST['otp']))
    {

        $v_id=test_input($_POST['v_id']);
        $new_otp=test_input($_POST['new_otp']);
            $sql="select * from visitors where otp=$new_otp and id=$v_id";
            $res=$conn->query($sql);
             if($res->num_rows > 0)
            {
                $_SESSION['lastid']=$v_id;
                header("location: photo.php");
            }
            else
            {
                $error="Incorrect OTP Code";
            }


        }


    if(isset($_POST['add']))
    {

        $s_name=test_input($_POST['s_name']);
        $p_name=test_input($_POST['p_name']);
        $contact=test_input($_POST['contact']);
        $f_contact=test_input($_POST['fcontact']);
        if(empty($f_contact)) $f_contact=0;
        
        $email=test_input($_POST['email']);
        //echo $email;
        $f_email=test_input($_POST['femail']);
        if(empty($f_email)) $f_email='';
        $city=test_input($_POST['city']);
        $date=date("d/m/Y");
        $gender=test_input($_POST['gender']);
        $purpose=test_input($_POST['purpose']);
        $in_time=date("h:i:sa");
        $otp=rand(1000,9999);
        
        $address=test_input($_POST['address']);
        $board10=test_input($_POST['board10']);
        $year10=test_input($_POST['year10']);
        $per10=test_input($_POST['percent10']);
        
        $appearPassed12=test_input($_POST['exam12']);
        $board12=test_input($_POST['board12']);
        if(empty($board12)) $board12=NULL;
        $year12=test_input($_POST['year12']);
        if(empty($year12)) $year12=NULL;
        $per12=test_input($_POST['percent12']);
        //echo "ashish".$per12;
        if(empty($per12)) $per12=0;
        //echo $per12."garg";
        $appearPassedGrad=test_input($_POST['graduation']);
        if(empty($appearPassedGrad)) $appearPassedGrad='';
        $universityGrad=test_input($_POST['boardGrad']);
        if(empty($universityGrad)) $universityGrad='';
        $yearGrad=test_input($_POST['yearGrad']);
        //echo "<body><br><br>Hello" + $yearGrad+"Hello</body>";
        if(empty($yearGrad)) $yearGrad=0;
        $perGrad=test_input($_POST['percentGrad']);
        if(empty($perGrad)) $perGrad=0;
        $appearPassedOther=test_input($_POST['other']);
        if(empty($appearPassedOther)) $appearPassedOther='';
        $universityOther=test_input($_POST['boardOther']);
        if(empty($universityOther)) $universityOther='';
        $yearOther=test_input($_POST['yearOther']);
        if(empty($yearOther)) $yearOther=0;
        $perOther=test_input($_POST['percentOther']);
        if(empty($perOther)) $perOther=0;
        $programInterested=test_input($_POST['pInterest']);
        $campusChoice=test_input($_POST['cChoice']);
        $entranceExam=test_input($_POST['entranceExam']);
        if(empty($entranceExam)) $entranceExam='';
        $score=test_input($_POST['score']);
        if(empty($score)) $score=0;
        $source=test_input($_POST['source']);
        $other=test_input($_POST['other']);
        if(empty($other)) $other='';
    
        echo $otp;
        
        if(isset($otp)){
            //send_otp($contact,$otp,$key);
            $sql="insert into visitors (s_name,p_name,contact,email,city,date,gender,purpose,in_time,otp,f_email, f_contact, tenthBoard, tenthYear, tenthPer, twelfthAppearPassed, twelfthBoard, twelfthYear, twelfthPer, gradAppearPassed, gradUniversity, gradYear, gradPer, otherAppearPassed, otherUniversity, otherYear, otherPer, programInterested, campusChoice, entranceExam, score, branding, other,address) values(\"$s_name\",\"$p_name\",$contact,\"$email\",\"$city\",\"$date\",\"$gender\",\"$purpose\",\"$in_time\",$otp,\"$f_email\",$f_contact,\"$board10\",$year10,$per10,\"$appearPassed12\",\"$board12\",$year12,$per12,\"$appearPassedGrad\",\"$universityGrad\",$yearGrad,$perGrad,\"$appearPassedOther\",\"$universityOther\",$yearOther,$perOther,\"$programInterested\",\"$campusChoice\",\"$entranceExam\",$score,\"$source\",\"$other\",\"$address\")";
           // echo $sql;
            if($conn->query($sql)===true){
                $v_id= $conn->insert_id;
            }
            else{
                $error=$conn->error;
            }

        }
        else{
            $error="Error! Unable to store the data.";
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
<!--End of Tawk.to Script-->
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
                   if(isset($v_id))
                   {
                       ?>
                         <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Otp: </label>
                                    <input type="text" name="new_otp" class="form-control" required>
                                    <input type="hidden" name="v_id" value="<?=$v_id;?>">
                                </div>
                                <div class="col-sm-6">
                                   <br><br>
                           <button type="submit" name="otp" class="btn btn-primary" style="float:right">Submit Now</button>
                                </div>
                             </div>
                        </form>
                   <?php
                       exit;
                   }
                   else
                   {
                       ?>
                    <center>
                        <h2>Add Visitor's </h2>
                       <br>
                   </center>
                    <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Candidate's Name: </label>
                            <input type="text" name="s_name" class="form-control" required>
                        </div>
                        <div class="col-sm-6">
                            <label>Parent's Name: </label>
                            <input type="text" name="p_name" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Gender </label>
                            <select name="gender" class="form-control">
                                <option class="Male">Male</option>
                                <option class="Female">Female</option>
                            </select>

                        </div>
                        <div class="col-sm-6">
                            <label>Address </label>
                            <textarea name="address" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Contact No: </label>
                                <input type="number" name="contact" id="mobile" onkeyup="check(); return false;" class="form-control" required>
                                 <span id="message"></span>
                            </div>
                            <div class="col-sm-6">
                                <label>Father's Contact No: </label>
                                <input type="number" name="fcontact" id="mobile" onkeyup="check(); return false;" class="form-control" >
                                <span id="message"></span>
                            </div>
                        </div>
                         <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Candidate's Email: </label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Father's Email: </label>
                                <input type="email" name="femail" class="form-control" >
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>City: </label>
                                <input type="text" name="city" class="form-control" required>
                                <br>
                            </div>
                            <div class="col-sm-6">
                                <label>Purpose: </label>
                                <textarea name="purpose" rows="4" class="form-control" required></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-18">
                                <label>Educational Qualification: </label>
                                <table>
                                    <tr>
                                        <th>
                                           Class
                                        </th>
                                        <th>
                                            Exam Passed/Appearing
                                        </th>
                                        <th>
                                            Board/University
                                        </th>
                                        <th>
                                            Year
                                        </th>
                                        <th>
                                            Percentage(%)
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            10<super>th</super>
                                        </th>
                                        <td>
                                            <select name="exam10" class="form-control">
                                                <option class="PA">Passed</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name = "board10">
                                            </select>
                                        </td>
                                        <td>
                                            <input type = "text" name = "year10">
                                        </td>
                                        <td>
                                            <input type = "text" name = "percent10">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            12<super>th</super>
                                        </th>
                                        <td>
                                            <select name="exam12" class="form-control">
                                                <option class="AP">Appearing</option>
                                                <option class="PA">Passed</option>
                                        </td>
                                        <td>
                                            <input type = "text" name = "board12">
                                        </td>
                                        <td>
                                            <input type = "text" name = "year12">
                                        </td>
                                        <td>
                                            <input type = "text" name = "percent12">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Graduation
                                        </th>
                                        <td>
                                            <input type = "text" name = "graduation">
                                        </td>
                                        <td>
                                            <input type = "text" name = "boardGrad">
                                        </td>
                                        <td>
                                            <input type = "text" name = "yearGrad">
                                        </td>
                                        <td>
                                            <input type = "text" name = "percentGrad">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Others
                                        </th>
                                        <td>
                                            <input type = "text" name = "other">
                                        </td>
                                        <td>
                                            <input type = "text" name = "boardOther">
                                        </td>
                                        <td>
                                            <input type = "text" name = "yearOther">
                                        </td>
                                        <td>
                                            <input type = "text" name = "percentOther">
                                        </td>
                                    </tr>
                                </table>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Program Interested in: </label>
                                <input type="text" name="pInterest" class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Campus Choice: </label>
                                <select name="cChoice" class="form-control">
                                    <option class="GEU">Graphic Era (Deemed to-be University)</option>
                                    <option class="GEHU">Graphic Era Hill University(Dehradun)</option>
                                    <option class="GEHUB">Graphic Era Hill University(Bhimtal)</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Entrance Exam Appeared (CAT/MAT/JEE Mains): </label>
                                <input type="text" name="entranceExam" class="form-control" placeholder="Roll number" >
                            </div>
                            <div class="col-sm-6">
                                <label><br><br></label>
                                <input type="text" name="score" class="form-control" placeholder="Score/Percentile" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>How did you come to know about Graphic Era ? </label>
                                <select name="source" class="form-control">
                                    <option class="DM">Digital Media</option>
                                    <option class="PM">Print Media</option>
                                    <option class="EM">Electronic Media</option>
                                    <option class="OT">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label><br><br></label>
                                <input type="text" name="Other" class="form-control" placeholder="Other Information" >
                            </div>
                        </div>


                        <br>

                           <br><br>
                           <button type="submit" name="add" class="btn btn-primary" style="float:right">Submit Now</button>


                   </form>
                   <?php
                   }
                   ?>
                   </div>
                   </div>
                   </div>
    <br><br>
    <?php
    include_once 'footer.php';
    ?>
    </body></html>

<script src="file/time.js">

</script>
<script>
    $('.timepicker').wickedpicker();
    function one()
    {
        alert("hkh");
    }


    function check()
{

    var pass1 = document.getElementById('mobile');


    var message = document.getElementById('message');

   var goodColor = "#0C6";
    var badColor = "#FF9B37";

    if(mobile.value.length!=10){

        mobile.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "required 10 digits, match requested format!";
    }
    else
        {
            mobile.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "match requested format!";
        }
}
</script>

