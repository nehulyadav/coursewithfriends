<?php
echo '  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
echo '  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
echo '   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
?>

<div id="container" class="container">
  <h3>CourseWithFriends </h3>
  <p id="heading">Upload the file <b> that just downloaded </b> below:</p>
<input type="file"></input>
 
  <!-- <?php
// echo '<input type="hidden" name="var" value=' . $su . '><input type="hidden" name="var2" value=' . $_POST["var"] . '><button class="btn btn-success" id="submit">Now show me what my friends are taking!</button>';
  ?> -->


</div>

<?php  

// echo $_GET["var"];
// echo $_GET["var2"];



echo '
<script>

function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(";");
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

</script>

';

echo '<script>setTimeout(function(){ var a = document.createElement(\'a\'); var linkText = document.createTextNode(""); a.setAttribute("id", "link"); a.href = "https://www.facebook.com/profile.php?id=' .  $_GET["var"] . '&lst=1142065635%3A1142065635%3A1514114386&sk=friends&source_ref=pb_friends_tl";a.download = true;document.body.appendChild(a);document.getElementById("link").click();
	
var input = document.querySelector("input[type=file]");
var name;

input.onchange = function(e) {
  var reader = new FileReader();
  reader.onload = function(event) {
    var i = event.target.result.indexOf(",list:");
    var j = event.target.result.indexOf("shortProfiles");
    var b = event.target.result.substring(i+7, j-2);
    console.log(b);
    a = b.split(",");

 	   for (p = 0; p <  a.length; p++) { 
 	        // var k = a[p].replace(/["\"]+/g, "").indexOf("-");
 	        // var s = a[p].replace(/["\"]+/g, "").substring(0, k);
 	   		a[p] = a[p].replace(/"/g, "");
 	   		var k = a[p].indexOf("-");
 	   		var s = a[p].substring(0, k);
 	        var m = s;
 	        console.log(m);
 	        if (getCookie("check1") == "") {
 	        	 	    setCookie("check1", m);
 	        } else {
			var temp = getCookie("check1") + "," + m;
			setCookie("check1", temp);
 	        }
  }
  location.replace("fopen.php");

  }

  name = e.target.files[0].name;
  reader.readAsText(new Blob([e.target.files[0]], {
    "type": "application/json"
  }));
}


}, 1000);</script>';


?>

      <script src="https://www.gstatic.com/firebasejs/4.8.1/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBgZMBRsqCnAlpuAdVVWatFG0_Zd2mCbzM",
    authDomain: "coursewithfriends.firebaseapp.com",
    databaseURL: "https://coursewithfriends.firebaseio.com",
    projectId: "coursewithfriends",
    storageBucket: "coursewithfriends.appspot.com",
    messagingSenderId: "464833129944"
  };
  firebase.initializeApp(config);

function writeUserData(userId, courses) {
  var database = firebase.database();
  firebase.database().ref('users/' + userId).set({
    courses: courses
  });
}

 </script>






