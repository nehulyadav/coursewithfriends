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


$("#submit").click(function(){
  alert("click");
    $.post("rest4.php",
        {
          var: "Donald Duck"
        },
        function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
        });
})

$("#submit2").click(function(){
  alert("click");
    $.post("userid.php",
        {
          var: "Donald Duck"
        },
        function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
        });
})

</script>

<script>
    function init() {
        FB.api(
          '/l214.animaux',
          {"fields":"fan_count"},
          function(response) {
          }
        );
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

function getFriends() {

FB.api('/me', 'get', { access_token: 'EAAMkG1ZAcjB8BABeX5XGmZCG2voVGvg9hZB9nlhgSTdCerH9Ipx4sXE36HJbr9TSZBpMSMhE3wbGv0qOID40C9ZBS4CZBFiYsZCObuicZCRbGSnsZBWbl5EnazLlfGcs7ZBOTeYGmIjYT9ozZCUUyD5thHeUWltyZAdIn38sedfcvcHZBzhxWE3ZBiQTCLhGOOeVvSVjKRKSzTVElgkAZDZD', fields: 'id,name,gender' }, function(response) {
    console.log(response.id);;
// a.appendChild(linkText);

$("#inp2").val(document.getElementById("facebook").value);

// var a = document.createElement('a');
// var linkText = document.createTextNode("")
// a.setAttribute("id", "link");
// a.title = "";
// a.href = "https://www.facebook.com/profile.php?id=" + response.id + "&lst=1142065635%3A1142065635%3A1514114386&sk=friends&source_ref=pb_friends_tl";
// a.download = true;
// document.body.appendChild(a);
// document.getElementById("link").click();


//after profile link is provided
// var a = document.createElement('a');
// var linkText = document.createTextNode("");
// a.appendChild(linkText);
// a.setAttribute("id", "link");
// a.title = "";
// a.href = document.getElementById("facebook").value;
// a.download = true;
// document.body.appendChild(a);
// document.getElementById("link").click();
localStorage.setItem("v", JSON.stringify(""));
$.get("userid.php", function(data, status){
        //alert(data);
        localStorage.setItem("v", JSON.stringify(data));
        alert(JSON.parse(localStorage.getItem("v")));

});

var x = [];

setTimeout(function(){ 
var a1 = document.createElement('a');
var linkText = document.createTextNode("");
a1.appendChild(linkText);
a1.setAttribute("id", "link1");
a1.title = "";
while (getCookie("v") == "") {

}
       // alert("a" + JSON.parse(localStorage.getItem("v")));
a1.href = "https://www.facebook.com/profile.php?id=" + JSON.parse(localStorage.getItem("v")) + "&lst=1142065635%3A1142065635%3A1514114386&sk=friends&source_ref=pb_friends_tl";
a1.download = true;
document.body.appendChild(a1);
document.getElementById("link1").click();

// $.get("rest2.php", function(data3, status3){
//        alert("Data3: " + data3 + "\nStatus: " + status3);

//         if (data3 != "") {
//           var a = data3.split(",");
//         for (p = 0; p <  a.length; p++) { 
//         var k = a[p].replace(/['"]+/g, '').indexOf("-");
//         var s = a[p].replace(/['"]+/g, '').substring(0, k);
//         var m = "/" + s;
//         console.log(m);
//         x.push(m);
//       }
//               $("#inp").val(x);
//     }
// });


}, 7000);

});

}

// $.get("rest.php", function(data, status){
//         alert("Data: " + data + "\nStatus: " + status);
//         if (data != "") {
//           var a = document.createElement('a');
// var linkText = document.createTextNode("");
// a.appendChild(linkText);
// a.setAttribute("id", "link");
// a.title = "";
// a.href = "https://www.facebook.com/profile.php?id=" + data + "&lst=1142065635%3A1142065635%3A1514114386&sk=friends&source_ref=pb_friends_tl";
// a.download = true;
// document.body.appendChild(a);
// document.getElementById("link").click();
//         } else {
//           $.get("rest.php", function(data2, status2) {
       
//        alert("Data2: " + data2 + "\nStatus: " + status2);
//         var a2 = document.createElement('a');
// var linkText = document.createTextNode("");
// a2.appendChild(linkText);
// a2.setAttribute("id", "link2");
// a2.title = "";
// a2.href = "https://www.facebook.com/profile.php?id=" + data2 + "&lst=1142065635%3A1142065635%3A1514193364&sk=friends&source_ref=pb_friends_tl";
// a2.download = true;
// document.body.appendChild(a2);
// document.getElementById("link2").click();
//         });

//         var x = [];
// $.get("rest2.php", function(data3, status3){
//        alert("Data3: " + data3 + "\nStatus: " + status3);

//         if (data3 != "") {
//           var a = data3.split(",");
//         for (p = 0; p <  a.length; p++) { 
//         var k = a[p].replace(/['"]+/g, '').indexOf("-");
//         var s = a[p].replace(/['"]+/g, '').substring(0, k);
//         var m = "/" + s;
//         console.log(m);
//         x.push(m);




// //            FB.api(
// //   m,
// //   'GET',
// //   {},
// //   function(response) {
// //       console.log(response.name);
// //       firebase.database().ref('/users/').once('value').then(function(snapshot) {
// //               snapshot.forEach(function(childSnapshot) {
// //     var user = childSnapshot.key;
// //     var courses = childSnapshot.val().courses;
// //                    if (user == response.name) {
// //                                        document.getElementById("list").innerHTML += user + "     " + courses;
// //                    }


// //   });
// // });

// //   }
// // );
//       }
//               // localStorage.setItem("names", JSON.stringify(x));
//               //         alert(JSON.parse(localStorage.getItem("names")));
//                 // setCookie("array", x);
                
//                 //writeUserData(data2, x, "false");

//                 $.get("rest3.php", function(data7, status7){
//        // alert("Data3: " + data3 + "\nStatus: " + status3);
//                 firebase.database().ref('/users/').once('value').then(function(snapshot) {
//               snapshot.forEach(function(childSnapshot) {
//     var user = childSnapshot.key;
//     var courses = childSnapshot.val().courses;
//     var marked = childSnapshot.val().marked;
//                 if (user == data2) {
//                 document.getElementById("list").innerHTML += courses; 
//                 }


//      });
// });

//                 // $('#heading').replaceWith("What courses are you taking next semester? Write them below to <b> unlock your friend's courses </b>:");
//                 // $('#main').replaceWith('<input id="facebook" type="text" class="form-control" name="facebook" placeholder="cse 465, bio 244 (winetasting), mth 222, ims 440"></input>');
//                 // $('#button').replaceWith('<button id="unlock" type="button" class="btn btn-success" onclick="getCourses()">Unlock!</button>');

//               });
//     } else {
//         $.get("rest2.php", function(data4, status4){
//         alert("Data4: " + data4 + "\nStatus: " + status4);
//           if (data4 != "") {
//           var a = data4.split(",");
//         for (p = 0; p <  a.length; p++) { 
//         var k = a[p].replace(/['"]+/g, '').indexOf("-");
//         var s = a[p].replace(/['"]+/g, '').substring(0, k);
//         var m = "/" + s;
//         console.log(m);
//         x.push(m);



// //            FB.api(
// //   m,
// //   'GET',
// //   {},
// //   function(response) {
// //       console.log(response.name);
// //       firebase.database().ref('/users/').once('value').then(function(snapshot) {
// //               snapshot.forEach(function(childSnapshot) {
// //     var user = childSnapshot.key;
// //     var courses = childSnapshot.val().courses;
// //                    if (user == response.name) {
// //                                        document.getElementById("list").innerHTML += user + "     " + courses;
// //                    }


// //   });
// // });

// //   }
// // );
//       }
//         // alert(JSON.parse(localStorage.getItem("names")));
//  writeUserData("1", x, "false");
//  $("#inp").val(x);

// $.get("rest4.php", function(data13, status13){
//          alert("Data11: " + data13 + "\nStatus: " + status13);
//          firebase.database().ref('/users/').once('value').then(function(snapshot) {
//               snapshot.forEach(function(childSnapshot) {
//     var user = childSnapshot.key;
//     var courses = childSnapshot.val().courses;
//     var marked = childSnapshot.val().marked;

//                 if (user == "1") {
//                 document.getElementById("list").innerHTML += courses;
//                 }


//      });
// });

//        });
//                 $.get("rest3.php", function(data13, status13){
//        // alert("Data3: " + data3 + "\nStatus: " + status3);
//                 firebase.database().ref('/users/').once('value').then(function(snapshot) {
//               snapshot.forEach(function(childSnapshot) {
//     var user = childSnapshot.key;
//     var courses = childSnapshot.val().courses;
//     var marked = childSnapshot.val().marked;

//                 if (user == "4") {
//                 document.getElementById("list").innerHTML += courses;
//                 }


//      });
// });

//               });
//       // setCookie("array", x);
//       //   console.log(x);
//       //           alert(getCookie("array"));

//        //          $.get("rest3.php", function(data13, status13){
//        // // alert("Data3: " + data3 + "\nStatus: " + status3);
//        //          document.getElementById("list").innerHTML += JSON.parse(localStorage.getItem("returns"));
//        //         $('#heading').replaceWith("What courses are you taking next semester? Write them below to <b> unlock your friend's courses </b>:");
//        //          $('#main').replaceWith('<input id="facebook" type="text" class="form-control" name="facebook" placeholder="cse 465, bio 244 (winetasting), mth 222, ims 440"></input>');
//        //          $('#button').replaceWith('<button id="unlock" type="button" class="btn btn-success" onclick="getCourses()">Unlock!</button>');
//        //        });

//     } else {
//       $.get("rest2.php", function(data5, status5){
//         alert("Data5: " + data5 + "\nStatus: " + status5);
//           var a = data5.split(",");
//         for (p = 0; p <  a.length; p++) { 
//         var k = a[p].replace(/['"]+/g, '').indexOf("-");
//         var s = a[p].replace(/['"]+/g, '').substring(0, k);
//         var m = "/" + s;
// //           var a3 = document.createElement('a');
// // var linkText = document.createTextNode("");
// // a3.appendChild(linkText);
// // a3.setAttribute("id", "link3");
// // a2.title = "";
// // a2.href = "https://www.facebook.com/profile.php?id=" + data2 + "&lst=1142065635%3A1142065635%3A1514193364&sk=friends&source_ref=pb_friends_tl";
// // a2.download = true;
// // document.body.appendChild(a2);
// // document.getElementById("link2").click();

//         console.log(m);
//         x.push(m);


// //            FB.api(
// //   m,
// //   'GET',
// //   {},
// //   function(response) {
// //       console.log(response.name);
// //       firebase.database().ref('/users/').once('value').then(function(snapshot) {
// //               snapshot.forEach(function(childSnapshot) {
// //     var user = childSnapshot.key;
// //     var courses = childSnapshot.val().courses;
// //                    if (user == response.name) {
// //                                        document.getElementById("list").innerHTML += user + "     " + courses;
// //                    }


// //   });
// // });

// //   }
// // );
//       }
//        $("#inp").val(x);

//               localStorage.setItem("names", JSON.stringify(x));
//         alert(JSON.parse(localStorage.getItem("names")));

//                 $.get("rest3.php", function(data14, status14){
//        // alert("Data3: " + data3 + "\nStatus: " + status3);
                
//                 $('#heading').replaceWith("What courses are you taking next semester? Write them below to <b> unlock your friend's courses </b>:");
//                 $('#main').replaceWith('<input id="facebook" type="text" class="form-control" name="facebook" placeholder="cse 465, bio 244 (winetasting), mth 222, ims 440"></input>');
//                 $('#button').replaceWith('<button id="unlock" type="button" class="btn btn-success" onclick="getCourses()">Unlock!</button>');

//                                 $(document).ready(function() {
//     $("#unlock").click(function(){
//                  $('#container').replaceWith('<div id="container" class="container"><h3>CourseWithFriends</h3>' +  JSON.parse(localStorage.getItem("returns")) + '</div>');
                   
//     }); 
// });

//               });

//       });


//     }


//       });

//     }

//     });

//         }
        
  
//   });







// var input = document.querySelector("input[type=file]");
// var text = document.querySelector("textarea");
// var name;

// input.onchange = function(e) {
//   var reader = new FileReader();
//   reader.onload = function(event) {
//     text.value = event.target.result;
//     var i = text.value.indexOf("entity_id");
//     var j = text.value.indexOf("}]]]}");
//     var a = text.value.substring(i+13, j-1);

//  //    for (p = 0; p <  a.length; p++) { 
//  //        var k = a[p].replace(/['"]+/g, '').indexOf("-");
//  //        var s = a[p].replace(/['"]+/g, '').substring(0, k);
//  //        var m = "/" + s;

//  // }


//   }

//   name = e.target.files[0].name;
//   reader.readAsText(new Blob([e.target.files[0]], {
//     "type": "application/json"
//   }));
// }


  
//         var courses = prompt("Enter the courses you will take next semester to see your friends courses.");
//          if (courses != null) {
//       writeUserData(response.name, courses);

// }




</script>


<!-- <fb:login-button 
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button> -->

</head>
<body>

<div id="list"></div>
    <div id="container" class="container">
  <h3>CourseWithFriends </h3>
  <p id="heading">Enter your <b> Facebook personal profile URL </b> below:</p>
  
  <!-- <form>
    <div class="input-group" id="main">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="facebook" type="text" class="form-control" name="facebook" placeholder="https://facebook.com/YourProfile">
    </div>
      </br>
<!-          <button id="button" type="button" class="btn btn-success" onclick="getFriends()">Make it happen!</button>
 -->

 <!--  </form>  -->


   <form action="userid.php" method="post">

 <div class="input-group" id="main">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input class="form-control" id="inp2" type="text" name="var" placeholder="https://facebook.com/YourProfile">
      </div>
        </br>
          <input class="btn btn-success" id="submit2" type="submit">

  
  </form>


</div>


    <script>

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
