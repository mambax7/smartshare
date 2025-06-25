<?php
function b_smartshare_follow_show()
{
    $block = [];

    $moduleHandler = xoops_getHandler('module');
    $configHandler = xoops_getHandler('config');

    $module = $moduleHandler->getByDirname('smartshare');
    if (!$module) {
        return $block;
    }

    $mid = $module->getVar('mid');
    $config = $configHandler->getConfigsByCat(0, $mid);

    // Hent rekkefølgen definert i admin
    $orderString = isset($config['follow_order']) ? $config['follow_order'] : '';
    $platforms = array_map('trim', explode(',', $orderString));

    // Hvis ingen rekkefølge er satt, bruk standardrekkefølge
    if (empty($platforms[0])) {
        $platforms = [
            'facebook', 'x', 'telegram', 'linkedin', 'threads', 'mastodon',
            'instagram', 'youtube', 'tiktok', 'snapchat', 'reddit', 'whatsapp',
            'pinterest', 'email', 'gab', 'truth', 'mewe', 'vk', 'tumblr',
            'flipboard', 'blogger', 'messenger', 'gmail', 'line'
        ];
    }

    $style = isset($config['icon_style']) ? $config['icon_style'] : 'round';
    $iconPath = XOOPS_URL . "/modules/smartshare/images/icons/" . $style . "/";

    $icons = [];

    foreach ($platforms as $platform) {
        $field = 'follow_' . $platform;
        if (!empty($config[$field])) {
            $icons[] = [
                'name' => $platform,
                'url' => $config[$field],
                'icon' => $iconPath . $platform . '.png',
            ];
        }
    }

    $block['icons'] = $icons;
    return $block;
}
