<?php

$GLOBALS['xoopsOption']['template_main'] = 'smartshare_admin_aboutmeta.tpl';
include_once __DIR__ . '/../../../include/cp_header.php';
xoops_cp_header();

$GLOBALS['xoopsTpl']->assign('xoops_module_header', '<style>
.help-section { font-family: sans-serif; padding: 20px; line-height: 1.6; }
.help-section h2 { color: #2c3e50; }
.help-section ul { margin: 0; padding-left: 20px; }
.help-section li { margin-bottom: 8px; }
</style>');

require_once XOOPS_ROOT_PATH . '/footer.php';

