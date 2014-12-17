<?php
include "core/init.php";
protect_page();
include "overallHeader.php"
?>

    <h1>Picture Gallery</h1>
<?php
$result = mysql_query("SELECT p_img FROM image");
while ($table = mysql_fetch_array($result)) :
    $tags = mysql_fetch_array(mysql_query("SELECT p_tags FROM image WHERE p_img='$table[0]'"));
    ?>
    <a href="<?php echo $table[0] ?>" data-lightbox="gallery" data-title="Tags: <?php echo $tags[0]?>"><img
            id="gallery" src="<?php echo $table[0] ?>" alt="image"/></a>
<?php
endwhile;
include "overallFooter.php" ?>