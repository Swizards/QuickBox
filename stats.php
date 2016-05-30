<?php
$int="eth0";
function addUnits($bytes) {
        $units = array( 'B', 'KB', 'MB', 'GB', 'TB' );
        for($i = 0; $bytes >= 1024 && $i < count($units) - 1; $i++ ) {
                $bytes /= 1024;
        }
                return round($bytes, 1).''.$units[$i];
}
function get_bandwidth() { global $int;
    $rx[] = @file_get_contents("/sys/class/net/$int/statistics/rx_bytes");
    $tx[] = @file_get_contents("/sys/class/net/$int/statistics/tx_bytes");
    sleep(1);
    $rx[] = @file_get_contents("/sys/class/net/$int/statistics/rx_bytes");
    $tx[] = @file_get_contents("/sys/class/net/$int/statistics/tx_bytes");
    $tbps = $tx[1] - $tx[0];
    $rbps = $rx[1] - $rx[0];
    return "in: " . addUnits($rbps) . ", out: " . addUnits($tbps) ."";
}
function get_server_mem_usage(){
    $free = shell_exec('free -b');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem);
    $mem = array_merge($mem);
    $memory_usage = $mem[2]-$mem[5]/$mem[1]*100;
    return $memory_usage;
}
function get_server_uptime() {
    $data = shell_exec('uptime');
    $uptime = explode(' up ', $data);
    $uptime = explode(',', $uptime[1]);
    $uptime = $uptime[0].', '.$uptime[1];
    return $uptime;
}
function get_server_cpu_usage(){ $load = sys_getloadavg(); return $load[0]; }
    $bw = get_bandwidth();
    $hostname = shell_exec('hostname');
    $output = '{"cpuload":"' . get_server_cpu_usage() . '","memory:"' . addUnits(get_server_mem_usage()) . '","bandwidth:"' . get_bandwidth() . '"}';
    $data = "<tbody><tr><td>" . $hostname . "</td><td>" . get_server_cpu_usage() . "</td><td>" . addUnits(get_server_mem_usage()) . "</td><td>"  . get_bandwidth() . "</td><td>". get_server_uptime() ."</td></tr></tbody>";
    echo $data;
?>
