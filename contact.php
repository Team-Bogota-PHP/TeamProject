<?php
include "core/init.php";
include "overallHeader.php"
?>

<?php
    if(isset($_POST['from']) && isset($_POST['subject']) && isset($_POST['text']) ) {
        $from = $_POST['from'];
        $subject = $_POST['subject'];
        $text = $_POST['text'];
        if(mail('georgi_iliev@yahoo.com', $subject, $text, $from)) {
            header("Location: contact.php");
            echo("<p>Your message was successfuly sent</p>");
            exit();
        } else {
            header("Location: contact.php");
            echo("<p>Mail send failure - message not sent</p>");
            exit();
        }
    }

?>

    <h1>Contacts</h1>

    <form action="" method="post" class="contact">
        <label for="name">From:</label>
        <input type="text" id="from" name="from" required="required">
        <label for="name">Subject:</label>
        <input type="text" id="subject" name="subject" required="required">
        <label for="text">Message:</label>
        <textarea name="text" id="text" cols="50" rows="10"></textarea>
        <input type="submit" value="SEND">
    </form>



<?php include "overallFooter.php" ?>