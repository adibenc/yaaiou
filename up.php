<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="file" id="file">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

<?php
$target_dir = __DIR__."/uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
		} else {
		echo "Sorry, there was an error uploading your file.";
		}
	}
}
?>