

### For a full README and CHANGELOG
> For a full README and CHANGELOG on QuickBox as well as how to install, please visit the [QuickBox Plaza](https://plaza.quickbox.io/t/quickbox-readme-md/31)

## Script status

[![Version 2.3.4-production](https://img.shields.io/badge/version-2.3.4-674172.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31)
[![GNU v3.0 License](https://img.shields.io/badge/license-GNU%20v3.0%20License-blue.svg?style=flat-square)](https://github.com/Swizards/QuickBox/blob/master/LICENSE.md)

#### Ubuntu Builds
[![Ubuntu 14.04 Passing](https://img.shields.io/badge/Ubuntu%2014.04-passing-brightgreen.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31) [![Ubuntu 15.04 Support Ended](https://img.shields.io/badge/Ubuntu%2015.04-support%20ended-282830.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31) [![Ubuntu 15.10 Passing](https://img.shields.io/badge/Ubuntu%2015.10-passing-brightgreen.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31) [![Ubuntu 16.04 Passing](https://img.shields.io/badge/Ubuntu%2016.04-passing-brightgreen.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31)

#### Debian Builds
[![Debian 7 Passing](https://img.shields.io/badge/Debain%207-passing-brightgreen.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31) [![Debian 8 Passing](https://img.shields.io/badge/Debain%208-passing-brightgreen.svg?style=flat-square)](https://plaza.quickbox.io/t/quickbox-readme-md/31)

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



> ### :loudspeaker: Heads up!
Though his script is valid for both VPS & Dedicated Environments, please be advised the it's support is limited on OpenVZ environments due to lack of kernel control. If you are installing on OpenVZ quotas may not work.


####You must be logged in as root to run this installation.


---

### Ubuntu 14.04, <del>15.04</del>, 15.10 and 16.04 || Debian 7 & 8

**Run the following command to grab our latest stable release ...**
```
apt-get -yqq update; apt-get -yqq upgrade; apt-get -yqq install git lsb-release; \
git clone --recursive https://github.com/QuickBox/QuickBox QuickBox
bash ~/QuickBox/setup/quickbox-setup
```

### Would you like to contribute to the QuickBox project?

**Run the following to grab our latest development branch ...**
> Please make all pull requests to the Development branch, requests to the master will more than like be overlooked.

```
apt-get -yqq update; apt-get -yqq upgrade; apt-get -yqq install git lsb-release; \
git clone -b development --recursive https://github.com/QuickBox/QuickBox QuickBox
bash ~/QuickBox/setup/quickbox-setup

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


<br/>

---
## QuickBox Repo Structure
The following is the Repo structure of the current QuickBox EcoSystem. Installation instructions may still be found within the [Swizards/QuickBox](https://github.com/Swizards/QuickBox) Repo, but this will be used to address the functionality and the installation procedures of the script itself. Any pull requests must be done within the repo you aim to add functionality and address any issues found.

QuickBox is divided into it's relevant parts that aim to make the update process as simple as possible on a rolling update fashion. This is so we can continually pull fresh commits/updates as they are released within the master branch of each designated zone. Sounds technical? It's actually simple... it works by cloning certain parts of QuickBox into relevant pieces on your server for ease of use and updates.

####Here are the Repos & examples:

* [quickbox_setup](https://github.com/QuickBox/quickbox_setup) - this is the repo used for the initial setup of QuickBox on the users server. This can be installed by doing the following:
```
git clone https://github.com/QuickBox/quickbox_setup quickbox_setup
cd quickbox_setup
bash quickbox-setup
```

* [quickbox_rutorrent](https://github.com/QuickBox/quickbox_rutorrent) - this is the repo used for ruTorrent. All ruTorrent relevant plugins and theme adjustments, fixes, additions and extra enhancements will be included here.

Much like the quickbox_setup repo, the script will be pulled via the following:
```
git clone https://github.com/QuickBox/quickbox_rutorrent quickbox_rutorrent
```
This is handled during the initial install with the quickbox_setup repo. The quickbox_rutorrent directory is then copied over to your /srv/ directory where it maintains it's git-like qualities for easy updating later on.

* [quickbox_dashboard](https://github.com/QuickBox/quickbox_dashboard) - this is the repo used for the QuickBox UI. All QuickBox Dashboard relevant widgets and theme adjustments, fixes, additions, extra enhancements and **future language files** will be included here.

Much like the other repo's, the script will be pulled via the following as an example:
```
git clone https://github.com/QuickBox/quickbox_dashboard quickbox_dashboard
cd  quickbox_dashboard
mkdir -p /srv/rutorrent/home
cp -r home/. /srv/rutorrent/home
```
<sup>Again, this is just an excerpt and this function is handled by the script. Just as with any of the other features, navigate to ``/srv/rutorrent/home`` and run ``git pull`` to push updates to your server.</sup>

* [quickbox_packages](https://github.com/QuickBox/quickbox_packages) - this is the repo used for the installers and uninstallers. All needed files/commands for packages installers/removers as well as plugin installers/removers will be included here.
Much like the other repo, the script will be pulled via the following:
```
git clone https://github.com/QuickBox/quickbox_packages quickbox_packages
cd  quickbox_packages
cp -r quickbox_packages/. /usr/local/bin/
```
<sup>Again, this is just an excerpt and this function is handled by the script. Just as with any of the other features, navigate to ``/usr/local/bin/quickbox`` and run ``git pull`` to push updates to your server.</sup>

* [club-Swizards](https://github.com/Swizards/club-Swizards) - this is the custom ruTorrent theme created and designed by Swizards. Any adjustments you would like to push can be made here. Updating the template... again, as simple as ``git pull`` from within ``/srv/rutorrent/plugins/theme/themes/club-Swizards``. The theme is independent of the update for the rutorrent directory which handles plugins etc.


##### Here's an example:

Let's say that @niayh thinks the padding is off in a popup modal for the autodl plugin. Now, she can submit a pull request (or make the addition herself) and push it to the quickbox_rutorrent repo. Anyone curious about any changes can view the complete changelog via the commit history of the repo. Then, seeing these changes as something they want, they do the following:

```
cd /srv/rutorrent
git pull
```
It will now automagically update via the power of git. The output will show the following (or similar)
```
[root@quickbox]:(776.9kb)~# cd /srv/rutorrent
[root@quickbox]:(15.2kb)~/srv/rutorrent# git pull
remote: Counting objects: 3, done.
remote: Compressing objects: 100% (1/1), done.
remote: Total 3 (delta 2), reused 3 (delta 2), pack-reused 0
Unpacking objects: 100% (3/3), done.
From https://github.com/QuickBox/quickbox_rutorrent
   81021ae..38bbd0e  master     -> origin/master
Updating 81021ae..38bbd0e
Fast-forward
 index.html | 72 ++++++++++++++++++++++++++++++++++++------------------------------------
 1 file changed, 36 insertions(+), 36 deletions(-)
[root@quickbox]:(15.2kb)~/srv/rutorrent#

```
Just like that, you have updated to match all changes made on the master branch of a given repo (in this example, the _autodl-irssi plugin_ in rutorrent). You can also check and update these as all repos are first pulled to your root directory and then moved from there.
