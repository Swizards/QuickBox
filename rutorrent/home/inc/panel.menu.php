<body class="body ps-container">
<header>
  <div class="headerpanel">
    <div class="logopanel">
      <h2><a href="#"><img src="/img/logo.png" alt="QuickBox Seedbox" class="logo-image" height="50" /></a></h2>
    </div><!-- logopanel -->
    <div class="headerbar">
      <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
      <div class="header-right">
        <ul class="headermenu">
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-logged" data-toggle="dropdown">
                <?php echo "$username"; ?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right">
                <li><a href="https://plaza.quickbox.io/c/quickbox-support"><i class="fa fa-warning text-warning"></i> Report an issue</a></li>
                <div class="usermenu-div"></div>
                <li><span style="font-size:10px;">You are running QuickBox <b><?php echo "$version"; ?></b></span></li>
                <li><span style="font-size:10px;">courtesy of <b><a href="https://swizards.net" target="_blank" rel="noindex,nofollow">swizards.net</a></b></li>
              </ul>
            </div>
          </li>
        </ul>
      </div><!-- header-right -->
    </div><!-- headerbar -->
  </div><!-- header-->
</header>
<section>
  <div class="leftpanel ps-container">
    <div class="leftpanelinner">
      <ul class="nav nav-tabs nav-justified nav-sidebar">
        <li class="tooltips active" data-toggle="tooltip" title="Main Menu" data-placement="bottom"><a data-toggle="tab" data-target="#mainmenu"><i class="tooltips fa fa-ellipsis-h"></i></a></li>
        <?php
        if ($username == "$master"){
          echo "<li class=\"tooltips\" data-toggle=\"tooltip\" title=\"ruTorrent Plugins Menu\" data-placement=\"bottom\"><a data-toggle=\"tab\" data-target=\"#plugins\"><i class=\"tooltips fa fa-puzzle-piece\"></i></a></li>";
        }
        ?>
        <li class="tooltips" data-toggle="tooltip" title="Help Commands & More" data-placement="bottom"><a data-toggle="tab" data-target="#help"><i class="tooltips fa fa-question-circle"></i></a></li>
      </ul>
      <div class="tab-content">
        <!-- ################# MAIN MENU ################### -->
        <div class="tab-pane active" id="mainmenu">
          <h5 class="sidebar-title">Main Menu</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="active"><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li><a href="/rutorrent" target="_blank"><i class="fa fa-share"></i> <span>ruTorrent</span></a></li>
            <?php if (file_exists('/install/.btsync.lock') && ($username == "$master")) { echo "<li><a href=\"$btsyncURL\" target=\"_blank\"><i class=\"fa fa-retweet\"></i> <span>BTSync</span></a></li>"; } ?>
            <?php if (file_exists('/install/.plex.lock') && ($username == "$master")) { echo "<li><a href=\"$plexURL\" target=\"_blank\"><i class=\"fa fa-play\"></i> <span>Plex</span></a></li>"; } ?>
            <?php if (file_exists('/install/.rapidleech.lock') && ($username == "$master")) { echo "<li><a href=\"$rapidleechURL\" target=\"_blank\"><i class=\"fa fa-share-alt\"></i> <span>Rapidleech</span></a></li>"; } ?>
            <?php if (file_exists('/install/.sickrage.lock') && ($username == "$master")) { echo "<li><a href=\"$sickrageURL\" target=\"_blank\"><i class=\"fa fa-television\"></i> <span>SickRage</span></a></li>"; } ?>
            <li class="nav-parent">
              <a href=""><i class="fa fa-download"></i> <span>Downloads</span></a>
              <ul class="children">
                <li><a href="/<?php echo "$username"; ?>.downloads" target="_blank">ruTorrent</a></a></li>
              </ul>
            </li>
            <li><a href="?reload=true"><i class="fa fa-refresh"></i> <span>Reload Services</span></a></li>
            <?php
            if ($username == "$master"){
            echo "<li><a href=\"/$username.console\"><i class=\"fa fa-keyboard-o\"></i> <span>Web Console</span></a></li>";
            echo "<li class=\"nav-parent\"> <a href=\"\"><i class=\"fa fa-cubes\"></i> <span>Packages</span></a>";
              echo "<ul class=\"children\">";
                echo "<li class=\"info-quote\"><p class=\"info-quote\">Easily install and uninstall any software package simply by clicking on the software package name</p></li>";
                echo "<li class=\"warning-quote\"><p class=\"warning-quote\">Please be advised that these options are not the same as enabling and disabling a software package. These options are designed to either install or uninstall.</p></li>";

                echo "<li>";
                if (file_exists("/install/.btsync.lock")) {
                  echo "<a href=\"javascript:void()\" data-toggle=\"modal\" data-target=\"#btsyncRemovalConfirm\">BTSync  <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installpackage-btsync=true\" id=\"btsyncInstall\">BTSync  <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";
                echo "<li>";
                if (file_exists("/install/.csf.lock")) {
                  echo "<a href=\"javascript:void()\" data-toggle=\"modal\" data-target=\"#csfRemovalConfirm\">CSF  <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installpackage-csf=true\" id=\"csfInstall\">CSF  <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";
                echo "<li>";
                if (file_exists('/install/.plex.lock')) {
                  echo "<a href=\"javascript:void()\" data-toggle=\"modal\" data-target=\"#plexRemovalConfirm\">Plex Media Server  <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installpackage-plex=true\" id=\"plexInstall\">Plex Media Server  <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";
                echo "<li>";
                if (file_exists("/install/.rapidleech.lock")) {
                  echo "<a href=\"javascript:void()\" data-toggle=\"modal\" data-target=\"#rapidleechRemovalConfirm\">Rapidleech <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installpackage-rapidleech=true\" id=\"rapidleechInstall\">Rapidleech  <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";
                echo "<li>";
                if (file_exists("/install/.sickrage.lock")) {
                  echo "<a href=\"javascript:void()\" data-toggle=\"modal\" data-target=\"#sickrageRemovalConfirm\">SickRage <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installpackage-sickrage=true\" id=\"sickrageInstall\">SickRage  <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

              echo "</ul>";
            echo "</li>";
            } ?>
          </ul>
        </div><!-- tab pane -->

        <!-- ######################## HELP MENU TAB ##################### -->
        <div class="tab-pane" id="help">
          <h5 class="sidebar-title">Quick System Tips</h5>
          <?php
          if ($username == "$master"){
          echo "<ul class=\"nav nav-pills nav-stacked nav-quirk nav-mail\">";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">disktest</span><br/>";
            echo "<small>Type this command to perform a quick r/w test of your disk.</small></li>";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">fixhome</span><br/>";
            echo "<small>Type this command to quickly adjusts /home directory permissions.</small></li>";
          echo "</ul>";
          echo "<h5 class=\"sidebar-title\">Admin Commands</h5>";
          echo "<ul class=\"nav nav-pills nav-stacked nav-quirk nav-mail\">";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">setdisk</span><br/>";
            echo "<small>Type this command in ssh to allocate the amount of disk space you would like to give to a user.</small></li>";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">createSeedboxUser</span><br/>";
            echo "<small>Type this command in ssh to create a new seedbox user on your server.</small></li>";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">deleteSeedboxUser</span><br/>";
            echo "<small>Type this command in ssh to delete a seedbox user on your server. You will need to enter the users account name, you will be prompted.</small></li>";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">changeUserpass</span><br/>";
            echo "<small>Typing this command in ssh allows you to change a disired users password.</small></li>";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">sudo -u [username] reload</span><br/>";
            echo "<small>Type this command in ssh to reload all services on a specific users seedbox. These services include rTorrent and IRSSI only.</small></li>";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">upgradeBTSync</span><br/>";
            echo "<small>Type this command in ssh to upgrade BTSync to newest version when available.</small></li>";
            echo "<li style=\"padding: 7px\"><span style=\"font-size: 12px; color:#eee\">echo 1 > /proc/sys/vm/drop_caches</span><br/>";
            echo "<small>Use the above command as root if/when you decide to clear your Physical Memory Cache</small></li>";
          echo "</ul>";
          echo "<h5 class=\"sidebar-title\">Essential User Commands</h5>";
          } ?>
          <ul class="nav nav-pills nav-stacked nav-quirk nav-mail">
            <li style="padding: 7px"><span style="font-size: 12px; color:#eee">reload</span><br/>
            <small>allows user to reload their services (rtorrent and irssi)</small></li>
            <li style="padding: 7px"><span style="font-size: 12px; color:#eee">screen -fa -dmS rtorrent rtorrent</span><br/>
            <small>allows user to restart/remount rtorrent from SSH</small></li>
            <li style="padding: 7px"><span style="font-size: 12px; color:#eee">screen -fa -dmS irssi irssi</span><br/>
            <small>allows user to restart/remount irssi from SSH</small></li>
          </ul>
        </div><!-- tab-pane -->

        <!-- ######################## RUTORRENT PLUGINS TAB ##################### -->
        <div class="tab-pane" id="plugins">
          <h5 class="sidebar-title">Plugin Menu</h5>
          <ul class="nav nav-pills nav-stacked nav-quirk">
            <li class="nav-parent nav-active">
              <a href=""><i class="fa fa-puzzle-piece"></i> <span>Plugins</span></a>
              <ul class="children">
                <li class="info-quote"><p class="info-quote">Easily install and uninstall ruTorrent plugins simply by clicking on the plugin name</p></li>
                <?php
                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/_getdir/plugin.info')) {
                  echo "<a href=\"?removeplugin-getdir=true\">_getdir <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plug-in provides the possibility of comfortable navigation on a host file system.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-getdir=true\">_getdir <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plug-in provides the possibility of comfortable navigation on a host file system.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/_noty2/plugin.info')) {
                  echo "<a href=\"?removeplugin-noty=true\">_noty/_noty2 <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides the notification functionality for other plugins.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-noty=true\">_noty/_noty2 <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides the notification functionality for other plugins.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/_task/plugin.info')) {
                  echo "<a href=\"?removeplugin-task=true\">_task <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides the possibility of running various scripts on the host system.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-task=true\">_task <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides the possibility of running various scripts on the host system.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/autodl-irssi/plugin.info')) {
                  echo "<a href=\"?removeplugin-autodl=true\">autodl-irssi <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"GUI for autodl-irssi-community\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-autodl=true\">autodl-irssi <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"GUI for autodl-irssi-community\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/autotools/plugin.info')) {
                  echo "<a href=\"?removeplugin-autotools=true\">autotools <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides some possibilities on automation.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-autotools=true\">autotools <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides some possibilities on automation.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/check_port/plugin.info')) {
                  echo "<a href=\"?removeplugin-checkport=true\">checkport <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds an incoming port status indicator to the bottom bar.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-checkport=true\">checkport <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds an incoming port status indicator to the bottom bar.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/chunks/plugin.info')) {
                  echo "<a href=\"?removeplugin-chunks=true\">chunks <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin shows the download status of torrent chunks.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-chunks=true\">chunks <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin shows the download status of torrent chunks.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/cookies/plugin.info')) {
                  echo "<a href=\"?removeplugin-cookies=true\">cookies <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides cookies information for authentication on trackers.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-cookies=true\">cookies <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides cookies information for authentication on trackers.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/cpuload/plugin.info')) {
                  echo "<a href=\"?removeplugin-cpuload=true\">cpuload <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds a CPU Load indicator to the bottom bar.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-cpuload=true\">cpuload <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds a CPU Load indicator to the bottom bar.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/create/plugin.info')) {
                  echo "<a href=\"?removeplugin-create=true\">create <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows for the creation of new .torrent files.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-create=true\">create <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows for the creation of new .torrent files.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/data/plugin.info')) {
                  echo "<a href=\"?removeplugin-data=true\">data <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to copy torrent data files from the host to the local machine.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-data=true\">data <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to copy torrent data files from the host to the local machine.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/datadir/plugin.info')) {
                  echo "<a href=\"?removeplugin-datadir=true\">datadir <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended for moving torrent data files.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-datadir=true\">datadir <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended for moving torrent data files.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/diskspace/plugin.info')) {
                  echo "<a href=\"?removeplugin-diskspace=true\">diskspace <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds an easy to read disk meter to the bottom bar.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-diskspace=true\">diskspace <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds an easy to read disk meter to the bottom bar.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/edit/plugin.info')) {
                  echo "<a href=\"?removeplugin-edit=true\">edit <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to edit the list of trackers and change the comment of the current torrent.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-edit=true\">edit <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to edit the list of trackers and change the comment of the current torrent.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/erasedata/plugin.info')) {
                  echo "<a href=\"?removeplugin-erasedata=true\">erasedata <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to delete torrent data along with .torrent file.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-erasedata=true\">erasedata <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to delete torrent data along with .torrent file.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/extratio/plugin.info')) {
                  echo "<a href=\"?removeplugin-extratio=true\">extratio <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin extends the functionality of the ratio plugin.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-extratio=true\">extratio <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin extends the functionality of the ratio plugin.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/extsearch/plugin.info')) {
                  echo "<a href=\"?removeplugin-extsearch=true\">extsearch <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to search many popular torrent sites for content from within ruTorrent.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-extsearch=true\">extsearch <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to search many popular torrent sites for content from within ruTorrent.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/feeds/plugin.info')) {
                  echo "<a href=\"?removeplugin-feeds=true\">feeds <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended for making RSS feeds with information of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-feeds=true\">feeds <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended for making RSS feeds with information of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/filedrop/plugin.info')) {
                  echo "<a href=\"?removeplugin-filedrop=true\">filedrop <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows users to drag multiple torrents from desktop to the browser (FF > 3.6 & Chrome only).\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-filedrop=true\">filedrop <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows users to drag multiple torrents from desktop to the browser (FF > 3.6 & Chrome only).\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/filemanager/plugin.info')) {
                  echo "<a href=\"?removeplugin-filemanager=true\">filemanager <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"File Manager plugin.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-filemanager=true\">filemanager <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"File Manager plugin.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/fileshare/plugin.info')) {
                  echo "<a href=\"?removeplugin-fileshare=true\">fileshare <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"File share plugin. (Please note: This plugin is dependent on the filemanager plugin)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-fileshare=true\">fileshare <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"File share plugin. (Please note: This plugin is dependent on the filemanager plugin)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/fileupload/plugin.info')) {
                  echo "<a href=\"?removeplugin-fileupload=true\">fileupload <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Sharing services file uploader. (Please note: This plugin is dependent on the filemanager plugin as well as plowup to be installed - which is by default)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-fileupload=true\">fileupload <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Sharing services file uploader. (Please note: This plugin is dependent on the filemanager plugin as well as plowup to be installed - which is by default)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/history/plugin.info')) {
                  echo "<a href=\"?removeplugin-history=true\">history <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is designed to log a history of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-history=true\">history <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is designed to log a history of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/httprpc/plugin.info')) {
                  echo "<a href=\"?removeplugin-httprpc=true\">httprpc <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is a low-traffic replacement for the mod_scgi webserver module.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-httprpc=true\">httprpc <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is a low-traffic replacement for the mod_scgi webserver module.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/ipad/plugin.info')) {
                  echo "<a href=\"?removeplugin-ipad=true\">ipad <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows ruTorrent to work properly on iPad-like devices. (Not compatible with the mobile plugin)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-ipad=true\">ipad <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows ruTorrent to work properly on iPad-like devices. (Not compatible with the mobile plugin)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/loginmgr/plugin.info')) {
                  echo "<a href=\"?removeplugin-loginmgr=true\">loginmgr <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is used to login to torrent sites in cases where cookies fail.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-loginmgr=true\">loginmgr <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is used to login to torrent sites in cases where cookies fail.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/logoff/plugin.info')) {
                  echo "<a href=\"?removeplugin-logoff=true\">logoff <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"The plugin allows users to logoff from rutorrent.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-logoff=true\">logoff <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"The plugin allows users to logoff from rutorrent.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/lookat/plugin.info')) {
                  echo "<a href=\"?removeplugin-lookat=true\">lookat <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to search for torrent name in external sources.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-lookat=true\">lookat <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to search for torrent name in external sources.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/mediainfo/plugin.info')) {
                  echo "<a href=\"?removeplugin-mediainfo=true\">mediainfo <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended to display media file information.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-mediainfo=true\">mediainfo <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended to display media file information.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/mobile/plugin.info')) {
                  echo "<a href=\"?removeplugin-mobile=true\">mobile <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides a mobile version of ruTorrent. (Not compatible with the ipad plugin)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-mobile=true\">mobile <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin provides a mobile version of ruTorrent. (Not compatible with the ipad plugin)\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/pausewebui/plugin.info')) {
                  echo "<a href=\"?removeplugin-pausewebui=true\">pausewebui <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Adds an button to pause the webui from updating.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-pausewebui=true\">pausewebui <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Adds an button to pause the webui from updating.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/ratio/plugin.info')) {
                  echo "<a href=\"?removeplugin-ratio=true\">ratio <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to manage ratio limits for groups of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-ratio=true\">ratio <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to manage ratio limits for groups of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/ratiocolor/plugin.info')) {
                  echo "<a href=\"?removeplugin-ratiocolor=true\">ratiocolor <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Change color of ratio column depending on ratio.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-ratiocolor=true\">ratiocolor <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Change color of ratio column depending on ratio.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/retrackers/plugin.info')) {
                  echo "<a href=\"?removeplugin-retrackers=true\">retrackers <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin appends specified trackers to the trackers list of all newly added torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-retrackers=true\">retrackers <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin appends specified trackers to the trackers list of all newly added torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/rpc/plugin.info')) {
                  echo "<a href=\"?removeplugin-rpc=true\">rpc <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is a replacement for the mod_scgi webserver module.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-rpc=true\">rpc <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is a replacement for the mod_scgi webserver module.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/rss/plugin.info')) {
                  echo "<a href=\"?removeplugin-rss=true\">rss <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is designed to fetch torrents via rss download links.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-rss=true\">rss <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is designed to fetch torrents via rss download links.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/rssurlrewrite/plugin.info')) {
                  echo "<a href=\"?removeplugin-rssurlrewrite=true\">rssurlrewrite <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin extends the functionality of the RSS plugin.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-rssurlrewrite=true\">rssurlrewrite <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin extends the functionality of the RSS plugin.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/rutracker_check/plugin.info')) {
                  echo "<a href=\"?removeplugin-rutracker_check=true\">rutracker_check <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin checks the rutracker.org tracker for updated/deleted torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-rutracker_check=true\">rutracker_check <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin checks the rutracker.org tracker for updated/deleted torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/scheduler/plugin.info')) {
                  echo "<a href=\"?removeplugin-scheduler=true\">scheduler <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to define any of six rTorrent behavior types at each particular hour of 168 week hours.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-scheduler=true\">scheduler <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to define any of six rTorrent behavior types at each particular hour of 168 week hours.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/screenshots/plugin.info')) {
                  echo "<a href=\"?removeplugin-screenshots=true\">screenshots <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended to show screenshots from video files.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-screenshots=true\">screenshots <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is intended to show screenshots from video files.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/seedingtime/plugin.info')) {
                  echo "<a href=\"?removeplugin-seedingtime=true\">seedingtime <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds the columns 'Finished' and 'Added' to the torrents list.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-seedingtime=true\">seedingtime <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds the columns 'Finished' and 'Added' to the torrents list.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/show_peers_like_wtorrent/plugin.info')) {
                  echo "<a href=\"?removeplugin-show_peers_like_wtorrent=true\">show_peers_like_wtorrent <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin changes the format of values in columns 'Seeds' and 'Peers' in the torrents list.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-show_peers_like_wtorrent=true\">show_peers_like_wtorrent <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin changes the format of values in columns 'Seeds' and 'Peers' in the torrents list.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/source/plugin.info')) {
                  echo "<a href=\"?removeplugin-source=true\">source <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to copy the source .torrent file from the host to the local machine.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-source=true\">source <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to copy the source .torrent file from the host to the local machine.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/stream/plugin.info')) {
                  echo "<a href=\"?removeplugin-stream=true\">stream <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Stream media files with VLC (based on getData by Novik).\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-stream=true\">stream <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"Stream media files with VLC (based on getData by Novik).\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/theme/plugin.info')) {
                  echo "<a href=\"?removeplugin-theme=true\">theme <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to change the UI theme to one of several provided themes.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-theme=true\">theme <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to change the UI theme to one of several provided themes.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/throttle/plugin.info')) {
                  echo "<a href=\"?removeplugin-throttle=true\">throttle <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin gives a convenient control over speed limits for groups of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-throttle=true\">throttle <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin gives a convenient control over speed limits for groups of torrents.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/tracklabels/plugin.info')) {
                  echo "<a href=\"?removeplugin-tracklabels=true\">tracklabels <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds tracker-based labels to the category panel.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-tracklabels=true\">tracklabels <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin adds tracker-based labels to the category panel.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/trafic/plugin.info')) {
                  echo "<a href=\"?removeplugin-trafic=true\">trafic <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to monitor rTorrent system wide and per-tracker traffic totals.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-trafic=true\">trafic <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin allows to monitor rTorrent system wide and per-tracker traffic totals.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/unpack/plugin.info')) {
                  echo "<a href=\"?removeplugin-unpack=true\">unpack <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is designed to manually or automatically unrar/unzip torrent data.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-unpack=true\">unpack <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin is designed to manually or automatically unrar/unzip torrent data.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";

                echo "<li>";
                if (file_exists('/srv/rutorrent/plugins/xmpp/plugin.info')) {
                  echo "<a href=\"?removeplugin-xmpp=true\">xmpp <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin sends notifications through xmpp about finished downloads.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-installed.png\"></span></a>";
                } else {
                  echo "<a href=\"?installplugin-xmpp=true\">xmpp <span class=\"tooltips text-inverted fa fa-question-circle\" data-toggle=\"tooltip\" title=\"This plugin sends notifications through xmpp about finished downloads.\" data-placement=\"right\"></span> <span class=\"pull-right plgin-center-switch\"><img src=\"img/switch-notinstalled.png\"></span></a>";
                }
                echo "</li>";
                ?>
              </ul>
            </li>
          </ul>
        </div><!-- tab-pane -->

      </div><!-- tab-content -->
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
