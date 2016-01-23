#!/bin/bash
#
# [Quick Box]
#
# GitHub:   https://github.com/JMSDOnline/quick-box
# Author:   Jason Matthews
# URL:      https://jmsolodesigns.com/code-projects/quick-box/seedbox-installer
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
