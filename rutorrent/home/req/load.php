<?php
  header("Refresh: 1");
  header('Content-Type: text/event-stream');
  header('Cache-Control: no-cache');
  $loads=sys_getloadavg();
  $core_nums=trim(shell_exec("grep -P '^physical id' /proc/cpuinfo|wc -l"));
  $load=$loads[0]/$core_nums;
  echo $load;
flush();