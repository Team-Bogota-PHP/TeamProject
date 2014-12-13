<?php
include "core/init.php";
protect_page();
include "overallHeader.php";

if(empty($_POST) === false) {
    $required_fields = array('first_name', 'email');
    foreach ($_POST as $key => $value) {
        if (empty($value) && in_array($key, $required_fields) === true) {
            $errors[] = 'Fields marked with an asterisk are required';
            break 1; // break out of the inner loop and continue execution
        }
    }

    if(empty($errors) === true) {


        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            if(!preg_match_all('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST['email'])) {
                $errors[] = 'The e-mail you provided is not valid.';
            }
        } else if(email_exists($_POST['email']) === true && $user_data['email'] !== $_POST['email']) { // check if exists
            $errors[] = 'Sorry, the email \'' . htmlentities($_POST['email']) . '\' is already in use.';

        }
    }
}

?>
    <h1>Settings</h1>

<?php
if(isset($_GET['success']) === true && empty($_GET['success']) === true ) {
    echo('Your details have been updated');
} else {
    if (empty($_POST) === false && empty($errors) === true) {
        $update_data = array(
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
        );

        update_user($update_data);
        header('Location: settings.php?success');
        exit();

    } else if (empty($errors) === false) {
        echo(output_errors($errors));
    }
    ?>

    <form action="" method="post">
        <ul>
            <li>
                First name*<br>
                <input type="text" name="first_name" value="<?php echo $user_data['first_name']; ?>">
            </li>
            <li>
                Last name<br>
                <input type="text" name="last_name" value="<?php echo $user_data['last_name']; ?>">
            </li>
            <li>
                Email*<br>
                <input type="text" name="email" value="<?php echo $user_data['email']; ?>">
            </li>
            <li>
                <input type="submit" value="Update">
            </li>
        </ul>
    </form>


<?php
}
include "overallFooter.php"
?>