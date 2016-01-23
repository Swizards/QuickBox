<?php
session_destroy();
include '/srv/rutorrent/php/util.php';
include 'req/class.php';
$interface = "eth0";
$version = "qb-version";
error_reporting(E_ALL);
$username = getUser();
$master = shell_exec('sudo -u root cat /root/master.txt');
function session_start_timeout($timeout=5, $probability=100, $cookie_domain='/') {
  ini_set("session.gc_maxlifetime", $timeout);
  ini_set("session.cookie_lifetime", $timeout);
  $seperator = strstr(strtoupper(substr(PHP_OS, 0, 3)), "WIN") ? "\\" : "/";
  $path = ini_get("session.save_path") . $seperator . "session_" . $timeout . "sec";
  if(!file_exists($path)) {
    if(!mkdir($path, 600)) {
      trigger_error("Failed to create session save path directory '$path'. Check permissions.", E_USER_ERROR);
    }
  }
  ini_set("session.save_path", $path);
  ini_set("session.gc_probability", $probability);
  ini_set("session.gc_divisor", 100);
  session_start();
  if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(), $_COOKIE[session_name()], time() + $timeout, $cookie_domain);
  }
}

session_start_timeout(5);
$MSGFILE = session_id();

function processExists($processName, $username) {
  $exists= false;
  exec("ps axo user:20,pid,pcpu,pmem,vsz,rss,tty,stat,start,time,comm|grep $username | grep -iE $processName | grep -v grep", $pids);
  if (count($pids) > 0) {
    $exists = true;
  }
  return $exists;
}
$rtorrent = processExists("\"main|rtorrent\"",$username);
$irssi = processExists("irssi",$username);
$btsync = processExists("btsync",$username);
$plex = processExists("Plex",$username);

function isEnabled($search, $username){
  $string = file_get_contents('/home/'.$username.'/.startup');
  $service = $search;
  if(preg_match("/\b".$search."\b/", $string)){
    return " <div class=\"toggle-wrapper pull-right\"><div class=\"toggle-en toggle-light primary\" onclick=\"location.href='?id=77&serviceend=$service'\"></div></div>";
  } else {
    return " <div class=\"toggle-wrapper pull-right\"><div class=\"toggle-dis toggle-light primary\" onclick=\"location.href='?id=66&servicestart=$service'\"></div></div>";
  }
}

function writeMsg($message) {
  $file = $GLOBALS['MSGFILE'];
  $Handle = fopen("/tmp/" . $file, 'w');
  fwrite($Handle, $message);
  fclose($Handle);
}

function readMsg() {
  $file = $GLOBALS['MSGFILE'];
  $Handle = fopen("/tmp/" . $file, 'r');
  $output = fgets($Handle);
  fclose($Handle);
  if (isset($output)) {
    $data = $output;
    echo $data;
  } else {
    echo "error";
  }
}

function writePlex($ip) {
  $username = getUser();
  if (file_exists('.plex')) {
    $myFile = "/etc/apache2/sites-enabled/plex.conf";
    $fh = fopen($myFile, 'w') or die("can't open file");
    $stringData = "";
    fwrite($fh, $stringData);
    fclose($fh);
    unlink('.plex');
    writeMsg("Hello <b>$username</b>: Im going to disable public access for <b>Plex Media Server</b>. You may still access Plex privately on port <a href=\"http://ipaccess:32400/web/index.html\" target=\"_blank\">32400</a>. Note however, you will need to open an SSH Tunnel to use your servers Plex Media Server.<br><br>If you do not know how, read about setting up an SSH Tunnel <a href=\"https://github.com/JMSDOnline/quick-box/wiki/F.A.Q#how-do-i-create-an-ssh-tunnel-and-connect-to-plex\" rel=\"noindex, nofollow\" target=\"_blank\">HERE</a> ... <br>");
    $message = "Hello <b>$username</b>: Im going to disable public access for <b>Plex Media Server</b>. You may still access Plex privately on port <a href=\"http://ipaccess:32400/web/index.html\" target=\"_blank\">32400</a>. Note however, you will need to open an SSH Tunnel to use your servers Plex Media Server.<br><br>If you do not know how, read about setting up an SSH Tunnel <a href=\"https://github.com/JMSDOnline/quick-box/wiki/F.A.Q#how-do-i-create-an-ssh-tunnel-and-connect-to-plex\" rel=\"noindex, nofollow\" target=\"_blank\">HERE</a> ... <br>";
    shell_exec('sudo service apache2 reload &');
    return 'Disabling inital setup connection for plex ... ';
  } else {
    $myFile = "/etc/apache2/sites-enabled/plex.conf";
    $fh = fopen($myFile, 'w') or die("can't open file");
    $stringData = "";
    $stringData .= "LoadModule proxy_module /usr/lib/apache2/modules/mod_proxy.so\n";
    $stringData .= "LoadModule proxy_http_module /usr/lib/apache2/modules/mod_proxy_http.so\n";
    $stringData .= "<VirtualHost *:31400>\n";
    $stringData .= "ProxyRequests Off\n";
    $stringData .= "ProxyPreserveHost On\n";
    $stringData .= "<Proxy *>\n";
    $stringData .= " AddDefaultCharset Off\n";
    $stringData .= " Order deny,allow\n";
    $stringData .= " Allow from all\n";
    $stringData .= "</Proxy>\n";
    $stringData .= "ProxyPass / http://ipaccess:32400/\n";
    $stringData .= "ProxyPassReverse / http://ipaccess:32400/\n";
    $stringData .= "</VirtualHost>\n";
    $stringData .= "<IfModule mod_proxy.c>\n";
    $stringData .= "        Listen 31400\n";
    $stringData .= "</IfModule>\n";
    fwrite($fh, $stringData);
    fclose($fh);
    $myFile = ".plex";
    $fh = fopen($myFile, 'w') or die("can't open file");
    $stringData = "";
    fwrite($fh, $stringData);
    fclose($fh);
    writeMsg("Hello <b>$username</b>: Im going to enable public access for your <b>Plex Media Server</b> ... </a><br>");
    $message = "Hello <b>$username</b>: Im going to enable public access for your <b>Plex Media Server</b> ... </a><br>";
    shell_exec('sudo service apache2 reload & ');
    return 'Enabling inital setup connection for plex ... ';
  }
}

