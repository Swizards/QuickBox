
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

### Quick Box Seedbox Dashboard - Video Preview
> As of version 1.6.5 (latest) the stuttering issues with server load average and uptime on refresh are fixed. These stats are updated every 1/sec. Additionally, all stats you see on the dashboard are dynamically updated via ajax. Example - add a torrent - the torrents number will update as will diskspace etc... this is done without needing to refresh the page.
[![Quick Box v1.6.5 Dashboard](https://raw.githubusercontent.com/JMSDOnline/quick-box-assets/master/assets/quickbox-dasboard-youtube-preview.png)](http://www.youtube.com/watch?v=Nui3Gicc0mI)

### Quick Box Seedbox Custom ruTorrent Theme by JMSolo Designs
![New and Custom Theme by JMSolo Designs](https://raw.githubusercontent.com/JMSDOnline/quick-box-assets/master/assets/quick-box-theme.png "Quick Box - New and Custom Theme by JMSolo Designs")

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

### Full List of Plugins

**_Custom Quick Box Plugins_**

  1. **Theme**: QuickBox Dark rutorrent skin

**_Main ruTorrent Plugins_**

  1. **getdir**: This plug-in provides the possibility of comfortable navigation on a host file system.
  2. **noty/noty2**: This plugin provides the notification functionality for other plugins.
  3. **task**: This plugin provides the possibility of running various scripts on the host system.
  4. **autodl-irssi**: GUI for autodl-irssi-community
  5. **check_port**: This plugin adds an incoming port status indicator to the bottom bar.
  6. **cookies**: This plugin provides cookies information for authentication on trackers.
  7. **data**: This plugin allows to copy torrent data files from the host to the local machine.
  8. **diskspace**: This plugin adds an easy to read disk meter to the bottom bar.
  9. **erasedata**: This plugin allows to delete torrent data along with .torrent file.
  10. **extsearch**: This plugin allows to search many popular torrent sites for content from within ruTorrent.
  11. **filemanager**: File Manager plugin.
  12. **fileupload**: Sharing services file uploader.
  13. **history**: This plugin is designed to log a history of torrents.
  14. **ipad**: This plugin allows ruTorrent to work properly on iPad-like devices.
  15. **logoff**: The plug-in allows users to logoff from rutorrent.
  16. **mediainfo**: This plugin is intended to display media file information.
  17. **ratio**: This plugin allows to manage ratio limits for groups of torrents.
  18. **retrackers**: This plugin appends specified trackers to the trackers list of all newly added torrents.
  19. **rss**: This plugin is designed to fetch torrents via rss download links.
  20. **rutracker_check**: This plugin checks the rutracker.org tracker for updated/deleted torrents.
  21. **screenshots**: This plugin is intended to show screenshots from video files.
  22. **show_peers_like_wtorrent**: This plugin changes the format of values in columns 'Seeds' and 'Peers' in the torrents list.
  23. **theme**: This plugin allows to change the UI theme to one of several provided themes.
  24. **tracklabels**: This plugin adds tracker-based labels to the category panel.
  25. **autotools**: This plugin provides some possibilities on automation.
  26. **chunks**: This plugin shows the download status of torrent chunks.
  27. **create**: This plugin allows for the creation of new .torrent files.
  28. **datadir**: This plugin is intended for moving torrent data files.
  29. **edit**: This plugin allows to edit the list of trackers and change the comment of the current torrent.
  30. **feeds**: This plugin is intended for making RSS feeds with information of torrents.
  31. **filedrop**: This plugin allows users to drag multiple torrents from desktop to the browser (FF > 3.6 & Chrome only).
  32. **fileshare**: File share plugin.
  33. **geoip**: This plugin shows geolocation of peers for the selected torrent.
  34. **httprpc**: This plugin is a low-traffic replacement for the mod_scgi webserver module.
  35. **loginmgr**: This plugin is used to login to torrent sites in cases where cookies fail.
  36. **lookat**: This plugin allows to search for torrent name in external sources.
  37. **mediastream**: Video streaming plugin.
  38. **quotaspace**: The plug-in adds to status bar an indicator of available disk space (with quota support).
  39. **ratiocolor**: Change color of ratio column depending on ratio.
  40. **rpc**: This plugin is a replacement for the mod_scgi webserver module.
  41. **rssurlrewrite**: This plugin extends the functionality of the RSS plugin.
  42. **scheduler**: This plugin allows to define any of six rTorrent behavior types at each particular hour of 168 week hours.
  43. **seedingtime**: This plugin adds the columns 'Finished' and 'Added' to the torrents list.
  44. **source**: This plugin allows to copy the source .torrent file from the host to the local machine.
  45. **trafic**: This plugin allows to monitor rTorrent system wide and per-tracker traffic totals.
  46. **unpack**: This plugin is designed to manually or automatically unrar/unzip torrent data.

---

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
apt-get -yqq update; apt-get -yqq install git; \
git clone https://JMSDOnline:0036da90c7afd9ef8183019e7880324c7166682f@github.com/JMSDOnline/QuickBox.git /root/tmp/quick-box/; \
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

### INFO:
---

#### Known Bugs/Fixes
  1. Fix the private flag when new torrent is made
   ``` 
   sed -i 's/\$torrent->is_private(true);/\$torrent->is_private(false);/g' /var/www/rutorrent/plugins/create/createtorrent.php 
   ```
  2. Currently CuteFTP can only connect to your ${username} seedbox home directory via FTP on port 5757. I am going to be looking further into allowing CuteFTP a connection on SFTP for added security. That is, if I am not completley limited by GlobalScapes software practices.


