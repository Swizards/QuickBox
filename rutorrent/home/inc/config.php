<?php
session_destroy();
include '/srv/rutorrent/php/util.php';
include 'widgets/class.php';
$interface = "eth0";
$version = "qb-version";
error_reporting(E_ALL);
$master = shell_exec('cat /etc/apache2/master.txt');
$username = getUser();

define('HTTP_HOST', preg_replace('~^www\.~i', '', $_SERVER['HTTP_HOST']));

$panel = array(
    'name'              => 'QuickBox Seedbox',
    'author'            => 'Everyone that contributes to the open QuickBox project!',
    'robots'            => 'noindex, nofollow',
    'title'             => 'Your Quickbox Seedbox Panel',
    'description'       => 'QuickBox is an open-source seedbox project that is developed and maintained by anyone who so choses to provide time and energy. QuickBox has been made possible by the Team at Swizards. See Swizards.net. For more QuickBox, checkout https://plaza.quickbox.io',
    'active_page'       => basename($_SERVER['PHP_SELF']),
);

$time_start = microtime_float();

// Timing
function microtime_float() {
  $mtime = microtime();
  $mtime = explode(' ', $mtime);
  return $mtime[1] + $mtime[0];
}

//Unit Conversion
function formatsize($size) {
  $danwei=array(' B ',' KB ',' MB ',' GB ',' TB ');
  $allsize=array();
  $i=0;
  for($i = 0; $i <5; $i++) {
    if(floor($size/pow(1024,$i))==0){break;}
  }
  for($l = $i-1; $l >=0; $l--) {
    $allsize1[$l]=floor($size/pow(1024,$l));
    $allsize[$l]=$allsize1[$l]-$allsize1[$l+1]*1024;
  }
  $len=count($allsize);
  for($j = $len-1; $j >=0; $j--) {
    $fsize=$fsize.$allsize[$j].$danwei[$j];
  }
  return $fsize;
}

function GetCoreInformation() {$data = file('/proc/stat');$cores = array();foreach( $data as $line ) {if( preg_match('/^cpu[0-9]/', $line) ){$info = explode(' ', $line);$cores[]=array('user'=>$info[1],'nice'=>$info[2],'sys' => $info[3],'idle'=>$info[4],'iowait'=>$info[5],'irq' => $info[6],'softirq' => $info[7]);}}return $cores;}
function GetCpuPercentages($stat1, $stat2) {if(count($stat1)!==count($stat2)){return;}$cpus=array();for( $i = 0, $l = count($stat1); $i < $l; $i++) { $dif = array(); $dif['user'] = $stat2[$i]['user'] - $stat1[$i]['user'];$dif['nice'] = $stat2[$i]['nice'] - $stat1[$i]['nice'];  $dif['sys'] = $stat2[$i]['sys'] - $stat1[$i]['sys'];$dif['idle'] = $stat2[$i]['idle'] - $stat1[$i]['idle'];$dif['iowait'] = $stat2[$i]['iowait'] - $stat1[$i]['iowait'];$dif['irq'] = $stat2[$i]['irq'] - $stat1[$i]['irq'];$dif['softirq'] = $stat2[$i]['softirq'] - $stat1[$i]['softirq'];$total = array_sum($dif);$cpu = array();foreach($dif as $x=>$y) $cpu[$x] = round($y / $total * 100, 2);$cpus['cpu' . $i] = $cpu;}return $cpus;}
$stat1 = GetCoreInformation();sleep(1);$stat2 = GetCoreInformation();$data = GetCpuPercentages($stat1, $stat2);
$cpu_show = $data['cpu0']['user']."%us,  ".$data['cpu0']['idle']."%id,  ";

// Information obtained depending on the system CPU
switch(PHP_OS)
{
  case "Linux":
    $sysReShow = (false !== ($sysInfo = sys_linux()))?"show":"none";
  break;

  case "FreeBSD":
    $sysReShow = (false !== ($sysInfo = sys_freebsd()))?"show":"none";
  break;

  default:
  break;
}

