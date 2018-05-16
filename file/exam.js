
		// Window onload function
	
function showUser() {
	
	point();
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php",true);
        xmlhttp.send();
    }
	
	
	
	// function for all the points are calculate
	
	
	function point() {
	
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("point").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","point.php",true);
        xmlhttp.send();
    }
	
	
	
	// function for send the form data to php file
	
	function data(h1)
	{
		point();
		 if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?h1="+ h1,true);
        xmlhttp.send();
		
	}
	
	
	
	// function for check & send the form data to php file
	
	function sUser() {
		
		point();
	
		if (document.getElementById('h1').checked) {
  var h1 = document.getElementById('h1').value;
			
			data(h1);
}
		else if (document.getElementById('h2').checked) {
  var h1 = document.getElementById('h2').value;
			data(h1);
}
		else if (document.getElementById('h3').checked) {
  var h1 = document.getElementById('h3').value;
			data(h1);
}
			else if (document.getElementById('h4').checked) {
  var h1 = document.getElementById('h4').value;
				data(h1);
}
		else
			 {

				 $("#cheat").addClass("alert alert-danger");
		 document.getElementById("cheat").innerHTML = "<strong>Warning!</strong> Please Choice any one Options.";
}
    
       
    }


	
	
	// function for when timeout or user exit 


function exit() {
	
	
	
	$('#exit').modal('hide');
	$("#remove").remove();
	
	point();
    
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?end="+ "1",true);
        xmlhttp.send();
    }
	
	
	
	
	
	// script for Unlock the Questions 
	

		function unlock(){
			
				$('#unlock').modal('hide');
			
		var score=10;
			
		 if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("p").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","point.php?score="+ score,true);
        xmlhttp.send();
		
		}
		

	

// script for dont copy paste 
	
	
	
		function cheat()
		{
			$("#cheat").addClass("alert alert-danger");
		 document.getElementById("cheat").innerHTML = "<strong>Warning!</strong> Dont Try This.";
			
		}
	
