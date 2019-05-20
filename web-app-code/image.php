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
#id5 {
	margin-left: 610px;
	margin-top: 20px;
}
#id2 {
	text-align: center;
}
.sp1 {
	color: red;
}
#id1 {
	text-align: center;
	color: blue;
}
#id7 {
	margin-left: 630px;
}
.error {color: #FF0000;}
</style>
</head>
<body>


<?php
$image = $imageErr ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
/* Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/
// Check if file already exists
//if (file_exists($target_file)) {
  //  echo "Sorry, file already exists.";
    //$uploadOk = 0;
//}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
    $imageErr="Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $imageErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
//if ($uploadOk == 0) {
  //  $imageErr = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
//} else {
    else if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $imageErr = "File Uploaded Successfully.";
    } else {
        $imageErr = "Sorry, there was an error uploading your file.";
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
    <img src="images/image.png" height="150" width="150" id="id5">
    <h1 id="id1">UPLOAD IMAGE</h1>
    <pre>
    <form name="frm2" method="post" id="id2" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> enctype="multipart/form-data">
        	<label>Upload Image<span class="sp1">*</span></label>            <input type="file" name="image" id="image" ><span class="error"><?php echo $imageErr;?></span><br><br>
        <input type="submit"> 
    </form> 
    </pre>     
    </div>   
    <a href="submit.php"><img src="images/back.gif" width="130px" height="50px" id="id7"></a> 
    <div>
    	<footer id="four">
    		<h5 id="five">&copy;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GRAPHICAL PASSWORD</h5>
    	</footer>
    </div>
</body>
</html>