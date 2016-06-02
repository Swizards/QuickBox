<?php

if ($_GET['installpackage-btsync']) {
        //header('Location: /');
        header('Refresh: 15; /');
        writeMsg("Hello <b>$username</b>: I am completing the installation of the <b>BTSync</b> package. Your browser will refresh once more when the installation has fully completed, this may take upwards of 15 seconds ... <br>");
        $message = "Hello <b>$username</b>: I am completing the installation of the <b>BTSync</b> package. Your browser will refresh once more when the installation has fully completed, this may take upwards of 15 seconds ... <br><br>";
        shell_exec("sudo /usr/local/bin/installpackage-btsync");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removepackage-btsync']) {
        //header('Location: /');
        header('Refresh: 15; /');
        writeMsg("Hello <b>$username</b>: I am completing the removal of the <b>BTSync</b> package. Your browser will refresh once more when the uninstall has fully completed, this may take upwards of 15 seconds ... <br>");
        $message = "Hello <b>$username</b>: I am completing the removal of the <b>BTSync</b> package. Your browser will refresh once more when the uninstall has fully completed, this may take upwards of 15 seconds ... <br>";
        shell_exec("sudo /usr/local/bin/removepackage-btsync");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}

if ($_GET['installpackage-csf']) {
        //header('Location: /');
        header('Refresh: 15; /');
        writeMsg("Hello <b>$username</b>: I am completing the installation of the <b>Config Server Firewall (CSF)</b> package. Your browser will refresh once more when the installation has fully completed, this may take upwards of 15 seconds ... <br>");
        $message = "Hello <b>$username</b>: I am completing the installation of the <b>Config Server Firewall (CSF)</b> package. Your browser will refresh once more when the installation has fully completed, this may take upwards of 15 seconds ... <br><br>";
        shell_exec("sudo /usr/local/bin/installpackage-csf");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removepackage-csf']) {
        //header('Location: /');
        header('Refresh: 15; /');
        writeMsg("Hello <b>$username</b>: I am completing the removal of the <b>Config Server Firewall (CSF)</b> package. Your browser will refresh once more when the uninstall has fully completed, this may take upwards of 15 seconds ... <br>");
        $message = "Hello <b>$username</b>: I am completing the removal of the <b>Config Server Firewall (CSF)</b> package. Your browser will refresh once more when the uninstall has fully completed, this may take upwards of 15 seconds ... <br>";
        shell_exec("sudo /usr/local/bin/removepackage-csf");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}

if ($_GET['installpackage-plex']) {
        //header('Location: /');
        header('Refresh: 15; /');
        writeMsg("Hello <b>$username</b>: I am completing the installation of the <b>Plex Media Server</b> package. Your browser will refresh once more when the installation has fully completed, this may take upwards of 15 seconds ... <br>");
        $message = "Hello <b>$username</b>: I am completing the installation of the <b>Plex Media Server</b> package. Your browser will refresh once more when the installation has fully completed, this may take upwards of 15 seconds ... <br>";
        shell_exec("sudo /usr/local/bin/installpackage-plex");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removepackage-plex']) {
        //header('Location: /');
        header('Refresh: 15; /');
        writeMsg("Hello <b>$username</b>: I am completing the removal of the <b>Plex Media Server</b> package. Your browser will refresh once more when the uninstall has fully completed, this may take upwards of 15 seconds ... <br>");
        $message = "Hello <b>$username</b>: I am completing the removal of the <b>Plex Media Server</b> package. Your browser will refresh once more when the uninstall has fully completed, this may take upwards of 15 seconds ... <br>";
        shell_exec("sudo /usr/local/bin/removepackage-plex");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}

if ($_GET['installpackage-rapidleech']) {
        //header('Location: /');
        header('Refresh: 15; /');
        writeMsg("Hello <b>$username</b>: I am completing the installation of the <b>Rapidleech</b> package. Your browser will refresh once more when the installation has fully completed, this may take upwards of 15 seconds ... <br>");
        $message = "Hello <b>$username</b>: I am completing the installation of the <b>Rapidleech</b> package. Your browser will refresh once more when the installation has fully completed, this may take upwards of 15 seconds ... <br>";
        shell_exec("sudo /usr/local/bin/installpackage-rapidleech");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removepackage-rapidleech']) {
        //header('Location: /');
        header('Refresh: 15; /');
        writeMsg("Hello <b>$username</b>: I am completing the removal of the <b>Rapidleech</b> package. Your browser will refresh once more when the uninstall has fully completed, this may take upwards of 15 seconds ... <br>");
        $message = "Hello <b>$username</b>: I am completing the removal of the <b>Rapidleech</b> package. Your browser will refresh once more when the uninstall has fully completed, this may take upwards of 15 seconds ... <br>";
        shell_exec("sudo /usr/local/bin/removepackage-rapidleech");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}

if ($_GET['installpackage-sickrage']) {
        //header('Location: /');
        header('Refresh: 15; /');
        writeMsg("Hello <b>$username</b>: I am completing the installation of the <b>SickRage</b> package. Your browser will refresh once more when the installation has fully completed, this may take upwards of 15 seconds ... <br>");
        $message = "Hello <b>$username</b>: I am completing the installation of the <b>SickRage</b> package. Your browser will refresh once more when the installation has fully completed, this may take upwards of 15 seconds ... <br>";
        shell_exec("sudo /usr/local/bin/installpackage-sickrage");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removepackage-sickrage']) {
        //header('Location: /');
        header('Refresh: 15; /');
        writeMsg("Hello <b>$username</b>: I am completing the removal of the <b>SickRage</b> package. Your browser will refresh once more when the uninstall has fully completed, this may take upwards of 15 seconds ... <br>");
        $message = "Hello <b>$username</b>: I am completing the removal of the <b>SickRage</b> package. Your browser will refresh once more when the uninstall has fully completed, this may take upwards of 15 seconds ... <br>";
        shell_exec("sudo /usr/local/bin/removepackage-sickrage");
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}

?>
