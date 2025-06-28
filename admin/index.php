<?php
$GLOBALS['xoopsOption']['template_main'] = 'smartshare_admin_index.tpl';
include_once __DIR__ . '/../../../include/cp_header.php';
xoops_cp_header();

$GLOBALS['xoopsTpl']->assign('mod_name', $xoopsModule->getVar('name'));
$GLOBALS['xoopsTpl']->assign('default_title', $xoopsModuleConfig['default_title']);
$GLOBALS['xoopsTpl']->assign('show_buttons', $xoopsModuleConfig['show_buttons']);

// Forhåndsvisning av delingsikoner i admin
require_once XOOPS_ROOT_PATH . '/modules/smartshare/include/share-icons.php';
$adminPreviewUrl = XOOPS_URL . '/modules/smartshare/admin/';
$previewHtml = smartshare_build_icons($adminPreviewUrl);
$GLOBALS['xoopsTpl']->assign('smartshare_icons', $previewHtml);

require_once XOOPS_ROOT_PATH . '/footer.php';

