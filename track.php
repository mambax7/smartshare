<?php
require_once __DIR__ . '/../../mainfile.php';
require_once XOOPS_ROOT_PATH . '/modules/smartshare/class/SmartshareCounts.php';

$platform = $_GET['platform'] ?? '';
$urlRaw = $_GET['url'] ?? '';

// Fix for publisher sånn at både path info og itemid viser samme antall delinger
if (strpos($urlRaw, '/modules/publisher/index.php/item.') !== false && preg_match('#item\.(\d+)#', $urlRaw, $m)) {
    $itemid = (int)$m[1];
    $urlRaw = XOOPS_URL . '/modules/publisher/item.php?itemid=' . $itemid;
}

if ($platform && $urlRaw) {
    SmartshareCounts::increment($platform, $urlRaw);
}

// Returner en gjennomsiktig 1x1 GIF (slik at browseren ikke viser noe)
header('Content-Type: image/gif');
echo base64_decode('R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==');
