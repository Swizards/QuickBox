#!/bin/bash
#
# [Quick Box]
#
# GitHub:   https://github.com/JMSDOnline/QuickBox
# Author:   Swizards.net
# URL:      https://swizards.net
#
# QuickBox Copyright (C) 2016 Swizards.net
# Licensed under GNU General Public License v3.0 GPL-3 (in short)
# 
#   You may copy, distribute and modify the software as long as you track
#   changes/dates in source files. Any modifications to our software 
#   including (via compiler) GPL-licensed code must also be made available 
#   under the GPL along with build & install instructions.
#
# Block Public Trackers
#################################################################################

function _string() { perl -le 'print map {(a..z,A..Z,0..9)[rand 62] } 0..pop' 15 ; }

function _denyhosts() {
echo -ne "Block Public Trackers?: (Default: \033[1mY\033[0m)"; read responce
case $responce in
  [yY] | [yY][Ee][Ss] | "")
echo -n "Blocking public trackers ... "
wget -q -O/etc/trackers https://raw.githubusercontent.com/JMSDOnline/quick-box/master/commands/trackers
cat >/etc/cron.daily/denypublic<<'EOF'
IFS=$'\n'
L=$(/usr/bin/sort /etc/trackers | /usr/bin/uniq)
for fn in $L; do
        /sbin/iptables -D INPUT -d $fn -j DROP
        /sbin/iptables -D FORWARD -d $fn -j DROP
        /sbin/iptables -D OUTPUT -d $fn -j DROP
        /sbin/iptables -A INPUT -d $fn -j DROP
        /sbin/iptables -A FORWARD -d $fn -j DROP
        /sbin/iptables -A OUTPUT -d $fn -j DROP
done
EOF
chmod +x /etc/cron.daily/denypublic
curl -s -LO https://raw.githubusercontent.com/JMSDOnline/quick-box/master/commands/hostsTrackers
cat hostsTrackers >> /etc/hosts
  echo "${OK}"
  ;;
  [nN] | [nN][Oo] ) echo "Allowing ... "
                ;;
        esac
}

_denyhosts
