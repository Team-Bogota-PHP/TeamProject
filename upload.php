<!DOCTYPE html>
<html>
<body>


<!DOCTYPE html>
<html>
<head>
    <title>Upload Multiple Images Form</title>
    <!-------Including jQuery from Google ------>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/upload.css"/>
<body>
<div id="maindiv">
    <div id="formdiv">
        <h2>Multiple Image Upload Form</h2>

        <form enctype="multipart/form-data" action="" method="post">
            First Field is Compulsory. Only JPEG,PNG,JPG,GIF Type Image Allowed. Image Size Should Be Less Than 2MB.
            <div id="filediv"><input name="file[]" type="file" id="file"/><br/><br/></div>
            <input type="button" id="addMore" class="upload" value="Add More Files"/>
            <input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
        </form>
    </div>
</div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $index = 0;
    $targetPath = "uploads/";     // Declaring Path for uploaded images.

// Loop to get individual element from the array
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
        $validExtensions = array("jpeg", "jpg", "png", "gif");      // Valid extensions
        $targetFile = $targetPath . basename($_FILES['file']['name'][$i]);
        $fileExtension = pathinfo($targetFile, PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["file"]["tmp_name"][$i]);
        // Set the target path with a new name of image.
        $targetPath = $targetPath . md5(uniqid()) . "." . $fileExtension;

        $index++;      // Increment the number of uploaded images according to the files in array.

        if ($check && ($_FILES["file"]["size"][$i] < 2000000) && in_array($fileExtension, $validExtensions)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $targetPath)) { // If file moved to uploads folder.
                echo $index . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {     //  If File Was Not Moved.
                echo $index . ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {     //   If File Size or File Type Was Incorrect.
            echo $index . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }
}
?>


<script src="scripts/uploadJS.js"></script>