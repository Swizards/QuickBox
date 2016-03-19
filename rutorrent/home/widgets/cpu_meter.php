<?php

define('HTTP_HOST', preg_replace('~^www\.~i', '', $_SERVER['HTTP_HOST']));

$time_start = microtime_float();

function memory_usage() {
  $memory  = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB';
  return $memory;
}

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

//IO Proficiency Test
function test_io()
{
  $fp = @fopen(PHPSELF, "r");
  $timeStart = gettimeofday();
  for($i = 0; $i < 10000; $i++)
  {
    @fread($fp, 10240);
    @rewind($fp);
  }
  $timeEnd = gettimeofday();
  @fclose($fp);
  $time = ($timeEnd["usec"]-$timeStart["usec"])/1000000+$timeEnd["sec"]-$timeStart["sec"];
  $time = round($time, 3)."second";
  return($time);
}

function GetCoreInformation() {$data = file('/proc/stat');$cores = array();foreach( $data as $line ) {if( preg_match('/^cpu[0-9]/', $line) ){$info = explode(' ', $line);$cores[]=array('user'=>$info[1],'nice'=>$info[2],'sys' => $info[3],'idle'=>$info[4],'iowait'=>$info[5],'irq' => $info[6],'softirq' => $info[7]);}}return $cores;}
function GetCpuPercentages($stat1, $stat2) {if(count($stat1)!==count($stat2)){return;}$cpus=array();for( $i = 0, $l = count($stat1); $i < $l; $i++) { $dif = array(); $dif['user'] = $stat2[$i]['user'] - $stat1[$i]['user'];$dif['nice'] = $stat2[$i]['nice'] - $stat1[$i]['nice'];  $dif['sys'] = $stat2[$i]['sys'] - $stat1[$i]['sys'];$dif['idle'] = $stat2[$i]['idle'] - $stat1[$i]['idle'];$dif['iowait'] = $stat2[$i]['iowait'] - $stat1[$i]['iowait'];$dif['irq'] = $stat2[$i]['irq'] - $stat1[$i]['irq'];$dif['softirq'] = $stat2[$i]['softirq'] - $stat1[$i]['softirq'];$total = array_sum($dif);$cpu = array();foreach($dif as $x=>$y) $cpu[$x] = round($y / $total * 100, 2);$cpus['cpu' . $i] = $cpu;}return $cpus;}
$stat1 = GetCoreInformation();sleep(1);$stat2 = GetCoreInformation();$data = GetCpuPercentages($stat1, $stat2);
$cpu_use = $data['cpu0']['user']."%us";
$cpu_idle = $data['cpu0']['idle']."%id";
$cpuperused = sprintf('%1.0f', $cpu_use);
$cpuperidle = sprintf('%1.0f', $cpu_idle);

switch(PHP_OS)
{
  case "Linux":
    $sysReShow = (false !== ($sysInfo = sys_linux()))?"show":"none";
  break;

  default:
  break;
}

function sys_linux() {
    // CPU
    if (false === ($str = @file("/proc/cpuinfo"))) return false;
    $str = implode("", $str);
    @preg_match_all("/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(\@.-]+)([\r\n]+)/s", $str, $model);
    @preg_match_all("/cpu\s+MHz\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $mhz);
    @preg_match_all("/cache\s+size\s{0,}\:+\s{0,}([\d\.]+\s{0,}[A-Z]+[\r\n]+)/", $str, $cache);
    if (false !== is_array($model[1])) {
        $res['cpu']['num'] = sizeof($model[1]);

    if($res['cpu']['num']==1)
      $x1 = '';
    else
      $x1 = ' ×'.$res['cpu']['num'];
    $mhz[1][0] = ' | frequency:'.$mhz[1][0];
    $cache[1][0] = ' | Secondary cache:'.$cache[1][0];
    $res['cpu']['model'][] = $model[1][0].$mhz[1][0].$cache[1][0].$x1;
        if (false !== is_array($res['cpu']['model'])) $res['cpu']['model'] = implode("<br />", $res['cpu']['model']);
        if (false !== is_array($res['cpu']['mhz'])) $res['cpu']['mhz'] = implode("<br />", $res['cpu']['mhz']);
        if (false !== is_array($res['cpu']['cache'])) $res['cpu']['cache'] = implode("<br />", $res['cpu']['cache']);
  }
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



?>

      <div class="row">
        <div class="col-sm-6 text-center">
          <?php
            if ($cpuperused < "70") { $cpudialcolor="dial-success"; }
            if ($cpuperused > "70") { $cpudialcolor="dial-warning"; }
            if ($cpuperused > "90") { $cpudialcolor="dial-danger"; }
          ?>
          <input type="text" value="<?php echo "$cpuperused"; ?>%" class="<?php echo $cpudialcolor ?>">
          <h4><?php echo "$cpuperused"; ?>% used</h4>
        </div>
        <div class="col-sm-6 text-center">
          <?php
            if ($cpuperidle > "30") { $cpudialcolor="dial-success"; }
            if ($cpuperidle < "30") { $cpudialcolor="dial-warning"; }
            if ($cpuperidle < "10") { $cpudialcolor="dial-danger"; }
          ?>
          <input type="text" value="<?php echo "$cpuperidle"; ?>%" class="<?php echo $cpudialcolor ?>">
          <h4><?php echo "$cpuperidle"; ?>% idle</h4>
        </div>
      </div>

<script type="text/javascript">
$(function() {

  // Knob
  $('.dial-success').knob({
    readOnly: true,
    width: '50px',
    bgColor: '#E7E9EE',
    fgColor: '#4daf7c',
    inputColor: '#262B36'
  });

  $('.dial-warning').knob({
    readOnly: true,
    width: '50px',
    bgColor: '#E7E9EE',
    fgColor: '#e6ad5c',
    inputColor: '#262B36'
  });

  $('.dial-danger').knob({
    readOnly: true,
    width: '50px',
    bgColor: '#E7E9EE',
    fgColor: '#D9534F',
    inputColor: '#262B36'
  });

  $('.dial-info').knob({
    readOnly: true,
    width: '50px',
    bgColor: '#66BAC4',
    fgColor: '#fff',
    inputColor: '#fff'
  });

});
</script>
