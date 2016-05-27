#!/bin/bash
#
# [QuickBox Installation Script]
#
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
# find server hostname and repo location for quickbox configuration
#################################################################################
#################################################################################
#Script Console Colors
black=$(tput setaf 0); red=$(tput setaf 1); green=$(tput setaf 2); yellow=$(tput setaf 3);
blue=$(tput setaf 4); magenta=$(tput setaf 5); cyan=$(tput setaf 6); white=$(tput setaf 7);
on_red=$(tput setab 1); on_green=$(tput setab 2); on_yellow=$(tput setab 3); on_blue=$(tput setab 4);
on_magenta=$(tput setab 5); on_cyan=$(tput setab 6); on_white=$(tput setab 7); bold=$(tput bold);
dim=$(tput dim); underline=$(tput smul); reset_underline=$(tput rmul); standout=$(tput smso);
reset_standout=$(tput rmso); normal=$(tput sgr0); alert=${white}${on_red}; title=${standout};
sub_title=${bold}${yellow}; repo_title=${black}${on_green};
#################################################################################
if [[ -f /usr/bin/lsb_release ]]; then
    DISTRO=$(lsb_release -i | cut -d: -f2 | sed s/'^\t'//)
elif [ -f "/etc/redhat-release" ]; then
    DISTRO=$(egrep -o 'Fedora|CentOS|Red.Hat' /etc/redhat-release)
elif [ -f "/etc/debian_version" ]; then
    DISTRO=='Debian'
fi
#################################################################################

function _string() { perl -le 'print map {(a..z,A..Z,0..9)[rand 62] } 0..pop' 15 ; }

#function _quickboxv() {
#  curl -s -o /usr/bin/quickbox https://raw.githubusercontent.com/Swizards/QuickBox/master/commands/quickbox
#  chmod +x /usr/bin/quickbox
#}

function _bashrc() {
cat >/root/.bashrc<<'EOF'
case $- in
    *i*) ;;
      *) return;;
esac

BASHRCVERSION="23.2"
EDITOR=nano; export EDITOR=nano
USER=`whoami`
TMPDIR=$HOME/.tmp/
HOSTNAME=`hostname -s`
IDUSER=`id -u`
PROMPT_COMMAND='echo -ne "\033]0;${USER}(${IDUSER})@${HOSTNAME}: ${PWD}\007"'
export LS_COLORS='rs=0:di=01;33:ln=00;36:mh=00:pi=40;33:so=00;35:do=00;35:bd=40;33;01:cd=40;33;01:or=40;31;01:mi=01;05;37;41:su=37;41:sg=30;43:ca=30;41:tw=30;42:ow=34;42:st=37;44:ex=01;32:*.log=02;34:*.torrent=02;37:*.conf=02;34:*.sh=00;32:*.tar=00;31:*.tgz=00;31:*.arj=00;31:*.taz=00;31:*.lzh=00;31:*.lzma=00;31:*.tlz=00;31:*.txz=00;31:*.zip=00;31:*.z=00;31:*.Z=00;31:*.dz=00;31:*.gz=00;31:*.lz=00;31:*.xz=00;31:*.bz2=00;31:*.tbz=00;31:*.tbz2=00;31:*.bz=00;31:*.tz=00;31:*.tcl=00;31:*.deb=00;31:*.rpm=00;31:*.jar=00;31:*.rar=00;31:*.ace=00;31:*.zoo=00;31:*.cpio=00;31:*.7z=00;31:*.rz=00;31:*.jpg=00;35:*.jpeg=00;35:*.gif=00;35:*.bmp=00;35:*.pbm=00;35:*.pgm=00;35:*.ppm=00;35:*.tga=00;35:*.xbm=00;35:*.xpm=00;35:*.tif=00;35:*.tiff=00;35:*.png=00;35:*.svg=00;35:*.svgz=00;35:*.mng=00;35:*.pcx=00;35:*.mov=00;35:*.mpg=00;35:*.mpeg=00;35:*.m2v=00;35:*.mkv=00;35:*.ogm=00;35:*.mp4=00;35:*.m4v=00;35:*.mp4v=00;35:*.vob=00;35:*.qt=00;35:*.nuv=00;35:*.wmv=00;35:*.asf=00;35:*.rm=00;35:*.rmvb=00;35:*.flc=00;35:*.avi=00;35:*.fli=00;35:*.flv=00;35:*.gl=00;35:*.dl=00;35:*.xcf=00;35:*.xwd=00;35:*.yuv=00;35:*.cgm=00;35:*.emf=00;35:*.axv=00;35:*.anx=00;35:*.ogv=00;35:*.ogx=00;35:*.aac=00;36:*.au=00;36:*.flac=00;36:*.mid=00;36:*.midi=00;36:*.mka=00;36:*.mp3=00;36:*.mpc=00;36:*.ogg=00;36:*.ra=00;36:*.wav=00;36:*.axa=00;36:*.oga=00;36:*.spx=00;36:*.xspf=00;36:'
export TERM=xterm;TERM=xterm
export PATH=/usr/local/sbin:/usr/sbin:/sbin:/usr/local/bin:/usr/bin:/bin:/usr/local/games:/usr/games:/home/quickbox/.bin/
TPUT=`which tput`
BC=`which bc`
if [ ! -e $TPUT ]; then echo "tput is missing, please install it (yum install tput/apt install tput)";fi
if [ ! -e $BC ]; then echo "bc is missing, please install it (yum install bc/apt install bc)";fi
DFSCRIPT="${HOME}/.du.sh"
if [ ! -e $DFSCRIPT ]; then
cat >"$DFSCRIPT"<<'DS'
#!/bin/bash
ALERT=${BWhite}${On_Red};RED='\e[0;31m';YELLOW='\e[1;33m'
GREEN='\e[0;32m';RESET="\e[00m";BWhite='\e[1;37m';On_Red='\e[41m'
NCPU=$(grep -c 'processor' /proc/cpuinfo)
SLOAD=$(( 100*${NCPU} ));MLOAD=$(( 200*${NCPU} ));XLOAD=$(( 400*${NCPU} ))
function load() { SYSLOAD=$(cut -d " " -f1 /proc/loadavg | tr -d '.'); echo -n $((10#$SYSLOAD)); }
SYSLOAD=$(load)
if [ ${SYSLOAD} -gt ${XLOAD} ]; then echo -en ${ALERT}
elif [ ${SYSLOAD} -gt ${MLOAD} ]; then echo -en ${RED}
elif [ ${SYSLOAD} -gt ${SLOAD} ]; then echo -en ${YELLOW}
else echo -en ${GREEN} ;fi
let TotalBytes=0
for Bytes in $(ls -l | grep "^-" | awk '{ print $5 }')
do
   let TotalBytes=$TotalBytes+$Bytes
done
if [ $TotalBytes -lt 1024 ]; then
     TotalSize=$(echo -e "scale=1 \n$TotalBytes \nquit" | bc)
     suffix="b"
else if [ $TotalBytes -lt 1048576 ]; then
     TotalSize=$(echo -e "scale=1 \n$TotalBytes/1024 \nquit" | bc)
     suffix="kb"
  else if [ $TotalBytes -lt 1073741824 ]; then
     TotalSize=$(echo -e "scale=1 \n$TotalBytes/1048576 \nquit" | bc)
     suffix="Mb"
else
     TotalSize=$(echo -e "scale=1 \n$TotalBytes/1073741824 \nquit" | bc)
     suffix="Gb"
fi
fi
fi
echo $TotalSize$suffix
DS
chmod u+x $DFSCRIPT
fi

alias ls='ls --color=auto'
alias dir='ls --color=auto'
alias vdir='ls --color=auto'
alias grep='grep --color=auto'
alias fgrep='fgrep --color=auto'
alias egrep='egrep --color=auto'
alias ll='ls -alF'
alias la='ls -A'
alias l='ls -CF'

function normal {
if [ `id -u` == 0 ] ; then
  DG="$(tput bold ; tput setaf 7)";LG="$(tput bold;tput setaf 7)";NC="$(tput sgr0)"
  export PS1='[\[$LG\]\u\[$NC\]@\[$LG\]\h\[$NC\]]:(\[$LG\]\[$BN\]$($DFSCRIPT)\[$NC\])\w\$ '
else
  DG="$(tput bold;tput setaf 0)"
  LG="$(tput setaf 7)"
  NC="$(tput sgr0)"
  export PS1='[\[$LG\]\u\[$NC\]@\[$LG\]\h\[$NC\]]:(\[$LG\]\[$BN\]$($DFSCRIPT)\[$NC\])\w\$ '
fi
}

case $TERM in
  rxvt*|screen*|cygwin)
    export PS1='\u\@\h\w'
  ;;
  xterm*|linux*|*vt100*|cons25)
    normal
  ;;
  *)
    normal
        ;;
esac

