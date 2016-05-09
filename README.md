

### For a full README and CHANGELOG
For a full README and CHANGELOG on QuickBox as well as how to install, please visit the [QuickBox Plaza](https://plaza.quickbox.io/t/quickbox-readme-md/31)

## Script status

[![Version 2.1.1-production](https://img.shields.io/badge/version-2.1.1-674172.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31)
[![GNU v3.0 License](https://img.shields.io/badge/license-GNU%20v3.0%20License-blue.svg?style=flat-square)](https://github.com/Swizards/QuickBox/blob/master/LICENSE.md)

#### Ubuntu Builds
[![Ubuntu 16.04 Passing](https://img.shields.io/badge/Ubuntu%2016.04-passing-brightgreen.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31)
[![Ubuntu 15.10 Passing](https://img.shields.io/badge/Ubuntu%2015.10-passing-brightgreen.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31)
[![Ubuntu 15.04 Passing](https://img.shields.io/badge/Ubuntu%2015.04-passing-brightgreen.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31)
[![Ubuntu 14.04 Passing](https://img.shields.io/badge/Ubuntu%2014.04-passing-brightgreen.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31)

#### Debian Builds
[![Debian 7 Passing](https://img.shields.io/badge/Debain%207-passing-brightgreen.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31)
[![Debian 8 Passing](https://img.shields.io/badge/Debain%208-passing-brightgreen.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31)

---

###Quick Advisory Notice on QuickBox
---
> Please understand that we [(Swizards)](https://swizards.net) do not want to push this project as a means to supply a commercially used product, ie; seedbox provider - so keep this in mind - only if you wish to sale slots on your server. Though it is very multi-user friendly... it is also not free of it's faults due to it's high amount of capabilities and being publicly available. This is a community based project that is a measure of goodwill to be given to such an outspoken and freethinking community. If you are a provider and are in need of a high-quality, white-labled solution - please feel free to get in touch with our team and we will certainly negotiate a solution that best fits your needs and is free of any possible bugs.

####Again, Please note:
> This is being released as a public sandbox... meaning that it is user-contribution driven. Swizards take a great deal of pride in providing quality UI. Enhancement requests and more for the QuickBox Project will not be included in the future unless users feel kind enough to contribute to the repo by pushing requests for their included modifications... basically... it's community driven... simple


###Using a _/home_ primary partition setup? Please read this first:
It is a known issue that will be resolved over the next few days. If you are running a server from a provider that only allows the use of __/home__ primary mounted partitions, please refrain from using QuickBox at this time. If you use __/__ primary mounted partitions, there are absolutely 0 issues with the install process. Again, this will be resolved in the next couple of days (notice revised: May 9, 2016 at 12:55PM (CST))



## Before installation
You need to have a Fresh "blank" server installation.
After that access your box using a SSH client, like PuTTY.

---



## How to install
> This script is valid for both VPS & Dedicated Environments.

####You must be logged in as root to run this installation.

---
### Ubuntu 16.04

**Run the following command to grab the latest stable release [Ubunut 16.04 w/ PHP 7 - standalone] ...**
```
apt -yqq update && apt -yqq upgrade && apt -yqq install git curl lsb-release; \
git clone -b qb_u_1604 https://github.com/Swizards/QuickBox.git /root/tmp/QuickBox/; \
cd /root/tmp/QuickBox*; \
bash quickbox.sh

```

### Ubuntu 14.04, 15.04, and 15.10 || Debian 7 & 8

**Run the following command to grab our latest stable release ...**
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
* createSeedboxUser - creates a shelled seedbox user
* deleteSeedboxUser - deletes a created seedbox user and their directories **This is permanent, current data will be deleted - you can create them again at any time**
* setdisk - set your disk quota for any given user
* reload - restarts your seedbox services, i.e; rtorrent & irssi
* upgradeBTSync -- upgrades btsync when new version is available
