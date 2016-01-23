<?php

//--------------------------------------------------------------------------------
// [Quick Box - action.php modified for quota systems use]
//
// GitHub:   https://github.com/JMSDOnline/quick-box
// Author:   Jason Matthews
// URL:      https://jmsolodesigns.com/code-projects/quick-box/seedbox-installer
//--------------------------------------------------------------------------------

  require_once( '../../php/util.php' );
  if (isset($quotaUser)) {
      $total = shell_exec("/usr/bin/sudo /usr/sbin/repquota -u / | /bin/grep ^".$quotaUser." | /usr/bin/awk '{printf $4*1024}'");
      $free = shell_exec("/usr/bin/sudo /usr/sbin/repquota -u / | /bin/grep ^".$quotaUser." | /usr/bin/awk '{printf ($4-$3)*1024}'");
      cachedEcho('{ "total": '.$total.', "free": '.$free.' }',"application/json");
  } else {
      cachedEcho('{ "total": '.disk_total_space($topDirectory).', "free": '.disk_free_space($topDirectory).' }',"application/json");
  }

?>
