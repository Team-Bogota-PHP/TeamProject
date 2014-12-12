<?php
include "core/init.php";
logged_in_redirect();


if(empty($_POST) === false) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // need to do more validation
    if(empty($username) || empty($password)) {
        $currentMessage = 'Please enter a username and password';
        $errors[] = $currentMessage;
    } else if(user_exists($username) === false) {
        $currentMessageTwo = 'Can not find that user. Did you register?';
        $errors[] = $currentMessageTwo;
    } else if(user_active($username) === false) {
        $currentMessageThree = 'You have not activated your account';
        $errors[] = $currentMessageThree;
    } else {
        if(strlen($password) > 32) {
            $errors[] = 'The password is too long';
        }
        $login = login($username, $password);
        if($login === false) {
            $errors[] = 'That username/password combination is incorrect';
        } else {
            $_SESSION['user_id'] = $login; // set the user seession
            header('Location: index.php'); // redirect to page
            exit();


        }


    }
} else {
    $errors[] = 'No data received'; // or redirect to home
}
include "../TeamProject/overallHeader.php";

if(empty($errors) === false) {
?>
    <h2>We have encountered some errors.</h2>
<?php
    echo(output_errors($errors));
}

include "../TeamProject/overallFooter.php";
?>