function rarit() { rar a -m5 -v1m $1 $1; }
function paste() { $* | curl -F 'sprunge=<-' http://sprunge.us ; }
function disktest() { dd if=/dev/zero of=test bs=64k count=16k conv=fdatasync;rm -rf test ; }
function newpass() { perl -le 'print map {(a..z,A..Z,0..9)[rand 62] } 0..pop' 15 ; }
function fixhome() { chmod -R u=rwX,g=rX,o= "$HOME" ;}
#function showspace() { cd /home/ && du */ -hs; }

transfer() {
  if [ $# -eq 0 ]; then
    echo "No arguments specified. Usage: transfer /tmp/test.md OR: cat /tmp/test.md | transfer test.md"
    return 1
  fi
tmpfile=$(mktemp -t transferXXX )
if tty -s
  then
    basefile=$(basename "$1" | sed -e 's/[^a-zA-Z0-9._-]/-/g'); curl --progress-bar --upload-file "$1" "https://transfer.sh/$basefile" >> $tmpfile
  else
    curl --progress-bar --upload-file "-" "https://transfer.sh/$1" >> $tmpfile
fi
cat $tmpfile
rm -f $tmpfile
}

function swap() {
local TMPFILE=tmp.$$
    [ $# -ne 2 ] && echo "swap: 2 arguments needed" && return 1
    [ ! -e $1 ] && echo "swap: $1 does not exist" && return 1
    [ ! -e $2 ] && echo "swap: $2 does not exist" && return 1
    mv "$1" $TMPFILE; mv "$2" "$1"; mv $TMPFILE "$2"
}

if [ -e /etc/bash_completion ] ; then source /etc/bash_completion; fi
if [ -e ~/.custom ]; then source ~/.custom; fi

function changeUserpass() {
REALM=rutorrent
HTPASSWD=/etc/htpasswd
echo -n "Username: "; read user
        username=$(echo "$user"|sed 's/.*/\L&/')
        if [[ ! $(grep "^${username}" ${HTPASSWD}) ]]; then
    echo "Username ${username} wasnt found in ${HTPASSWD} .. please try again"
    exit
  fi
        echo -n "Password: (hit enter to generate a password) "; read password
        if [[ ! -z "${password}" ]]; then
                echo "setting password to ${password}"
                passwd=${password}
                echo "${username}:${passwd}" | chpasswd >/dev/null 2>&1
                sed -i "/${username}/ d" ${HTPASSWD}
                (echo -n "${username}:${REALM}:" && echo -n "${username}:${REALM}:${passwd}" | md5sum | awk '{print $1}' ) >> "${HTPASSWD}"
        else
                echo "setting password to ${genpass}"
                sed -i "/${username}/ d" ${HTPASSWD}
                passwd=${genpass}
                echo "${username}:${passwd}" | chpasswd >/dev/null 2>&1
                (echo -n "${username}:${REALM}:" && echo -n "${username}:${REALM}:${passwd}" | md5sum | awk '{print $1}' ) >> "${HTPASSWD}"
        fi
  echo "$username : $passwd" >>/root/${username}.txt
}

function createSeedboxUser() {
OK=`echo -e "[\e[0;32mOK\e[00m]"`
realm="rutorrent"
htpasswd="/etc/htpasswd"
genpass=$(perl -le 'print map {(a..z,A..Z,0..9)[rand 62] } 0..pop' 15)
ruconf="/srv/rutorrent/conf/users"
IRSSI_PASS=$(perl -le 'print map {(a..z,A..Z,0..9)[rand 62] } 0..pop' 15)
IRSSI_PORT=$((RANDOM%64025+1024))
#PORT=$(($RANDOM + ($RANDOM % 2) * 32768))
PORT=$(shuf -i 2000-61000 -n 1)
PORTEND=$(($PORT + 1500))
while [[ "$(netstat -ln | grep ':'"$PORT"'' | grep -c 'LISTEN')" -eq "1" ]]; do PORT="$(shuf -i 2000-61000 -n 1)"; done
#RPORT=$(($PORT + 1500))
RPORT=$(shuf -i 2000-61000 -n 1)
while [[ "$(netstat -ln | grep ':'"$RPORT"'' | grep -c 'LISTEN')" -eq "1" ]]; do RPORT="$(shuf -i 2000-61000 -n 1)"; done
ip=$(ip route get 8.8.8.8 | awk 'NR==1 {print $NF}')
# --END HERE --
echo -n "Username: "; read username
  if grep -Fxq "$username" /etc/passwd; then
    echo "$username exists! cant proceed..."
    exit
  else
    useradd -m -k /etc/skel/ $username -s /usr/bin/lshell
    echo -n "Password: (hit enter to generate a password) ";read password
    chown $username.www-data /home/$username >/dev/null 2>&1
    cp $htpasswd /root/rutorrent-htpasswd.`date +'%d.%m.%y-%S'`
    if [[ "$password" == "" ]]; then
      echo "setting password to $genpass"
      echo "${username}:${genpass}" | chpasswd >/dev/null 2>&1
      (echo -n "$username:$realm:" && echo -n "$username:$realm:$genpass" | md5sum | awk '{print $1}' ) >> $htpasswd
      echo "${username} : $genpass" >/root/${username}.info
    else
      echo "using $password"
      echo "${username}:${password}" | chpasswd >/dev/null 2>&1
      (echo -n "$username:$realm:" && echo -n "$username:$realm:$password" | md5sum | awk '{print $1}' ) >> $htpasswd
      echo "${username} : $password " >/root/${username}.info
  fi
  echo "Quota size for user: (EX: 500GB): "
  read SIZE
  case $SIZE in
    *TB)
      QUOTASIZE=$(echo $SIZE|cut -d'T' -f1)
      DISKSIZE=$(($QUOTASIZE * 1024 * 1024 * 1024))
      setquota -u ${username} ${DISKSIZE} ${DISKSIZE} 0 0 -a
      echo "$SIZE" >>/root/${username}.info
    ;;
    *GB)
      QUOTASIZE=$(echo $SIZE|cut -d'G' -f1)
      DISKSIZE=$(($QUOTASIZE * 1024 * 1024))
      setquota -u ${username} ${DISKSIZE} ${DISKSIZE} 0 0 -a
      echo "$SIZE" >>/root/${username}.info
    ;;
    *)
      echo "Disk Space MUST be in GB/TB, Example: 711GB OR 2.5TB, Exiting script, type bash $0 and try again";exit 0
    ;;
  esac

echo -n "writing $username to vsftpd.chroot_list..."
echo "$username" >> /etc/vsftpd.chroot_list
echo $OK

echo -n "writing $username .rtorrent.rc using port-range (${PORT}-${PORTEND})..."
cat >/home/$username/.rtorrent.rc<<RC
# -- START HERE --
scgi_port = localhost:$RPORT
min_peers = 1
max_peers = 100
min_peers_seed = -1
max_peers_seed = -1
max_uploads = 100
download_rate = 0
upload_rate = 0
directory = /home/${username}/torrents/
session = /home/${username}/.sessions/
schedule = watch_directory,5,5,load_start=/home/${username}/rwatch/*.torrent
schedule = filter_active,5,5,"view_filter = active,d.get_up_rate="
view_add = alert
view_sort_new = alert,less=d.get_message=
schedule = filter_alert,30,30,"view_filter = alert,d.get_message=; view_sort = alert"
port_range = $PORT-$PORTEND
use_udp_trackers = yes
encryption = allow_incoming,try_outgoing,enable_retry
peer_exchange = no
check_hash = no
execute_nothrow=chmod,777,/home/${username}/.sessions/
# -- END HERE --

RC
echo $OK
echo -n "setting permissions ... "
  chown $username.www-data /home/$username/{torrents,.sessions,watch,.rtorrent.rc} >/dev/null 2>&1
  usermod -a -G www-data $username >/dev/null 2>&1
  usermod -a -G $username www-data >/dev/null 2>&1
  chmod 777 /home/${username}/.sessions >/dev/null 2>&1
echo $OK
echo -n "writing $username rtorrent/irssi cron script ... "
cat >/home/${username}/.startup<<SU
#!/bin/bash
export USER=\$(id -un)
IRSSI_CLIENT=yes
RTORRENT_CLIENT=yes
WIPEDEAD=yes

# NO NEED TO EDIT PAST HERE!
if [ "\$WIPEDEAD" == "yes" ]; then
  screen -wipe >/dev/null 2>&1;
fi

if [ "\$IRSSI_CLIENT" == "yes" ]; then
  (screen -ls|grep irssi >/dev/null || (screen -fa -dmS irssi irssi && false))
fi

if [ "\$RTORRENT_CLIENT" == "yes" ]; then
  (screen -ls|grep rtorrent >/dev/null || (screen -dmS rtorrent rtorrent && false))
fi
SU
  chown ${username}.${username} /home/${username}/.startup >/dev/null 2>&1
  chmod +x /home/${username}/.startup >/dev/null 2>&1
echo $OK
echo -n "enabling $username cron script ... "
  mkdir "/srv/rutorrent/conf/users/${username}" >/dev/null 2>&1
  mkdir -p /srv/rutorrent/conf/users/"${username}"/plugins/fileupload/ >/dev/null 2>&1
  cp /srv/rutorrent/plugins/fileupload/conf.php /srv/rutorrent/conf/users/"${username}"/plugins/fileupload/conf.php
  chown -R www-data: /srv/rutorrent/conf/users/"${username}" >/dev/null 2>&1
  chown $username.$username /home/$username/.startup >/dev/null 2>&1
  sudo -u $username chmod +x /home/$username/.startup  >/dev/null 2>&1
  sudo -u $username chmod 750 /home/$username/ >/dev/null 2>&1
  chown -R $username.www-data /home/${username} >/dev/null 2>&1
echo $OK
echo -n "writing $username rutorrent config.php ... "
  mkdir $ruconf/$username >/dev/null 2>&1
cat >$ruconf/$username/config.php<<DH
<?php
  @define('HTTP_USER_AGENT', 'Mozilla/5.0 (Windows NT 6.0; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0', true);
  @define('HTTP_TIME_OUT', 30, true);
  @define('HTTP_USE_GZIP', true, true);
  \$httpIP = null;
  @define('RPC_TIME_OUT', 5, true);
  @define('LOG_RPC_CALLS', false, true);
  @define('LOG_RPC_FAULTS', true, true);
  @define('PHP_USE_GZIP', false, true);
  @define('PHP_GZIP_LEVEL', 2, true);
  \$schedule_rand = 10;
  \$do_diagnostic = true;
  \$log_file = '/tmp/errors.log';
  \$saveUploadedTorrents = true;
  \$overwriteUploadedTorrents = false;
  \$topDirectory = '/home/$username/';
  \$forbidUserSettings = false;
  \$scgi_port = $RPORT;
  \$scgi_host = "localhost";
  \$XMLRPCMountPoint = "/RPC2";
  \$pathToExternals = array("php" => '',"curl" => '',"gzip" => '',"id" => '',"stat" => '',);
  \$localhosts = array("127.0.0.1", "localhost",);
  \$profilePath = '../share';
  \$profileMask = 0777;
  \$diskuser = '/';
  \$quotaUser = '${username}';
  \$autodlPort = $IRSSI_PORT;
  \$autodlPassword = "$IRSSI_PASS";
DH
echo $OK

fi
echo -n "Setting up autodl-irssi for $username ... "
mkdir -p /home/$username/.autodl >/dev/null 2>&1
touch /home/$username/.autodl/autodl.cfg >/dev/null 2>&1
cat >/home/$username/.autodl/autodl.cfg<<ADC
[options]
gui-server-port = $IRSSI_PORT
gui-server-password = $IRSSI_PASS
ADC

echo $OK
sudo -u $username /home/$username/.startup >/dev/null 2>&1
command1="*/1 * * * * /home/${username}/.startup"
cat <(fgrep -iv "${command1}" <(sh -c 'sudo -u ${username} crontab -l' >/dev/null 2>&1)) <(echo "${command1}") | sudo -u ${username} crontab -
cat >/etc/apache2/sites-enabled/alias.${username}.download.conf<<AS
Alias /${username}.downloads "/home/${username}/torrents/"
  <Directory "/home/${username}/torrents/">
   Options Indexes FollowSymLinks MultiViews
    AllowOverride None
          AuthType Digest
          AuthName "rutorrent"
          AuthUserFile '/etc/htpasswd'
          Require valid-user
    Order allow,deny
    Allow from all
  </Directory>
AS

cat >/etc/apache2/sites-enabled/alias.${username}.console.conf<<CS
Alias /${username}.console "/home/${username}/.console/"
<Directory "/home/${username}/.console/">
  Options Indexes FollowSymLinks MultiViews
  AuthType Digest
  AuthName "rutorrent"
  AuthUserFile '/etc/htpasswd'
  Require valid-user
  AllowOverride None
  Order allow,deny
  allow from all
</Directory>
CS

cat >>/etc/apache2/sites-enabled/scgimount.conf<<SC
SCGIMount /${username} 127.0.0.1:$RPORT
SC

sed -i -e "s/console-username/${username}/g" \
       -e "s/console-password/${password}/g" /home/${username}/.console/index.php

sudo -u "${username}" pkill -f rtorrent >/dev/null 2>&1

service apache2 reload >/dev/null 2>&1

}
function deleteSeedboxUser() {

rutorrent="/srv/rutorrent"
htpasswd="/etc/htpasswd"
OK=$(echo -e "[ \e[0;32mDONE\e[00m ]")

echo -n "Username: "
read username
if [[ -z ${username} ]]
  then echo "you want me to delete nothing? next time enter a username";exit
fi
echo -n "Deleting ${username} /home and rutorrent data ... "
userdel -rf ${username} >/dev/null 2>&1
groupdel ${username} >/dev/null 2>&1
sed -i '/^$username/d' ${htpasswd}
rm -rf /etc/apache2/sites-enabled/alias.${username}.download.conf  >/dev/null 2>&1
rm -rf ${rutorrent}/conf/users/${username} >/dev/null 2>&1
rm -rf ${rutorrent}/share/users/${username} >/dev/null 2>&1
rm -rf /var/spool/cron/crontabs/${username} >/dev/null 2>&1
rm -rf /home/${username} >/dev/null 2>&1
rm -rf /var/run/screens/S-${username} >/dev/null 2>&1
rm -rf /etc/openvpn/server-${username}.conf >/dev/null 2>&1
service apache2 reload
echo ${OK}
}

function upgradeBTSync() {
  apt-get install -yqq -f --only-upgrade btsync
  service btsync restart
}

function upgradePlex() {
  apt-get install -yqq -f --only-upgrade plexmediaserver
  service plexmediaserver restart
}

EOF
}

# intro function (1)
function _intro() {
  echo
  echo
  echo "[${repo_title}QuickBox${normal}] ${title} QuickBox Seedbox Installation ${normal}  "
  echo
  echo

  echo "${green}Checking distribution ...${normal}"
  if [ ! -x  /usr/bin/lsb_release ]; then
    echo 'It looks like you are running $DISTRO, which is not supported by QuickBox.'
    echo 'Exiting...'
    exit 1
  fi
  echo "$(lsb_release -a)"
  echo
  dis="$(lsb_release -is)"
  rel="$(lsb_release -rs)"
  if [[ ! "${dis}" =~ ("Ubuntu"|"Debian") ]]; then
    echo "${dis}: ${alert} It looks like you are running $DISTRO, which is not supported by QuickBox ${normal} "
    echo 'Exiting...'
    exit 1
  elif [[ ! "${rel}" =~ ("14.04"|"15.04"|"15.10"|"16.04"|"7"|"8") ]]; then
    echo "${bold}${rel}:${normal} You do not appear to be running a supported $DISTRO release."
    echo 'Exiting...'
    exit 1
  fi
}


