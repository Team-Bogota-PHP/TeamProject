<?php
include "core/init.php";
protect_page();
include "overallHeader.php"
?>
    <h1>List of all active Users</h1>

    <?php
        $result = mysql_query("SELECT `username` FROM `users`");
        echo("<ul>");
        while($table = mysql_fetch_array($result)) {
            if(user_active($table[0]) === true) {
                echo("<li><a href=\"profile.php?username=$table[0]\">$table[0]</a></li>");
                $personalGallery = mysql_query("SELECT p_img FROM image WHERE user_uploaded='$table[0]'");
                while ($img = mysql_fetch_array($personalGallery)) {
                    echo("<img id=\"gallery\" src=\"$img[0]\">");
                }
            }
        }
        echo("</ul>");
    ?>

<?php include "overallFooter.php" ?>