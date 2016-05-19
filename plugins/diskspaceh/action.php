<?php

#################################################################################
##  [Quick Box - action.php modified for quota systems use]
#################################################################################
# GitHub:   https://github.com/Swizards/QuickBox
# Author:   Swizards.net https://swizards.net
# URL:      https://plaza.quickbox.io
#
# QuickBox Copyright (C) 2016 Swizards.net
# Licensed under GNU General Public License v3.0 GPL-3 (in short)
#
#   You may copy, distribute and modify the software as long as you track
#   changes/dates in source files. Any modifications to our software
#   including (via compiler) GPL-licensed code must also be made available
#   under the GPL along with build & install instructions.
#
#################################################################################

  require_once( '../../php/util.php' );
  if (isset($quotaUser)) {
      $total = shell_exec("/usr/bin/sudo /usr/sbin/repquota -u /home | /bin/grep ^".$quotaUser." | /usr/bin/awk '{printf $4*1024}'");
      $free = shell_exec("/usr/bin/sudo /usr/sbin/repquota -u /home | /bin/grep ^".$quotaUser." | /usr/bin/awk '{printf ($4-$3)*1024}'");
      cachedEcho('{ "total": '.$total.', "free": '.$free.' }',"application/json");
  } else {
      cachedEcho('{ "total": '.disk_total_space($topDirectory).', "free": '.disk_free_space($topDirectory).' }',"application/json");
  }

?>
