

### For a full README and CHANGELOG
> For a full README and CHANGELOG on QuickBox as well as how to install, please visit the [QuickBox Plaza](https://plaza.quickbox.io/t/quickbox-readme-md/31)

## Script status

[![Version 2.2.2-production](https://img.shields.io/badge/version-2.2.2-674172.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31)
[![GNU v3.0 License](https://img.shields.io/badge/license-GNU%20v3.0%20License-blue.svg?style=flat-square)](https://github.com/Swizards/QuickBox/blob/master/LICENSE.md)

#### Ubuntu Builds
[![Ubuntu 16.04 Passing](https://img.shields.io/badge/Ubuntu%2016.04-passing-brightgreen.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31)

---

###Quick Advisory Notice on QuickBox
---

####Again, Please note:
> This is being released as a public sandbox... meaning that it is user-contribution driven. Swizards take a great deal of pride in providing quality UI. Enhancement requests and more for the QuickBox Project will not be included in the future unless users feel kind enough to contribute to the repo by pushing requests for their included modifications... basically... it's community driven... simple


### For a full README and CHANGELOG
For a full README and CHANGELOG on QuickBox as well as how to install, please visit the [QuickBox Plaza](https://plaza.quickbox.io/t/quickbox-readme-md/31)

## Before installation
You need to have a Fresh "blank" server installation.
After that access your box using a SSH client, like PuTTY.

---



## How to install
> This script is valid for both VPS & Dedicated Environments.

## NOTICE
> It is highly advisable that QuickBox be installed on Ubuntu 16.04. For more about this, [see here](https://plaza.quickbox.io/t/poll-are-you-using-or-going-to-be-using-ubuntu-16-04/41) and weigh in on your thoughts. Although Ubuntu 16.04 is advised, QuickBox has been tested and working on supported Distro/Rel.

####You must be logged in as root to run this installation.


---

### Ubuntu 14.04, 15.04, 15.10 and 16.04 || Debian 7 & 8

**Run the following command to grab our latest stable release ...**
```
apt-get -yqq update && apt-get -yqq upgrade && apt-get -yqq install git curl lsb-release; \
git clone -b qb_u_1604 https://github.com/Swizards/QuickBox.git /root/tmp/QuickBox/; \
cd /root/tmp/QuickBox*; \
bash quickbox.sh

```

### Would you like to contribute to the QuickBox project?

**Run the following to grab our latest development branch ...**
> Please make all pull requests to the Development branch, requests to the master will more than like be overlooked.

```
apt-get -yqq update; apt-get -yqq upgrade; apt-get -yqq install git curl lsb-release; \
git clone https://github.com/Swizards/QuickBox.git /root/tmp/QuickBox/; \
cd /root/tmp/QuickBox*; \
bash quickbox.sh

```

---


## Commands
After installing you will have access to the following commands to be used directly in terminal

* ~~quickbox~~ - tells you which version Quick Box you are running and shows commands list ``deprecated due to versioning now shows on the dashboard under username dropdown``
* __createSeedboxUser__ - creates a shelled seedbox user
* __deleteSeedboxUser__ - deletes a created seedbox user and their directories
<sup>**This is permanent, current data will be deleted - you can create them again at any time**</sup>
* __changeUserpass__ - change users SSH/FTP/ruTorrent password
* __setdisk__ - set your disk quota for any given user
* __showspace__ - shows amount of space used by each user
* __reload__ - restarts your seedbox services, i.e; rtorrent & irssi
* __upgradeBTSync__ - upgrades btsync when new version is available
* __upgradePlex__ - upgrades Plex when new version is available
* __clean_mem__ - flushes servers physical memory cache (helps avoid swap overflow)
