<!DOCTYPE html>
<html>
<head>
    <title>Multiple Image Upload Form</title>
    <!--    Including jQuery from Google-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/upload.css"/>
</head>
<body>
<div id="wrapper">
    <h2>Multiple Image Upload Form</h2>

    <form action="" method="post" enctype="multipart/form-data">
        First Field is required. Allowed formats: JPEG, PNG, JPG, GIF. Image Size: Less that 2MB.
        <div id="filediv"><input type="file" name="fileToUpload[]" id="fileToUpload"/><br/><br/></div>
        <input type="button" id="addMore" class="upload" value="Add More Files"/>
        <input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
    </form>
</div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $index = 0; //
    $targetDir = 'uploads/'; // Folder for uploaded files

    for ($i = 0; $i < count($_FILES['fileToUpload']['name']); $i++) {
        if ($_FILES['fileToUpload']['name'][$i]) {
            $validExtension = array('jpeg', 'jpg', 'png', 'gif');
            $targetFile = $targetDir . basename($_FILES['fileToUpload']['name'][$i]);
            $fileExtension = pathinfo($targetFile, PATHINFO_EXTENSION);
            $fileSize = $_FILES['fileToUpload']['size'][$i];
            $checkIfImage = getimagesize($_FILES['fileToUpload']['tmp_name'][$i]);
            $uploadOK = true;
            $targetFile = $targetDir . md5(uniqid()) . '.' . $fileExtension;

            $index++; //Increment number of uploaded images

            if (!$checkIfImage) {
                $uploadOK = false;
                echo $index . ').<span id="error">***Invalid file Type***</span><br /><br />';
            } else if ($fileSize > 2000000) {
                $uploadOK = false;
                echo $index . ').<span id="error">***File too big***</span><br /><br />';
            } else if (!in_array($fileExtension, $validExtension)) {
                $uploadOK = false;
                echo $index . ').<span id="error">***Invalid file Type***</span><br /><br />';
            } else if ($uploadOK) {
                if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'][$i], $targetFile)) { //If file moved to uploads folder successfully
                    echo $index . ').<span id="noError">Image uploaded successfully!</span><br /><br />';
                } else {
                    echo $index . ').<span id="error">Error uploading file, please try again!</span><br /><br />';
                }
            }
        }
    }
}
?>

<script src="scripts/uploadJS.js"></script>