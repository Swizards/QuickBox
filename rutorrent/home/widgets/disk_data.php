<?php
include '/srv/rutorrent/php/util.php';
include 'class.php';

$username = getUser();
function processExists($processName, $username) {
  $exists= false;
  exec("ps axo user:20,pid,pcpu,pmem,vsz,rss,tty,stat,start,time,comm|grep $username | grep -iE $processName | grep -v grep", $pids);
  if (count($pids) > 0) {
    $exists = true;
  }
  return $exists;
}
$rtorrent = processExists("\"main|rtorrent\"",$username);

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

$location = "/home";
$base = 1024;
$si_prefix = array( 'b', 'k', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB' );
$torrents = shell_exec("ls /home/".$username."/.sessions/*.torrent|wc -l");
$php_self = $_SERVER['PHP_SELF'];
$web_path = substr($php_self, 0, strrpos($php_self, '/')+1);
$time = microtime(); $time = explode(" ", $time);
$time = $time[1] + $time[0]; $start = $time;

if (file_exists('/usr/sbin/repquota')) {
      $dftotal = shell_exec("sudo /usr/sbin/repquota /|/bin/grep ^".$username."|/usr/bin/awk '{printf \$4/1024/1024}'");
      $dffree = shell_exec("sudo /usr/sbin/repquota /|/bin/grep ^".$username."|/usr/bin/awk '{printf (\$4-\$3)/1024/1024}'");
      $dfused = shell_exec("sudo /usr/sbin/repquota /|/bin/grep ^".$username."|/usr/bin/awk '{printf \$3/1024/1024}'");
      $perused = sprintf('%1.0f', $dfused / $dftotal * 100);

  } else {

      $bytesfree = disk_free_space('/home');
      $class = min((int)log($bytesfree,$base),count($si_prefix) - 1); $bytestotal = disk_total_space($location);
      $class = min((int)log($bytesfree,$base),count($si_prefix) - 1); $bytesused = $bytestotal - $bytesfree;
        try {
          $diskStatus = new DiskStatus('/home');
          $freeSpace = $diskStatus->freeSpace();
          $totalSpace = $diskStatus->totalSpace();
          $barWidth = ($diskStatus->usedSpace()/500) * 500;
        } catch (Exception $e) {
          $spacebodyerr .= 'Error ('.$e-getMessage().')';
        exit();
          }
          //hard disk
          $dftotal = round(@disk_total_space(".")/(1024*1024*1024),3); //Total
          $dffree = round(@disk_free_space(".")/(1024*1024*1024),3); //Available
          $dfused = $dftotal-$dffree; //used
          $perused = (floatval($dftotal)!=0)?round($dfused/$dftotal*100,2):0;
          //$perused = sprintf('%1.0f', $bytesused / $bytestotal * 100);
}

if (file_exists('/home/'.$username.'/.sessions/rtorrent.lock')) {
      $rtorrents = shell_exec("ls /home/".$username."/.sessions/*.torrent|wc -l");
}

?>

                  <p class="nomargin">Free: <span style="font-weight: 700; position: absolute; left: 70px;"><?php echo "$dffree"; ?> <b>GB</b></span></p>
                  <p class="nomargin">Used: <span style="font-weight: 700; position: absolute; left: 70px;"><?php echo "$dfused"; ?> <b>GB</b></span></p>
                  <p class="nomargin">Size: <span style="font-weight: 700; position: absolute; left: 70px;"><?php echo "$dftotal"; ?> <b>GB</b></span></p>
                  <div class="row">
                    <div class="col-sm-8">
                      <!--h4 class="panel-title text-success">Disk Space</h4-->
                      <h3>Disk Space</h3>
                      <div class="progress">
                        <?php
                          if ($perused < "70") { $diskcolor="progress-bar-success"; }
                          if ($perused > "70") { $diskcolor="progress-bar-warning"; }
                          if ($perused > "90") { $diskcolor="progress-bar-danger"; }
                        ?>
                        <div style="width:<?php echo "$perused"; ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo "$perused"; ?>" role="progressbar" class="progress-bar <?php echo $diskcolor ?>">
                          <span class="sr-only"><?php echo "$perused"; ?>% Used</span>
                        </div>
                      </div>
                      <p style="font-size:10px">You have used <?php echo "$perused"; ?>% of your total disk space</p>
                    </div>
                    <div class="col-sm-4 text-right">
                      <i class="fa fa-hdd-o" style="font-size: 90px; color: #e7e9ee"></i>
                    </div>
                  </div>
                  <hr />
                  <h4>Torrents in rtorrent</h4>
                  <p class="nomargin">There are <b><?php echo "$rtorrents"; ?></b> torrents loaded.</p>


<script type="text/javascript">
$(function() {

  // Knob
  $('.dial-success').knob({
    readOnly: true,
    width: '70px',
    bgColor: '#E7E9EE',
    fgColor: '#4daf7c',
    inputColor: '#262B36'
  });

  $('.dial-warning').knob({
    readOnly: true,
    width: '70px',
    bgColor: '#E7E9EE',
    fgColor: '#e6ad5c',
    inputColor: '#262B36'
  });

  $('.dial-danger').knob({
    readOnly: true,
    width: '70px',
    bgColor: '#E7E9EE',
    fgColor: '#D9534F',
    inputColor: '#262B36'
  });

  $('.dial-info').knob({
    readOnly: true,
    width: '70px',
    bgColor: '#66BAC4',
    fgColor: '#fff',
    inputColor: '#fff'
  });

});
</script>
