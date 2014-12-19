<?php
include "core/init.php";
include "overallHeader.php"
?>

<?php
    if(isset($_POST['from']) && isset($_POST['subject']) && isset($_POST['text']) ) {
        $from = sanitize($_POST['from']);
        $subject = sanitize($_POST['subject']);
        $text = sanitize($_POST['text']);
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
        <div id="label">Name*</div>
        <input type="text" id="name" name="from" required="required">
        <div id="label">Subject</div>
        <input type="text" id="subject" name="subject" required="required">
        <div id="label">Message*</div>
        <textarea name="text" id="text" cols="50" rows="10"></textarea>
        <input type="submit" id="message" value="SEND">
    </form>



<?php include "overallFooter.php" ?>