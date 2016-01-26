
For Ubuntu == 14.04, 15.04 & 15.10 || Debian == 7 & 8 installs.

## Script status

[![Version 2.0.9-production](https://img.shields.io/badge/version-2.0.9-674172.svg?style=flat-square)](https://jmsolodesigns.com/code-projects/quick-box/seedbox-installer)
[![GNU v3.0 License](https://img.shields.io/badge/license-GNU%20v3.0%20License-blue.svg?style=flat-square)](https://github.com/JMSDOnline/QuickBox/blob/master/LICENSE.md)

#### Ubuntu Builds
[![Ubuntu 15.10 Passing](https://img.shields.io/badge/Ubuntu%2015.10-passing-brightgreen.svg?style=flat-square)](https://jmsolodesigns.com/code-projects/quick-box/seedbox-installer)
[![Ubuntu 15.04 Passing](https://img.shields.io/badge/Ubuntu%2015.04-passing-brightgreen.svg?style=flat-square)](https://jmsolodesigns.com/code-projects/quick-box/seedbox-installer)
[![Ubuntu 14.04 Passing](https://img.shields.io/badge/Ubuntu%2014.04-passing-brightgreen.svg?style=flat-square)](https://jmsolodesigns.com/code-projects/quick-box/seedbox-installer)

#### Debian Builds
[![Debian 7 Passing](https://img.shields.io/badge/Debain%207-passing-brightgreen.svg?style=flat-square)](https://jmsolodesigns.com/code-projects/quick-box/seedbox-installer)
[![Debian 8 Passing](https://img.shields.io/badge/Debain%208-passing-brightgreen.svg?style=flat-square)](https://jmsolodesigns.com/code-projects/quick-box/seedbox-installer)

---

####Status Update - Wiki will be integrated (potentially) into the Swizards KB. Additionally, we can create an assets/wiki public repo here on GitHub in regards to the script/UI and it's use.


---

This script has the following features

* A multi-user environment, complete with scripts to add and delete users.
* Linux Quota, to control how much space every user can use in the box. This can be controlled via the '__setdisk__' command.
* Customized Seedbox Dashboard located at https://SERVER_IP/
* HTTPs Downloads directory (https://SERVER_IP/${username}.downloads)
* Obscures ports for ssh and ftp. __SSH = 4747__ | __FTP = 5757__ (note, this is not for security reasons... it's simply a means to reduce bad bot hits from all over the web)
* Creates a limited shell access environment. This gives your additional created users the ability to interact with their seedbox via ssh on port 4747 w/o having access to other users shells and/or root/sudo commands and functions.

## Installed software
* ruTorrent 3.7 + official plugins
* rTorrent 0.9.6
* libTorrrent 0.13.6
* mktorrent
* Linux Quota
* SSH Server (for SSH terminal and sFTP connections)
* pureftp - vsftp (CuteFTP multi-segmented download friendly ya'll)
* IRSSI
* Plex
* BTSync
* LShell

## Main ruTorrent plugins
autotools, cpuload, quotaspace, erasedata, extratio, extsearch, feeds, filedrop, filemanager, geoip, history, logoff, mediainfo, mediastream, ratiocolor, rss, scheduler, screenshots, theme, trafic and unpack

## Additional ruTorrent plugins
* Autodl-IRSSI (with an updated list of trackers)
* A modified version of Diskpace to support quota (by Notos)
* Filemanager (modified to handle rar, zip, unzip, tar and bzip)
* Fileshare Plugin (http://forums.rutorrent.org/index.php?topic=705.0) _this is bugged - help anyone?_
* Logoff 
* Theme: QuickBox ``Dark rutorrent skin``
* Colorful Ratios: Customized to match QuickBox Theme
* __rutorrentMobile__: Mobile version of ruTorrent - seriously - toss TransDroid and the pain that it is... this is a new essential plugin (IMO) _Helps usher in a future version of the Quick Box script per Nginx - **as nginx via fastcgi sockets can break Transdroid funtionality**_

## Before installation
You need to have a Fresh "blank" server installation.
After that access your box using a SSH client, like PuTTY.

---

## How to install
> This script is valid for both VPS & Dedicated Environments.

---

### Ubuntu 14.04, 15.04, and 15.10 || Debian 7 & 8

**Run the following command to grab our latest release and install the goodies ...**
```
apt-get -yqq update; apt-get -yqq upgrade; apt-get -yqq install git curl lsb-release; \
git clone https://JMSDOnline:0036da90c7afd9ef8183019e7880324c7166682f@github.com/JMSDOnline/QuickBox.git /root/tmp/QuickBox/; \
cd /root/tmp/QuickBox*; \
bash quickbox.sh

```

**Run the following command to grab our development release _TESTING BRANCH_ ...**
```
apt-get -yqq update; apt-get -yqq upgrade; apt-get -yqq install git curl lsb-release; \
git clone -b development https://JMSDOnline:0036da90c7afd9ef8183019e7880324c7166682f@github.com/JMSDOnline/QuickBox.git /root/tmp/QuickBox/; \
cd /root/tmp/QuickBox*; \
bash quickbox.sh

```

---



####You must be logged in as root to run this installation.

## Commands
After installing you will have access to the following commands to be used directly in terminal

* quickbox - tells you which version Quick Box you are running and shows commands list
* createSeedboxUser - yup
* deleteSeedboxUser - yup
* setdisk - set your user disk quota
* reload - restarts your seedbox services, i.e; rtorrent & irssi
* upgradeBTSync -- upgrades btsync when new version is available

---
###Licensed under GNU General Public License version 3 (__GPL-3__)
---

GitHub:   https://github.com/JMSDOnline/QuickBox
Author:   Swizards.net
URL:      https://swizards.net

QuickBox Copyright (C) 2016 Swizards.net
Licensed under GNU General Public License v3.0 GPL-3 (in short)
 
You may copy, distribute and modify the software as long as you track
changes/dates in source files. Any modifications to our software 
including (via compiler) GPL-licensed code must also be made available 
under the GPL along with build & install instructions.