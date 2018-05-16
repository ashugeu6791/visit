<?php
session_start();
require_once'config.php';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
   

//check page setting

function check_page($id,$conn)
    {
        $sql="select * from services where link='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
           return true;
        else
        {
            header("location:error.php");
            die();
        }
    }

//check user authpage

function user_auth($page,$type)
{
    if($page!=$type)
        header("location:404");
}

//check page request
    function check_request($id,$unid,$conn)
    {
        $sql="select * from registrations where id='$id' and unid='$unid'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
           return true;
        else
        {
          header("location:404.php");
            die();
        }
        
    }
//velidation for input type
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

//add address

    function add_address($name,$contact,$zip,$city,$state,$address,$landmark,$conn,$u_id)
    {
         $sql="select * from users where email='$u_id'";
        $res=$conn->query($sql);
        if($res->num_rows > 0)
        {
            while($row=$res->fetch_assoc())
            {
                $id=$row['id'];
            }
        }
        $sql="insert into address(u_id,name,contact,zip,city,state,address,landmark) values($id,'$name','$contact','$zip','$city','$state','$address','$landmark')";
        if($conn->query($sql)===true)
        {
            return true;
        }
        else
        {
            return $conn->error;
        }
    }

//login method
    function login($email,$password,$conn)
    {
        $sql="select * from users where email='$email' and password='$password'";
        $res=$conn->query($sql);
        if($res->num_rows > 0)
        {
            while($row=$res->fetch_assoc())
            {
                $type=$row['type'];
            }
            switch($type)
            {
                case 1: header("location: admin/dashboard");
                     $_SESSION['signed_in']=$email;
                    break;
                case 2: header("location: dashboard"); 
                     $_SESSION['signed_in']=$email;
                    break;
                case 3: header("location: dashboard");
                     $_SESSION['signed_in']=$email;
                    break;
                default: header("location: 404?$type");
            }
             
        }
        else
        return true;
    }

//user login
   function user_login($email,$password,$conn,$user)
    {
        $sql="select * from users where email='$email' and password='$password' and type=$user";
        $res=$conn->query($sql);
        if($res->num_rows > 0)
        {
            $_SESSION['signed_in']=$email;
            header("location: dashboard"); 
        }
        else
        return false;
    }


//method for auth
    function auth()
    {
        if (!$_SESSION['signed_in']) {  
        header("Location: logout");
        exit; // IMPORTANT: Be sure to exit here!
        }
    }

//if user already login
    function auto_redirect($conn)
    {
        if(isset($_SESSION['signed_in']))
        {
            $email=$_SESSION['signed_in'];
            $sql="select * from users where email='$email'";
        $res=$conn->query($sql);
        if($res->num_rows > 0)
        {
            while($row=$res->fetch_assoc())
            {
                $type=$row['type'];
            }
            switch($type)
            {
                case 1: header("location: admin/dashboard");
                    break;
                case 2: header("location: dashboard"); 
                    break;
                case 3: header("location: dashboard");
                    break;
                default: header("location: 404?$type");
            }
             
        }
        }
    }

//check token
function check_token($token)
{
    if(!isset($token))
    {
        header("location:404");
    }
}

