<?php
include "core/init.php";
logged_in_redirect();
include "overallHeader.php";

if(empty($_POST) === false) {
    $required_fields = array('username', 'password', 'password_again', 'first_name', 'email');
    foreach ($_POST as $key => $value) {
        if (empty($value) && in_array($key, $required_fields) === true) {
            $errors[] = 'Fields marked with an asterisk are required';
            break 1; // break out of the inner loop and continue execution
        }
    }

    if(empty($errors) === true) {
        if(user_exists($_POST['username']) === true) {
            $errors[] = 'Sorry, the username \'' . htmlentities($_POST['username']) . '\' is already taken.';
        }
        if(preg_match('/\s+/',$_POST['username']) == true) {
            $errors[] = 'Your user name must not contain any spaces';
        }
        if(strlen($_POST['password']) < 6) { // no need to check the two passwords
            $errors[] = 'Your password must be at least 6 characters long.';
        }
        if(strlen($_POST['password']) > 32) { // no need to check the two passwords
            $errors[] = 'Your password must be less than 32 characters long.';
        }
        if($_POST['password'] !== $_POST['password_again']) {
            $errors[] = 'Your passwords do not match.';
        }
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            if(!preg_match_all('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST['email'])) {
                $errors[] = 'The e-mail you provided is not valid.';
            }
        }
        if(email_exists($_POST['email']) === true) {
            $errors[] = 'Sorry, the email \'' . htmlentities($_POST['email']) . '\' is already in use.';
        }

    }

}

?>

<h1>Register</h1>
<?php
    if(isset($_GET['success']) == 'true') { //if(isset($_GET['success']) === true && empty($_GET['success']) === false) {
        echo('You have been registered successfully! Please check your email to activate your account');
    } else {
        if (empty($_POST) === false && empty($errors) === true) {
            $register_data = array(
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'email_code' => md5($_POST['username'] + microtime())
            );
            register_user($register_data);
            header('Location: register.php?success=true');
            echo("<p>You have been registered successfully! Please check your email to activate your account</p>");
            exit();
        } else if (empty($errors) === false) {
            echo(output_errors($errors));
        }


        ?>
        <form action="" method="post">
            <ul>
                <li>
                    Username*:<br>
                    <input type="text" name="username">
                </li>
                <li>
                    Password*:<br>
                    <input type="password" name="password">
                </li>
                <li>
                    Repeat password*:<br>
                    <input type="password" name="password_again">
                </li>
                <li>
                    First name*:<br>
                    <input type="text" name="first_name">
                </li>
                <li>
                    Last name:<br>
                    <input type="text" name="last_name">
                </li>
                <li>
                    Email*:<br>
                    <input type="text" name="email">
                </li>
                <li>
                    <input type="submit" value="Register">
                </li>
            </ul>
        </form>

        * = required fields


    <?php
    }
include "overallFooter.php";
?>