function chkPlex() {
  if (file_exists('.plex')) {
    return " <div class=\"toggle-wrapper pull-right\"><div class=\"toggle-en toggle-light primary\" onclick=\"location.href='?id=88'\"></div></div>";
  } else {
    return " <div class=\"toggle-wrapper pull-right\"><div class=\"toggle-dis toggle-light primary\" onclick=\"location.href='?id=88'\"></div></div>";
  }
}

$plexURL = "http://" . $_SERVER['HTTP_HOST'] . ":31400/web/";
$btsyncURL = "http://" . $_SERVER['HTTP_HOST'] . ":8888/gui/";

$reload='';
$service='';
if ($rtorrent == "1") { $rval = "RTorrent <span class=\"label label-success pull-right\">Enabled</span>"; 
} else { $rval = "RTorrent <span class=\"label label-danger pull-right\">Disabled</span>";
}

if ($irssi == "1") { $ival = "iRSSi-Autodl <span class=\"label label-success pull-right\">Enabled</span>"; 
} else { $ival = "iRSSi-Autodl <span class=\"label label-danger pull-right\">Disabled</span>";
}

if ($btsync == "1") { $bval = "BTSync <span class=\"label label-success pull-right\">Enabled</span>"; 
} else { $bval = "BTSync <span class=\"label label-danger pull-right\">Disabled</span>";
}

if (file_exists('.plex')) { $pval = "Plex Public Access <span class=\"label label-success pull-right\">Enabled</span>"; 
} else { $pval = "Plex Public Access <span class=\"label label-danger pull-right\">Disabled</span>";
}

if ($_GET['serviceend']) {
        $thisname = $_GET['serviceend'];
        $thisname = str_replace(['yes', 'no', '!!~!!'], ['!!~!!', 'yes', 'no'], $thisname);
}
if ($_GET['servicestart']) {
        $thisname=str_replace(['yes', 'no', '!!~!!'], ['!!~!!', 'yes', 'no'], $thisname);
        $thisname = $_GET['servicestart'];
}
if ($_GET['reload']) { 
        shell_exec("sudo -u " . $username . " /usr/bin/reload"); 
        $myUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) ? 'https' : 'http';
        $myUrl .= '://'.$_SERVER['HTTP_HOST'];
        $newURL = $myURL;
        header('Location: /');
}
include 'req/plugin_data.php';
include 'req/package_data.php';
$base = 1024;
$location = "/home";
                              
/* check for services */
switch (intval($_GET['id'])) {
case 0:
if (file_exists('/home/'.$username.'/.startup')) {
  $cbodyhello .= 'Hey <b>' . $username . '</b>: Please click switch On/Off Once and wait atleast 90 seconds for the changes to take affect ... <br><br><br>';
  $rtorrent = isEnabled("RTORRENT_CLIENT=yes", $username);
    $cbodyr .= "RTorrent ". $rtorrent;
  $irssi = isEnabled("IRSSI_CLIENT=yes", $username);
    $cbodyi .= "iRSSi-AutoDL ". $irssi;
  $btsync = isEnabled("BTSYNC=yes", $username);
    $cbodyb .= "BTSync ". $btsync;
  $plexcheck = chkPlex();
    $cbodyp .= "Plex Public Access " .$plexcheck;
  } else {
    $cbodyerr .= "error locating start up script .. feel free to open a issue at the quick box repo"; 
}

break;

/* start services */
case 66:
  $name = $_GET['servicestart'];
  $thisname=str_replace(['yes', 'no', '!!~!!'], ['!!~!!', 'yes', 'no'], $name);
    if (file_exists('/home/'.$username.'/.startup')) {
    if ($name == "BTSYNC=yes") { $servicename = "btsync"; } else { $output = substr($thisname, 0, strpos(strtolower($thisname), '_')); $servicename = strtolower($output); }
writeMsg("Hey <b>$username</b>: Im going to enable <b>$servicename</b> ... Please allow 5 minutes for it to start ... </a><br>");
$message = "Hey <b>$username</b>: Im going to enable <b>$servicename</b> ... Please allow 5 minutes for it to start ... </a><br>";
    shell_exec("sudo sed -i 's/$thisname/$name/g' /home/$username/.startup");
  $output = substr($thisname, 0, strpos(strtolower($thisname), '_'));
//writeMsg("Starting: <b> " . $servicename . "</b>");
  } else {
writeMsg("error locating .startup .. feel free to open a issue at the quick box repo");
$message = "error locating .startup .. feel free to open a issue at the quick box repo";
  }
  header('Location: https://' . $_SERVER['HTTP_HOST'] . '/');
break;

/* disable services */
case 77:
  $name = $_GET['serviceend'];
  $thisname=str_replace(['yes', 'no', '!!~!!'], ['!!~!!', 'yes', 'no'], $name);
    if (file_exists('/home/'.$username.'/.startup')) {
    if ($name == "BTSYNC=yes") { $servicename = "btsync"; } else { $output = substr($thisname, 0, strpos(strtolower($thisname), '_')); $servicename = strtolower($output);
    if (strpos($servicename,'rtorrent') !== false) { $servicename="main"; } }
writeMsg("Hello <b>$username</b>: Im going to disable <b>$servicename</b> ... </a><br>");
$message = "Hello <b>$username</b>: Im going to disable <b>$servicename</b> ... </a><br>";
    shell_exec("sudo sed -i 's/$name/$thisname/g' /home/$username/.startup");
    shell_exec("sudo -u $username pkill -9 $servicename");
  } else {
writeMsg("error locating .startup .. feel free to open an issue at the quick box repo");
$message = "error locating .startup .. feel free to open an issue at the quick box repo";
  }
  header('Location: https://' . $_SERVER['HTTP_HOST'] . '/');
break;

/* enable plex */
case 88:
//  $myip = getHostByName(getHostName());
  $myip = $_SERVER['HTTP_HOST'];
  $pbody .= writePlex($myip);
  header('Location: https://' . $_SERVER['HTTP_HOST'] . '/');
break;

}

