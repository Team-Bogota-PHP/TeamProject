<?php
include "core/init.php";
logged_in_redirect();
include "overallHeader.php";

if(isset($_GET['success']) === true && empty($_GET['success']) === true) {
?>
    <h2>Thanks, we have activated your account.</h2>
    <p>And you are free to log in.</p>

<?php
} else if(isset($_GET['email'], $_GET['email_code']) === true) {
        $email = trim($_GET['email']);
        $email_code = trim($_GET['email_code']);
        if(email_exists($email) === false) {
            $errors[] = 'We could not find that email address.';
        } else if(activate($email, $email_code) === false) {
            $errors[] = 'We had problems activating your account';
        }

        if(empty($errors) === false) {
        ?>
            <h2>Oops...</h2>
        <?php
            echo(output_errors($errors));
        } else {
            header('Location: activate.php?success');
            exit();
        }


    } else {
        // some message ?
        header('Location: header.php');
        exit();
    }


include "overallFooter.php";
?>