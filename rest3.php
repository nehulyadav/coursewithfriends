<?php
if (isset($_GET['name'])) {
   echo $_GET['name'];
} else {

?>
<html>
<head>

<style>

textarea {
  white-space: pre;
  width: 400px;
  height: 300px;
}

</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



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

</script>

<script>
    function init() {
        FB.api(
          '/l214.animaux',
          {"fields":"fan_count"},
          function(response) {
          }
        );
        FB.getLoginStatus(function(response) {
    if (response.status === 'connected') {
    console.log(response.authResponse.accessToken);
  }
  });
    }

    window.fbAsyncInit = function() {
      FB.init({
        appId      : '884124761754655',
        xfbml      : true,
        version    : 'v2.5'
      });


      init();

    };

    (function(d, s, id){
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk/debug.js";
      fjs.parentNode.insertBefore(js, fjs);

    }(document, 'script', 'facebook-jssdk'));


function checkLoginState() {
  FB.getLoginStatus(function(response) {
    if (response.status === 'connected') {
    console.log(response.authResponse.accessToken);
  }
  });

getFriends();

}

function writeUserData(userId, courses, marked) {
  var database = firebase.database();
  firebase.database().ref('users/' + userId).set({
    courses: courses,
    marked: marked
  });
}


function getFriends() {

  FB.api(
  '/1494391844',
  'GET',
  {},
  function(response) {
    alert(response.name);

  });

}

</script>


<fb:login-button id ="fb"
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button>

</head>
<body>
<div id="list"></div>

    <div class="container">
  <h3>CourseWithFriends </h3>
  <p>Enter your <b> Facebook personal profile URL </b> below:</p>
  
  <form>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="facebook" type="text" class="form-control" name="facebook" placeholder="https://facebook.com/YourProfile">
    </div>
  </form>
</div>



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
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}


//     function openTab(url) {
//     // Create link in memory
//     var a = window.document.createElement("a");
//     a.target = '_blank';
//     a.href = url;
 
//     // Dispatch fake click
//     var e = window.document.createEvent("MouseEvents");
//     e.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
//     a.dispatchEvent(e);
// };


// https://www.facebook.com/v2.5/dialog/oauth?app_id=884124761754655&auth_type=&channel_url=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df5817d48d41438%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ff3216ac6ee46d9%26relation%3Dopener&client_id=884124761754655&display=popup&domain=localhost&e2e=%7B%7D&locale=en_US&logger_id=e3c63578-dae0-4d3a-a7d5-b67ee7206676&origin=1&redirect_uri=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df2b65532897f388%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ff3216ac6ee46d9%26relation%3Dopener%26frame%3Df3c9dcdcb21984&ref=LoginButton&response_type=none%2Ctoken%2Csigned_request&scope=public_profile%2Cemail&sdk=joey&seen_revocable_perms_nux=false&version=v2.5

// // openTab('https://www.facebook.com/v2.5/dialog/oauth?app_id=884124761754655&auth_type=&channel_url=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df30b7a76bf7d898%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ff13582fd63bb2d4%26relation%3Dopener&client_id=884124761754655&display=popup&domain=localhost&e2e=%7B%7D&locale=en_US&logger_id=bd6f7d57-4798-ea14-b52a-f837f5a4e4f2&origin=1&redirect_uri=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df3684a725f955a%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ff13582fd63bb2d4%26relation%3Dopener%26frame%3Df2454e2f5ebfafc&ref=LoginButton&response_type=none%2Ctoken%2Csigned_request&scope=public_profile%2Cemail&sdk=joey&seen_revocable_perms_nux=false&version=v2.5');

// https://www.facebook.com/v2.5/dialog/oauth?app_id=884124761754655&auth_type=&channel_url=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df167a616db72f8c%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ff286ace2de7715c%26relation%3Dopener&client_id=884124761754655&display=popup&domain=localhost&e2e=%7B%7D&locale=en_US&logger_id=5aa64c39-e4a5-4e3b-c819-b3c9f99f6ccb&origin=1&redirect_uri=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df277393eb140bd%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ff286ace2de7715c%26relation%3Dopener%26frame%3Df29d7e5f90e1ca4&ref=LoginButton&response_type=none%2Ctoken%2Csigned_request&scope=public_profile%2Cemail&sdk=joey&seen_revocable_perms_nux=false&version=v2.5

// https://www.facebook.com/v2.5/plugins/login_button.php?app_id=884124761754655&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df19bc34b09f215%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ff286ace2de7715c%26relation%3Dparent.parent&amp;container_width=0&amp;locale=en_US&amp;login_text=%0A&amp;scope=public_profile%2Cemail&amp;sdk=joey


    // setTimeout(function(){ 

//       var a = document.createElement('a');
// var linkText = document.createTextNode("");
// a.appendChild(linkText);
// a.setAttribute("id", "link");
// a.title = "";
// a.href = "https://www.facebook.com/v2.5/dialog/oauth?app_id=884124761754655&auth_type=&channel_url=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df30b7a76bf7d898%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ff13582fd63bb2d4%26relation%3Dopener&client_id=884124761754655&display=popup&domain=localhost&e2e=%7B%7D&locale=en_US&logger_id=bd6f7d57-4798-ea14-b52a-f837f5a4e4f2&origin=1&redirect_uri=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df3684a725f955a%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ff13582fd63bb2d4%26relation%3Dopener%26frame%3Df2454e2f5ebfafc&ref=LoginButton&response_type=none%2Ctoken%2Csigned_request&scope=public_profile%2Cemail&sdk=joey&seen_revocable_perms_nux=false&version=v2.5";
// a.target = "_blank";
// document.body.appendChild(a);
// document.getElementById("link").click();

  
// var str = document.getElementsByTagName("fb:login-button")[0].innerHTML;
// var k = str.indexOf("https");
// var l = str.indexOf("\" style")
// var sub = str.substring(k, l);
// var b = sub.split("%");
// alert(b[20]);
// var f = b[20].indexOf("f");
// var id = b[20].substring(f, b[20].length);
// alert(id);

