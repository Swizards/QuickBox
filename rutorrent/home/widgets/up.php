<?php
  header('Refresh: 1');
  header('Content-Type: text/event-stream');
  header('Cache-Control: no-cache');
  $uptime = shell_exec("cut -d. -f1 /proc/uptime");
  $days = floor($uptime/60/60/24);
  $hours = $uptime/60/60%24;
  $mins = $uptime/60%60;
  $secs = $uptime%60;
  echo "<span style=\"font-size:14px;color:#dedede;\"><b>$days</b> <small>days</small>  <b>$hours</b> <small>hrs</small>  <b>$mins</b> <small>min</small>  <b>$secs</b> <small>sec</small></span> ";
flush();