?>

<html lang="en">
<head>
  <!-- META -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Your Seedbox Dashboard</title>
  <!-- CSS STYLESHEETS AND ASSETTS -->
  <link rel="shortcut icon" href="/rutorrent/images/favicon-32x32.png" type="image/png">
  <link rel="stylesheet" href="lib/jquery-ui/jquery-ui.css">
  <link rel="stylesheet" href="lib/Hover/hover.css">
  <link rel="stylesheet" href="lib/jquery-toggles/toggles-full.css">
  <link rel="stylesheet" href="lib/jquery.gritter/jquery.gritter.css">
  <link rel="stylesheet" href="lib/animate.css/animate.css">
  <link rel="stylesheet" href="lib/font-awesome/font-awesome.css">
  <link rel="stylesheet" href="lib/ionicons/css/ionicons.css">
  <link rel="stylesheet" href="skins/quick.css">
  <!-- JAVASCRIPT -->
  <script src="lib/modernizr/modernizr.js"></script>
  <script src="lib/jquery/jquery.js"></script>
  <script type="text/javascript" src="lib/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="lib/flot/jquery.flot.time.js"></script>
  <script type="text/javascript" src="lib/flot/jquery.flot.resize.js"></script>
  <script type="text/javascript" src="lib/flot/jquery.flot.canvas.js"></script>
  <script src="https://rawgit.com/hippich/bower-semver/master/semver.min.js"></script>
  <script>
  var gitHubPath = 'JMSDOnline/QuickBox';  // quick-box repo
  var url = 'https://api.github.com/repos/' + gitHubPath + '/tags';

  $.get(url).done(function (data) {
    var versions = data.sort(function (v1, v2) {
      return semver.compare(v2.name, v1.name)
    });
    $('#version-result').html(versions[0].name);
  });
  </script>
  <script id="source" language="javascript" type="text/javascript"> 
  $(document).ready(function() { 
      var options = { 
          lines: { show: true }, 
          border: { show: true },
          points: { show: true }, 
          xaxis: { mode: "time" } 
      }; 
      var data = []; 
      var placeholder = $("#placeholder"); 
      $.plot(placeholder, data, options); 
      var iteration = 0; 
      function fetchData() { 
          ++iteration; 
          function onDataReceived(series) { 
              // we get all the data in one go, if we only got partial 
              // data, we could merge it with what we already got 
              data = [ series ]; 
              $.plot($("#placeholder"), data, options); 
              fetchData(); 
          } 
          $.ajax({ 
              url: "req/data.php", 
              method: 'GET', 
              dataType: 'json', 
              success: onDataReceived 
          }); 
      } 
      setTimeout(fetchData, 1000); 
  }); 
  </script> 
  <script language="javascript" type="text/javascript"> 
  $(document).ready(function() {
  function uptime() {
    $.ajax({url: "req/up.php", cache:true, success: function (result) {
      $('#uptime').html(result);
      setTimeout(function(){uptime()}, 1000);
    }});
  }
  uptime();

  function sload() {
    $.ajax({url: "req/load.php", cache:true, success: function (result) {
      $('#cpuload').html(result);
      setTimeout(function(){sload()}, 1000);
    }});
  }
  sload();

  function bwtables() {
    $.ajax({url: "req/bw_tables.php", cache:false, success: function (result) {
      $('#bw_tables').html(result);
      setTimeout(function(){bwtables()}, 1000);
    }});
  }
  bwtables();

  function diskstats() {
    $.ajax({url: "req/disk_data.php", cache:false, success: function (result) {
      $('#disk_data').html(result);
      setTimeout(function(){diskstats()}, 1000);
    }});
  }
  diskstats();

  }); 
  //success: function (result)
</script> 

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../lib/html5shiv/html5shiv.js"></script>
  <script src="../lib/respond/respond.src.js"></script>
  <![endif]-->

</head>
<body class="body ps-container">
<header>
  <div class="headerpanel">
    <div class="logopanel">
      <h2><a href="#"><img src="/img/logo.png" alt="Quick Box Seedbox" class="logo-image" height="50" /></a></h2>
    </div><!-- logopanel -->
    <div class="headerbar">
      <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
      <div class="header-right">
        <ul class="headermenu">
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-logged" data-toggle="dropdown">
                <?php echo "$username"; ?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right">
                <li><a href="https://github.com/JMSDOnline/quick-box/issues"><i class="fa fa-warning text-warning"></i> Report an issue</a></li>
                <div class="usermenu-div"></div>
                <li><span style="font-size:10px;">You are running Quick Box <b>v<?php echo "$version"; ?></b></span></li>
                <li><span style="font-size:10px;">Latest Quick Box Release: <b><a href="https://github.com/JMSDOnline/quick-box/releases/latest" target="_blank" rel="noindex,nofollow"><span style="color:#87D37C" id="version-result"></span></a></b></li>
              </ul>
            </div>
          </li>
        </ul>
      </div><!-- header-right -->
    </div><!-- headerbar -->
  </div><!-- header-->
