<?php
if ($_GET['clean_mem']) {
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I am completing the cleanup of the <b>Physical Memory</b> cache. Your browser will refresh once more when the cleanup has fully completed ... <br>");
        $message = "Hello <b>$username</b>: I am completing the cleanup of the <b>Physical Memory</b> cache. Your browser will refresh once more when the cleanup has fully completed ... <br>";
        shell_exec("sudo /usr/local/bin/clean_mem");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
?>
