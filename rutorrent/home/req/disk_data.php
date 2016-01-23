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

$location = "/home";
$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
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
      $dffree .= ''.sprintf('%1.2f',$bytesfree / pow($base,$class)) //.'<b>'.$si_prefix[$class].'</b> Free<br/>'
      ;
      $dfused .= ''.sprintf('%1.2f',$bytesused / pow($base,$class)) //.'<b>'.$si_prefix[$class].'</b> Used<br/>'
      ;
      $dftotal .= ''.sprintf('%1.2f',$bytestotal / pow($base,$class)) //.'<b>'.$si_prefix[$class].'</b> Total<br/>'
      ;
      $perused = sprintf('%1.0f', $bytesused / $bytestotal * 100);
}

if (file_exists('/home/'.$username.'/.sessions/rtorrent.lock')) {
      $rtorrents = shell_exec("ls /home/".$username."/.sessions/*.torrent|wc -l");
}

?>

            <div class="col-sm-12">
              <div class="panel panel-inverse">
                <div class="panel-heading">
                  <h4 class="panel-title">Your Disk Status</h4>
                </div>
                <div class="panel-body">
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
                      <?php
                        if ($perused < "70") { $dialcolor="dial-success"; }
                        if ($perused > "70") { $dialcolor="dial-warning"; }
                        if ($perused > "90") { $dialcolor="dial-danger"; }
                      ?>
                      <input type="text" value="<?php echo "$perused"; ?>%" class="<?php echo $dialcolor ?>">
                    </div>
                  </div>
                  <hr />
                  <h4>Torrents in rtorrent</h4>
                  <p class="nomargin">There are <b><?php echo "$rtorrents"; ?></b> torrents loaded.</p>
                </div>
              </div><!-- col-md-4/12 -->
            </div><!-- row -->

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
