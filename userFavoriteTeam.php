<?php
session_start();
?>
<script>
function createRequestObject(){
        var ro;
        //Get name of browser
    var browser = navigator.appName;
        //Create browser-specific HTTP request object
    if(browser == "Microsoft Internet Explorer")
                ro = new ActiveXObject("Microsoft.XMLHTTP");  
    else
                ro = new XMLHttpRequest(); 
    return ro;
}

var http = createRequestObject();
//ajax requests
function sendAjaxReq(){

       teamList = document.getElementById("teamNames").value;
        console.log(teamList);
//      numCols = document.getElementById("Matches").name;
//      console.log(numCols);
        url= "fav_add.php?rows="+teamList+"&junk="+Math.random();
//      url = "hel.php?rows="+numRows+"&cols="+numCols+"&junk="+Math.random();        
        http.open('get', url);
        http.onreadystatechange = handleAjaxResponse;
        http.send(null);
}
//ajax response

function handleAjaxResponse(){
        if( http.readyState == 4 ){   
        var response=http.responseText;
        document.getElementById("subresult").innerHTML = response;
    }
}

</script>

<html>

<body>
<link rel="stylesheet" href="login.css"/>


  <div id=logoutbutton>
      <a href="logout.php">Logout</a>
</div>

<br><br>
<br><br>
<br><br>
<br>
<center><h2><?php echo "Welcome: " . $_SESSION['user_token']; ?>
</h2></center>


           
<div id=home>
<a href="index.html">
<center><img alt="home" src="logo.jpg" width="450" height="250"></center><br>
</a>
</div>


</body>
</html>