</header>
<section>
  <div class="leftpanel ps-container">
    <div class="leftpanelinner">
      <ul class="nav nav-tabs nav-justified nav-sidebar">
        <li class="tooltips active" data-toggle="tooltip" title="Main Menu" data-placement="bottom"><a data-toggle="tab" data-target="#mainmenu"><i class="tooltips fa fa-ellipsis-h"></i></a></li>
        <?php 
        if ($master){
          echo "<li class=\"tooltips\" data-toggle=\"tooltip\" title=\"ruTorrent Plugins Menu\" data-placement=\"bottom\"><a data-toggle=\"tab\" data-target=\"#plugins\"><i class=\"tooltips fa fa-puzzle-piece\"></i></a></li>";
        }
        ?>
        <li class="tooltips" data-toggle="tooltip" title="Help Commands & More" data-placement="bottom"><a data-toggle="tab" data-target="#help"><i class="tooltips fa fa-question-circle"></i></a></li>
      </ul>
      <div class="tab-content">
        <!-- ################# MAIN MENU ################### -->
        <div class="tab-pane active" id="mainmenu">
          <h5 class="sidebar-title">Main Menu</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="active"><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li><a href="/rutorrent" target="_blank"><i class="fa fa-share"></i> <span>ruTorrent</span></a></li>
            <?php if (processExists("btsync",$username)) { echo "<li><a href=\"$btsyncURL\" target=\"_blank\"><i class=\"fa fa-retweet\"></i> <span>BTSync</span></a></li>"; } ?>
            <?php if (file_exists('.plex')) { echo "<li><a href=\"$plexURL\" target=\"_blank\"><i class=\"fa fa-play\"></i> <span>Plex</span></a></li>"; } ?>
            <li class="nav-parent">
              <a href=""><i class="fa fa-download"></i> <span>Downloads</span></a>
              <ul class="children">
                <li><a href="/<?php echo "$username"; ?>.downloads" target="_blank">ruTorrent</a></a></li>
              </ul>
            </li>
            <li><a href="?reload=true"><i class="fa fa-refresh"></i> <span>Reload Services</span></a></li>
            <li><a href="/<?php echo "$username"; ?>.console"><i class="fa fa-keyboard-o"></i> <span>Web Console</span></a></li>
            <?php
            if ($master){
            echo "<li class=\"nav-parent\"> <a href=\"\"><i class=\"fa fa-cubes\"></i> <span>Packages</span></a>";
              echo "<ul class=\"children\">";
                echo "<li class=\"info-quote\"><p class=\"info-quote\">Easily install and uninstall any software package simply by clicking on the software package name</p></li>";
                echo "<li class=\"warning-quote\"><p class=\"warning-quote\">Please be advised that these options are not the same as enabling and disabling a software package. These options are designed to either install or uninstall.</p></li>";
                echo "<li>";
                if (file_exists('/etc/apache2/sites-enabled/plex.conf')) {
                  echo "<a href=\"javascript:void()\" data-toggle=\"modal\" data-target=\"#plexRemovalConfirm\">Plex Media Server : <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installpackage-plex=true\" id=\"plexInstall\">Plex Media Server : <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";
                echo "<li>";
                if (processExists("btsync",$username)) {
                  echo "<a href=\"javascript:void()\" data-toggle=\"modal\" data-target=\"#btsyncRemovalConfirm\">BTSync : <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installpackage-btsync=true\" id=\"btsyncInstall\">BTSync : <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";
              echo "</ul>";
            echo "</li>";
            } ?>
          </ul>
        </div><!-- tab pane -->

        <!-- ######################## HELP MENU TAB ##################### -->
        <div class="tab-pane" id="help">
          <h5 class="sidebar-title">Quick System Tips</h5>
          <?php
          if ($master){
          echo "<ul class=\"nav nav-pills nav-stacked nav-quirk nav-mail\">";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">disktest</span><br/>";
            echo "<small>Type this command to perform a quick r/w test of your disk.</small></li>";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">fixhome</span><br/>";
            echo "<small>Type this command to quickly adjusts /home directory permissions.</small></li>";
          echo "</ul>";
          echo "<h5 class=\"sidebar-title\">Admin Commands</h5>";
          echo "<ul class=\"nav nav-pills nav-stacked nav-quirk nav-mail\">";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">createSeedboxUser</span><br/>";
            echo "<small>Type this command in ssh to create a new seedbox user on your server.</small></li>";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">deleteSeedboxUser</span><br/>";
            echo "<small>Type this command in ssh to delete a seedbox user on your server. You will need to enter the users account name, you will be prompted.</small></li>";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">changeUserpass</span><br/>";
            echo "<small>Typing this command in ssh allows you to change a disired users password.</small></li>";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">sudo -u [username] reload</span><br/>";
            echo "<small>Type this command in ssh to reload all services on a specific users seedbox. These services include rTorrent and IRSSI only.</small></li>";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">upgradeBTSync</span><br/>";
            echo "<small>Type this command in ssh to upgrade BTSync to newest version when available.</small></li>";
          echo "</ul>";
          echo "<h5 class=\"sidebar-title\">Essential User Commands</h5>";
          } ?>
          <ul class="nav nav-pills nav-stacked nav-quirk nav-mail">
            <li style="padding: 7px"><span style="font-size: 12px; color:#eee">reload</span><br/>
            <small>allows user to reload their services (rtorrent and irssi)</small></li>
            <li style="padding: 7px"><span style="font-size: 12px; color:#eee">screen -fa -dmS rtorrent rtorrent</span><br/>
            <small>allows user to restart/remount rtorrent from SSH</small></li>
            <li style="padding: 7px"><span style="font-size: 12px; color:#eee">screen -fa -dmS irssi irssi</span><br/>
            <small>allows user to restart/remount irssi from SSH</small></li>
          </ul>
        </div><!-- tab-pane -->

        <!-- ######################## RUTORRENT PLUGINS TAB ##################### -->
        <div class="tab-pane" id="plugins">
          <h5 class="sidebar-title">Plugin Menu</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="nav-parent nav-active">
              <a href=""><i class="fa fa-puzzle-piece"></i> <span>Plugins</span></a>
              <ul class="children">
                <li class="info-quote"><p class="info-quote">Easily install and uninstall ruTorrent plugins simply by clicking on the plugin name</p></li>
                <?php
                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/_getdir/plugin.info')) {
                  echo "<a href=\"?removeplugin-getdir=true\">_getdir <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plug-in provides the possibility of comfortable navigation on a host file system.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-getdir=true\">_getdir <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plug-in provides the possibility of comfortable navigation on a host file system.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/_noty2/plugin.info')) {
                  echo "<a href=\"?removeplugin-noty=true\">_noty/_noty2 <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides the notification functionality for other plugins.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-noty=true\">_noty/_noty2 <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides the notification functionality for other plugins.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/_task/plugin.info')) {
                  echo "<a href=\"?removeplugin-task=true\">_task <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides the possibility of running various scripts on the host system.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-task=true\">_task <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides the possibility of running various scripts on the host system.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/autodl-irssi/plugin.info')) {
                  echo "<a href=\"?removeplugin-autodl=true\">autodl-irssi <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"GUI for autodl-irssi-community\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-autodl=true\">autodl-irssi <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"GUI for autodl-irssi-community\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/autotools/plugin.info')) {
                  echo "<a href=\"?removeplugin-autotools=true\">autotools <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides some possibilities on automation.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-autotools=true\">autotools <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides some possibilities on automation.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/check_port/plugin.info')) {
                  echo "<a href=\"?removeplugin-checkport=true\">checkport <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds an incoming port status indicator to the bottom bar.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-checkport=true\">checkport <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds an incoming port status indicator to the bottom bar.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/chunks/plugin.info')) {
                  echo "<a href=\"?removeplugin-chunks=true\">chunks <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin shows the download status of torrent chunks.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-chunks=true\">chunks <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin shows the download status of torrent chunks.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/cookies/plugin.info')) {
                  echo "<a href=\"?removeplugin-cookies=true\">cookies <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides cookies information for authentication on trackers.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-cookies=true\">cookies <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides cookies information for authentication on trackers.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/cpuload/plugin.info')) {
                  echo "<a href=\"?removeplugin-cpuload=true\">cpuload <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds a CPU Load indicator to the bottom bar.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-cpuload=true\">cpuload <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds a CPU Load indicator to the bottom bar.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/create/plugin.info')) {
                  echo "<a href=\"?removeplugin-create=true\">create <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows for the creation of new .torrent files.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-create=true\">create <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows for the creation of new .torrent files.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/data/plugin.info')) {
                  echo "<a href=\"?removeplugin-data=true\">data <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to copy torrent data files from the host to the local machine.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-data=true\">data <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to copy torrent data files from the host to the local machine.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/datadir/plugin.info')) {
                  echo "<a href=\"?removeplugin-datadir=true\">datadir <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended for moving torrent data files.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-datadir=true\">datadir <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended for moving torrent data files.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/diskspace/plugin.info')) {
                  echo "<a href=\"?removeplugin-diskspace=true\">diskspace <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds an easy to read disk meter to the bottom bar.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-diskspace=true\">diskspace <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds an easy to read disk meter to the bottom bar.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/edit/plugin.info')) {
                  echo "<a href=\"?removeplugin-edit=true\">edit <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to edit the list of trackers and change the comment of the current torrent.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-edit=true\">edit <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to edit the list of trackers and change the comment of the current torrent.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/erasedata/plugin.info')) {
                  echo "<a href=\"?removeplugin-erasedata=true\">erasedata <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to delete torrent data along with .torrent file.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-erasedata=true\">erasedata <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to delete torrent data along with .torrent file.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/extratio/plugin.info')) {
                  echo "<a href=\"?removeplugin-extratio=true\">extratio <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin extends the functionality of the ratio plugin.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-extratio=true\">extratio <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin extends the functionality of the ratio plugin.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/extsearch/plugin.info')) {
                  echo "<a href=\"?removeplugin-extsearch=true\">extsearch <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to search many popular torrent sites for content from within ruTorrent.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-extsearch=true\">extsearch <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to search many popular torrent sites for content from within ruTorrent.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/feeds/plugin.info')) {
                  echo "<a href=\"?removeplugin-feeds=true\">feeds <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended for making RSS feeds with information of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-feeds=true\">feeds <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended for making RSS feeds with information of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/filedrop/plugin.info')) {
                  echo "<a href=\"?removeplugin-filedrop=true\">filedrop <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows users to drag multiple torrents from desktop to the browser (FF > 3.6 & Chrome only).\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-filedrop=true\">filedrop <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows users to drag multiple torrents from desktop to the browser (FF > 3.6 & Chrome only).\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/filemanager/plugin.info')) {
                  echo "<a href=\"?removeplugin-filemanager=true\">filemanager <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"File Manager plugin.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-filemanager=true\">filemanager <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"File Manager plugin.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/fileshare/plugin.info')) {
                  echo "<a href=\"?removeplugin-fileshare=true\">fileshare <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"File share plugin. (Please note: This plugin is dependent on the filemanager plugin)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-fileshare=true\">fileshare <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"File share plugin. (Please note: This plugin is dependent on the filemanager plugin)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/fileupload/plugin.info')) {
                  echo "<a href=\"?removeplugin-fileupload=true\">fileupload <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Sharing services file uploader. (Please note: This plugin is dependent on the filemanager plugin as well as plowup to be installed - which is by default)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-fileupload=true\">fileupload <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Sharing services file uploader. (Please note: This plugin is dependent on the filemanager plugin as well as plowup to be installed - which is by default)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/history/plugin.info')) {
                  echo "<a href=\"?removeplugin-history=true\">history <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is designed to log a history of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-history=true\">history <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is designed to log a history of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/httprpc/plugin.info')) {
                  echo "<a href=\"?removeplugin-httprpc=true\">httprpc <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is a low-traffic replacement for the mod_scgi webserver module.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-httprpc=true\">httprpc <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is a low-traffic replacement for the mod_scgi webserver module.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/ipad/plugin.info')) {
                  echo "<a href=\"?removeplugin-ipad=true\">ipad <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows ruTorrent to work properly on iPad-like devices. (Not compatible with the mobile plugin)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-ipad=true\">ipad <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows ruTorrent to work properly on iPad-like devices. (Not compatible with the mobile plugin)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/loginmgr/plugin.info')) {
                  echo "<a href=\"?removeplugin-loginmgr=true\">loginmgr <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is used to login to torrent sites in cases where cookies fail.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-loginmgr=true\">loginmgr <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is used to login to torrent sites in cases where cookies fail.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/logoff/plugin.info')) {
                  echo "<a href=\"?removeplugin-logoff=true\">logoff <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"The plugin allows users to logoff from rutorrent.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-logoff=true\">logoff <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"The plugin allows users to logoff from rutorrent.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/lookat/plugin.info')) {
                  echo "<a href=\"?removeplugin-lookat=true\">lookat <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to search for torrent name in external sources.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-lookat=true\">lookat <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to search for torrent name in external sources.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/mediainfo/plugin.info')) {
                  echo "<a href=\"?removeplugin-mediainfo=true\">mediainfo <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended to display media file information.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-mediainfo=true\">mediainfo <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended to display media file information.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/mobile/plugin.info')) {
                  echo "<a href=\"?removeplugin-mobile=true\">mobile <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides a mobile version of ruTorrent. (Not compatible with the ipad plugin)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-mobile=true\">mobile <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides a mobile version of ruTorrent. (Not compatible with the ipad plugin)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/pausewebui/plugin.info')) {
                  echo "<a href=\"?removeplugin-pausewebui=true\">pausewebui <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Adds an button to pause the webui from updating.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-pausewebui=true\">pausewebui <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Adds an button to pause the webui from updating.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/ratio/plugin.info')) {
                  echo "<a href=\"?removeplugin-ratio=true\">ratio <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to manage ratio limits for groups of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-ratio=true\">ratio <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to manage ratio limits for groups of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/ratiocolor/plugin.info')) {
                  echo "<a href=\"?removeplugin-ratiocolor=true\">ratiocolor <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Change color of ratio column depending on ratio.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-ratiocolor=true\">ratiocolor <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Change color of ratio column depending on ratio.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/retrackers/plugin.info')) {
                  echo "<a href=\"?removeplugin-retrackers=true\">retrackers <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin appends specified trackers to the trackers list of all newly added torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-retrackers=true\">retrackers <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin appends specified trackers to the trackers list of all newly added torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/rpc/plugin.info')) {
                  echo "<a href=\"?removeplugin-rpc=true\">rpc <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is a replacement for the mod_scgi webserver module.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-rpc=true\">rpc <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is a replacement for the mod_scgi webserver module.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/rss/plugin.info')) {
                  echo "<a href=\"?removeplugin-rss=true\">rss <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is designed to fetch torrents via rss download links.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-rss=true\">rss <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is designed to fetch torrents via rss download links.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/rssurlrewrite/plugin.info')) {
                  echo "<a href=\"?removeplugin-rssurlrewrite=true\">rssurlrewrite <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin extends the functionality of the RSS plugin.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-rssurlrewrite=true\">rssurlrewrite <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin extends the functionality of the RSS plugin.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/rutracker_check/plugin.info')) {
                  echo "<a href=\"?removeplugin-rutracker_check=true\">rutracker_check <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin checks the rutracker.org tracker for updated/deleted torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-rutracker_check=true\">rutracker_check <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin checks the rutracker.org tracker for updated/deleted torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/scheduler/plugin.info')) {
                  echo "<a href=\"?removeplugin-scheduler=true\">scheduler <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to define any of six rTorrent behavior types at each particular hour of 168 week hours.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-scheduler=true\">scheduler <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to define any of six rTorrent behavior types at each particular hour of 168 week hours.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/screenshots/plugin.info')) {
                  echo "<a href=\"?removeplugin-screenshots=true\">screenshots <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended to show screenshots from video files.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-screenshots=true\">screenshots <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended to show screenshots from video files.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/seedingtime/plugin.info')) {
                  echo "<a href=\"?removeplugin-seedingtime=true\">seedingtime <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds the columns 'Finished' and 'Added' to the torrents list.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-seedingtime=true\">seedingtime <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds the columns 'Finished' and 'Added' to the torrents list.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/show_peers_like_wtorrent/plugin.info')) {
                  echo "<a href=\"?removeplugin-show_peers_like_wtorrent=true\">show_peers_like_wtorrent <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin changes the format of values in columns 'Seeds' and 'Peers' in the torrents list.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-show_peers_like_wtorrent=true\">show_peers_like_wtorrent <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin changes the format of values in columns 'Seeds' and 'Peers' in the torrents list.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/source/plugin.info')) {
                  echo "<a href=\"?removeplugin-source=true\">source <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to copy the source .torrent file from the host to the local machine.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-source=true\">source <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to copy the source .torrent file from the host to the local machine.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/stream/plugin.info')) {
                  echo "<a href=\"?removeplugin-stream=true\">stream <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Stream media files with VLC (based on getData by Novik).\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-stream=true\">stream <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Stream media files with VLC (based on getData by Novik).\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/theme/plugin.info')) {
                  echo "<a href=\"?removeplugin-theme=true\">theme <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to change the UI theme to one of several provided themes.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-theme=true\">theme <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to change the UI theme to one of several provided themes.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/throttle/plugin.info')) {
                  echo "<a href=\"?removeplugin-throttle=true\">throttle <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin gives a convenient control over speed limits for groups of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-throttle=true\">throttle <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin gives a convenient control over speed limits for groups of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/tracklabels/plugin.info')) {
                  echo "<a href=\"?removeplugin-tracklabels=true\">tracklabels <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds tracker-based labels to the category panel.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-tracklabels=true\">tracklabels <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds tracker-based labels to the category panel.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/trafic/plugin.info')) {
                  echo "<a href=\"?removeplugin-trafic=true\">trafic <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to monitor rTorrent system wide and per-tracker traffic totals.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-trafic=true\">trafic <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to monitor rTorrent system wide and per-tracker traffic totals.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/unpack/plugin.info')) {
                  echo "<a href=\"?removeplugin-unpack=true\">unpack <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is designed to manually or automatically unrar/unzip torrent data.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-unpack=true\">unpack <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is designed to manually or automatically unrar/unzip torrent data.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/xmpp/plugin.info')) {
                  echo "<a href=\"?removeplugin-xmpp=true\">xmpp <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin sends notifications through xmpp about finished downloads.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-xmpp=true\">xmpp <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin sends notifications through xmpp about finished downloads.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                } 
                echo "</li>";
                ?>
              </ul>
            </li>
          </ul>
        </div><!-- tab-pane -->

      </div><!-- tab-content -->
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  <div class="mainpanel">
    <!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
    </div>-->
    <div class="contentpanel">
      <div class="row">
        <div class="col-sm-12 col-md-8 dash-left">
          <div class="col-sm-12 col-md-7">
            <div class="panel panel-default list-announcement">
              <div class="panel-heading">
                <h4 class="panel-title">Service Status</h4>
              </div>
              <div class="panel-body">
                <ul class="list-unstyled mb20">
                  <li>
                    <?php echo "$rval"; ?>
                  </li>
                  <li>
                    <?php echo "$ival"; ?>
                  </li>
                  <?php
                  if ($master){
                  echo "<li>";
                    echo "$bval";
                  echo "</li>";
                  echo "<li>";
                    echo "$pval";
                  echo "</li>";
                  } ?>
                </ul>
              </div>
              <div class="panel-footer"></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-5">
            <div class="panel panel-default list-announcement">
              <div class="panel-heading">
                <h4 class="panel-title">Service Controller</h4>
              </div>
              <div class="panel-body">
                <ul class="list-unstyled mb20">
                  <li>
                    <?php echo "$cbodyr"; ?>
                  </li>
                  <li>
                    <?php echo "$cbodyi"; ?>
                  </li>
                  <?php
                  if ($master){
                  echo "<li>";
                    echo "$cbodyb";
                  echo "</li>";
                  echo "<li>";
                    echo "$cbodyp";
                  echo "</li>";
                  } ?>
                </ul>
              </div>
              <div class="panel-footer"></div>
            </div>
          </div>
        </div><!-- col-md-8 -->
        <div class="col-sm-12 col-md-4 dash-right">
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-danger panel-weather">
                <div class="panel-heading">
                  <h4 class="panel-title">System Response</h4>
                </div>
                <div class="panel-body inverse">
                  <?php
                  $output = readMsg();
                  if (isset($output)) {
                      $data = $output;
                      //unlink('servermessage');
                      echo $data;
                  } else {
                      echo "<br>";
                  }
                  ?>
                </div>
              </div>
            </div><!-- col-sm-12 -->
          </div><!-- row -->
        </div><!-- col-md-4 -->
      </div><!-- row -->
      <div class="row">
        <div class="col-sm-12 col-md-8">
          <div class="panel panel-inverse">
            <div class="panel-heading">
              <h4 class="panel-title">Bandwidth Data</h4>
            </div>
            <div class="panel-body text-center">
              <div id="placeholder" style="width:100%;height:200px;"></div> 
            </div>
            <div class="row panel-footer panel-statistics mt10">
              <div class="col-sm-6">
                <div class="panel panel-success-full panel-updates">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-7 col-md-8">
                        <h4 class="panel-title text-success">Data Sent</h4>
                        <h3><div id="snd_result"></div></h3>
                        <p>This is your upload speed</p>
                      </div>
                      <div class="col-sm-5 col-md-4 text-right">
                        <i class="fa fa-cloud-upload" style="font-size: 90px"></i>
                      </div>
                    </div>
                  </div>
                </div><!-- panel -->
              </div><!-- col-sm-6 -->
              <div class="col-sm-6">
                <div class="panel panel-primary-full panel-updates">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-7 col-md-8">
                        <h4 class="panel-title text-success">Data Received</h4>
                        <h3><div id="rec_result"></div></h3>
                        <p style="color: #fff">This is your download speed</p>
                      </div>
                      <div class="col-sm-5 col-md-4 text-right">
                        <i class="fa fa-cloud-download" style="font-size: 90px"></i>
                      </div>
                    </div>
                  </div>
                </div><!-- panel -->
              </div><!-- col-sm-6 -->
              <?php
              if ($master){
                echo "<div id=\"bw_tables\" style=\"padding:0;margin:0;\"></div>";
              } ?>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 dash-right">
          <div class="row">
            <div id="disk_data"></div>
            <div class="col-sm-12">
              <div class="panel panel-inverse-full panel-updates">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-sm-9">
                        <h4 class="panel-title text-success">Server Load</h4>
                        <h3><span id="cpuload"></span></h3>
                        <p>This is your servers current load average</p>
                      </div>
                      <div class="col-sm-3 text-right">
                        <i class="fa fa-heartbeat text-danger" style="font-size: 90px"></i>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 mt20 text-center">
                          <strong>Uptime:</strong> <span id="uptime"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- panel -->
              </div>
          </div><!-- row -->
        </div>
      </div>
    </div><!-- contentpanel -->
  </div><!-- mainpanel -->
</section>

<!-- PLEX UNINSTALL MODAL -->
<div class="modal bounceIn animated" id="plexRemovalConfirm" tabindex="-1" role="dialog" aria-labelledby="PlexRemovalConfirm" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="PlexRemovalConfirm">Uninstall Plex?</h4>
      </div>
      <div class="modal-body">
        You are about to uninstall Plex Media Server from your system.<br/><br/>This will completely remove all of your configuration and library settings... this action is irreversable. <br/><br/>You may reinstall Plex at any time, however, your library settings will be reset to default.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a href="?removepackage-plex=true" id="plexRemove" class="btn btn-primary">I understand, do it!</a>
      </div>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->
<!-- BTSYNC UNINSTALL MODAL -->
<div class="modal bounceIn animated" id="btsyncRemovalConfirm" tabindex="-1" role="dialog" aria-labelledby="BTSyncRemovalConfirm" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="BTSyncRemovalConfirm">Uninstall BTSync?</h4>
      </div>
      <div class="modal-body">
        You are about to uninstall BitTorrent Sync from your system.<br/><br/>This will completely remove all of your configuration and shared folder settings... this action is irreversable. <br/><br/>You may reinstall BitTorrent Sync at any time, however, your storage path and linked folder settings will be reset to default.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a href="?removepackage-btsync=true" id="btsyncRemove" class="btn btn-primary">I understand, do it!</a>
      </div>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->


<script src="js/script.js"></script>
<script src="lib/jquery-ui/jquery-ui.js"></script>
<script src="lib/bootstrap/js/bootstrap.js"></script>
<script src="lib/jquery-toggles/toggles.js"></script>
<script src="lib/jquery-knob/jquery.knob.js"></script>
<script src="lib/jquery.gritter/jquery.gritter.js"></script>
<script src="js/quick.js"></script>
<script src="js/jquery.scrollbar.js"></script>
<script>
$(function() {
  $('.leftpanel').perfectScrollbar();
  $('.leftpanel').perfectScrollbar({ wheelSpeed: 1, wheelPropagation: true, minScrollbarLength: 20 });
  $('.leftpanel').perfectScrollbar('update');
  //$('.leftpanel').perfectScrollbar('destroy');
  $('.body').perfectScrollbar();
  $('.body').perfectScrollbar({ wheelSpeed: 1, wheelPropagation: true, minScrollbarLength: 20 });
  $('.body').perfectScrollbar('update');
});
</script>
<script>
$(function() {
  // Toggles
  $('.toggle-en').toggles({
    on: true,
    height: 26
  });
  $('.toggle-dis').toggles({
    on: false,
    height: 26
  });
});
</script>
<script>
$(document).ready(function() {

  'use strict';

  // PlexInstall
  $('#plexInstall').click(function(){
    $.gritter.add({
      title: 'Installing Plex',
      text: 'Please wait while Plex Media Server is being installed on your system.',
      class_name: 'with-icon check-circle success',
      sticky: true
    });
  });
  // PlexRemove
  $('#plexRemove').click(function(){
    $.gritter.add({
      title: 'Uninstalling Plex',
      text: 'Please wait while Plex Media Server is being uninstalled from your system.',
      class_name: 'with-icon times-circle danger',
      sticky: true
    });
  });

  // BTSyncInstall
  $('#btsyncInstall').click(function(){
    $.gritter.add({
      title: 'Installing BTSync',
      text: 'Please wait while Bittorrent Sync is being installed on your system.',
      class_name: 'with-icon check-circle success',
      sticky: true
    });
  });
  // BTSyncRemove
  $('#btsyncRemove').click(function(){
    $.gritter.add({
      title: 'Uninstalling BTSync',
      text: 'Please wait while Bittorrent Sync is being uninstalled from your system.',
      class_name: 'with-icon times-circle danger',
      sticky: true
    });
  });

});
</script>
</body>
</html>
<?php session_destroy(); ?>