// https://www.facebook.com/v2.5/dialog/oauth?app_id=884124761754655&auth_type=&channel_url=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df34dcc6f726bbcc%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ff62150228336f8%26relation%3Dopener&client_id=884124761754655&display=popup&domain=localhost&e2e=%7B%7D&locale=en_US&logger_id=fc643023-8705-26a7-b32e-3608d500d23d&origin=1&redirect_uri=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df150dac0a29223%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ff62150228336f8%26relation%3Dopener%26frame%3Df1d50d4fe0e29b4&ref=LoginButton&response_type=none%2Ctoken%2Csigned_request&scope=public_profile%2Cemail&sdk=joey&seen_revocable_perms_nux=false&version=v2.5


// https://www.facebook.com/v2.5/dialog/oauth?app_id=884124761754655&auth_type=&channel_url=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df167a616db72f8c%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ff62150228336f8%26relation%3Dopener&client_id=884124761754655&display=popup&domain=localhost&e2e=%7B%7D&locale=en_US&logger_id=5aa64c39-e4a5-4e3b-c819-b3c9f99f6ccb&origin=1&redirect_uri=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df277393eb140bd%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ff62150228336f8%26relation%3Dopener%26frame%3Df29d7e5f90e1ca4&ref=LoginButton&response_type=none%2Ctoken%2Csigned_request&scope=public_profile%2Cemail&sdk=joey&seen_revocable_perms_nux=false&version=v2.5

// openTab('https://www.facebook.com/v2.5/dialog/oauth?app_id=884124761754655&auth_type=&channel_url=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df167a616db72f8c%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252F' + id + '%26relation%3Dopener&client_id=884124761754655&display=popup&domain=localhost&e2e=%7B%7D&locale=en_US&logger_id=5aa64c39-e4a5-4e3b-c819-b3c9f99f6ccb&origin=1&redirect_uri=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df277393eb140bd%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252F' + id + '%26relation%3Dopener%26frame%3Df29d7e5f90e1ca4&ref=LoginButton&response_type=none%2Ctoken%2Csigned_request&scope=public_profile%2Cemail&sdk=joey&seen_revocable_perms_nux=false&version=v2.5')


//https://www.facebook.com/v2.5/plugins/login_button.php?app_id=884124761754655&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0MeYM3BvDCE.js%3Fversion%3D42%23cb%3Df315244e857f6f4%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A8888%252Ffbf8e1dbae5348%26relation%3Dparent.parent&amp;container_width=0&amp;locale=en_US&amp;login_text=%0A&amp;scope=public_profile%2Cemail&amp;sdk=joey

// }, 3000);

var y = [];
    setTimeout(function(){ 
    //var a = JSON.parse(localStorage.getItem("names"));
    firebase.database().ref('/users/').once('value').then(function(snapshot) {
              snapshot.forEach(function(childSnapshot) {
    var user = childSnapshot.key;
    var courses = childSnapshot.val().courses;
    var marked = childSnapshot.val().marked;

    if (marked == "false") {

  for (p = 0; p <  courses.length; p++) { 

        FB.api(
  courses[p],
  'GET',
  {},
  function(response) {

// $.post("rest3.php", {name: response.name}, function(result){
//             alert("suc");

//         });


    y.push(response.name);
    writeUserData(user, y, "true");
    
 


    //     localStorage.setItem("returns", JSON.stringify(y));
    //                       alert(JSON.parse(localStorage.getItem("returns")));


  });
        }

}

  });
});

                




          // alert("dfd");
          // var st = document.getElementsByTagName("fb:login-button")[0];
          // console.log(st.innerHTML);
          // var fr = st.getElementsByTagName('iframe');
          // alert(fr);

 }, 6000);




// <?php
        
//     //       if (isset($_GET['name'])) {
//     //   echo $_GET['name'];
//     // }
//     echo "hi";
//         ?>

var input = document.querySelector("input[type=file]");
var text = document.querySelector("textarea");
var name;

input.onchange = function(e) {
  var reader = new FileReader();
  reader.onload = function(event) {
    text.value = event.target.result;
    var i = text.value.indexOf(",list:");
    var j = text.value.indexOf("shortProfiles");
    var a = text.value.substring(i+7, j-2).split(",");

    for (p = 0; p <  a.length; p++) { 
        var k = a[p].replace(/['"]+/g, '').indexOf("-");
        var s = a[p].replace(/['"]+/g, '').substring(0, k);
        var m = "/" + s;
           FB.api(
  m,
  'GET',
  {},
  function(response) {
      console.log(response.name);
      firebase.database().ref('/users/').once('value').then(function(snapshot) {
              snapshot.forEach(function(childSnapshot) {
    var user = childSnapshot.key;
    var courses = childSnapshot.val().courses;
                   if (user == response.name) {
                                       document.getElementById("list").innerHTML += user + "     " + courses;
                   }


  });
});

  }
);
      }

  }



  name = e.target.files[0].name;
  reader.readAsText(new Blob([e.target.files[0]], {
    "type": "application/json"
  }));
}
    </script>

</body>
</html>

<?php
}
?>
