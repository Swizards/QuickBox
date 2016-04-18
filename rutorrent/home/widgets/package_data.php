<?php
if ($_GET['installpackage-plex']) {
        //header('Location: /');
        header('Refresh: 30; /');
        writeMsg("Hello <b>$username</b>: I am completing the installation of the <b>Plex Media Server</b> package. Your browser will refresh once more when the installation has fully completed, this may take upwards of 30 seconds ... <br>");
        $message = "Hello <b>$username</b>: I am completing the installation of the <b>Plex Media Server</b> package. Your browser will refresh once more when the installation has fully completed, this may take upwards of 30 seconds ... <br>";
        shell_exec("sudo /usr/bin/installpackage-plex");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removepackage-plex']) {
        //header('Location: /');
        header('Refresh: 30; /');
        writeMsg("Hello <b>$username</b>: I am completing the removal of the <b>Plex Media Server</b> package. Your browser will refresh once more when the uninstall has fully completed, this may take upwards of 30 seconds ... <br>");
        $message = "Hello <b>$username</b>: I am completing the removal of the <b>Plex Media Server</b> package. Your browser will refresh once more when the uninstall has fully completed, this may take upwards of 30 seconds ... <br>";
        shell_exec("sudo /usr/bin/removepackage-plex");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installpackage-btsync']) {
        //header('Location: /');
        header('Refresh: 30; /');
        writeMsg("Hello <b>$username</b>: I am completing the installation of the <b>BTSync</b> package. Your browser will refresh once more when the installation has fully completed, this may take upwards of 30 seconds ... <br>");
        $message = "Hello <b>$username</b>: I am completing the installation of the <b>BTSync</b> package. Your browser will refresh once more when the installation has fully completed, this may take upwards of 30 seconds ... <br><br>";
        shell_exec("sudo /usr/bin/installpackage-btsync");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removepackage-btsync']) {
        //header('Location: /');
        header('Refresh: 30; /');
        writeMsg("Hello <b>$username</b>: I am completing the removal of the <b>BTSync</b> package. Your browser will refresh once more when the uninstall has fully completed, this may take upwards of 30 seconds ... <br>");
        $message = "Hello <b>$username</b>: I am completing the removal of the <b>BTSync</b> package. Your browser will refresh once more when the uninstall has fully completed, this may take upwards of 30 seconds ... <br>";
        shell_exec("sudo /usr/bin/removepackage-btsync");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
?>
