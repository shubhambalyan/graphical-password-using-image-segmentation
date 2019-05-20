<!DOCTYPE html>
<html> 
<head>
	<title>Register</title>
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
	background-color: white;
}
#five {
	text-align: center;
	background-color: gray;
}
#six {
	text-align: center;
	text-decoration: underline;
}
#seven {
	text-align: center;
}
#id7 {
  margin-left: 630px;
}
.error {color: #FF0000;}
</style>
</head>
<body bgcolor="#F0F8FF">
	<?php
$nameErr = $unameErr = $emailErr = $passErr = $genderErr = $contactErr = $addresErr=$countryErr=$pinErr= "";
$name =$uname= $email =$pass=$cpass= $gender = $contact = $address =$country=$pin= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   if (empty($_POST["uname"])) {
     $nameErr = "Username is required";
   } else {
     $uname = test_input($_POST["uname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z]*$/",$uname)) {
       $unameErr = "Only letters allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
   
    if (empty($_POST["pass"])) {
     $nameErr = "Password is required";
   } else {
     $pass = test_input($_POST["pass"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z0-9]*$/",$pass)) {
       $passErr = "Only letters and Numbers allowed"; 
     }
   }

   if (empty($_POST["cpass"])) {
     $passErr = "Password is required";
   } else {
     $cpass = test_input($_POST["cpass"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z0-9]*$/",$cpass)) {
       $passErr = "Only letters and Numbers allowed"; 
     }
   }

   if($cpass!=$pass)
   	$passErr = "Passwords Donot Match";

   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }

   if (empty($_POST["contact"])) {
     $contactErr = "Contact No is required";
   } else {
     $contact = test_input($_POST["contact"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]*$/",$contact)) {
       $contactErr = "Only Numbers allowed"; 
     }
   }

   if (empty($_POST["address"])) {
     $addresErr = "Address is required";
   } else {
     $address = test_input($_POST["address"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z0-9'\.\-\s\,]*$/",$address)) {
       $addresErr = "Not a valid address"; 
     }
   }

   if (empty($_POST["country"])) {
     $countryErr = "Country is required";
   } else {
     $country = test_input($_POST["country"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$country)) {
       $countryErr = "Only Spaces and Letters allowed"; 
     }
   }

   if (empty($_POST["pin"])) {
     $pinErr = "Pin is required";
   } else {
     $pin = test_input($_POST["pin"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]*$/",$pin)) {
       $pinErr = "Only Numbers allowed"; 
     }
   }

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$servername = "localhost";
$username = "root";
$password = "shubham";
$dbname = "graphical_password";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO registration VALUES ('$name','$uname','$email','$pass','$gender','$contact','$address','$country','$pin')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
}

$conns = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conns->connect_error);
}
$sqls = "INSERT INTO password VALUES ('$uname','$pass')";

if ($conns->query($sqls) === TRUE) {
 //   echo "New record created successfully";
}

$conn->close();
$conns->close();

?>
	<div>
		<header id="three">
        <img src="images/title.jpg" width="450px" height="100px" id="two">
        <img src="images/right.jpg" width="250px" height="35px" id="one">
        </header>
    </div>
    <div>
        <h2 id="six">Registration Form for Graphical Password</h2><br>
        <pre>
        <form name="frm" method="post" id="seven" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> enctype="multipart/form-data">
        	<label>Name<span class="error">*</span></label>           <input type="text" name="name" value=<?php echo $name;?>><span class="error">* <?php echo $nameErr;?></span><br><br>
            <label>Username<span class="error">*</span></label>       <input type="text" name="uname" value=<?php echo $uname;?>><span class="error">* <?php echo $unameErr;?></span><br><br>
              <label>E-mail<span class="error">*</span></label>             <input type="email" name="email" value=<?php echo $email;?>><span class="error">* <?php echo $emailErr;?></span><br><br>
            <label>Password<span class="error">*</span></label>       <input type="password" name="pass" value=<?php echo $pass;?>><span class="error">* <?php echo $passErr;?></span><br>                     <br>  
           <label>Confirm Password<span class="error">*</span></label><input type="password" name="cpass" value=<?php echo $cpass;?>><span class="error">* <?php echo $passErr;?></span><br><br>
            <label>Gender<span class="error">*</span></label>         <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male &nbsp;&nbsp;&nbsp;<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female<span class="error">* <?php echo $genderErr;?></span><br>
            <label>Contact No<span class="error">*</span></label>     <input type="text" name="contact" value=<?php echo $contact;?>><span class="error">* <?php echo $contactErr;?></span><br><br>
            <label>Address<span class="error">*</span></label>        <textarea cols="30" rows="3" name="address"><?php echo $address;?></textarea><span class="error">* <?php echo $addresErr;?></span><br><br>
            <label>Country<span class="error">*</span></label>        <input type="text" name="country" value=<?php echo $country;?>><span class="error">* <?php echo $countryErr;?></span><br><br>
            <label>Pin Code<span class="error">*</span></label>       <input type="number" name="pin" value=<?php echo $pin;?>><span class="error">* <?php echo $pinErr;?></span><br><br>
            <!--label>Upload Image<span class="error">*</span></label>   <input type="file" name="image"><br-->
            <input type="submit" name="submit" value="Submit">
        </form>
        </pre>
    </div>
    <?php 
     echo "<table> <tr><th>Attribute</th><th>Information</th></tr>";
     echo "<tr><td>Name</td><td>".$name."</td></tr>";
     echo "</table>";
    ?>
    <a href="main.php"><img src="back.gif" width="130px" height="50px" id="id7"></a>
    <div>
    	<footer id="four">
    		<h5 id="five">&copy;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GRAPHICAL PASSWORD</h5>
    	</footer>
    </div>
</body>
</html>