//linux system detects
function sys_linux()
{
    // CPU
    if (false === ($str = @file("/proc/cpuinfo"))) return false;
    $str = implode("", $str);
    @preg_match_all("/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(\@.-]+)([\r\n]+)/s", $str, $model);
    @preg_match_all("/cpu\s+MHz\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $mhz);
    @preg_match_all("/cache\s+size\s{0,}\:+\s{0,}([\d\.]+\s{0,}[A-Z]+[\r\n]+)/", $str, $cache);
    if (false !== is_array($model[1]))
  {
        $res['cpu']['num'] = sizeof($model[1]);

    if($res['cpu']['num']==1)
      $x1 = '';
    else
      $x1 = ' ×'.$res['cpu']['num'];
    $mhz[1][0] = ' <span style="color:#111;font-weight:600">Frequency:</span> '.$mhz[1][0];
    $cache[1][0] = ' <br /> <span style="color:#111;font-weight:600">Secondary cache:</span> '.$cache[1][0];
    $res['cpu']['model'][] = '<h4>'.$model[1][0].'</h4>'.$mhz[1][0].$cache[1][0].$x1;
        if (false !== is_array($res['cpu']['model'])) $res['cpu']['model'] = implode("<br />", $res['cpu']['model']);
        if (false !== is_array($res['cpu']['mhz'])) $res['cpu']['mhz'] = implode("<br />", $res['cpu']['mhz']);
        if (false !== is_array($res['cpu']['cache'])) $res['cpu']['cache'] = implode("<br />", $res['cpu']['cache']);
  }

    return $res;
}

//FreeBSD system detects
function sys_freebsd()
{
  //CPU
  if (false === ($res['cpu']['num'] = get_key("hw.ncpu"))) return false;
  $res['cpu']['model'] = get_key("hw.model");
  return $res;
}

//Obtain the parameter values FreeBSD
function get_key($keyName)
{
  return do_command('sysctl', "-n $keyName");
}

//Determining the location of the executable file FreeBSD
function find_command($commandName)
{
  $path = array('/bin', '/sbin', '/usr/bin', '/usr/sbin', '/usr/local/bin', '/usr/local/sbin');
  foreach($path as $p)
  {
    if (@is_executable("$p/$commandName")) return "$p/$commandName";
  }
  return false;
}

//Order Execution System FreeBSD
function do_command($commandName, $args)
{
  $buffer = "";
  if (false === ($command = find_command($commandName))) return false;
  if ($fp = @popen("$command $args", 'r'))
  {
    while (!@feof($fp))
    {
      $buffer .= @fgets($fp, 4096);
    }
    return trim($buffer);
  }
  return false;
}


function GetWMI($wmi,$strClass, $strValue = array()) {
  $arrData = array();

  $objWEBM = $wmi->Get($strClass);
  $arrProp = $objWEBM->Properties_;
  $arrWEBMCol = $objWEBM->Instances_();
  foreach($arrWEBMCol as $objItem) {
    @reset($arrProp);
    $arrInstance = array();
    foreach($arrProp as $propItem) {
      eval("\$value = \$objItem->" . $propItem->Name . ";");
      if (empty($strValue)) {
        $arrInstance[$propItem->Name] = trim($value);
      } else {
        if (in_array($propItem->Name, $strValue)) {
          $arrInstance[$propItem->Name] = trim($value);
        }
      }
    }
    $arrData[] = $arrInstance;
  }
  return $arrData;
}

//NIC flow
$strs = @file("/proc/net/dev");

for ($i = 2; $i < count($strs); $i++ ) {
  preg_match_all( "/([^\s]+):[\s]{0,}(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/", $strs[$i], $info );
  $NetOutSpeed[$i] = $info[10][0];
  $NetInputSpeed[$i] = $info[2][0];
  $NetInput[$i] = formatsize($info[2][0]);
  $NetOut[$i]  = formatsize($info[10][0]);
}

//Real-time refresh ajax calls
if ($_GET['act'] == "rt") {
  $arr=array('NetOut2'=>"$NetOut[2]",'NetOut3'=>"$NetOut[3]",'NetOut4'=>"$NetOut[4]",'NetOut5'=>"$NetOut[5]",'NetOut6'=>"$NetOut[6]",'NetOut7'=>"$NetOut[7]",'NetOut8'=>"$NetOut[8]",'NetOut9'=>"$NetOut[9]",'NetOut10'=>"$NetOut[10]",'NetInput2'=>"$NetInput[2]",'NetInput3'=>"$NetInput[3]",'NetInput4'=>"$NetInput[4]",'NetInput5'=>"$NetInput[5]",'NetInput6'=>"$NetInput[6]",'NetInput7'=>"$NetInput[7]",'NetInput8'=>"$NetInput[8]",'NetInput9'=>"$NetInput[9]",'NetInput10'=>"$NetInput[10]",'NetOutSpeed2'=>"$NetOutSpeed[2]",'NetOutSpeed3'=>"$NetOutSpeed[3]",'NetOutSpeed4'=>"$NetOutSpeed[4]",'NetOutSpeed5'=>"$NetOutSpeed[5]",'NetInputSpeed2'=>"$NetInputSpeed[2]",'NetInputSpeed3'=>"$NetInputSpeed[3]",'NetInputSpeed4'=>"$NetInputSpeed[4]",'NetInputSpeed5'=>"$NetInputSpeed[5]");
  $jarr=json_encode($arr);
  $_GET['callback'] = htmlspecialchars($_GET['callback']);
  echo $_GET['callback'],'(',$jarr,')';
  exit;
}

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
$btsync = processExists("btsync",btsync);
$plex = processExists("Plex",$username);
$sickrage = processExists("sickrage",$username);

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

$plexURL = "http://" . $_SERVER['HTTP_HOST'] . ":32400/web/";
$btsyncURL = "http://" . $_SERVER['HTTP_HOST'] . ":8888/gui/";
$rapidleechURL = "http://" . $_SERVER['HTTP_HOST'] . ":/rapidleech/";
$sickrageURL = "http://" . $_SERVER['HTTP_HOST'] . ":8081";

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
include 'widgets/plugin_data.php';
include 'widgets/package_data.php';
include 'widgets/sys_data.php';
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
  } else {
    $cbodyerr .= "error locating start up script .. feel free to open a issue at the quickbox repo";
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
writeMsg("error locating .startup .. feel free to open a issue at the quickbox repo");
$message = "error locating .startup .. feel free to open a issue at the quickbox repo";
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
writeMsg("error locating .startup .. feel free to open an issue at the quickbox repo");
$message = "error locating .startup .. feel free to open an issue at the quickbox repo";
  }
  header('Location: https://' . $_SERVER['HTTP_HOST'] . '/');
break;

}

?>
