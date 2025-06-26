<?php
defined('XOOPS_ROOT_PATH') || exit;

class SmartshareCorePreload extends XoopsPreloadItem
{
    public static function eventCoreHeaderAddmeta()
    {
        global $xoopsTpl;

        // Ikke kjør i admin
        if (is_object($GLOBALS['xoopsModule']) && $GLOBALS['xoopsModule']->getVar('dirname') === 'system') {
            return;
        }

        // Ikke kjør på backend (rss, etc)
        if (defined('XOOPS_CPFUNC_LOADED') || defined('XOOPS_XMLRPC')) {
            return;
        }

        // Inkluder funksjon og bygg ikonene
        require_once XOOPS_ROOT_PATH . '/modules/smartshare/include/share-icons.php';

        
        $url  = XOOPS_URL . $_SERVER['REQUEST_URI'];

        $html = smartshare_build_icons($url);

        $xoopsTpl->assign('smartshare_icons', $html);
    }
}
