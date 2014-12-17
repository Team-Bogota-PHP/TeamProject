<?php
include "core/init.php";
protect_page();
include "overallHeader.php"
?>
    <h1>List of all active Users</h1>

<?php
$result = mysql_query("SELECT `username` FROM `users`");
echo("<ul>");
while ($table = mysql_fetch_array($result)) :
    if (user_active($table[0]) === true) :
        echo("<li><a href=\"profile.php?username=$table[0]\">$table[0]</a></li>");
        $personalGallery = mysql_query("SELECT p_img FROM image WHERE user_uploaded='$table[0]'");
        while ($img = mysql_fetch_array($personalGallery)) :
            $tags = mysql_fetch_array(mysql_query("SELECT p_tags FROM image WHERE p_img='$img[0]'"));
            ?>
            <a href="<?php echo $img[0] ?>" data-lightbox="<?php echo $table[0]?>" data-title="Tags: <?php echo $tags[0]?>"><img
                    id="gallery" src="<?php echo $img[0] ?>" alt="image"/></a>
        <?php
        endwhile;
    endif;
endwhile;
echo("</ul>");
?>

<?php include "overallFooter.php" ?>