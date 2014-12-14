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
            }
        }
        echo("</ul>");
    ?>

<?php include "overallFooter.php" ?>