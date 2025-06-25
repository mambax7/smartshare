<?php
$modversion['name'] = 'SmartShare';
$modversion['version'] = '1.1';
$modversion['description'] = 'Adds social media share buttons and generates meta tags for better sharing.';
$modversion['author'] = 'XOOPS Community';
$modversion['credits'] = 'Runeher';
$modversion['help'] = '';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 0;
$modversion['image'] = 'images/smartshare.png';
$modversion['dirname'] = 'smartshare';

// Admin
$modversion['hasAdmin'] = 1;
$modversion['system_menu'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Database
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
$modversion['tables'] = ['smartshare_counts'];

// Templates
$modversion['templates'][] = [
    'file' => 'smartshare_admin_index.tpl',
    'description' => 'Admin dashboard for SmartShare'
];
$modversion['templates'][] = [
    'file' => 'smartshare_admin_help.tpl',
    'description' => 'Help page for SmartShare'
];
$modversion['templates'][] = [
    'file' => 'smartshare_admin_aboutmeta.tpl',
    'description' => 'Information about meta tags for SmartShare'
];

// Base Configs
$modversion['config'][] = [
    'name' => 'default_title',
    'title' => '_MI_SMARTSHARE_DEFAULT_TITLE',
    'description' => '_MI_SMARTSHARE_DEFAULT_TITLE_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'Check this out!'
];

$modversion['config'][] = [
    'name' => 'label_text',
    'title' => '_MI_SMARTSHARE_LABEL',
    'description' => '_MI_SMARTSHARE_LABEL_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => 'Share the knowledge!'
];

$modversion['config'][] = [
    'name' => 'show_buttons',
    'title' => '_MI_SMARTSHARE_SHOW_BUTTONS',
    'description' => '_MI_SMARTSHARE_SHOW_BUTTONS_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1
];

// Platform Toggles
$socialPlatforms = [
    'facebook'  => 'Facebook',
    'x'         => 'X (Twitter)',
    'telegram'  => 'Telegram',
    'threads'   => 'Threads',
    'snapchat'  => 'Snapchat',
    'linkedin'  => 'LinkedIn',
    'reddit'    => 'Reddit',
	'bluesky'   => 'Bluesky',
    'whatsapp'  => 'WhatsApp',
    'pinterest' => 'Pinterest',
    'email'     => 'Email',
    'link'      => 'Copy Link',
    'mastodon'  => 'Mastodon',
    'gab'       => 'Gab',
    'truth'     => 'Truth Social',
    'mewe'      => 'MeWe',
    'vk'        => 'VK',
    'tumblr'    => 'Tumblr',
    'flipboard' => 'Flipboard',
    'blogger'   => 'Blogger',
    'messenger' => 'Messenger',
    'gmail'     => 'Gmail',
    'line'      => 'LINE'
];

foreach ($socialPlatforms as $key => $label) {
    $modversion['config'][] = [
        'name'        => 'enable_' . $key,
        'title'       => '_MI_SMARTSHARE_' . strtoupper($key),
        'description' => 'Enable ' . $label . ' share button',
        'formtype'    => 'yesno',
        'valuetype'   => 'int',
        'default'     => 1
    ];
}

// Rekkefølge
$modversion['config'][] = [
    'name' => 'icon_order',
    'title' => '_MI_SMARTSHARE_ICON_ORDER',
    'description' => '_MI_SMARTSHARE_ICON_ORDER_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => implode(',', array_keys($socialPlatforms))
];

// Alignment
$modversion['config'][] = [
    'name' => 'alignment',
    'title' => '_MI_SMARTSHARE_ALIGNMENT',
    'description' => '_MI_SMARTSHARE_ALIGNMENT_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'default' => 'center',
    'options' => [
        '_MI_SMARTSHARE_ALIGN_LEFT'   => 'left',
        '_MI_SMARTSHARE_ALIGN_CENTER' => 'center',
        '_MI_SMARTSHARE_ALIGN_RIGHT'  => 'right'
    ]
];

// Style
$modversion['config'][] = [
    'name' => 'icon_style',
    'title' => '_MI_SMARTSHARE_ICON_STYLE',
    'description' => '_MI_SMARTSHARE_ICON_STYLE_DESC',
    'formtype' => 'select',
    'valuetype' => 'text',
    'default' => 'round',
    'options' => [
        'Round' => 'round',
        'Square' => 'square'
    ]
];

// Share counts
$modversion['config'][] = [
    'name' => 'show_share_counts',
    'title' => '_MI_SMARTSHARE_SHOW_COUNTS',
    'description' => '_MI_SMARTSHARE_SHOW_COUNTS_DESC',
    'formtype' => 'yesno',
    'valuetype' => 'int',
    'default' => 1
];

// Visible icons limit
$modversion['config'][] = [
    'name' => 'visible_icons',
    'title' => '_MI_SMARTSHARE_VISIBLE_ICONS',
    'description' => '_MI_SMARTSHARE_VISIBLE_ICONS_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'int',
    'default' => 6
];

// Follow Us profiles
$modversion['config'][] = [
    'name'        => 'follow_header',
    'title'       => '_MI_SMARTSHARE_FOLLOW_HEADER',
    'description' => '',
    'formtype'    => 'label',
    'valuetype'   => 'text',
    'default'     => 'Add your social media profiles below (optional)',
];

$followPlatforms = [
    'facebook', 'x', 'telegram', 'threads', 'bluesky', 'linkedin', 'mastodon',
    'instagram', 'youtube', 'tiktok', 'snapchat', 'pinterest',
    'mewe', 'gab', 'truth', 'vk', 'tumblr', 'flipboard', 'blogger', 'line'
];

foreach ($followPlatforms as $platform) {
    $modversion['config'][] = [
        'name' => 'follow_' . $platform,
        'title' => '_MI_SMARTSHARE_FOLLOW_' . strtoupper($platform),
        'description' => '',
        'formtype' => 'textbox',
        'valuetype' => 'text',
        'default' => '',
    ];
}

$modversion['config'][] = [
    'name' => 'follow_order',
    'title' => '_MI_SMARTSHARE_FOLLOW_ORDER',
    'description' => '_MI_SMARTSHARE_ICON_ORDER_DESC',
    'formtype' => 'textbox',
    'valuetype' => 'text',
    'default' => implode(',', $followPlatforms)
];

// Block
$modversion['blocks'][] = [
    'file'        => 'smartshare_follow_block.php',
    'name'        => 'Follow us Block',
    'description' => 'Shows social media follow icons',
    'show_func'   => 'b_smartshare_follow_show',
    'template'    => 'smartshare_follow_block.tpl',
];
