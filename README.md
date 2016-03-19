

## Script status

[![Version 2.1.0-production](https://img.shields.io/badge/version-2.1.0-674172.svg?style=flat-square)](https://jmsolodesigns.com/code-projects/quick-box/seedbox-installer)
[![GNU v3.0 License](https://img.shields.io/badge/license-GNU%20v3.0%20License-blue.svg?style=flat-square)](https://github.com/Swizards/QuickBox/blob/master/LICENSE.md)

#### Ubuntu Builds
[![Ubuntu 15.10 Passing](https://img.shields.io/badge/Ubuntu%2015.10-passing-brightgreen.svg?style=flat-square)](https://jmsolodesigns.com/code-projects/quick-box/seedbox-installer)
[![Ubuntu 15.04 Passing](https://img.shields.io/badge/Ubuntu%2015.04-passing-brightgreen.svg?style=flat-square)](https://jmsolodesigns.com/code-projects/quick-box/seedbox-installer)
[![Ubuntu 14.04 Passing](https://img.shields.io/badge/Ubuntu%2014.04-passing-brightgreen.svg?style=flat-square)](https://jmsolodesigns.com/code-projects/quick-box/seedbox-installer)

#### Debian Builds
[![Debian 7 Passing](https://img.shields.io/badge/Debain%207-passing-brightgreen.svg?style=flat-square)](https://jmsolodesigns.com/code-projects/quick-box/seedbox-installer)
[![Debian 8 Passing](https://img.shields.io/badge/Debain%208-passing-brightgreen.svg?style=flat-square)](https://jmsolodesigns.com/code-projects/quick-box/seedbox-installer)

---

###Quick Advisory Notice on QuickBox
---
> Please understand that we [(Swizards)](https://swizards.net) do not want to push this project as a means to supply a commercially used product, ie; seedbox provider - so keep this in mind - only if you wish to sale slots on your server. Though it is very multi-user friendly... it is also not free of it's faults due to it's high amount of capabilities and being publicly available. This is a community based project that is a measure of goodwill to be given to such an outspoken and freethinking community. If you are a provider and are in need of a high-quality, white-labled solution - please feel free to get in touch with our team and we will certainly negotiate a solution that best fits your needs and is free of any possible bugs.

####Again, Please note:
> This is being released as a public sandbox... meaning that it is user-contribution driven. Swizards take a great deal of pride in providing quality UI. Enhancement requests and more for the QuickBox Project will not be included in the future unless users feel kind enough to contribute to the repo by pushing requests for their included modifications... basically... it's community driven... simple


###Using a _/home_ primary partition setup? Please read this first:
It is a known issue that will be resolved over the next few days. If you are running a server from a provider that only allows the use of __/home__ primary mounted partitions, please refrain from using QuickBox at this time. If you use __/__ primary mounted partitions, there are absolutely 0 issues with the install process. Again, this will be resolved in the next couple of days (notice revised: March 19, 2016 at 5:00PM (CST))


### A Preview of Quick Box
[![Quick Box v2.0.5 Dashboard](https://raw.githubusercontent.com/JMSDOnline/quick-box-assets/master/assets/quickbox-dasboard-youtube-preview.png)](http://www.youtube.com/watch?v=F1344A6YPks)

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

**Run the following command to grab our latest stable release ...**
```
apt-get -yqq update; apt-get -yqq upgrade; apt-get -yqq install git curl lsb-release; \
git clone https://github.com/Swizards/QuickBox.git /root/tmp/QuickBox/; \
cd /root/tmp/QuickBox*; \
bash quickbox.sh

```

**Run the following command to grab our development release _TESTING BRANCH_ ...**
```
apt-get -yqq update; apt-get -yqq upgrade; apt-get -yqq install git curl lsb-release; \
git clone -b development https://github.com/Swizards/QuickBox.git /root/tmp/QuickBox/; \
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
