<?php
session_start();
#$_SESSION['user_token']='abc';
?>
<script>


function refreshPage(){
    window.location.reload();
} 

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

        teamName = document.getElementById("getTeamNames").value;
	    leagueName = document.getElementById("leagueName").value;
        alert(teamName);
        console.log(teamName);
//      numCols = document.getElementById("Matches").name;
//      console.log(numCols);
        url="fav_add.php?TeamName="+teamName+"&LeagueName="+leagueName+"&junk="+Math.random();
//      url = "hel.php?rows="+numRows+"&cols="+numCols+"&junk="+Math.random();        
        http.open('get', url);
        http.onreadystatechange = handleAjaxResponse;
        http.send(null);
}
	
        function sendAjaxReqNotification(x){

// teamName = document.getElementById('notification').value;
console.log(x);
userName = x;
console.log(userName);
        url='notification.php?userName='+userName+'&junk='+Math.random();
        http.open('get', url);
        http.onreadystatechange = handleAjaxResponse55;
        http.send(null);

}      

        function DeleteAjaxReqNotification(x,userName){
GameID  = document.getElementById(x).name;
console.log(GameID);
console.log(userName);
        url="DeleteNotification.php?GameID="+GameID+"&UserName="+userName+"&junk="+Math.random();
        http.open("get", url);
        http.onreadystatechange = handleAjaxResponse55;
        http.send(null);

}       


function handleAjaxResponse55(){
        if( http.readyState == 4 ){  
        var response=http.responseText;
        console.log(response);
        document.getElementById('notification').innerHTML = response;
    }
}

	function getTeams(){

        leagueName = document.getElementById("leagueName").value;
        console.log(leagueName);
//      numCols = document.getElementById("Matches").name;
//      console.log(numCols);
        url= "teams.php?League="+leagueName+"&junk="+Math.random();
//      url = "hel.php?rows="+numRows+"&cols="+numCols+"&junk="+Math.random();        
        http.open('get', url);
        http.onreadystatechange = handleAjaxResponse2;
        http.send(null);
}
//ajax response
	function handleAjaxResponse2(){
        if( http.readyState == 4 ){   
        var response=http.responseText;
		console.log(response);
		//document.getElementById("getTeamNames").value = document.write(response);
        document.getElementById("getTeamNames").innerHTML= response;
    }
}

function handleAjaxResponse(){
        if( http.readyState == 4 ){   
        var response=http.responseText;
        document.getElementById("subresult").innerHTML = response;
    }
} 


</script>

<html>


<body onload=sendAjaxReqNotification("<?php print_r( $_SESSION['user_token']);?>")>"
<link rel="stylesheet" href="login2.css"/>
<div id=leagues>

  <div id=logoutbutton>
      <a href="logout.php">Logout</a>
</div>

<br><br>
<br><br>
<br><br>
<br>
<center><h2><?php echo "Welcome: " . $_SESSION['user_token']; ?>
</h2></center>


           
<br><br>
<br><br>
<center>
<div id=favteam>
    <a href="userFavoriteTeam.php">Favorite Team</a>
</div>
	
	<label for="leagueName">League Names</label>
	<select name="leagueName" id="leagueName" onchange=getTeams()>
		
		<option> </option>
		<option value="1. Bundesliga 2016/17"> Bundesliga </option>
		<option value="Serie A 2016/17">SerieA </option>
		<option value="Primera Division 2016/17"> LaLiga </option>
		<option value="Premier League 2016/17"> PremierLeague </option>
		<option value="Ligue 1 2016/17"> Ligue1 </option>
        
		<!--<span id="getTeamNames">LeagueNames </span> -->
	</select>
	
			<br><br><br>
	<label for= "getTeamNames"> Team Names </label>
    <select name="teamNames" id="getTeamNames">
		<div id=getteams></div>                                          
	</select>
        <input type=button id=favleagues name=favLeague value=Subscribe onclick=sendAjaxReq()> 
			<div id="subresult"></div></center>

<input type=button onclick=refreshPage()  id=refresh value='View Notifications'>
<br> <b></b><br>
<div id=notification><br><b><br><br></b></div>    
    

<br><br><br><br>
<div id=ligue1>

<img alt="french" src="frenchligue.jpg" width="150" height="150">
<center><a href="ligue1.html"><button>Ligue 1</button>
</a>
</div>

<div id=premier>
<img alt="england" src="premierlogo.png" width="150" height="150">
<center><a href="PL.html"><button>Premier League</button>

</a>
</div>


<div id=spain>
<img alt="spain" src="spain.png" width="150" height="150">
<center><a href="laligafinaltrial.html"><button>La Liga</button>

</a>
</div>

<div id=germany>
<img alt="german" src="german.png" width="150" height="150">
<center><a href="bundesliga.html"><button>Bundes Liga</button>
</a>
</div>


<div id=italian>
<img alt="italian" src="italian.png" width="150" height="150">
<center><a href="italian.html"><button>Serie A</button>

</a>
</div>
</p>
</div>
</body>
</html>

