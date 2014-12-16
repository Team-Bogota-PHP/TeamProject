<?php
if(isset($_GET['bgimage'])) {
$image = $_GET['bgimage'];
$_SESSION['bgimage']=$image;
}
@$bgimage_session = $_SESSION['bgimage'];
?>