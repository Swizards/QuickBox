</section>

<!-- PLEX UNINSTALL MODAL -->
<div class="modal bounceIn animated" id="plexRemovalConfirm" tabindex="-1" role="dialog" aria-labelledby="PlexRemovalConfirm" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="PlexRemovalConfirm">Uninstall Plex?</h4>
      </div>
      <div class="modal-body">
        You are about to uninstall Plex Media Server from your system.<br/><br/>This will completely remove all of your configuration and library settings... this action is irreversable. <br/><br/>You may reinstall Plex at any time, however, your library settings will be reset to default.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a href="?removepackage-plex=true" id="plexRemove" class="btn btn-primary">I understand, do it!</a>
      </div>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->
<!-- BTSYNC UNINSTALL MODAL -->
<div class="modal bounceIn animated" id="btsyncRemovalConfirm" tabindex="-1" role="dialog" aria-labelledby="BTSyncRemovalConfirm" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="BTSyncRemovalConfirm">Uninstall BTSync?</h4>
      </div>
      <div class="modal-body">
        You are about to uninstall BitTorrent Sync from your system.<br/><br/>This will completely remove all of your configuration and shared folder settings... this action is irreversable. <br/><br/>You may reinstall BitTorrent Sync at any time, however, your storage path and linked folder settings will be reset to default.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a href="?removepackage-btsync=true" id="btsyncRemove" class="btn btn-primary">I understand, do it!</a>
      </div>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->


<script src="js/script.js"></script>
<script src="lib/jquery-ui/jquery-ui.js"></script>
<script src="lib/bootstrap/js/bootstrap.js"></script>
<script src="lib/jquery-toggles/toggles.js"></script>
<script src="lib/jquery-knob/jquery.knob.js"></script>
<script src="lib/jquery.gritter/jquery.gritter.js"></script>
<script src="js/quick.js"></script>
<script src="js/jquery.scrollbar.js"></script>
<script>
$(function() {
  $('.leftpanel').perfectScrollbar();
  $('.leftpanel').perfectScrollbar({ wheelSpeed: 1, wheelPropagation: true, minScrollbarLength: 20 });
  $('.leftpanel').perfectScrollbar('update');
  //$('.leftpanel').perfectScrollbar('destroy');
  $('.body').perfectScrollbar();
  $('.body').perfectScrollbar({ wheelSpeed: 1, wheelPropagation: true, minScrollbarLength: 20 });
  $('.body').perfectScrollbar('update');
});
</script>
<script>
$(function() {
  // Toggles
  $('.toggle-en').toggles({
    on: true,
    height: 26
  });
  $('.toggle-dis').toggles({
    on: false,
    height: 26
  });
});
</script>
<script>
$(document).ready(function() {

  'use strict';

  // PlexInstall
  $('#plexInstall').click(function(){
    $.gritter.add({
      title: 'Installing Plex',
      text: 'Please wait while Plex Media Server is being installed on your system.',
      class_name: 'with-icon check-circle success',
      sticky: true
    });
  });
  // PlexRemove
  $('#plexRemove').click(function(){
    $.gritter.add({
      title: 'Uninstalling Plex',
      text: 'Please wait while Plex Media Server is being uninstalled from your system.',
      class_name: 'with-icon times-circle danger',
      sticky: true
    });
  });

  // BTSyncInstall
  $('#btsyncInstall').click(function(){
    $.gritter.add({
      title: 'Installing BTSync',
      text: 'Please wait while Bittorrent Sync is being installed on your system.',
      class_name: 'with-icon check-circle success',
      sticky: true
    });
  });
  // BTSyncRemove
  $('#btsyncRemove').click(function(){
    $.gritter.add({
      title: 'Uninstalling BTSync',
      text: 'Please wait while Bittorrent Sync is being uninstalled from your system.',
      class_name: 'with-icon times-circle danger',
      sticky: true
    });
  });
  // CleanMemCache
  $('#cleanmem').click(function(){
    $.gritter.add({
      title: 'Cleaning Memory Cache',
      text: 'Please wait while your Physical Memory Cache is being flushed on your system.',
      class_name: 'with-icon check-circle success',
      sticky: true
    });
  });

});
</script>
