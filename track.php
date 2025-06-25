<?php
require_once __DIR__ . '/../../mainfile.php';
require_once XOOPS_ROOT_PATH . '/modules/smartshare/class/SmartshareCounts.php';

$platform = $_GET['platform'] ?? '';
$url = $_GET['url'] ?? '';

if ($platform && $url) {
    SmartshareCounts::increment($platform, $url);
}

// Returner en gjennomsiktig 1x1 GIF (så browseren ikke viser noe)
header('Content-Type: image/gif');
echo base64_decode('R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==');
