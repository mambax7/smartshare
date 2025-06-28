<?php

// Standardinnstillinger
define('_MI_SMARTSHARE_DEFAULT_TITLE', 'Default Title');
define('_MI_SMARTSHARE_DEFAULT_TITLE_DESC', 'Default title used for social media meta-tags when no override is set.');

define('_MI_SMARTSHARE_DEFAULT_DESCRIPTION', 'Default Description');
define('_MI_SMARTSHARE_DEFAULT_DESCRIPTION_DESC', 'Used in og:description and Twitter card when available.');

define('_MI_SMARTSHARE_DEFAULT_IMAGE', 'Default Image');
define('_MI_SMARTSHARE_DEFAULT_IMAGE_DESC', 'URL to the fallback image used for social sharing meta-tags.');

define('_MI_SMARTSHARE_SHOW_BUTTONS', 'Enable Share Buttons');
define('_MI_SMARTSHARE_SHOW_BUTTONS_DESC', 'Whether to display social media share icons on supported pages.');

// Adminmeny
define('_MI_SMARTSHARE_MENU_HOME', 'Dashboard');
define('_MI_SMARTSHARE_HELP', 'Help');
define('_MI_SMARTSHARE_MENU_METATAGS', 'About Meta Tags');

// Egendefinert overskrift over ikonene
define('_MI_SMARTSHARE_LABEL', 'Custom heading');
define('_MI_SMARTSHARE_LABEL_DESC', 'Type a heading that will show over the icons');

// Ikonstilvalg
define('_MI_SMARTSHARE_ICON_STYLE', 'Icon Style');
define('_MI_SMARTSHARE_ICON_STYLE_DESC', 'Choose between round or square share icons.');

// Justering av ikoner og tekst
define('_MI_SMARTSHARE_ALIGNMENT', 'Alignment of share box');
define('_MI_SMARTSHARE_ALIGNMENT_DESC', 'Choose how the share icons and label are aligned.');
define('_MI_SMARTSHARE_ALIGN_LEFT', 'Left');
define('_MI_SMARTSHARE_ALIGN_CENTER', 'Center');
define('_MI_SMARTSHARE_ALIGN_RIGHT', 'Right');

// Aktivering av delingsplattformer
$platforms = [
    'facebook', 'x', 'telegram', 'threads', 'snapchat', 'bluesky', 'linkedin', 'reddit', 'whatsapp', 'pinterest', 'email',
    'link', 'mastodon', 'gab', 'truth', 'mewe', 'vk', 'tumblr', 'flipboard', 'blogger', 'line', 'messenger', 'gmail'
];
foreach ($platforms as $p) {
    define('_MI_SMARTSHARE_ENABLE_' . strtoupper($p), 'Enable ' . ucfirst($p));
}


// Ikonbygger for adminvisning

if (!function_exists('ss_icon')) {
    function ss_icon($key, $label)
    {
        return '<img src="' . XOOPS_URL . '/modules/smartshare/images/icons/admin/' . $key . '.png" style="vertical-align: middle; width: 20px; height: 20px; margin-right: 4px;"> ' . $label;
    }
}

foreach ($platforms as $p) {
    define('_MI_SMARTSHARE_' . strtoupper($p), ss_icon($p, ucfirst($p)));
}

//define('_MI_SMARTSHARE_MESSENGER', ss_icon('messenger', 'Messenger (Works for mobile only)'));

// Tellervisning
define('_MI_SMARTSHARE_SHOW_COUNTS', 'Show share counts');
define('_MI_SMARTSHARE_SHOW_COUNTS_DESC', 'Display the number of times each icon has been clicked.');

// Synlighet
define('_MI_SMARTSHARE_VISIBLE_ICONS', 'Visible Icons');
define('_MI_SMARTSHARE_VISIBLE_ICONS_DESC', 'Number of share icons to show before clicking "More".');

// Følg oss-felt
define('_MI_SMARTSHARE_FOLLOW_HEADER', 'Add your social media profiles');

$followPlatforms = array_merge($platforms, ['instagram', 'youtube', 'tiktok']);
foreach ($followPlatforms as $p) {
    define('_MI_SMARTSHARE_FOLLOW_' . strtoupper($p), ss_icon($p, ucfirst($p)));
}

// Tillegg

define('_MI_SMARTSHARE_ICON_ORDER', 'Icon order');
define('_MI_SMARTSHARE_ICON_ORDER_DESC', 'Comma-separated list of platforms in desired order.');
define('_MI_SMARTSHARE_FOLLOW_ORDER', 'Social Profile Order');
//define('_MI_SMARTSHARE_ICON_ORDER_DESC', 'Comma-separated list of social platforms in the order you want them to appear.');