# check if root function (2)
function _checkroot() {
  if [[ $EUID != 0 ]]; then
    echo 'This script must be run with root privileges.'
    echo 'Exiting...'
    exit 1
  fi
  echo "${green}Congrats! You're running as root. Let's continue${normal} ... "
  echo
}

# check if create log function (3)
function _logcheck() {
  echo -ne "${bold}${yellow}Do you wish to write to a log file?${normal} (Default: ${green}${bold}Y${normal}) "; read input
    case $input in
      [yY] | [yY][Ee][Ss] | "" ) OUTTO="/root/quickbox.log";echo "${bold}Output is being sent to /root/quickbox.log${normal}" ;;
      [nN] | [nN][Oo] ) OUTTO="/dev/null 2>&1";echo "${cyan}NO output will be logged${normal}" ;;
    *) OUTTO="/root/quickbox.log";echo "${bold}Output is being sent to /root/quickbox.log${normal}" ;;
    esac
  if [[ ! -d /root/tmp ]]; then
    sed -i 's/noexec,//g' /etc/fstab
    mount -o remount /tmp >>"${OUTTO}" 2>&1
  fi
}

# primary partition question (4)
function _askpartition() {
  echo
  echo "##################################################################################"
  echo "#${bold} By default the QuickBox script will initiate a build using ${green}/${normal} ${bold}as the${normal}"
  echo "#${bold} primary partition for mounting quotas.${normal}"
  echo "#"
  echo "#${bold} Some providers, such as OVH and SYS force ${green}/home${normal} ${bold}as the primary mount ${normal}"
  echo "#${bold} on their server setups. So if you have an OVH or SYS server and have not"
  echo "#${bold} modified your partitions, it is safe to choose option ${yellow}2)${normal} ${bold}below.${normal}"
  echo "#"
  echo "#${bold} If you are not sure:${normal}"
  echo "#${bold} I have listed out your current partitions below. Your mountpoint will be"
  echo "#${bold} listed as ${green}/home${normal} ${bold}or ${green}/${normal}${bold}. ${normal}"
  echo "#"
  echo "#${bold} Typically, the partition with the most space assigned is your default.${normal}"
  echo "##################################################################################"
  echo
  lsblk
  echo
  echo -e "${bold}${yellow}1)${normal} / - ${green}root mount${normal}"
  echo -e "${bold}${yellow}2)${normal} /home - ${green}home mount${normal}"
  echo -ne "${bold}${yellow}What is your mount point for user quotas?${normal} (Default ${green}1${normal}): "; read version
  case $version in
    1 | "") primaryroot=root  ;;
    2) primaryroot=home  ;;
    *) primaryroot=root ;;
  esac
  echo "Using ${green}$primaryroot mount${normal} for quotas"

  #echo -ne "${bold}${yellow}Are you installing on a ${bold}${green}/${normal} ${bold}${yellow}primary partition${normal} (Default: ${green}Y${normal}): "; read responce
  #case $responce in
  #  [yY] | [yY][Ee][Ss] | "" ) primaryroot=yes ;;
  #  [nN] | [nN][Oo] ) primaryroot=no ;;
  #  *) primaryroot=yes ;;
  #esac
}

function _askcontinue() {
echo
echo "Press ${standout}${green}ENTER${normal} when you're ready to begin or ${standout}${red}Ctrl+Z${normal} to cancel" ;read input
echo
}

# This function blocks an insecure port 1900 that may lead to
# DDoS masked attacks. Only remove this function if you absolutely
# need port 1900. In most cases, this is a junk port.
function _ssdpblock() {
  iptables -I INPUT 1 -p udp -m udp --dport 1900 -j DROP
}

# package and repo addition (5) _update and upgrade_
function _updates() {
  if lsb_release >>"${OUTTO}" 2>&1; then ver=$(lsb_release -c|awk '{print $2}')
  else
    apt-get -y -q install lsb-release >>"${OUTTO}" 2>&1
    if [[ -e /usr/bin/lsb_release ]]; then ver=$(lsb_release -c|awk '{print $2}')
    else echo "failed to install lsb-release from apt, please install manually and re-run script"; exit
    fi
  fi

if [[ $DISTRO == Debian ]]; then
cat >/etc/apt/sources.list<<EOF
#------------------------------------------------------------------------------#
#                            OFFICIAL DEBIAN REPOS                             #
#------------------------------------------------------------------------------#


###### Debian Main Repos
#deb http://ftp.nl.debian.org/debian testing main contrib non-free
#deb-src http://ftp.nl.debian.org/debian testing main contrib non-free

###### Debian Update Repos
deb http://ftp.de.debian.org/debian/ wheezy main contrib non-free
deb-src http://ftp.de.debian.org/debian/ wheezy main contrib non-free
deb http://security.debian.org/ wheezy/updates main contrib non-free
deb-src http://security.debian.org/ wheezy/updates main contrib non-free
deb http://ftp.de.debian.org/debian/ wheezy-updates main contrib non-free
deb-src http://ftp.de.debian.org/debian/ wheezy-updates main contrib non-free
deb http://ftp.de.debian.org/debian wheezy-backports main contrib non-free
deb-src http://ftp.de.debian.org/debian wheezy-backports main contrib non-free

deb http://ftp.debian.org/debian/ wheezy-updates main contrib non-free
deb-src http://ftp.debian.org/debian/ wheezy-updates main contrib non-free

#Third Parties Repos -- retired
#Debian Multimedia
#deb http://www.deb-multimedia.org squeeze main non-free
#deb http://www.deb-multimedia.org squeeze-backports main

#Third Parties Repos -- updated
# Deb Multimedia
deb http://www.deb-multimedia.org wheezy main non-free
deb-src http://www.deb-multimedia.org wheezy main non-free

#Debian Backports Repos
#http://backports.debian.org/debian-backports squeeze-backports main
EOF

  apt-get --yes --force-yes update >>"${OUTTO}" 2>&1
  apt-get --yes --force-yes install deb-multimedia-keyring >>"${OUTTO}" 2>&1
  apt-get --yes --force-yes update >>"${OUTTO}" 2>&1

else
cat >/etc/apt/sources.list<<EOF
#------------------------------------------------------------------------------#
#                            OFFICIAL UBUNTU REPOS                             #
#------------------------------------------------------------------------------#


###### Ubuntu Main Repos
deb http://nl.archive.ubuntu.com/ubuntu/ ${ver} main restricted universe multiverse
deb-src http://nl.archive.ubuntu.com/ubuntu/ ${ver} main restricted universe multiverse

###### Ubuntu Update Repos
deb http://nl.archive.ubuntu.com/ubuntu/ ${ver}-security main restricted universe multiverse
deb http://nl.archive.ubuntu.com/ubuntu/ ${ver}-updates main restricted universe multiverse
deb http://nl.archive.ubuntu.com/ubuntu/ ${ver}-backports main restricted universe multiverse
deb-src http://nl.archive.ubuntu.com/ubuntu/ ${ver}-security main restricted universe multiverse
deb-src http://nl.archive.ubuntu.com/ubuntu/ ${ver}-updates main restricted universe multiverse
deb-src http://nl.archive.ubuntu.com/ubuntu/ ${ver}-backports main restricted universe multiverse

###### Ubuntu Partner Repo
deb http://archive.canonical.com/ubuntu ${ver} partner
deb-src http://archive.canonical.com/ubuntu ${ver} partner
EOF
fi

  if [[ $DISTRO == Debian ]]; then
    export DEBIAN_FRONTEND=noninteractive
    yes '' | apt-get update >>"${OUTTO}" 2>&1
    apt-get -y purge samba samba-common >>"${OUTTO}" 2>&1
    yes '' | apt-get upgrade >>"${OUTTO}" 2>&1
  else
    export DEBIAN_FRONTEND=noninteractive
    apt-get -y --force-yes update >>"${OUTTO}" 2>&1
    apt-get -y purge samba samba-common >>"${OUTTO}" 2>&1
    apt-get -y --force-yes upgrade >>"${OUTTO}" 2>&1
  fi

  if [[ -e /etc/ssh/sshd_config ]]; then
    echo "Port 4747" /etc/ssh/sshd_config >> /dev/null 2>&1
    sed -i 's/Port 22/Port 4747/g' /etc/ssh/sshd_config
    service ssh restart >>"${OUTTO}" 2>&1
  fi

  # Create the service lock file directory
  mkdir /install

}

# setting locale function (6)
function _locale() {
echo 'LANGUAGE="en_US.UTF-8"' >> /etc/default/locale
echo 'LC_ALL="en_US.UTF-8"' >> /etc/default/locale
echo "en_US.UTF-8 UTF-8" > /etc/locale.gen
  if [[ -e /usr/sbin/locale-gen ]]; then locale-gen >>"${OUTTO}" 2>&1
  else
    apt-get -y update >>"${OUTTO}" 2>&1
    apt-get install locales -y >>"${OUTTO}" 2>&1
    locale-gen >>"${OUTTO}" 2>&1
    export LANG="en_US.UTF-8"
    export LC_ALL="en_US.UTF-8"
    export LANGUAGE="en_US.UTF-8"
  fi
}

# package and repo addition (silently add php7) _add respo sources_
function _repos() {
  if [[ "${rel}" = "16.04" ]]; then
    # now working with php 7 - so let's add it
    LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php -y >>"${OUTTO}" 2>&1;
  fi
}

# setting system hostname function (7)
function _hostname() {
echo -ne "Please enter a hostname for this server (${bold}Hit enter to make no changes${normal}): " ; read input
if [[ -z $input ]]; then
        echo "No hostname supplied, no changes made!!"
else
        hostname ${input}
        echo "${input}">/etc/hostname
        echo "hostname ${input}">> /etc/rc.local
        echo "Hostname set to ${input}"
fi
}

# package and repo addition (9) _install softwares and packages_
function _depends() {
  if [[ $DISTRO == Debian ]]; then
  apt-get -y update >>"${OUTTO}" 2>&1
  yes '' | apt-get install --force-yes build-essential fail2ban bc sudo screen zip irssi unzip nano bwm-ng htop iotop git dos2unix subversion \
    dstat automake make mktorrent libtool libcppunit-dev libssl-dev pkg-config libxml2-dev libcurl3 libcurl4-openssl-dev libsigc++-2.0-dev \
    apache2-utils autoconf cron curl libxslt-dev libncurses5-dev yasm pcregrep apache2 php5 php5-cli php-net-socket libdbd-mysql-perl libdbi-perl \
    fontconfig quota comerr-dev ca-certificates libfontconfig1-dev libfontconfig1 rar unrar mediainfo php5-curl ifstat libapache2-mod-php5 \
    ttf-mscorefonts-installer checkinstall dtach cfv libarchive-zip-perl libnet-ssleay-perl php5-geoip openjdk-7-jre-headless openjdk-7-jre openjdk-7-jdk \
    libxslt1-dev libxslt1.1 libxml2 libffi-dev python-pip python-dev libhtml-parser-perl libxml-libxml-perl libjson-perl libjson-xs-perl \
    libxml-libxslt-perl libapache2-mod-scgi lshell vnstat vnstati openvpn >>"${OUTTO}" 2>&1
  elif [[ "${rel}" =~ ("14.04"|"15.04"|"15.10") ]]; then
  apt-get -y update >>"${OUTTO}" 2>&1
    apt-get install -y build-essential fail2ban bc sudo screen zip irssi unzip nano bwm-ng htop iotop git dos2unix subversion \
    dstat automake make mktorrent libtool libcppunit-dev libssl-dev pkg-config libxml2-dev libcurl3 libcurl4-openssl-dev libsigc++-2.0-dev \
    apache2-utils autoconf cron curl libxslt-dev libncurses5-dev yasm pcregrep apache2 php5 php5-cli php-net-socket libdbd-mysql-perl libdbi-perl \
    fontconfig quota comerr-dev ca-certificates libfontconfig1-dev libfontconfig1 rar unrar mediainfo php5-curl ifstat libapache2-mod-php5 \
    ttf-mscorefonts-installer checkinstall dtach cfv libarchive-zip-perl libnet-ssleay-perl php5-geoip openjdk-7-jre-headless openjdk-7-jre openjdk-7-jdk \
    libxslt1-dev libxslt1.1 libxml2 libffi-dev python-pip python-dev libhtml-parser-perl libxml-libxml-perl libjson-perl libjson-xs-perl \
    libxml-libxslt-perl libapache2-mod-scgi lshell vnstat vnstati openvpn >>"${OUTTO}" 2>&1
  elif [[ "${rel}" = "16.04" ]]; then
  apt-get -y update >>"${OUTTO}" 2>&1
    apt-get -y install build-essential fail2ban bc sudo screen zip irssi unzip nano bwm-ng htop iotop git dos2unix subversion \
    dstat automake make mktorrent libtool libcppunit-dev libssl-dev pkg-config libxml2-dev libcurl3 libcurl4-openssl-dev libsigc++-2.0-dev \
    apache2-utils autoconf cron curl libapache2-mod-geoip libxslt-dev libncurses5-dev yasm pcregrep apache2 php-net-socket libdbd-mysql-perl libdbi-perl \
    php7.0 php7.0-fpm php7.0-mbstring php7.0-zip php7.0-mysql php7.0-curl php-memcached memcached php7.0-gd php7.0-json php7.0-mcrypt php7.0-opcache php7.0-xml \
    php7.0-zip fontconfig quota comerr-dev ca-certificates libfontconfig1-dev libfontconfig1 rar unrar mediainfo ifstat libapache2-mod-php7.0 \
    ttf-mscorefonts-installer checkinstall dtach cfv libarchive-zip-perl libnet-ssleay-perl openjdk-8-jre-headless openjdk-8-jre openjdk-8-jdk \
    libxslt1-dev libxslt1.1 libxml2 libffi-dev python-pip python-dev libhtml-parser-perl libxml-libxml-perl libjson-perl libjson-xs-perl \
    libxml-libxslt-perl libapache2-mod-scgi lshell vnstat vnstati openvpn >>"${OUTTO}" 2>&1
  fi
}

