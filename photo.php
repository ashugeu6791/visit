<?php
session_start();
if(isset($_SESSION['lastid']))
{
    $id=$_SESSION['lastid'];
}
else
{
    header("location: dashboard.php");
}
?>
<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphic Era vistors portal </title>

</head>
<body>

	<!-- CSS -->
    <style>
    #my_camera{
        width: 420px;
        height: 340px;
        border: 1px solid black;
    }
	</style>

	<!-- -->
    <div class="msg"></div>
    <center><div id="my_camera"></div>
	<input type=button value="Take Snapshot" onClick="take_snapshot()">
	<input type=button value="Save Snapshot" onClick="saveSnap()">
    </center>
    <div id="results"  ></div>
    <script>
    </script>
	
	<!-- Script -->
	<script type="text/javascript" src="webcamjs/webcam.min.js"></script>

	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		 
		// Configure a few settings and attach camera
		
			Webcam.set({
				width: 320,
				height: 240,
				image_format: 'jpeg',
				jpeg_quality: 90
			});
			Webcam.attach( '#my_camera' );
		
		// A button for taking snaps
		

		// preload shutter audio clip
		var shutter = new Audio();
		shutter.autoplay = false;
		shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

		function take_snapshot() {
			// play sound effect
			shutter.play();

			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('results').innerHTML = 
					'<img id="imageprev" src="'+data_uri+'"/>';
			} );

		}

		function saveSnap(){
			// Get base64 value from <img id='imageprev'> source
			var base64image =  document.getElementById("imageprev").src;

			 Webcam.upload( base64image, 'upload.php', function(code, text) {
				 
				 if(text=="ok")
                     {
                          window.location.href = "card.php";
                     }
                 else if(text=="err")
                     {
                         $('.msg').html('<b>Error!</b> Some problem occurred, please try again.');
                     }
            });

		}
	</script>
	
</body>
</html>
