<?php
/*
Plugin Name: Tainacan Demo Notifies
Description: Notifies the remain time for reset all datas in basedata of Tainacan Demo.
Author: Vinicius Nunes - Media Lab / UFG
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
require_once plugin_dir_path(__FILE__) . 'includes/tainacan-demo-notifies.php';
if ( defined('DEMO_TAINACAN_TIME_INTERVAL') ) {
    new TainacanDemoNotice(DEMO_TAINACAN_TIME_INTERVAL);
} else {
    new TainacanDemoNotice();
}