# install and adjust config server firewall function (15)
function _askcsf() {
  echo -n "${bold}${yellow}Do you want to install CSF (Config Server Firewall)?${normal} (${bold}${green}Y${normal}/n): "
  read responce
  case $responce in
    [yY] | [yY][Ee][Ss] | "" ) csf=yes ;;
    [nN] | [nN][Oo] ) csf=no ;;
  esac
}

function _csf() {
  if [[ ${csf} == "yes" ]]; then
    echo -n "${green}Installing and Adjusting CSF${normal} ... "
    apt-get -y install e2fsprogs >/dev/null 2>&1;
    wget http://www.configserver.com/free/csf.tgz >/dev/null 2>&1;
    tar -xzf csf.tgz >/dev/null 2>&1;
    ufw disable >>"${OUTTO}" 2>&1;
    cd csf
    sh install.sh >>"${OUTTO}" 2>&1;
    perl /usr/local/csf/bin/csftest.pl >>"${OUTTO}" 2>&1;
    # modify csf blocklists - essentially like CloudFlare, but on your machine
    sed -i.bak -e "s/#SPAMDROP|86400|0|/SPAMDROP|86400|100|/" \
               -e "s/#SPAMEDROP|86400|0|/SPAMEDROP|86400|100|/" \
               -e "s/#DSHIELD|86400|0|/DSHIELD|86400|100|/" \
               -e "s/#TOR|86400|0|/TOR|86400|100|/" \
               -e "s/#ALTTOR|86400|0|/ALTTOR|86400|100|/" \
               -e "s/#BOGON|86400|0|/BOGON|86400|100|/" \
               -e "s/#HONEYPOT|86400|0|/HONEYPOT|86400|100|/" \
               -e "s/#CIARMY|86400|0|/CIARMY|86400|100|/" \
               -e "s/#BFB|86400|0|/BFB|86400|100|/" \
               -e "s/#OPENBL|86400|0|/OPENBL|86400|100|/" \
               -e "s/#AUTOSHUN|86400|0|/AUTOSHUN|86400|100|/" \
               -e "s/#MAXMIND|86400|0|/MAXMIND|86400|100|/" \
               -e "s/#BDE|3600|0|/BDE|3600|100|/" \
               -e "s/#BDEALL|86400|0|/BDEALL|86400|100|/" /etc/csf/csf.blocklists;
    # modify csf process ignore - ignore nginx, varnish & mysql
    echo >> /etc/csf/csf.pignore;
    echo "[ QuickBox Additions - These are necessary to avoid noisy emails ]" >> /etc/csf/csf.pignore;
    echo "exe:/usr/sbin/rsyslogd" >> /etc/csf/csf.pignore;
    echo "exe:/lib/systemd/systemd-timesyncd" >> /etc/csf/csf.pignore;
    echo "exe:/lib/systemd/systemd-resolved" >> /etc/csf/csf.pignore;
    # modify csf conf - make suitable changes for non-cpanel environment
    cd /etc/csf
    rm csf.conf
    touch /install/.csf.lock
    wget -q https://raw.githubusercontent.com/Swizards/QuickBox/master/commands/csf.conf
  fi
}

# NOTE: Sendmail is a requirement of CSF. Using sendmail ensures that the user receives the needed
# emails in regards to SSH access and IP blocking as well as any spikes in resources usage.
# Don't want sendmail to be installed? Don't install CSF and adapt your own solution for security. ;)
function _csfsendmail1() {
    # install sendmail as it's binary is required by CSF
    echo -n "${green}Installing Sendmail${normal} ... "
    apt-get -y install sendmail sendmail-bin >>"${OUTTO}" 2>&1;
    export DEBIAN_FRONTEND=noninteractive | /usr/sbin/sendmailconfig >>"${OUTTO}" 2>&1;
}
function _csfsendmail2() {
    # add administrator email
    echo "${magenta}${bold}Add an administrator email below for receiving alerts${normal}"
    read -p "${bold}Email: ${normal}" admin_email
    echo
    echo "${bold}The email ${green}${bold}$admin_email${normal} ${bold}is now the forwarding address for root mail${normal}"
}
function _csfsendmail3() {
    echo -n "${green}finalizing sendmail installation${normal} ... "
    # install aliases
    echo -e "mailer-daemon: postmaster
postmaster: root
nobody: root
hostmaster: root
usenet: root
news: root
webmaster: root
www: root
ftp: root
abuse: root
root: $admin_email" > /etc/aliases
    newaliases >>"${OUTTO}" 2>&1;
}

function _nocsf() {
  if [[ ${csf} == "no" ]]; then
    echo "${cyan}Skipping Config Server Firewall Installation${normal} ... "
  fi
}

# if you're using cloudlfare as a protection and/or cdn - this next bit is important
function _askcloudflare() {
  echo -ne "${bold}${yellow}Would you like to whitelist CloudFlare IPs?${normal} (${bold}${green}Y${normal}/n): "
  read responce
  case $responce in
    [yY] | [yY][Ee][Ss] | "" ) cloudflare=yes ;;
    [nN] | [nN][Oo] ) cloudflare=no ;;
  esac
}

function _cloudflare() {
  if [[ ${cloudflare} == "yes" ]]; then
    echo -n "${green}Whitelisting Cloudflare IPv4 and IPv6${normal} ... "
    echo -e "# BEGIN CLOUDFLARE WHITELIST
# ips-v4
103.21.244.0/22
103.22.200.0/22
103.31.4.0/22
104.16.0.0/12
108.162.192.0/18
131.0.72.0/22
141.101.64.0/18
162.158.0.0/15
172.64.0.0/13
173.245.48.0/20
188.114.96.0/20
190.93.240.0/20
197.234.240.0/22
198.41.128.0/17
199.27.128.0/21
# ips-v6
2400:cb00::/32
2405:8100::/32
2405:b500::/32
2606:4700::/32
2803:f800::/32
# END CLOUDFLARE WHITELIST
" >> /etc/csf/csf.allow
  fi
}

# ban public trackers [csf option] (8)
function _csfdenyhosts() {
echo -ne "${bold}${yellow}Block Public Trackers?${normal}: (Default: ${green}Y${normal})"; read responce
case $responce in
  [yY] | [yY][Ee][Ss] | "")
echo "[ ${red}Blocking public trackers${normal} ]"
sed -i -e "/GLOBAL_DENY = \"\"/cGLOBAL_DENY = \"https://raw.githubusercontent.com/Swizards/QuickBox/master/commands/trackers\"" \
       -e "/GLOBAL_DYNDNS = \"\"/cGLOBAL_DYNDNS = \"https://raw.githubusercontent.com/Swizards/QuickBox/master/commands/trackers\"" /etc/csf/csf.conf
  ;;
  [nN] | [nN][Oo] ) echo "[ ${green}Allowing${normal} ]"
                ;;
        esac
}

# ban public trackers [iptables option] (8)
function _denyhosts() {
echo -ne "${bold}${yellow}Block Public Trackers?${normal}: (Default: ${green}Y${normal})"; read responce
case $responce in
  [yY] | [yY][Ee][Ss] | "")
echo "[ ${red}Blocking public trackers${normal} ]"
wget -q -O /etc/trackers https://raw.githubusercontent.com/Swizards/QuickBox/master/commands/trackers
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
curl -s -LO https://raw.githubusercontent.com/Swizards/QuickBox/master/commands/hostsTrackers
cat hostsTrackers >> /etc/hosts
  ;;
  [nN] | [nN][Oo] ) echo "[ ${green}Allowing${normal} ]"
                ;;
        esac
}

