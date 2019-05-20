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

</style>
</head>
<body>
    <?php
if(!isset( $_POST['phpro_username']))
{
    //header("Location: login.php?q=1");
    $message = 'Please enter a valid username and password';
}
else 
{
    $servername= 'localhost';
    $username = 'root';
    $password = 'shubham';
    $dbname = 'graphical_password';
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
     }
    $uname=$_POST["phpro_username"];
    $pass=$_POST["phpro_password"];
    //echo $uname;
    //echo $pass;
    $sql = "SELECT Password from password where Username='$uname'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    if($row["Password"]==$pass)
        echo "You're Now Logged In !!";
    else {
        //echo "Login Failed!! Invalid Credentials!!";
        header("Location: login.php?q=1"); 
    }

}
?>
    <div>
        <header id="three">
        <img src="images/title.jpg" width="450px" height="100px" id="two">
        <img src="images/right.jpg" width="250px" height="35px" id="one">
        </header>
    </div>
    <div>
        <img src="images/img2.jpg" width="1365" height="400" alt="Home" usemap="#new">
        <map name="new">
            <area shape="poly" coords="167,72,343,71,346,241,168,243" alt="Image" href="image.php">
            <area shape="poly" coords="568,71,747,71,745,240,564,242" alt="Fragment" href="fragment.php">
            <area shape="poly" coords="968,72,1145,72,1145,244,969,240" alt="Logout" href="main.html">
        </map>
    </div>
    <div>
        <footer id="four">
            <h5 id="five">&copy;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GRAPHICAL PASSWORD</h5>
        </footer>
    </div>
</body>
</html>