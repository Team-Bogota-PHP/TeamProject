<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

<?php
$targetDir = 'uploads/';
$targetName = $targetDir . basename($_FILES['fileToUpload']['name']);
$uploadOK = true;
$fileType = pathinfo($targetName, PATHINFO_EXTENSION);
//Check if actual image
if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
    if (!$check) {
        echo "File is not an image. ";
        $uploadOK = false;
    }

// Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.<br />";
        $uploadOK = false;
    }

//Allow only certain file types
    if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'jpeg' && $fileType != 'gif') {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br />";
        $uploadOK = false;
    }

//Check if upload is OK
    if ($uploadOK) {
        $temp = explode(".", $_FILES["fileToUpload"]["name"]);
        $newfilename = rand(1, 999999999) . '.' . end($temp);
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/img" . $newfilename)) {
            echo "The file " . basename($_FILES['fileToUpload']['name']) . ' has been successfully uploaded<br />';
        }
    } else {
        echo 'Sorry, there was an error uploading your file<br />';
    }
}
?>