function _skel() {
  cd
  rm -rf /etc/skel
  if [[ -e skel.tar.gz ]]; then rm -rf skel.tar.gz;fi
  mkdir /etc/skel
  tar -xzvf "${REPOURL}"/sources/skel.tar.gz -C /etc/skel >>"${OUTTO}" 2>&1
  tar xzf "${REPOURL}"/sources/rarlinux-x64-5.3.0.tar.gz -C ./
  cp ./rar/*rar /usr/bin
  cp ./rar/*rar /usr/sbin
  rm -rf rarlinux*.tar.gz
  rm -rf ./rar
  wget -q http://geolite.maxmind.com/download/geoip/database/GeoLiteCity.dat.gz
  gunzip GeoLiteCity.dat.gz>>"${OUTTO}" 2>&1
  mkdir -p /usr/share/GeoIP>>"${OUTTO}" 2>&1
  rm -rf GeoLiteCity.dat.gz
  mv GeoLiteCity.dat /usr/share/GeoIP/GeoIPCity.dat>>"${OUTTO}" 2>&1
  (echo y;echo o conf prerequisites_policy follow;echo o conf commit)>/dev/null 2>&1|cpan Digest::SHA1 >>"${OUTTO}" 2>&1
  (echo y;echo o conf prerequisites_policy follow;echo o conf commit)>/dev/null 2>&1|cpan Digest::SHA >>"${OUTTO}" 2>&1
  if [[ ${primaryroot} == "root" ]]; then
    sed -i 's/errors=remount-ro/usrquota,errors=remount-ro/g' /etc/fstab
    apt-get install -y linux-image-extra-virtual >>"${OUTTO}" 2>&1
    mount -o remount / || mount -o remount /home >>"${OUTTO}" 2>&1
    quotacheck -auMF vfsv1 >>"${OUTTO}" 2>&1
    quotaon -uv / >>"${OUTTO}" 2>&1
    service quota start >>"${OUTTO}" 2>&1
    quotacheck -auMF vfsv1 >>"${OUTTO}" 2>&1
  else
    sed -i 's/errors=remount-ro/usrquota,errors=remount-ro/g' /etc/fstab
    apt-get install -y linux-image-extra-virtual >>"${OUTTO}" 2>&1
    mount -o remount /home >>"${OUTTO}" 2>&1
    quotacheck -auMF vfsv1 >>"${OUTTO}" 2>&1
    quotaon -uv /home >>"${OUTTO}" 2>&1
    service quota start >>"${OUTTO}" 2>&1
    quotacheck -auMF vfsv1 >>"${OUTTO}" 2>&1
  fi
cat >/etc/lshell.conf<<'LS'
[global]
logpath         : /var/log/lshell/
loglevel        : 2

[default]
allowed         : ['cd','cp','-d','-dmS','git','irssi','ll','ls','-m','mkdir','mv','nano','pwd','-R','rm','rtorrent','rsync','-S','scp','screen','tar','unrar','unzip','nano','wget']
forbidden       : [';', '&', '|','`','>','<', '$(', '${','sudo','vi','vim','./']
warning_counter : 2
aliases         : {'ls':'ls --color=auto','ll':'ls -l'}
intro           : "== Seedbox Shell ==\nWelcome To Your QuickBox Seedbox Shell\nType '?' to get the list of allowed commands"
home_path       : '/home/%u'
env_path        : ':/usr/local/bin:/usr/sbin'
allowed_cmd_path: ['/home/']
scp             : 1
sftp            : 0
overssh         : ['ls', 'rsync','scp']
LS
}

# install ffmpeg question (9)
function _askffmpeg() {
  echo -ne "${bold}${yellow}Install ffmpeg? (Used for screenshots)${normal} (Default: ${green}Y${normal}): "; read responce
  case $responce in
    [yY] | [yY][Ee][Ss] | "" ) ffmpeg=yes ;;
    [nN] | [nN][Oo] ) ffmpeg=no ;;
    *) ffmpeg=yes ;;
  esac
}

# build function for ffmpeg (9.1)
function _ffmpeg() {
  if [[ ${ffmpeg} == "yes" ]]; then
    echo -n "Building ffmpeg from source for screenshots ... "
    MAXCPUS=$(echo "$(nproc) / 2"|bc)
    cd /root/tmp
    if [[ -d /root/tmp/ffmpeg ]]; then rm -rf ffmpeg;fi
    ####---- Old source ----####
    #git clone git://source.ffmpeg.org/ffmpeg.git ffmpeg >>"${OUTTO}" 2>&1
    ####---- New source ----####
    git clone https://git.ffmpeg.org/ffmpeg.git ffmpeg >>"${OUTTO}" 2>&1
    ####---- Github Mirror source ----####
    #git clone git://github.com/FFmpeg/FFmpeg.git ffmpeg >>"${OUTTO}" 2>&1
    cd ffmpeg
    export FC_CONFIG_DIR=/etc/fonts
    export FC_CONFIG_FILE=/etc/fonts/fonts.conf
    ./configure --enable-libfreetype --enable-filter=drawtext --enable-fontconfig >>"${OUTTO}" 2>&1
    make -j${MAXCPUS} >>"${OUTTO}" 2>&1
    make install >>"${OUTTO}" 2>&1
    cp /usr/local/bin/ffmpeg /usr/bin >>"${OUTTO}" 2>&1
    cp /usr/local/bin/ffprobe /usr/bin >>"${OUTTO}" 2>&1
    rm -rf /root/tmp/ffmpeg >>"${OUTTO}" 2>&1
  fi
}

# ask what rtorrent version (10)
function _askrtorrent() {
  echo -e "1) rtorrent ${green}0.9.6${normal}"
  echo -e "2) rtorrent ${green}0.9.4${normal}"
  echo -e "3) rtorrent ${green}0.9.3${normal}"
  echo -ne "${bold}${yellow}What version of rtorrent do you want?${normal} (Default ${green}1${normal}): "; read version
  case $version in
    1 | "") RTVERSION=0.9.6;LTORRENT=0.13.6  ;;
    2) RTVERSION=0.9.4;LTORRENT=0.13.4  ;;
    3) RTVERSION=0.9.3;LTORRENT=0.13.3 ;;
    *) RTVERSION=0.9.6;LTORRENT=0.13.6 ;;
  esac
  echo "Using rtorrent-$RTVERSION/libtorrent-$LTORRENT"
}

# xmlrpc-c function (11)
function _xmlrpc() {
  cd /root/tmp
  echo -ne "Installing xmlrpc-c-${green}1.33.12${normal} ... "
  if [[ -d /root/tmp/xmlrpc-c ]]; then rm -rf xmlrpc-c;fi
  cp -R "$REPOURL/xmlrpc-c_1-33-12/" .
  cd xmlrpc-c_1-33-12
  chmod +x configure
  ./configure --prefix=/usr --disable-cplusplus >>"${OUTTO}" 2>&1
  make >>"${OUTTO}" 2>&1
  chmod +x install-sh
  make install >>"${OUTTO}" 2>&1
}

# libtorent function (12)
function _libtorrent() {
  cd /root/tmp
  MAXCPUS=$(echo "$(nproc) / 2"|bc)
  echo -ne "Installing libtorrent-${green}$LTORRENT${normal} ... "
  rm -rf xmlrpc-c  >>"${OUTTO}" 2>&1
  if [[ -e /root/tmp/libtorrent-${LTORRENT}.tar.gz ]]; then rm -rf libtorrent-${LTORRENT}.tar.gz;fi
  cp $REPOURL/sources/libtorrent-${LTORRENT}.tar.gz .
  tar -xzvf libtorrent-${LTORRENT}.tar.gz >>"${OUTTO}" 2>&1
  cd libtorrent-${LTORRENT}
  ./autogen.sh >>"${OUTTO}" 2>&1
  ./configure --prefix=/usr >>"${OUTTO}" 2>&1
  make -j${MAXCPUS} >>"${OUTTO}" 2>&1
  make install >>"${OUTTO}" 2>&1
}

# rtorrent function (10.1)
function _rtorrent() {
  cd /root/tmp
  MAXCPUS=$(echo "$(nproc) / 2"|bc)
  echo -ne "Installing rtorrent-${green}$RTVERSION${normal} ... "
  rm -rf libtorrent-${LTORRENT}* >>"${OUTTO}" 2>&1
  if [[ -e /root/tmp/libtorrent-${LTORRENT}.tar.gz ]]; then rm -rf libtorrent-${LTORRENT}.tar.gz;fi
  cp $REPOURL/sources/rtorrent-${RTVERSION}.tar.gz .
  tar -xzvf rtorrent-${RTVERSION}.tar.gz >>"${OUTTO}" 2>&1
  cd rtorrent-${RTVERSION}
  ./autogen.sh >>"${OUTTO}" 2>&1
  ./configure --prefix=/usr --with-xmlrpc-c >>"${OUTTO}" 2>&1
  make -j${MAXCPUS} >>"${OUTTO}" 2>&1
  make install >>"${OUTTO}" 2>&1
  cd /root/tmp
  ldconfig >>"${OUTTO}" 2>&1
  rm -rf /root/tmp/rtorrent-${RTVERSION}* >>"${OUTTO}" 2>&1
  touch /install/.rtorrent.lock
}

# scgi enable function (13-nixed)
# function _scgi() { ln -s /etc/apache2/mods-available/scgi.load /etc/apache2/mods-enabled/scgi.load >>"${OUTTO}" 2>&1 ; }

# function to install rutorrent (13)
function _rutorrent() {
  mkdir -p /srv/
  cd /srv
  if [[ -d /srv/rutorrent ]]; then rm -rf rutorrent;fi
  cp -R ${REPOURL}/rutorrent .
  sed -i '31i\<script type=\"text/javascript\" src=\"./js/jquery.browser.js\"></script> ' /srv/rutorrent/index.html

cat >/srv/rutorrent/.htaccess<<'EOF'
RewriteEngine On
RewriteCond %{HTTPS} !=on
RewriteRule ^/?(.*) https://%{SERVER_NAME}/$1 [R,L]
EOF

cat >/srv/rutorrent/home/.htaccess<<'EOF'
RewriteEngine On
RewriteCond %{HTTPS} !=on
RewriteRule ^/?(.*) https://%{SERVER_NAME}/$1 [R,L]
EOF
}

# ask for bash or lshell function (14)
# Heads Up: lshell is disabled for the initial user on install as your first user should not be limited in shell.
# Additional created users are automagically added to a limited shell environment.
function _askshell() {
  #echo -ne "${yellow}Set user shell to lshell?${normal} (Default: ${red}N${normal}): "; read responce
  #case $responce in
  #  [yY] | [yY][Ee][Ss] ) theshell="/usr/bin/lshell" ;;
  #  [nN] | [nN][Oo] | "" ) theshell="/bin/bash" ;;
  #  *) theshell="yes" ;;
  #esac
  echo -ne "${bold}${yellow}Add user to /etc/sudoers${normal} (Default: ${green}Y${normal}): "; read answer
  case $answer in
    [yY] | [yY][Ee][Ss] | "" ) sudoers="yes" ;;
    [nN] | [nN][Oo] ) sudoers="no" ;;
    *) sudoers="yes" ;;
  esac
}

# adduser function (15)
function _adduser() {
  theshell="/bin/bash";
  echo -ne "${bold}${yellow}Add a Master Account user to sudoers${normal}";
  echo -n "Username: "; read user
  username=$(echo "$user"|sed 's/.*/\L&/')
  useradd "${username}" -m -G www-data -s "${theshell}"
  echo -n "Password: (hit enter to generate a password) "; read password
  if [[ ! -z "${password}" ]]; then
    echo "setting password to ${password}"
    passwd=${password}
    echo "${username}:${passwd}" | chpasswd >>"${OUTTO}" 2>&1
    (echo -n "${username}:${REALM}:" && echo -n "${username}:${REALM}:${passwd}" | md5sum | awk '{print $1}' ) >> "${HTPASSWD}"
  else
    echo "setting password to ${genpass}"
    passwd=${genpass}
    echo "${username}:${passwd}" | chpasswd >>"${OUTTO}" 2>&1
    (echo -n "${username}:${REALM}:" && echo -n "${username}:${REALM}:${passwd}" | md5sum | awk '{print $1}' ) >> "${HTPASSWD}"
  fi
}

# function to enable sudo for www-data function (16)
function _apachesudo() {
  cd /etc
  rm sudoers
  wget -q https://raw.githubusercontent.com/Swizards/QuickBox/master/sources/sudoers
  #if [[ $sudoers == "yes" ]]; then
    awk -v username=${username} '/^root/ && !x {print username    " ALL=(ALL:ALL) NOPASSWD: ALL"; x=1} 1' /etc/sudoers > /tmp/sudoers;mv /tmp/sudoers /etc
    echo -n "${username}" > /etc/apache2/master.txt
  #fi
  cd
}

