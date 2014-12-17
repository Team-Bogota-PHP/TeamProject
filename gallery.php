<?php
include "core/init.php";
protect_page();
include "overallHeader.php"
?>

    <h1>Picture Gallery</h1>
<?php
$result = mysql_query("SELECT p_img FROM image");
while ($table = mysql_fetch_array($result)) {
    echo("<img id=\"gallery\" src=\"$table[0]\">");
}
?>


<?php include "overallFooter.php" ?>