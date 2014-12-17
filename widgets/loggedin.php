<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="scripts/uploadJS.js"></script>
<div class="widget">
    <h2>Hello, <?php echo $user_data['first_name'] ?> !</h2>

    <div class="inner">
        <div class="profile">
            <?php

            if (isset($_FILES['profile']) === true) {
                if (empty($_FILES['profile']['name']) === true) {
                    echo('Please choose a file');
                } else {
                    $allowed = array('jpg', 'jpeg', 'gif', 'png');
                    $file_name = $_FILES['profile']['name'];
                    $file_extn = strtolower(end(explode('.', $_FILES['profile']['name'])));
                    $file_temp = $_FILES['profile']['tmp_name'];
                    if (in_array($file_extn, $allowed) === true) {
                        change_profile_image($_SESSION['user_id'], $file_temp, $file_extn); // $_SESSION['user_id'] == $session_user_id (init)
                        header('Location: ' . $current_file); // index.php
                        echo("<p>You have successfuly uploaded your profile picture</p>");
                        exit();
                    } else {
                        echo('File extension is not allowed. Only:');
                        echo(implode(', ', $allowed));

                    }


                }
            }

            if (empty($user_data['profile']) === false) { //    if(empty($user_data['profile']) !== false) {
                echo '<img src="', $user_data['profile'], '" alt="', $user_data['first_name'], '\'s Profile Image">';

            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="profile" id="profileUpload" class="file"/>

                <div id="profilePic" class="profileUpload" onclick="profilePic()">Browse...</div>
                <input type="submit" value="Upload File" name="submit" class="profileUpload"/>
            </form>
        </div>
        <ul class="clear">
            <li>
                <a href="../TeamProject/logout.php">Log out</a>
            </li>
            <li>
                <a href="<?php echo('profile.php?username=' . $user_data['username']); ?>">Profile</a>
            </li>
            <li>
                <a href="../TeamProject/changepassword.php">Change password</a>
            </li>
            <li>
                <a href="../TeamProject/upload.php">Upload Pictures</a>
            </li>
            <li>
                <a href="../TeamProject/settings.php">Settings</a>
            </li>
        </ul>
    </div>
</div>