# function to configure apache (17)
function _apacheconf() {
cat >/etc/apache2/sites-enabled/aliases-seedbox.conf<<EOF
Alias /rutorrent "/srv/rutorrent"
<Directory "/srv/rutorrent">
  Options Indexes FollowSymLinks MultiViews
  AuthType Digest
  AuthName "rutorrent"
  AuthUserFile '/etc/htpasswd'
  Require valid-user
  AllowOverride None
  Order allow,deny
  allow from all
</Directory>
Alias /${username}.downloads "/home/${username}/torrents/"
<Directory "/home/${username}/torrents/">
  Options Indexes FollowSymLinks MultiViews
  AuthType Digest
  AuthName "rutorrent"
  AuthUserFile '/etc/htpasswd'
  Require valid-user
  AllowOverride None
  Order allow,deny
  allow from all
</Directory>
Alias /${username}.console "/home/${username}/.console/"
<Directory "/home/${username}/.console/">
  Options Indexes FollowSymLinks MultiViews
  AuthType Digest
  AuthName "rutorrent"
  AuthUserFile '/etc/htpasswd'
  Require valid-user
  AllowOverride None
  Order allow,deny
  allow from all
</Directory>
EOF
  a2enmod auth_digest >>"${OUTTO}" 2>&1
  a2enmod ssl >>"${OUTTO}" 2>&1
  a2enmod scgi >>"${OUTTO}" 2>&1
  a2enmod rewrite >>"${OUTTO}" 2>&1
  mv /etc/apache2/sites-enabled/000-default.conf /etc/apache2/ >>"${OUTTO}" 2>&1
cat >/etc/apache2/sites-enabled/default-ssl.conf<<EOF
SSLPassPhraseDialog  builtin
SSLSessionCache         shmcb:/var/cache/mod_ssl/scache(512000)
SSLSessionCacheTimeout  300
#SSLMutex default
SSLRandomSeed startup file:/dev/urandom  256
SSLRandomSeed connect builtin
SSLCryptoDevice builtin
<VirtualHost *:80>
        DocumentRoot "/srv/rutorrent/home"
        <Directory "/srv/rutorrent/home/">
                Options Indexes FollowSymLinks
                AllowOverride All AuthConfig
                Order allow,deny
                Allow from all
        AuthType Digest
        AuthName "${REALM}"
        AuthUserFile '${HTPASSWD}'
        Require valid-user
        </Directory>
SCGIMount /${username} 127.0.0.1:$PORT
</VirtualHost>
<VirtualHost *:443>
Options +Indexes +MultiViews +FollowSymLinks
SSLEngine on
        DocumentRoot "/srv/rutorrent/home"
        <Directory "/srv/rutorrent/home/">
                Options +Indexes +FollowSymLinks +MultiViews
                AllowOverride All AuthConfig
                Order allow,deny
                Allow from all
        AuthType Digest
        AuthName "${REALM}"
        AuthUserFile '${HTPASSWD}'
        Require valid-user
        </Directory>
        SSLEngine on
        SSLProtocol all -SSLv2
        SSLCipherSuite ALL:!ADH:!EXPORT:!SSLv2:RC4+RSA:+HIGH:+MEDIUM:+LOW
        SSLCertificateFile /etc/ssl/certs/ssl-cert-snakeoil.pem
        SSLCertificateKeyFile /etc/ssl/private/ssl-cert-snakeoil.key
        SetEnvIf User-Agent ".*MSIE.*" \
                 nokeepalive ssl-unclean-shutdown \
                 downgrade-1.0 force-response-1.0
SCGIMount /${username} 127.0.0.1:$PORT
</Virtualhost>
SCGIMount /${username} 127.0.0.1:$PORT
EOF

cat >/etc/apache2/sites-enabled/fileshare.conf<<DOE
<Directory "/srv/rutorrent/home/fileshare">
  Options -Indexes
  AllowOverride All
  Satisfy Any
</Directory>
DOE

if [[ "${rel}" = "16.04" ]]; then
  sed -i 's/memory_limit = 128M/memory_limit = 768M/g' /etc/php/7.0/apache2/php.ini
else
  sed -i 's/memory_limit = 128M/memory_limit = 768M/g' /etc/php5/apache2/php.ini
fi
}

# function to configure first user config (18)
function _rconf() {
cat >"/home/${username}/.rtorrent.rc"<<EOF
# -- START HERE --
min_peers = 1
max_peers = 100
min_peers_seed = -1
max_peers_seed = -1
max_uploads = 100
download_rate = 0
upload_rate = 0
directory = /home/${username}/torrents/
session = /home/${username}/.sessions/
schedule = watch_directory,5,5,load_start=/home/${username}/rwatch/*.torrent
schedule = filter_active,5,5,"view_filter = active,d.get_up_rate="
view_add = alert
view_sort_new = alert,less=d.get_message=
schedule = filter_alert,30,30,"view_filter = alert,d.get_message=; view_sort = alert"
port_range = $PORT-$PORTEND
use_udp_trackers = yes
encryption = allow_incoming,try_outgoing,enable_retry
peer_exchange = no
port_random = yes
scgi_port = localhost:$PORT
execute_nothrow=chmod,777,/home/${username}/.config/rpc.socket
execute_nothrow=chmod,777,/home/${username}/.sessions/
check_hash = no
# -- END HERE --
EOF
}

# function to install rutorrent plugins (19)
function _plugins() {
  mkdir -p /etc/quickbox/rutorrent/plugins/
  mv "${REPOURL}/plugins/" /etc/quickbox/rutorrent/
  PLUGINVAULT="/etc/quickbox/rutorrent/plugins/"
  mkdir -p "${rutorrent}plugins"; cd "${rutorrent}plugins"
  if [[ ${primaryroot} == "root" ]]; then
    LIST="_getdir _noty _noty2 _task autodl-irssi autotools check_port chunks cookies cpuload create data datadir diskspace edit erasedata extratio extsearch feeds filedrop filemanager fileshare fileupload geoip history httprpc loginmgr logoff lookat mediainfo mobile pausewebui ratio ratiocolor retrackers rpc rss rssurlrewrite rutracker_check scheduler screenshots seedingtime show_peers_like_wtorrent source stream theme throttle tracklabels trafic unpack xmpp"
  else
    LIST="_getdir _noty _noty2 _task autodl-irssi autotools check_port chunks cookies cpuload create data datadir diskspaceh edit erasedata extratio extsearch feeds filedrop filemanager fileshare fileupload geoip history httprpc loginmgr logoff lookat mediainfo mobile pausewebui ratio ratiocolor retrackers rpc rss rssurlrewrite rutracker_check scheduler screenshots seedingtime show_peers_like_wtorrent source stream theme throttle tracklabels trafic unpack xmpp"
  fi
  for i in $LIST; do
  cp -R "${PLUGINVAULT}$i" .
  done

cat >/srv/rutorrent/home/fileshare/.htaccess<<EOF
Satisfy Any
EOF

  cp /srv/rutorrent/home/fileshare/.htaccess /srv/rutorrent/plugins/fileshare/
  cd /srv/rutorrent/home/fileshare/
  rm -rf share.php
  ln -s ../../plugins/fileshare/share.php

cat >/srv/rutorrent/plugins/fileshare/conf.php<<'EOF'
<?php
$limits['duration'] = 24;   // maximum duration hours
$limits['links'] = 0;   //maximum sharing links per user
$downloadpath = $_SERVER['HTTP_HOST'] . '/fileshare/share.php';
?>
EOF

  sed -i 's/homeDirectory/topDirectory/g' /srv/rutorrent/plugins/filemanager/flm.class.php
  sed -i 's/homeDirectory/topDirectory/g' /srv/rutorrent/plugins/filemanager/settings.js.php
  sed -i 's/showhidden: true,/showhidden: false,/g' "${rutorrent}plugins/filemanager/init.js"
  chown -R www-data.www-data "${rutorrent}"
  cd /srv/rutorrent/plugins/theme/themes/

  git clone https://github.com/Swizards/club-Swizards.git club-Swizards >>"${OUTTO}" 2>&1
  chown -R www-data: club-Swizards
  #cp /etc/quickbox/rutorrent/plugins/rutorrent-quickbox-dark.zip .
  #unzip rutorrent-quickbox-dark.zip >>"${OUTTO}" 2>&1
  #rm -rf rutorrent-quickbox-dark.zip
  cd /srv/rutorrent/plugins
  perl -pi -e "s/\$defaultTheme \= \"\"\;/\$defaultTheme \= \"club-Swizards\"\;/g" /srv/rutorrent/plugins/theme/conf.php
  rm -rf /srv/rutorrent/plugins/tracklabels/labels/nlb.png

  # Needed for fileupload
  wget http://ftp.nl.debian.org/debian/pool/main/p/plowshare/plowshare4_2.1.3-1_all.deb -O plowshare4.deb >>"${OUTTO}" 2>&1
  wget http://ftp.nl.debian.org/debian/pool/main/p/plowshare/plowshare_2.1.3-1_all.deb -O plowshare.deb >>"${OUTTO}" 2>&1
  apt-get -y install plowshare >>"${OUTTO}" 2>&1
  dpkg -i plowshare*.deb >>"${OUTTO}" 2>&1
  rm -rf plowshare*.deb >>"${OUTTO}" 2>&1
  cd /root
  mkdir -p /root/bin
  git clone https://github.com/mcrapet/plowshare.git ~/.plowshare-source >>"${OUTTO}" 2>&1
  cd ~/.plowshare-source >>"${OUTTO}" 2>&1
  make install PREFIX=$HOME >>"${OUTTO}" 2>&1
  cd && rm -rf .plowshare-source >>"${OUTTO}" 2>&1
  apt-get -f install >>"${OUTTO}" 2>&1

  mkdir -p /srv/rutorrent/conf/users/"${username}"/plugins/fileupload/
  chmod 775 /srv/rutorrent/plugins/fileupload/scripts/upload
  cp /srv/rutorrent/plugins/fileupload/conf.php /srv/rutorrent/conf/users/"${username}"/plugins/fileupload/conf.php
  chown -R www-data: /srv/rutorrent/conf/users/"${username}"

  # Set proper permissions to filemanager so it may execute commands
  find /srv/rutorrent/plugins/filemanager/scripts -type f -exec chmod 755 {} \;
}

# function autodl to install autodl irssi scripts (20)
function _autodl() {
  mkdir -p "/home/${username}/.irssi/scripts/autorun/" >>"${OUTTO}" 2>&1
  cd "/home/${username}/.irssi/scripts/"
  wget -qO autodl-irssi.zip https://github.com/autodl-community/autodl-irssi/releases/download/community-v1.62/autodl-irssi-community-v1.62.zip
  unzip -o autodl-irssi.zip >>"${OUTTO}" 2>&1
  rm autodl-irssi.zip
  cp autodl-irssi.pl autorun/
  mkdir -p "/home/${username}/.autodl" >>"${OUTTO}" 2>&1
  touch "/home/${username}/.autodl/autodl.cfg"
  touch /install/.autodlirssi.lock

cat >"/home/${username}/.autodl/autodl2.cfg"<<ADC
[options]
gui-server-port = ${IRSSI_PORT}
gui-server-password = ${IRSSI_PASS}
ADC

  chown -R "${username}.${username}" "/home/${username}/.irssi/"
  chown -R "${username}.${username}" "/home/${username}"
}

function _plugincommands() {
  mkdir -p /etc/quickbox/commands/rutorrent/plugins
  mv "${PLUGINURL}" /etc/quickbox/commands/rutorrent/
  PLUGINCOMMANDS="/etc/quickbox/commands/rutorrent/plugins/"; cd "/usr/local/bin"
  if [[ ${primaryroot} == "root" ]]; then
    LIST="installplugin-getdir removeplugin-getdir installplugin-task removeplugin-task installplugin-autodl removeplugin-autodl installplugin-autotools removeplugin-autotools installplugin-checkport removeplugin-checkport installplugin-chunks removeplugin-chunks installplugin-cookies removeplugin-cookies installplugin-cpuload removeplugin-cpuload installplugin-create removeplugin-create installplugin-data removeplugin-data installplugin-datadir removeplugin-datadir installplugin-diskspace removeplugin-diskspace installplugin-edit removeplugin-edit installplugin-erasedata removeplugin-erasedata installplugin-extratio removeplugin-extratio installplugin-extsearch removeplugin-extsearch installplugin-feeds removeplugin-feeds installplugin-filedrop removeplugin-filedrop installplugin-filemanager removeplugin-filemanager installplugin-fileshare removeplugin-fileshare installplugin-fileupload removeplugin-fileupload installplugin-history removeplugin-history installplugin-httprpc removeplugin-httprpc installplugin-ipad removeplugin-ipad installplugin-loginmgr removeplugin-loginmgr installplugin-logoff removeplugin-logoff installplugin-lookat removeplugin-lookat installplugin-mediainfo removeplugin-mediainfo installplugin-mobile removeplugin-mobile installplugin-noty removeplugin-noty installplugin-pausewebui removeplugin-pausewebui installplugin-ratio removeplugin-ratio installplugin-ratiocolor removeplugin-ratiocolor installplugin-retrackers removeplugin-retrackers installplugin-rpc removeplugin-rpc installplugin-rss removeplugin-rss installplugin-rssurlrewrite removeplugin-rssurlrewrite installplugin-rutracker_check removeplugin-rutracker_check installplugin-scheduler removeplugin-scheduler installplugin-screenshots removeplugin-screenshots installplugin-seedingtime removeplugin-seedingtime installplugin-show_peers_like_wtorrent removeplugin-show_peers_like_wtorrent installplugin-source removeplugin-source installplugin-stream removeplugin-stream installplugin-theme removeplugin-theme installplugin-throttle removeplugin-throttle installplugin-tracklabels removeplugin-tracklabels installplugin-trafic removeplugin-trafic installplugin-unpack removeplugin-unpack installplugin-xmpp removeplugin-xmpp"
  else
    LIST="installplugin-getdir removeplugin-getdir installplugin-task removeplugin-task installplugin-autodl removeplugin-autodl installplugin-autotools removeplugin-autotools installplugin-checkport removeplugin-checkport installplugin-chunks removeplugin-chunks installplugin-cookies removeplugin-cookies installplugin-cpuload removeplugin-cpuload installplugin-create removeplugin-create installplugin-data removeplugin-data installplugin-datadir removeplugin-datadir installplugin-diskspaceh removeplugin-diskspaceh installplugin-edit removeplugin-edit installplugin-erasedata removeplugin-erasedata installplugin-extratio removeplugin-extratio installplugin-extsearch removeplugin-extsearch installplugin-feeds removeplugin-feeds installplugin-filedrop removeplugin-filedrop installplugin-filemanager removeplugin-filemanager installplugin-fileshare removeplugin-fileshare installplugin-fileupload removeplugin-fileupload installplugin-history removeplugin-history installplugin-httprpc removeplugin-httprpc installplugin-ipad removeplugin-ipad installplugin-loginmgr removeplugin-loginmgr installplugin-logoff removeplugin-logoff installplugin-lookat removeplugin-lookat installplugin-mediainfo removeplugin-mediainfo installplugin-mobile removeplugin-mobile installplugin-noty removeplugin-noty installplugin-pausewebui removeplugin-pausewebui installplugin-ratio removeplugin-ratio installplugin-ratiocolor removeplugin-ratiocolor installplugin-retrackers removeplugin-retrackers installplugin-rpc removeplugin-rpc installplugin-rss removeplugin-rss installplugin-rssurlrewrite removeplugin-rssurlrewrite installplugin-rutracker_check removeplugin-rutracker_check installplugin-scheduler removeplugin-scheduler installplugin-screenshots removeplugin-screenshots installplugin-seedingtime removeplugin-seedingtime installplugin-show_peers_like_wtorrent removeplugin-show_peers_like_wtorrent installplugin-source removeplugin-source installplugin-stream removeplugin-stream installplugin-theme removeplugin-theme installplugin-throttle removeplugin-throttle installplugin-tracklabels removeplugin-tracklabels installplugin-trafic removeplugin-trafic installplugin-unpack removeplugin-unpack installplugin-xmpp removeplugin-xmpp"
  fi
  for i in $LIST; do
  cp -R "${PLUGINCOMMANDS}$i" .
  dos2unix installplugin* removeplugin* >>"${OUTTO}" 2>&1;
  chmod +x installplugin* removeplugin* >>"${OUTTO}" 2>&1;
  done
}

function _additionalsyscommands() {
    cd /usr/local/bin
    wget -q -O /usr/local/bin/clean_mem https://raw.githubusercontent.com/Swizards/QuickBox/master/commands/clean_mem
    wget -q -O /usr/local/bin/showspace https://raw.githubusercontent.com/Swizards/QuickBox/master/commands/showspace
    wget -q -O /usr/local/bin/showspace https://raw.githubusercontent.com/Swizards/QuickBox/master/commands/setdisk
    dos2unix clean_mem showspace setdisk >>"${OUTTO}" 2>&1;
    chmod +x clean_mem showspace setdisk >>"${OUTTO}" 2>&1;
    cd
}

# function to make dirs for first user (21)
function _makedirs() {
  mkdir /home/"${username}"/{torrents,.sessions,watch} >>"${OUTTO}" 2>&1
  chown "${username}".www-data /home/"${username}"/{torrents,.sessions,watch,.rtorrent.rc} >>"${OUTTO}" 2>&1
  usermod -a -G www-data "${username}" >>"${OUTTO}" 2>&1
  usermod -a -G "${username}" www-data >>"${OUTTO}" 2>&1
}

# function to make crontab .statup file (22)
function _cronfile() {
cat >"/home/${username}/.startup"<<'EOF'
#!/bin/bash
export USER=`id -un`
IRSSI_CLIENT=yes
RTORRENT_CLIENT=yes
WIPEDEAD=yes
ADDRESS=$(ip route get 8.8.8.8 | awk 'NR==1 {print $NF}')

if [ "$WIPEDEAD" == "yes" ]; then
	screen -wipe >/dev/null 2>&1;
fi

if [ "$IRSSI_CLIENT" == "yes" ]; then
  (screen -ls|grep irssi >/dev/null || (screen -S irssi -d -t irssi -m irssi -h "${ADDRESS}" && false))
fi

if [ "$RTORRENT_CLIENT" == "yes" ]; then
  (screen -ls|grep rtorrent >/dev/null || (sudo -u $USER pkill -f rtorrent; screen -dmS rtorrent rtorrent && false))
fi

EOF

}

# function to set permissions on first user (23)
function _perms() {
  chown -R ${username}.${username} /home/${username}/ >>"${OUTTO}" 2>&1
  chown ${username}.${username} /home/${username}/.startup
  sudo -u ${username} chmod 755 /home/${username}/ >>"${OUTTO}" 2>&1
  #chmod +x /etc/cron.daily/denypublic >/dev/null 2>&1
  chmod 777 /home/${username}/.sessions >/dev/null 2>&1
  chown ${username}.${username} /home/${username}/.startup >/dev/null 2>&1
  chmod +x /home/${username}/.startup >/dev/null 2>&1
}

# function to configure first user config.php (24)
function _ruconf() {
  mkdir -p ${rutorrent}conf/users/${username}/

cat >"${rutorrent}conf/users/${username}/config.php"<<EOF
<?php
  @define('HTTP_USER_AGENT', 'Mozilla/5.0 (Windows NT 6.0; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0', true);
  @define('HTTP_TIME_OUT', 30, true);
  @define('HTTP_USE_GZIP', true, true);
  \$httpIP = null;
  @define('RPC_TIME_OUT', 5, true);
  @define('LOG_RPC_CALLS', false, true);
  @define('LOG_RPC_FAULTS', true, true);
  @define('PHP_USE_GZIP', false, true);
  @define('PHP_GZIP_LEVEL', 2, true);
  \$schedule_rand = 10;
  \$do_diagnostic = true;
  \$log_file = '/tmp/errors.log';
  \$saveUploadedTorrents = true;
  \$overwriteUploadedTorrents = false;
  \$topDirectory = '/home/${username}/';
  \$forbidUserSettings = false;
  \$scgi_port = $PORT;
  \$scgi_host = "localhost";
  \$XMLRPCMountPoint = "/RPC2";
  \$pathToExternals = array("php" => '',"curl" => '',"gzip" => '',"id" => '',"stat" => '',);
  \$localhosts = array("127.0.0.1", "localhost",);
  \$profilePath = '../share';
  \$profileMask = 0777;
  \$autodlPort = ${IRSSI_PORT};
  \$autodlPassword = "${IRSSI_PASS}";
  \$diskuser = "";
  \$quotaUser = "";
EOF

  chown -R www-data.www-data "${rutorrent}conf/users/" >>"${OUTTO}" 2>&1
  if [[ ${primaryroot} == "root" ]]; then
    sed -i "/diskuser/c\$diskuser = \"\/\";" /srv/rutorrent/conf/users/${username}/config.php
  else
    sed -i "/diskuser/c\$diskuser = \"\/home\";" /srv/rutorrent/conf/users/${username}/config.php
  fi
  sed -i "/quotaUser/c\$quotaUser = \"${username}\";" /srv/rutorrent/conf/users/${username}/config.php
}

# create reload script (25)
function _reloadscript() {
cat >/usr/bin/reload<<'EOF'
#!/bin/bash
export USER=$(id -un)
pkill -u $USER irssi >/dev/null 2>&1
pkill -u $USER rtorrent >/dev/null 2>&1
killall -u $USER main >/dev/null 2>&1
rm -rf ~/.sessions/rtorrent.lock
EOF
chmod +x /usr/bin/reload
}

# seedbox boot for first user (26)
function _boot() {
        command1="*/1 * * * * /home/${username}/.startup"
        cat <(fgrep -iv "${command1}" <(sh -c 'sudo -u ${username} crontab -l' >/dev/null 2>&1)) <(echo "${command1}") | sudo -u ${username} crontab -
}

