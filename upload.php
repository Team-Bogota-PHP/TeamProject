<?php
include "core/init.php";
include "overallHeader.php";
?>
    <div id="wrapper">
        <h2>Multiple Image Upload Form</h2>

        <form action="" method="post" enctype="multipart/form-data">
            Allowed formats: JPEG, PNG, JPG, GIF. Image Size: Less than 2MB.
            <div id="filediv">
                <input type="file" name="fileToUpload[]" id="fileToUpload1" class="file"/>

                <div id="uploadButton1" class="upload">Browse...</div>
                <input type="text" id="tags" name="tags[]" class="tags" placeholder="Image tags"/><br/><br/>
            </div>
            <input type="button" id="addMore" class="upload" value="Add More Files"/>
            <input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
            <input type="button" id="removeField" class="hidden" value="Remove Field"/>
        </form>
    </div>
<?php
if (isset($_POST['submit'])) {
    $index = 0; //
    $targetDir = 'uploads/'; // Folder for uploaded files

    for ($i = 0; $i < count($_FILES['fileToUpload']['name']); $i++) {
        if ($_FILES['fileToUpload']['name'][$i]) {
            $validExtensions = array('jpeg', 'jpg', 'png', 'gif');

            $targetFile = $targetDir . basename($_FILES['fileToUpload']['name'][$i]);
            $fileExtension = pathinfo($targetFile, PATHINFO_EXTENSION);
            $fileSize = $_FILES['fileToUpload']['size'][$i];
            $tags = htmlentities($_POST['tags'][$i]);

            $uploadOK = true;
            $checkIfImage = getimagesize($_FILES['fileToUpload']['tmp_name'][$i]);

            $targetFile = $targetDir . md5(uniqid()) . '.' . $fileExtension;

            $index++; //Increment number of uploaded images

            if (!$checkIfImage) {
                $uploadOK = false;
                echo $index . ').<span id="error">***Invalid file Type***</span><br /><br />';
            } else if ($fileSize > 2000000) {
                $uploadOK = false;
                echo $index . ').<span id="error">***File too big***</span><br /><br />';
            } else if (!in_array($fileExtension, $validExtensions)) {
                $uploadOK = false;
                echo $index . ').<span id="error">***Invalid file Type***</span><br /><br />';
            } else if ($uploadOK) {
                if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'][$i], $targetFile)) { //If file moved to uploads folder successfully
                    $user_id = $_SESSION['user_id'];
                    $user = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE user_id='$user_id'"));
                    $sql = "INSERT INTO image (p_img , p_tags,user_uploaded) VALUES ('$targetFile', '$tags', '$user[0]')";
                    if (mysql_query($sql) === TRUE) {
                        echo $index . ').<span id="noError">Image uploaded successfully!</span><br /><br />';
                    } else {
                        echo $index . ').<span id="error">Error uploading file, please try again!</span><br /><br />';
                    }
                } else {
                    echo $index . ').<span id="error">Error uploading file, please try again!</span><br /><br />';
                }
            }
        }
    }
}
?>
    <script src="scripts/uploadJS.js"></script>

<?php
include 'overallFooter.php';
?>