//change pass
    function change_pass($pass,$npass,$cpass,$conn)
    {
        $email=$_SESSION['signed_in'];
        $getdata="select password from users where email='$email' and password='$pass'";
        $result=$conn->query($getdata);
        if ($result->num_rows > 0) 
        {
            if($pass==$cpass)
            {
                $ss="update users set password='$pass' where email='$email'";
                if($conn->query($ss)===true)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

//user Registration

function registration($f_name,$l_name,$contact,$email,$pass,$c_pass,$type,$conn)
{
    if($pass==$c_pass)
    {
        $sql="insert into users (email,password,type) values('$email','$pass',$type)";
        if($conn->query($sql)===true)
        {
            $u_id = $conn->insert_id;
            $sql="insert into user_profiles(u_id,f_name,l_name,contact,profile_pic) values($u_id,'$f_name','$l_name','$contact','uploads/user.png')";
            if($conn->query($sql)===true)
            {
               return "success";
            }
            else{
               return "success";
            }
        }
        else
        {
            $msg="This email already exist";
            return $msg;
        }
    }
    else
    {
        $msg="Confirm password does not match.";
        return $msg;;
    }
}
//check payment
    function check_payment($rid)
    {
        $api_key="872e2c27050a2d1a1ce8a71374d3bc80";
        $api_token="c5625eb28d6a532fd6634c9819972785";
        $api = new Instamojo\Instamojo($api_key,$api_token);
        try 
        {
            $response = $api->paymentRequestStatus($rid);
        }
        catch (Exception $e)
        {
            header("location: error.php");
        }

        foreach($response as $x ) 
        {
            $hi[]=$x[0];
        }
        $dy[]=$dd[0]=$dd[]=$hi[16];
        $status= $dy[0]['status'];
        return $status;
    }

function upload_image($files)
{
     $uploadedFile = 'err';
    if(!empty($_FILES['images']["type"]))
    {
        $fileName = time().'_'.$_FILES['images']['name'];
        $valid_extensions = array("jpeg", "jpg", "png","pdf","bmp","JPG");
        $temporary = explode(".", $_FILES['images']["name"]);
        $file_extension = end($temporary);
        if((($_FILES['images']["type"] == "image/png") || ($_FILES['images']["type"] == "application/pdf") || ($_FILES['images']["type"] == "image/bmp") || ($_FILES['images']["type"] == "image/jpg") || ($_FILES['images']["type"] == "image/JPG") || ($_FILES['images']["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions))
        {
            $sourcePath = $_FILES['images']['tmp_name'];
            $targetPath = "uploads/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath))
            {
                $uploadedFile = $fileName;
                 return $uploadedFile;
            }
            else
            {
                $uploadedFile="err";
                 return $uploadedFile;
            }
        }
        else
        {
            $uploadedFile="err";
            return $uploadedFile;
        }
       
    }
    else
    {
            $uploadedFile="err";
            return $uploadedFile;
    }
}

//upload file 
function upload_file($files,$conn,$r_id)
{
    $uploadedFile = '';
    if(!empty($_FILES["type"]))
    {
        $fileName = time().'_'.$_FILES['name'];
        $valid_extensions = array("jpeg", "jpg", "png","pdf","bmp","JPG");
        $temporary = explode(".", $_FILES["name"]);
        $file_extension = end($temporary);
        if((($_FILES["type"] == "image/png") || ($_FILES["type"] == "application/pdf") || ($_FILES["type"] == "image/bmp") || ($_FILES["type"] == "image/jpg") || ($_FILES["type"] == "image/JPG") || ($_FILES["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions))
        {
            $sourcePath = $_FILES['tmp_name'];
            $targetPath = "uploads/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath))
            {
                $uploadedFile = $fileName;
                $sql="insert into documents_upload(p_id,src) values('$r_id','$uploadedFile')";
                if($conn->query($sql)===true)
                {
                    echo "dddqww";
                }
                else
                {
                    echo "vvv";
                }
            }
        }
    }
}


function createDir($path){		
	if (!file_exists($path)) {
		$old_mask = umask(0);
		mkdir($path, 0777, TRUE);
		umask($old_mask);
	}
}

function createThumb($path1, $path2, $file_type, $new_w, $new_h, $squareSize = ''){
	/* read the source image */
	$source_image = FALSE;
	
	if (preg_match("/jpg|JPG|jpeg|JPEG/", $file_type)) {
		$source_image = imagecreatefromjpeg($path1);
	}
	elseif (preg_match("/png|PNG/", $file_type)) {
		
		if (!$source_image = @imagecreatefrompng($path1)) {
			$source_image = imagecreatefromjpeg($path1);
		}
	}
	elseif (preg_match("/gif|GIF/", $file_type)) {
		$source_image = imagecreatefromgif($path1);
	}		
	if ($source_image == FALSE) {
		$source_image = imagecreatefromjpeg($path1);
	}

	$orig_w = imageSX($source_image);
	$orig_h = imageSY($source_image);
	
	if ($orig_w < $new_w && $orig_h < $new_h) {
		$desired_width = $orig_w;
		$desired_height = $orig_h;
	} else {
		$scale = min($new_w / $orig_w, $new_h / $orig_h);
		$desired_width = ceil($scale * $orig_w);
		$desired_height = ceil($scale * $orig_h);
	}
			
	if ($squareSize != '') {
		$desired_width = $desired_height = $squareSize;
	}

	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	// for PNG background white----------->
	$kek = imagecolorallocate($virtual_image, 255, 255, 255);
	imagefill($virtual_image, 0, 0, $kek);
	
	if ($squareSize == '') {
		/* copy source image at a resized size */
		imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $orig_w, $orig_h);
	} else {
		$wm = $orig_w / $squareSize;
		$hm = $orig_h / $squareSize;
		$h_height = $squareSize / 2;
		$w_height = $squareSize / 2;
		
		if ($orig_w > $orig_h) {
			$adjusted_width = $orig_w / $hm;
			$half_width = $adjusted_width / 2;
			$int_width = $half_width - $w_height;
			imagecopyresampled($virtual_image, $source_image, -$int_width, 0, 0, 0, $adjusted_width, $squareSize, $orig_w, $orig_h);
		}

		elseif (($orig_w <= $orig_h)) {
			$adjusted_height = $orig_h / $wm;
			$half_height = $adjusted_height / 2;
			imagecopyresampled($virtual_image, $source_image, 0,0, 0, 0, $squareSize, $adjusted_height, $orig_w, $orig_h);
		} else {
			imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $squareSize, $squareSize, $orig_w, $orig_h);
		}
	}
	
	if (@imagejpeg($virtual_image, $path2, 90)) {
		imagedestroy($virtual_image);
		imagedestroy($source_image);
		return TRUE;
	} else {
		return FALSE;
	}
}	

?>