###Changelog for version 2.1.0 of QuickBox

####ENHANCEMENTS

  * __Numerous Nifty Widgets Added!__ - With 2.1.0 we've ushered in some exciting new widgets to view your servers stats directly from your QuickBox dashboard

    * ``RAM Widget`` : You can now view how much ram your server is using. Viewing comes in 4 flavors. Physical Memory usage, Cached Memory usage, Real Memory usage, and Swap usage

    * ``CPU Widget`` : You can now view your servers CPU Architecture, threads/cores, as well as your current (in live time) CPU status - i.e; idle vs. Used

    * ``Mem Cache Cleaner`` : Your systems RAM is displayed in live time, if you see your physical and/or cached memory filling up and over into swap; click a handy button and ... Make it go away! Yay!

  * __Improved Load Widget__ - Honestly, there was nothing wrong with the Server Load Widget to begin with; however, we did feel like making the data more thorough, thus, geek level 1,000. Enjoy!

  * __Collapsible Widgets__  - Don't want all your widgets open at once? Want to hide the bandwidth graph and just marvel at the wonders of your 64 thread server? Fine. All widgets are now closable and collapsible.

  * __Security__ - Several users (understandably) were unhappy with www-data having ALL permissions. Due to the demand (despite this being a closed and non-front-facing software) we have only permitted www-data to run a few essential commands. The dashboard no longer needs full root permissions to do it's job(s).

  * __Added Packages__ - iotop has been added to the script on initial install.

  * __Software Updates__ - BTSync has been updated in the source archives to the current v2.3.5. iRRSi has been updated to community v1.62 from 1.60.

####FIXES

  * __BTSync Installer__ - A reported issue with BTSync not installing (at all) has been confirmed and fixed. This has been tested with success across all QuickBox accepted OS/Distros

  * __Blank IP__ - IP after install is now displaying your servers phyical ipaddress, thnka sto those whom pointed this out.

  * __Human Readable Disk Data__ - An issue where the disk data was showing non-human readable units has now been fixed. Thanks to @wjbeckett for supplying that fix! ::smile::



---


###Changelog for version 1.4 of QuickBox

  * __irssi fixed for multi-user install__ - The issue with IRSSI failing to find updates on additional created users has been addressed. The skeleton directory used for multiple user creation has been updated to reflect the new 1.60 version on autodl.

  * __Fix for xmpp added__ - There was an issue that effected users (if they were attempting to add in php 7) that was causing a variable explosion, this was resolved by pulling in the update from Noviks ruTorrent repo.

  * __Deny Public Tracker Option added__  : This was requested by a couple of people. Running multi-user installs, they wanted an option to block Public Trackers. THis is now included... enjoy!

  * __Dashboard css fix__ - The previous update repo for Quick Box had an error wherein it didn't properly pull the updated css. The result was an ugly mess of text and no styling as it was calling in the wrong css file. This has been addressed.

####Q&A

  Question.
  ---
  >I used your previous updater (the v1.3) and I am having these issues with the css. Can I run the updater again to fix these issues now?

  Answer.
  ---
  >Absolutely! This will fix a permissions error for php running certain execution commands from your dashboard (ie; turning Public Plex On and Off) as well as address the bad naming implementation from the previous update. You can opt to skip the Plex install/update... or run it again... I would suggest running it again... it will not hurt your Plex install. The Update script can be found [at the bottom of the readme](https://github.com/JMSDOnline/quick-box#update-to-quick-box-version-13)


###Changelog for version 1.3 of QuickBox

  * __.bashrc__ - The bashrc file is located within your /root/ directory. This file is the once responsible for many of the commands that you may put to use on your Quick Box seedbox install. Of all these commands, there was but one that was presenting a problem in v1.2. That was the 'changeUserpass' command.
    * __The Problem__   : Changing a users password would create complications for the user to login afterwards. This was due to the user having a duplicated set of username and password hashes within the /etc/htpasswd file.
    * __The Solution__  : I have written the proper sed command to be fired at user password change. This sed command will remove the last know users password and hash entry from the file before echoing in the new username and password hash.

  * __LShell__ - LShell -or- Limited Shell is a user environment written in python that allows us to restrict a users shell environment to certain commands that we approve.
    * __The Problem__   : Aditional added users could break out of their /home/${username} directories by connectiong to VSFTPd on port 4747 (SFTP). This would give the additional user the ability to browse the entire server.
    * __The Solution__  : Set SFTP options to '0' in the lshell.conf file. This file is located at /etc/lshell.conf if you would like to take a look at it's settings.

  * __Plex Public Access__  : This one is exciting as it adds in the ability to simply enable (switch on) and disable (switch off) Plex Access WITHOUT the need for creating a tunnel on your local computer. Understandably, for some this is too much of a hassle to enjoy Plex as they prefer to simply watch TV and Movies directly from their server (permitting their network and hardware is suitable). You may opt to enable it when you are wanting to watch it (Public Access - no login required) and disable it when you want to secure your Plex Media Server (Deletes a custom plex.conf file in the apache2/site-enabled directory, thus hiding Plex from Public Access)

  * __Dashboard index.php update__ - To aid in this updated function of Plex, there were a few minor changes that needed to be made to the index file as it uses custom shell hooks via php to make this possible. Is it safe? I wouldn't be doing this if it wasn't!

####Q&A

  Question.
  ---
  >I have plex from your version 1.0 installed. I think that version was built from source. Your update looks like it adds a Debian ppa to the sources.list and runs an install. Will this affect my current Plex?

  Answer.
  ---
  >No, the built-from-source Plex will stay as it is. Since PlexMediaServer is already installed (and more than likely out-of-date) the ppa will simply pickup that Plex is already installed and rather than attempting to install, it will merely run an update... thus making future updates a breeze (ex: apt-get install --only-upgrade plexmediaserver
