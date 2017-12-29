<?php  

// echo $_GET["var"];
// echo $_GET["var2"];

echo '  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
echo '  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
echo '   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';



echo '<script>setTimeout(function(){ var a = document.createElement(\'a\'); var linkText = document.createTextNode(""); a.setAttribute("id", "link"); a.href = "https://www.facebook.com/profile.php?id=' .  $_GET["var"] . '&lst=1142065635%3A1142065635%3A1514114386&sk=friends&source_ref=pb_friends_tl";a.download = true;document.body.appendChild(a);document.getElementById("link").click();}, 1000);</script>';

?>

<div id="container" class="container">
  <h3>CourseWithFriends </h3>
  <p id="heading">Below <b> are your friends and the courses </b> they will be taking next semester:</p>
  <table id="myTable" class="table table-hover">
    <thead>
      <tr>
        <th>Friend's Name</th>
        <th>Courses for Spring 2018</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
      </div>

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

<?php
$url = $_GET["var2"];

$q = strripos($url, "?");
$s = strripos($url, "/");

if ($q == "") {
		$sub = substr($url, $s+1);
		$d = strripos($sub, ".");
		$su = substr($sub, 0, $d);
		$output = "mdfind " . $su;
} else {
	$sub = substr($url, $s+1);
	$q = strpos($sub, "?");
	$su = substr($sub, 0, $q);
	$output = "mdfind " . $su;
}

$r = str_replace(".php",".html",$output);

//echo $r;

if (strpos($r, ".html") != "") {
	$result = shell_exec($r);
} else {
	$result = shell_exec($r . ".html");
}

//$output = "mdfind" . "william.p.html";

	$k = strpos($result, "/Users/nehulyadav/Downloads/");
	$s = substr($result, $k);
	$h = strpos($s, ".html");
	$sh = substr($s, 0, $h+5);
	$result = $sh;

//echo $result;

$str = file_get_contents(trim($result));

//echo $str;

//$str = file_get_contents("/Users/nehulyadav/Downloads/profile.html");
$i = strpos($str, ",list:");
$j = strpos ($str, "shortProfiles");
$s = substr($str, $i+7, $j-2);
$k = strpos($s, "],");
$sub = substr($s, 0, $k);

//echo $sub;

$a = explode(',', $sub);

for ($i = 0; $i < sizeof($a); $i++) {
	
$ch = curl_init();

$un = str_replace("\"", "", $a[$i]);

$k = strpos($un, "-");

// echo '<script> var person = prompt("Hang tight for your friends list... Till then, what courses will you take next semester?");

// </script>';

$url= "https://graph.facebook.com/v2.5/" . substr($un, 0, $k) . "?access_token=EAAMkG1ZAcjB8BAGZAE1WjeXXhuSV8qk3PZBZAOT395NM9wZBTFU8ZBiZC2MYi1vap0VidwWjmN0QZAbkuCNbUaOZA9fkh4XUSiMXROMcYEFksz2gNYmutRlBAkuIlbkkLvYHSs3tORp6r6hEZBbeFTjFj0xHiDYA6ZCLdIWUyAbzTm0gwZDZD";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}

$json = json_decode($result, true);

echo "
<script>
 firebase.database().ref('/users/').once('value').then(function(snapshot) {
              snapshot.forEach(function(childSnapshot) {
    var user = childSnapshot.key;
    var courses = childSnapshot.val().courses;
                   if (user == "
                    . substr($un, 0, $k) . ") {
                    				$('<tr><td>" . $json['name'] . "</td><td>' + courses + '</td></tr>').appendTo('#myTable tbody');
                   }


  });
});

</script>

";

// echo "
// <script>

// $('<tr><td>" . $json['name'] . "</td></tr>').appendTo('#myTable tbody');


// </script>

// ";

// array_push($r, $json['name']);

echo "</br>";

//print_r($r);
}
//echo $result;
curl_close ($ch);

// echo '<form method="get" action="rest5.php"><input type="hidden" name="var2" value=' . $_GET["var2"] . '><input type="submit"></form>';

?>




