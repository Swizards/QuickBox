<?php
  include("inc/config.php");
  include("inc/panel.header.php");
  include("inc/panel.menu.php");
?>

  <div class="mainpanel">
    <!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
    </div>-->
    <div class="contentpanel">
      <div class="row">
        <div class="col-sm-12 col-md-8 dash-left">
          <div class="col-sm-12 col-md-7">
            <div class="panel panel-default list-announcement">
              <div class="panel-heading">
                <h4 class="panel-title">Service Status</h4>
              </div>
              <div class="panel-body">
                <ul class="list-unstyled mb20">
                  <li>
                    <?php echo "$rval"; ?>
                  </li>
                  <li>
                    <?php echo "$ival"; ?>
                  </li>
                  <!-- <//?php
                  if ($username == "$master"){
                  echo "<li>";
                    echo "$bval";
                  echo "</li>";
                  } ?>
                  -->
                </ul>
              </div>
              <div class="panel-footer"></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-5">
            <div class="panel panel-default list-announcement">
              <div class="panel-heading">
                <h4 class="panel-title">Service Controller</h4>
              </div>
              <div class="panel-body">
                <ul class="list-unstyled mb20">
                  <li>
                    <?php echo "$cbodyr"; ?>
                  </li>
                  <li>
                    <?php echo "$cbodyi"; ?>
                  </li>
                  <!-- <//?php
                  if ($username == "$master"){
                  echo "<li>";
                    echo "$cbodyb";
                  echo "</li>";
                  } ?>
                  -->
                </ul>
              </div>
              <div class="panel-footer"></div>
            </div>
          </div>
        </div><!-- col-md-8 -->
        <div class="col-sm-12 col-md-4 dash-right">
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-danger panel-weather">
                <div class="panel-heading">
                  <h4 class="panel-title">System Response</h4>
                </div>
                <div class="panel-body inverse">
                  <?php
                  $output = readMsg();
                  if (isset($output)) {
                      $data = $output;
                      //unlink('servermessage');
                      echo $data;
                  } else {
                      echo "<br>";
                  }
                  ?>
                </div>
              </div>
            </div><!-- col-sm-12 -->
          </div><!-- row -->
        </div><!-- col-md-4 -->
      </div><!-- row -->
      <div class="row">
        <div class="col-sm-12 col-md-8">
            <div class="panel panel-inverse">
              <ul class="panel-options">
                <li><a class="panel-minimize"><i class="fa fa-chevron-down"></i></a></li>
                <li><a class="panel-remove"><i class="fa fa-remove text-danger"></i></a></li>
              </ul>
              <div class="panel-heading">
                <h4 class="panel-title">Bandwidth Data</h4>
              </div>
              <div class="panel-body text-center" style="padding:0">
                <div id="mainbw" style="width:100%;height:350px;"></div>
              </div>
              <div class="row panel-footer panel-statistics">
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered nomargin">
                      <thead>
                        <tr>
                          <th style="width:33%">Network</th>
                          <th style="width:33%">Upload</th>
                          <th style="width:33%">Download</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (false !== ($strs = @file("/proc/net/dev"))) : ?>
                        <?php for ($i = 2; $i < count($strs); $i++ ) : ?>
                        <?php preg_match_all( "/([^\s]+):[\s]{0,}(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/", $strs[$i], $info );?>
                        <tr>
                          <td style="font-size:14px;font-weight:bold"><?php echo $info[1][0]?></td>
                          <td style="font-size:14px;"><span class="text-success"><span id="NetOutSpeed<?php echo $i?>">0B/s</span></span></td>
                          <td style="font-size:14px;"><span class="text-primary"><span id="NetInputSpeed<?php echo $i?>">0B/s</span></span></td>
                        </tr>
                        <?php endfor; ?>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div><!-- col-sm-12 -->
              </div>
            </div>
            <div class="panel-group" id="accordion">
              <div class="panel" style="background:transparent">
                <div class="panel-heading" style="background:transparent">
                  <h4 class="text-right" style="padding-right: 10px">
                    <a class="btn btn-xs btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      View Additional Bandwidth Details <i class="fa fa-chevron-down"></i>
                    </a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                  <div class="panel-body">
                    <?php
                    if ($username == "$master"){
                      echo "<div class=\"row\"><div id=\"bw_tables\" style=\"padding:0;margin:0;\"></div></div>";
                    } ?>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4 dash-right">
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-inverse">
                <ul class="panel-options">
                  <li><a class="panel-minimize"><i class="fa fa-chevron-down"></i></a></li>
                  <li><a class="panel-remove"><i class="fa fa-remove text-danger"></i></a></li>
                </ul>
                <div class="panel-heading">
                  <h4 class="panel-title">Your Disk Status</h4>
                </div>
                <div class="panel-body">
                  <div id="disk_data"></div>
                </div>
              </div>
            </div><!-- DISK WIDGET -->
            <div class="col-sm-12">
              <div class="panel panel-inverse">
                <ul class="panel-options">
                  <li><a class="panel-minimize"><i class="fa fa-chevron-down"></i></a></li>
                  <li><a class="panel-remove"><i class="fa fa-remove text-danger"></i></a></li>
                </ul>
                <div class="panel-heading">
                  <h4 class="panel-title">System RAM Status</h4>
                </div>
                <div class="panel-body">
                  <div id="meterram"></div>
                </div>
              </div>
            </div><!-- RAM WIDGET -->
            <div class="col-sm-12">
              <div class="panel panel-inverse">
                <ul class="panel-options">
                  <li><a class="panel-minimize"><i class="fa fa-chevron-down"></i></a></li>
                  <li><a class="panel-remove"><i class="fa fa-remove text-danger"></i></a></li>
                </ul>
                <div class="panel-heading">
                  <h4 class="panel-title">CPU Status</h4>
                </div>
                <div class="panel-body">
                  <div id="metercpu"></div>
                  <hr />
                  <span class="nomargin" style="font-size:14px">
                    <?php echo $sysInfo['cpu']['model'];?><br/>
                    [<span style="color:#111;font-weight:600">x<?php echo $sysInfo['cpu']['num']; ?></span> core]
                  </span>
                </div>
              </div>
            </div><!-- CPU WIDGET -->
            <div class="col-sm-12">
              <div class="panel panel-inverse-full panel-updates">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-sm-9">
                      <h4 class="panel-title text-success">Server Load</h4>
                      <h4><span id="cpuload"></span></h4>
                      <p>This is your servers current load average</p>
                    </div>
                    <div class="col-sm-3 text-right">
                      <i class="fa fa-heartbeat text-danger" style="font-size: 90px"></i>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 mt20 text-center">
                        <strong>Uptime:</strong> <span id="uptime"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- panel -->
            </div>
          </div><!-- row -->
        </div>
      </div>
    </div><!-- contentpanel -->
  </div><!-- mainpanel -->

  <?php
    include("inc/panel.scripts.php");
    include("inc/panel.end.php");
  ?>
