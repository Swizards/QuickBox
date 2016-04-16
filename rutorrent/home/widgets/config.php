<?php
    error_reporting(E_ALL | E_NOTICE);
    $locale = 'en_US.UTF-8';
    $language = 'en';

    // list of network interfaces monitored by vnStat
    $iface_list = array('eth0');

    //
    // optional names for interfaces
    // if there's no name set for an interface then the interface identifier
    // will be displayed instead
    //
    $iface_title['eth0'] = 'External';
    //$iface_title['lo'] = 'Internal';

    //
    // There are two possible sources for vnstat data. If the $vnstat_bin
    // variable is set then vnstat is called directly from the PHP script
    // to get the interface data.
    //
    // The other option is to periodically dump the vnstat interface data to
    // a file (e.g. by a cronjob). In that case the $vnstat_bin variable
    // must be cleared and set $data_dir to the location where the dumps
    // are stored. Dumps must be named 'vnstat_dump_$iface'.
    //
    // You can generate vnstat dumps with the command:
    //   vnstat --dumpdb -i $iface > /path/to/data_dir/vnstat_dump_$iface
    //
    $vnstat_bin = '/usr/bin/vnstat';
    $data_dir = './dumps';

    // preferred byte notation. null auto chooses. otherwise use one of
    // 'TB','GB','MB','KB'
    $byte_notation = null;

    // Set local timezone
