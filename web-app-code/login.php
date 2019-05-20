<!DOCTYPE html>
<html> 
<head>
	<title>Graphical Password</title>
<style type="text/css">
body {
	border-top-style: solid;
	border-top-color: red;
	border-top-width: 5px;
	margin-top: 0px;
	margin-left: 0px;
	margin-right: 0px;
}
#one {
	float: right;
	margin-top: 20px;
	margin-right: 16px;
}
#two {
	margin-top: 8px;
}
#three {
	border-bottom-width: 5px;
	border-bottom-color: red;
	border-bottom-style: solid;
}
#five {
	text-align: center;
	background-color: gray;
}
.sp1 {
	color: red;
}
#id1 {
	text-align: center;
	color: blue;
}
#id4 {
	margin-left: 610px;
	margin-top: 20px;
}
#id2 {
	text-align: center;
}
.error {color: #FF0000;}
</style>
</head>
<body>
	<div>
		<header id="three">
        <img src="images/title.jpg" width="450px" height="100px" id="two">
        <img src="images/right.jpg" width="250px" height="35px" id="one">
        </header>
    </div>
    <div>
    <img src="images/log.png" height="150" width="150" id="id4"><br><br>
    <h1 id="id1">LOGIN</h1>
    <pre>
    <form name="frm1" method="post" id="id2" action="submit.php">
        	<label>Username<span class="sp1">*</span></label>            <input type="text" name="phpro_username" id="phpro_username" value=""><br>
                <label>Password<span class="sp1">*</span></label>             <input type="password" name="phpro_password" id="phpro_password" value=""><br><br>
            <input type="submit"> 
    </form> 
    </pre>
    <?php 
    //you should be checking whether the index 'q' actually exists in the $_GET arrray before attempting to use it. so for it use isset().
        if(isset($_GET['q'])) {
        if ($_GET['q'] == 1) {
    	echo "Login Failed!! Invalid Credentials!!";
        } }
    ?>     
    </div>
    <div>
    	<footer id="four">
    		<h5 id="five">&copy;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GRAPHICAL PASSWORD</h5>
    	</footer>
    </div>
</body>
</html>