<?php
include_once'lib/core.php';
date_default_timezone_set("Asia/Calcutta");
auth();
$id=$_SESSION['lastid'];
// new filename
$filename = 'pic_'.date('YmdHis') . '.jpeg';

$url = '';
if( move_uploaded_file($_FILES['webcam']['tmp_name'],'upload/'.$filename) ){
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/upload/' . $filename;
    $sql="update visitors set img='$url' where id=$id";
    if($conn->query($sql)===true)
    {
        echo "ok";
    }
    else
    {
        echo $conn->error;
    }
}
else
{
    echo "err";
}
