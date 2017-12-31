<style>

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: indigo;
   color: white;
   text-align: center;
}



</style>

<?php

//echo $_POST["var"];
echo '  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
echo '  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
echo '   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
$url = "\"" . $_POST["var"] . "\"";

// https://www.facebook.com/shayla.schrenk?fref=gf&dti=389524294528093\"";
$o = strpos($url, "id");

$su = "";
if ($o != "") {
	$s = substr($url, $o+3);
	$a = strpos($s, "&");
	if ($a == "") {
			$su = str_replace('"', "", substr($url, $o+3));
	} else {
		$su = substr($s, 0, $a);
	}

} else {

$output = shell_exec('curl ' . $url);

$i = strpos($output, "entity_id");
$j = strpos($output, "&amp;context");
if ($j == "") {
	$j = strpos($output, "}]]");
	$s = substr($output, $i+12);
	$k = strpos($s, "}");
	$su = substr($s, 0, $k-1);
}
else {
$s = substr($output, $i+10);
$k = strpos($s, "&");
$su = substr($s, 0, $k);
}

//echo $su; 

// echo '<script>    	location.replace("http://17c55bde.ngrok.io/rest4.php?var=' . $su . '&var2=' . $_POST["var"] . '"); </script>';


}


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

<div id="container" class="container">
  <h3>CourseWithFriends </h3>
  <p id="heading">Enter the courses <b> you will take next semester </b> below:</p>

 <div id="main" class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input class="form-control" id="inp2" type="text" placeholder="cse 487 A, ims 440 B, ...">
      </div>
        </br>
        <button id="submit" class="btn btn-success">Now show me what my friends are taking!</button>
  <!-- <?php
// echo '<input type="hidden" name="var" value=' . $su . '><input type="hidden" name="var2" value=' . $_POST["var"] . '><button class="btn btn-success" id="submit">Now show me what my friends are taking!</button>';
  ?> -->


</div>

  <?php

  echo '
<script>
$("#submit").click(function(){
	if (document.getElementById("inp2").value == "") {
		alert("are you that free to not take any course?");
	} else {
    writeUserData(' . $su . ', document.getElementById("inp2").value); 
    $("#heading").text("Hang tight...");
    $("#main").slideUp()
    $("#submit").slideUp();
    location.replace("http://17c55bde.ngrok.io/rest4.php?var=' . $su . '&var2=' . $_POST["var"] . '");
}

});
</script>';



  ?>

<div class="footer">
 

<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fcoursewithfriends.herokuapp.com&width=51&layout=box_count&action=like&size=small&show_faces=false&share=false&height=65&appId" width="51" height="55" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

 <p>
    A Nehul Yadav Production 
    </p>
</div>
