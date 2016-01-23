<?php
    error_reporting(E_ALL | E_NOTICE);
    $locale = 'en_US.UTF-8';
    $language = 'en';
    $iface_list = array('eth0');
    // optional names for interfaces
    // if there's no name set for an interface then the interface identifier
    // will be displayed instead
    $iface_title['eth0'] = 'External';
    //$iface_title['lo'] = 'Internal';
    $vnstat_bin = '/usr/bin/vnstat';
    $data_dir = './dumps';
    // preferred byte notation. null auto chooses. otherwise use one of
    // 'TB','GB','MB','KB'
    $byte_notation = null;
    // Set local timezone

