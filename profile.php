<?php
include "core/init.php";
include "overallHeader.php";

if(isset($_GET['username']) === true && empty($_GET['username']) === false) {
    $username = $_GET['username'];
    if(user_exists($username) === true) {
        $user_id = user_id_from_username($username);
        $profile_data = user_data($user_id, 'first_name', 'last_name', 'email', 'profile');
        ?>

        <h1><?php echo $profile_data['first_name'] ?>'s Profile</h1>
        <p>Username: <?php echo $username ?></p>
        <p>First name: <?php echo $profile_data['first_name'] ?></p>
        <p>Last Name: <?php echo $profile_data['last_name'] ?></p>
        <p>Email: <?php echo $profile_data['email'] ?></p>
        <div id="profilePicture">

        <?php
        if(empty($user_data['profile']) === false) { //    if(empty($user_data['profile']) !== false) {
            $picture = mysql_fetch_assoc(mysql_query("SELECT `profile` FROM `users` WHERE `username` = '$username'"));
            $picture = $picture['profile'];
            echo '<h1>', $profile_data['first_name'] . '\'s picture' . '<h1>';
            echo '<img src="', $picture, '" alt="',  $profile_data['profile'] ,'\'s Profile Image">';
        }
        ?>
        </div>

    <?php
    } else {
        echo('No such user is found.');
    }
} else {
    header('Location: index.php');
    exit();
}

include "overallFooter.php"; ?>