# function to install pure-ftpd (27)
function _installftpd() {
  apt purge -q -y vsftpd pure-ftpd >>"${OUTTO}" 2>&1
  apt install -q -y vsftpd >>"${OUTTO}" 2>&1
}

# function to configure pure-ftpd (28)
function _ftpdconfig() {
cat >/root/.openssl.cnf <<EOF
[ req ]
prompt = no
distinguished_name = req_distinguished_name
[ req_distinguished_name ]
C = US
ST = Some State
L = LOCALLY
O = SELF
OU = SELF
CN = SELF
emailAddress = dont@think.so
EOF

  openssl req -config /root/.openssl.cnf -x509 -nodes -days 365 -newkey rsa:1024 -keyout /etc/ssl/private/vsftpd.pem -out /etc/ssl/private/vsftpd.pem >/dev/null 2>&1

cat >/etc/vsftpd.conf<<'VSD'
listen=YES
anonymous_enable=NO
guest_enable=NO
dirmessage_enable=YES
dirlist_enable=YES
download_enable=YES
secure_chroot_dir=/var/run/vsftpd/empty
chroot_local_user=YES
chroot_list_file=/etc/vsftpd.chroot_list
passwd_chroot_enable=YES
allow_writeable_chroot=YES
pam_service_name=vsftpd
ssl_enable=YES
allow_anon_ssl=NO
force_local_data_ssl=NO
force_local_logins_ssl=NO
ssl_tlsv1=YES
ssl_sslv2=NO
ssl_sslv3=NO
require_ssl_reuse=NO
ssl_request_cert=YES
ssl_ciphers=HIGH
rsa_cert_file=/etc/ssl/private/vsftpd.pem
local_enable=YES
write_enable=YES
local_umask=022
max_per_ip=0
pasv_enable=YES
port_enable=YES
pasv_promiscuous=NO
port_promiscuous=NO
pasv_min_port=0
pasv_max_port=0
listen_port=5757
pasv_promiscuous=YES
port_promiscuous=YES
seccomp_sandbox=no
VSD

  echo "" > /etc/vsftpd.chroot_list
}

# function to ask for plexmediaserver (29)
function _askplex() {
  echo -ne "${bold}${yellow}Would you like to install Plex Media Server${normal} (Y/n): (Default: ${red}N${normal}) "; read responce
  case $responce in
    [yY] | [yY][Ee][Ss] )
    echo -n "Installing Plex ... "
      #cp $REPOURL/sources/plexmediaserver_0.9.14.6.1620-e0b7243_amd64.deb .
      #dpkg -i plexmediaserver_0.9.14.6.1620-e0b7243_amd64.deb >/dev/null 2>&1
      echo -n "ServerName ${HOSTNAME1}" | sudo tee /etc/apache2/conf-available/fqdn.conf
      sudo a2enconf fqdn >>"${OUTTO}" 2>&1
      touch /srv/rutorrent/home/.plex
      chown www-data: /srv/rutorrent/home/.plex
      touch /etc/apache2/sites-enabled/plex.conf
      chown www-data: /etc/apache2/sites-enabled/plex.conf
      echo "deb http://shell.ninthgate.se/packages/debian jessie main" > /etc/apt/sources.list.d/plexmediaserver.list
      curl -s http://shell.ninthgate.se/packages/shell.ninthgate.se.gpg.key | apt-key add - > /dev/null 2>&1;
      apt -y update >>"${OUTTO}" 2>&1
      apt install plexmediaserver -y >>"${OUTTO}" 2>&1
      echo " ... ${OK}"
      ;;
    [nN] | [nN][Oo] | "") echo "${cyan}Skipping Plex install${normal} ... " ;;
    *) echo "${cyan}Skipping Plex install${normal} ... " ;;
  esac
}

