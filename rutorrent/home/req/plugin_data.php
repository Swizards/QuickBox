<?php
if ($_GET['installplugin-getdir']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>getdir plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>getdir plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-getdir"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-getdir']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>getdir plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>getdir plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-getdir"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-task']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>task plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>task plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-task"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-task']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>task plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>task plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-task"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-autodl']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>autodl-irssi plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>autodl-irssi plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-autodl"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-autodl']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>autodl-irssi plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>autodl-irssi plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-autodl"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-autotools']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>autotools plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>autotools plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-autotools"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-autotools']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>autotools plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>autotools plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-autotools"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-checkport']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>checkport plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>checkport plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-checkport"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-checkport']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>checkport plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>checkport plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-checkport"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-chunks']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>chunks plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>chunks plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-chunks"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-chunks']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>chunks plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>chunks plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-chunks"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-cookies']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>cookies plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>cookies plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-cookies"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-cookies']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>cookies plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>cookies plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-cookies"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-cpuload']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>cpuload plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>cpuload plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-cpuload"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-cpuload']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>cpuload plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>cpuload plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-cpuload"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-create']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>create plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>create plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-create"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-create']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>create plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>create plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-create"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-data']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>data plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>data plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-data"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-data']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>data plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>data plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-data"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-datadir']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>datadir plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>datadir plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-datadir"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-datadir']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>datadir plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>datadir plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-datadir"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-diskspace']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>diskspace plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>diskspace plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-diskspace"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-diskspace']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>diskspace plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>diskspace plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-diskspace"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-edit']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>edit plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>edit plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-edit"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-edit']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>edit plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>edit plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-edit"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-erasedata']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>erasedata plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>erasedata plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-erasedata"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-erasedata']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>erasedata plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>erasedata plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-erasedata"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-extratio']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>extratio plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>extratio plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-extratio"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-extratio']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>extratio plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>extratio plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-extratio"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-extsearch']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>extsearch plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>extsearch plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-extsearch"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-extsearch']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>extsearch plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>extsearch plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-extsearch"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-feeds']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>feeds plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>feeds plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-feeds"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-feeds']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>feeds plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>feeds plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-feeds"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-filedrop']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>filedrop plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>filedrop plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-filedrop"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-filedrop']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>filedrop plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>filedrop plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-filedrop"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-filemanager']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>filemanager plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>filemanager plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-filemanager"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-filemanager']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>filemanager plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>filemanager plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-filemanager"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-fileshare']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>fileshare plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>fileshare plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-fileshare"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-fileshare']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>fileshare plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>fileshare plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-fileshare"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-fileupload']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>fileupload plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>fileupload plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-fileupload"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-fileupload']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>fileupload plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>fileupload plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-fileupload"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-history']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>history plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>history plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-history"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-history']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>history plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>history plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-history"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-httprpc']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>httprpc plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>httprpc plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-httprpc"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-httprpc']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>httprpc plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>httprpc plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-httprpc"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-ipad']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>ipad plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>ipad plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-ipad"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-ipad']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>ipad plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>ipad plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-ipad"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-loginmgr']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>loginmgr plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>loginmgr plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-loginmgr"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-loginmgr']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>loginmgr plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>loginmgr plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-loginmgr"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-logoff']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>logoff plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>logoff plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-logoff"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-logoff']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>logoff plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>logoff plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-logoff"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-lookat']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>lookat plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>lookat plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-lookat"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-lookat']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>lookat plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>lookat plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-lookat"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-mediainfo']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>mediainfo plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>mediainfo plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-mediainfo"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-mediainfo']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>mediainfo plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>mediainfo plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-mediainfo"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-mobile']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>mobile plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>mobile plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-mobile"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-mobile']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>mobile plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>mobile plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-mobile"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-noty']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>noty plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>noty plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-noty"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-noty']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>noty plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>noty plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-noty"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-pausewebui']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>pausewebui plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>pausewebui plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-pausewebui"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-pausewebui']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>pausewebui plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>pausewebui plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-pausewebui"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-ratio']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>ratio plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>ratio plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-ratio"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-ratio']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>ratio plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>ratio plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-ratio"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-ratiocolor']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>ratiocolor plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>ratiocolor plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-ratiocolor"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-ratiocolor']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>ratiocolor plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>ratiocolor plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-ratiocolor"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-retrackers']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>retrackers plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>retrackers plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-retrackers"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-retrackers']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>retrackers plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>retrackers plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-retrackers"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-rpc']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>rpc plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>rpc plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-rpc"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-rpc']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>rpc plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>rpc plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-rpc"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-rss']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>rss plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>rss plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-rss"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-rss']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>rss plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>rss plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-rss"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-rssurlrewrite']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>rssurlrewrite plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>rssurlrewrite plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-rssurlrewrite"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-rssurlrewrite']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>rssurlrewrite plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>rssurlrewrite plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-rssurlrewrite"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-rutracker_check']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>rutracker_check plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>rutracker_check plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-rutracker_check"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-rutracker_check']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>rutracker_check plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>rutracker_check plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-rutracker_check"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-scheduler']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>scheduler plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>scheduler plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-scheduler"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-scheduler']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>scheduler plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>scheduler plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-scheduler"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-screenshots']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>screenshots plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>screenshots plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-screenshots"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-screenshots']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>screenshots plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>screenshots plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-screenshots"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-seedingtime']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>seedingtime plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>seedingtime plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-seedingtime"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-seedingtime']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>seedingtime plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>seedingtime plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-seedingtime"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-show_peers_like_wtorrent']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>show_peers_like_wtorrent plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>show_peers_like_wtorrent plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-show_peers_like_wtorrent"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-show_peers_like_wtorrent']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>show_peers_like_wtorrent plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>show_peers_like_wtorrent plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-show_peers_like_wtorrent"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-source']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>source plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>source plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-source"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-source']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>source plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>source plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-source"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-stream']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>stream plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>stream plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-stream"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-stream']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>stream plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>stream plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-stream"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-theme']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>theme plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>theme plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-theme"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-theme']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>theme plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>theme plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-theme"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-throttle']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>throttle plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>throttle plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-throttle"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-throttle']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>throttle plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>throttle plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-throttle"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-tracklabels']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>tracklabels plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>tracklabels plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-tracklabels"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-tracklabels']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>tracklabels plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>tracklabels plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-tracklabels"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-trafic']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>trafic plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>trafic plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-trafic"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-trafic']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>trafic plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>trafic plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-trafic"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-unpack']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>unpack plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>unpack plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-unpack"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-unpack']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>unpack plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>unpack plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-unpack"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['installplugin-xmpp']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have installed the <b>xmpp plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have installed the <b>xmpp plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/installplugin-xmpp"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
if ($_GET['removeplugin-xmpp']) { 
        //header('Location: /');
        header('Refresh: 5; /');
        writeMsg("Hello <b>$username</b>: I have removed the <b>xmpp plugin</b> for ruTorrent. Your browser will refresh now ... <br>");
        $message = "Hello <b>$username</b>: I have removed the <b>xmpp plugin</b> for ruTorrent. Your browser will refresh now ... <br>";
        shell_exec("sudo -u root /usr/bin/removeplugin-xmpp"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
}
?>
