<footer>
    Team BOGOTA®  <?php printf('<span>Page loaded in <span style="color: red; font-weight: bold">%.5f</span> seconds.</span>',  (microtime(TRUE) - $_SERVER['REQUEST_TIME_FLOAT']));?>
    <span> View Count: <span style="font-weight: bold; color: red"> <?php echo  ($_SESSION['views']) ?> </span> </span>
    <?php
        $browser_id = $_SERVER["HTTP_USER_AGENT"];
    $browser = get_browser();
        if(strpos($browser_id, "Windows")) {
            echo("<span>Running on: <span style='font-weight: bold; color: red'>Windows</span></span>");
        } else if(strpos($browser_id, "Linux")) {
            echo("<span>Running on: <span style='font-weight: bold; color: red'>Linux</span></span>");
        } else {
            echo("<span>Running on: <span style='font-weight: bold; color: red'>Macintosh</span></span>"); // I know there are more but....
        }
    ?>
</footer>