# function to ask for btsync (30)
function _askbtsync() {
  echo -ne "${bold}${yellow}Would you like to install BTSync?${normal} (Y/n): (Default: ${red}N${normal}) "; read responce
  case $responce in
    [yY] | [yY][Ee][Ss] )
    echo -n "Installing BTSync ... "
    sudo sh -c 'echo "deb http://linux-packages.getsync.com/btsync/deb btsync non-free" > /etc/apt/sources.list.d/btsync.list'
    wget -qO - http://linux-packages.getsync.com/btsync/key.asc | sudo apt-key add - >/dev/null 2>&1
    sudo apt-get update >>"${OUTTO}" 2>&1
    sudo apt-get install btsync >>"${OUTTO}" 2>&1
    cd && mkdir /home/${MASTER}/sync_folder
    sudo chown ${MASTER}:btsync /home/${MASTER}/sync_folder
    sudo chmod 2775 /home/${MASTER}/sync_folder
    sudo usermod -a -G btsync ${MASTER}
    sudo sed -i 's/BTSYNC=/BTSYNC=yes/g' /home/${MASTER}/.startup
    cd /etc/btsync && { curl -O -s https://raw.githubusercontent.com/Swizards/QuickBox/master/sources/config.json ; cd; }
    cd /etc/btsync && { curl -O -s https://raw.githubusercontent.com/Swizards/QuickBox/master/sources/user_config.json ; cd; }
    sudo sed -i "s/BTSGUIP/$BTSYNCIP/g" /etc/btsync/config.json
    sudo sed -i "s/BTSGUIP/$BTSYNCIP/g" /etc/btsync/user_config.json
    sudo service btsync start
    echo "${OK}"
    ;;
    [nN] | [nN][Oo] | "") echo "${cyan}Skipping BTSync install${normal} ... " ;;
    *) echo "${cyan}Skipping BTSync install${normal} ... " ;;
  esac
}

function _packagecommands() {
  mkdir -p /etc/quickbox/commands/system/packages
  mv "${PACKAGEURL}" /etc/quickbox/commands/system/
  PACKAGECOMMANDS="/etc/quickbox/commands/system/packages/"; cd "/usr/local/bin"
  LIST="installpackage-plex removepackage-plex installpackage-btsync removepackage-btsync installpackage-csf removepackage-csf installpackage-sickrage removepackage-sickrage installpackage-rapidleech removepackage-rapidleech"
  for i in $LIST; do
  #echo -ne "Setting Up and Initializing Plugin Command: ${green}${i}${normal} "
  cp -R "${PACKAGECOMMANDS}$i" .
  dos2unix installpackage* >>"${OUTTO}" 2>&1; dos2unix removepackage* >>"${OUTTO}" 2>&1;
  chmod +x installpackage* >>"${OUTTO}" 2>&1; chmod +x removepackage* >>"${OUTTO}" 2>&1;
  done
}

# function to create ssl cert for pure-ftpd (31)
function _pureftpcert() {
  /bin/true
}

# The following function makes necessary changes to Network and TZ settings needed for
# the proper functionality of the QuickBox Dashboard.
function _quickstats() {
  # Dynamically adjust to use the servers active network adapter
  sed -i "s/eth0/$IFACE/g" /srv/rutorrent/home/widgets/stat.php
  sed -i "s/eth0/$IFACE/g" /srv/rutorrent/home/widgets/data.php
  sed -i "s/eth0/$IFACE/g" /srv/rutorrent/home/widgets/config.php
  sed -i -e "s/eth0/$IFACE/g" \
         -e "s/qb-version/$QBVERSION/g" /srv/rutorrent/home/inc/config.php
  # Use server timezone
  cd /usr/share/zoneinfo
  find * -type f -exec sh -c "diff -q /etc/localtime '{}' > /dev/null && echo {}" \; > ~/tz.txt
  cd ~
  echo "  date_default_timezone_set('$(cat tz.txt)');" >> /srv/rutorrent/home/widgets/config.php
  echo "" >> /srv/rutorrent/home/widgets/config.php
  echo "?>" >> /srv/rutorrent/home/widgets/config.php
  if [[ ${primaryroot} == "home" ]]; then
    cd /srv/rutorrent/home/widgets && rm disk_data.php && { curl -O -s https://raw.githubusercontent.com/Swizards/QuickBox/master/rutorrent/home/widgets/disk_datah.php; }
    mv disk_datah.php disk_data.php
    chown -R www-data:www-data /srv/rutorrent/home/widgets
  fi
}

function _quickconsole() {
  CONSOLEIP=$(ip route get 8.8.8.8 | awk 'NR==1 {print $NF}')

  sed -i -e "s/console-username/${username}/g" \
         -e "s/console-password/${password}/g" /home/${username}/.console/index.php
}

# function to show finished data (32)
function _finished() {
  ip=$(ip route get 8.8.8.8 | awk 'NR==1 {print $NF}')
  echo
  echo
  echo -e " ${black}${on_green}    [quickbox] Seddbox & GUI Installation Completed    ${normal} "
  echo -e "        ${standout}    INSTALLATION COMPLETED in ${FIN}/min    ${normal}             "
  echo;echo
  echo "  Valid Commands:  "
  echo '  -------------------'
  echo
  echo -e " ${green}createSeedboxUser${normal} - creates a shelled seedbox user"
  echo -e " ${green}deleteSeedboxUser${normal} - deletes a created seedbox user and their directories"
  echo -e " ${green}changeUserpass${normal} - change users SSH/FTP/ruTorrent password"
  echo -e " ${green}setdisk${normal} - set your disk quota for any given user"
  echo -e " ${green}showspace${normal} - shows the amount of space used by all users on the server"
  echo -e " ${green}reload${normal} - restarts your seedbox services, i.e; rtorrent & irssi"
  echo -e " ${green}upgradeBTSync${normal} - upgrades btsync when new version is available"
  echo -e " ${green}upgradePlex${normal} - upgrades Plex when new version is available"
  echo;echo;echo
  echo '################################################################################################'
  echo "#   Seedbox can be found at https://${username}:${passwd}@${ip} "
  echo "#   ${cyan}(Also works for FTP:5757/SSH:4747)${normal}"
  echo "#   If you need to restart rtorrent/irssi, you can type 'reload'"
  echo "#   https://${username}:${passwd}@${ip} (Also works for FTP:5757/SSH:4747)" > ${username}.info
  if [[ "${rel}" = "16.04" ]]; then
    echo "#   Reloading: ${green}sshd${normal}, ${green}apache${normal}, ${green}memcached${normal}, ${green}php7.0${normal}, ${green}vsftpd${normal}, ${green}fail2ban${normal} and ${green}quota${normal}"
  else
    echo "#   Reloading: ${green}sshd${normal}, ${green}apache${normal}, ${green}vsftpd${normal}, ${green}fail2ban${normal} and ${green}quota${normal}"
  fi
  echo '################################################################################################'
  echo

cat >/root/information.info<<EOF
  Seedbox can be found at https://${username}:${passwd}@${ip} (Also works for FTP:5757/SSH:4747)
  If you need to restart rtorrent/irssi, you can type 'reload'
  https://${username}:${passwd}@${ip} (Also works for FTP:5757/SSH:4747)
EOF

  rm -rf "$0" >>"${OUTTO}" 2>&1
  service quota stop >>"${OUTTO}" 2>&1
  quotaoff -a >>"${OUTTO}" 2>&1
  quotacheck -auMF vfsv1 >>"${OUTTO}" 2>&1
  quotaon -a >>"${OUTTO}" 2>&1
  service quota start >>"${OUTTO}" 2>&1
    for i in ssh apache2 php7.0-fpm vsftpd fail2ban quota memcached plexmediaserver cron; do
      service $i restart >>"${OUTTO}" 2>&1
      systemctl enable $i >>"${OUTTO}" 2>&1
    done
  rm -rf /root/tmp/
  echo -ne "  Do you wish to reboot (recommended!): (Default ${green}Y${normal})"; read reboot
  case $reboot in
    [yY] | [yY][Ee][Ss] | "") reboot                 ;;
    [nN] | [nN][Oo] ) echo "  ${cyan}Skipping reboot${normal} ... " ;;
  esac
}

clear

spinner() {
    local pid=$1
    local delay=0.25
    local spinstr='|/-\'
    while [ "$(ps a | awk '{print $1}' | grep $pid)" ]; do
        local temp=${spinstr#?}
        printf " [${bold}${yellow}%c${normal}]  " "$spinstr"
        local spinstr=$temp${spinstr%"$temp"}
        sleep $delay
        printf "\b\b\b\b\b\b"
    done
    printf "    \b\b\b\b"
    echo -ne "${OK}"
}

Reth0=$(ifconfig | grep -m 1 "Link encap" | sed 's/[ \t].*//;/^\(lo\|\)$/d' | awk '{ print $1 '});
IFACE=$(echo -n "${Reth0}");
HOSTNAME1=$(hostname -s);
REPOURL="/root/tmp/QuickBox"
PLUGINURL="/root/tmp/QuickBox/commands/rutorrent/plugins/"
PACKAGEURL="/root/tmp/QuickBox/commands/system/packages/"
QBVERSION="2.2.1"
PORT=$(shuf -i 2000-61000 -n 1)
PORTEND=$((${PORT} + 1500))
S=$(date +%s)
OK=$(echo -e "[ ${bold}${green}DONE${normal} ]")
genpass=$(_string)
HTPASSWD="/etc/htpasswd"
rutorrent="/srv/rutorrent/"
REALM="rutorrent"
IRSSI_PASS=$(_string)
IRSSI_PORT=$(shuf -i 2000-61000 -n 1)
#ip=$(curl -s http://ipecho.net/plain || curl -s http://ifconfig.me/ip ; echo)
ip=$(ip route get 8.8.8.8 | awk 'NR==1 {print $NF}')
BTSYNCIP=$(ip route get 8.8.8.8 | awk 'NR==1 {print $NF}')
export DEBIAN_FRONTEND=noninteractive
cd

# QuickBox STRUCTURE
#_quickboxv
_bashrc
_intro
_checkroot
_logcheck
_askpartition
_askcontinue
_ssdpblock
echo -n "Updating system ... ";_updates & spinner $!;echo
clear
#_locale
_repos
_hostname
echo -n "Installing all needed dependencies ... ";_depends & spinner $!;echo
_askcsf;
if [[ ${csf} == "yes" ]]; then
    _csf & spinner $!;echo
    _csfsendmail1 & spinner $!;echo
    _csfsendmail2
    _csfsendmail3 & spinner $!;echo
    _askcloudflare;
    if [[ ${cloudflare} == "yes" ]]; then
        _cloudflare & spinner $!;echo;
    fi
elif [[ ${csf} == "no" ]]; then
    _nocsf;
fi
if [[ ${csf} == "yes" ]]; then
    _csfdenyhosts
else
    _denyhosts
fi
echo -n "Building required user directories ... ";_skel & spinner $!;echo
_askffmpeg;
if [[ ${ffmpeg} == "yes" ]]; then
    _ffmpeg & spinner $!;echo;
fi
_askrtorrent
_xmlrpc & spinner $!;echo
_libtorrent & spinner $!;echo
_rtorrent & spinner $!;echo
echo -n "Installing rutorrent into /srv ... ";_rutorrent & spinner $!;echo;
#_askshell;
_adduser;_apachesudo
echo -n "Setting up seedbox.conf for apache ... ";_apacheconf & spinner $!;echo
echo -n "Installing .rtorrent.rc for ${username} ... ";_rconf & spinner $!;echo
echo -n "Installing rutorrent plugins ... ";_plugins & spinner $!;echo
echo -n "Installing autodl-irssi ... ";_autodl & spinner $!;echo;_plugincommands;_additionalsyscommands
echo -n "Making ${username} directory structure ... ";_makedirs & spinner $!;echo
echo -n "Writing ${username} system crontab script ... ";_cronfile & spinner $!;echo
echo -n "Writing ${username} rutorrent config.php file ... ";_ruconf & spinner $!;echo
#_askquota
echo -n "Writing seedbox reload script ... ";_reloadscript & spinner $!;echo
echo -n "Installing VSFTPd ... ";_installftpd & spinner $!;echo
echo -n "Setting up VSFTPd ... ";_ftpdconfig & spinner $!;echo
#_askplex;_askbtsync;
_packagecommands;_quickstats;_quickconsole
echo -n "Setting irssi/rtorrent to start on boot ... ";_boot & spinner $!;echo;
echo -n "Setting permissions on ${username} ... ";_perms & spinner $!;echo;
cd
E=$(date +%s)
DIFF=$(echo "$E" - "$S"|bc)
FIN=$(echo "$DIFF" / 60|bc)
clear
_finished
