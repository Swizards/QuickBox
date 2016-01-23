<?php
if ($_GET['installpackage-plex']) { 
        //header('Location: /');
        header('Refresh: 10; /');
        writeMsg("Hello <b>$username</b>: I am completing the installation of the <b>Plex Media Server</b> package. Your browser will refresh once more when the installation has fully completed ... <br>");
        $message = "Hello <b>$username</b>: I am completing the installation of the <b>Plex Media Server</b> package. Your browser will refresh once more when the installation has fully completed ... <br>";
        shell_exec("sudo -u root /usr/bin/installpackage-plex"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removepackage-plex']) { 
        //header('Location: /');
        header('Refresh: 10; /');
        writeMsg("Hello <b>$username</b>: I am completing the removal of the <b>Plex Media Server</b> package. Your browser will refresh once more when the uninstall has fully completed ... <br>");
        $message = "Hello <b>$username</b>: I am completing the removal of the <b>Plex Media Server</b> package. Your browser will refresh once more when the uninstall has fully completed ... <br>";
        shell_exec("sudo -u root /usr/bin/removepackage-plex"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installpackage-btsync']) { 
        //header('Location: /');
        header('Refresh: 10; /');
        writeMsg("Hello <b>$username</b>: I am completing the installation of the <b>BTSync</b> package. Your browser will refresh once more when the installation has fully completed ... <br>");
        $message = "Hello <b>$username</b>: I am completing the installation of the <b>BTSync</b> package. Your browser will refresh once more when the installation has fully completed ... <br><br>";
        shell_exec("sudo -u root /usr/bin/installpackage-btsync"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removepackage-btsync']) { 
        //header('Location: /');
        header('Refresh: 10; /');
        writeMsg("Hello <b>$username</b>: I am completing the removal of the <b>BTSync</b> package. Your browser will refresh once more when the uninstall has fully completed ... <br>");
        $message = "Hello <b>$username</b>: I am completing the removal of the <b>BTSync</b> package. Your browser will refresh once more when the uninstall has fully completed ... <br>";
        shell_exec("sudo -u root /usr/bin/removepackage-btsync"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
?>