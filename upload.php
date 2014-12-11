<!DOCTYPE html>
<html>
<body>


/* file upload for multiple images does not work */
<form action="upload.php" method="post" id="form" enctype="multipart/form-data">
    <div class="clone">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </div>

</form>

<button type="button" onclick="addElement()">Add Language</button>
<button type="button" onclick='removeElement()'>Remove Language</button>

</body>
</html>

<?php

if (isset($_POST['submit'])) {
    $targetDir = 'uploads/';
    $targetName = $targetDir . basename($_FILES['fileToUpload']['name']);
    $uploadOK = true;
    $fileType = pathinfo($targetName, PATHINFO_EXTENSION);
    //Check if actual image
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


<script>
    var counter = 0;
    function addElement() {
        var element = document.getElementsByClassName("clone")[counter];
        var clone = element.cloneNode(true);
        form.appendChild(clone);
        counter++;
    }
    function removeElement(){
        if(counter != 0) {
            counter--;
            form.removeChild(document.getElementsByClassName("clone")[counter + 1]);
        }
    }

</script>