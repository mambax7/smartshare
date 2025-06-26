<?php
if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}
// Fix for publisher sånn at både path info og itemid viser samme antall delinger
if ($GLOBALS['xoops_dirname'] === 'publisher' && isset($_GET['itemid'])) {
    $GLOBALS['smartshare_override_url'] = XOOPS_URL . '/modules/publisher/item.php?itemid=' . (int)$_GET['itemid'];
}
include_once XOOPS_ROOT_PATH . '/modules/smartshare/class/SmartshareCounts.php';

function smartshare_build_icons()
{
    $moduleHandler = xoops_getHandler('module');
    $configHandler = xoops_getHandler('config');
    $module = $moduleHandler->getByDirname('smartshare');
    $config = $configHandler->getConfigsByCat(0, $module->getVar('mid'));

    if (empty($config['show_buttons'])) {
        return '';
    }

    $urlRaw = $GLOBALS['smartshare_override_url'] ?? XOOPS_URL . $_SERVER['REQUEST_URI'];
    $url = urlencode($urlRaw);
    $title = urlencode($GLOBALS['xoopsTpl']->get_template_vars('smartshare_title') ?? 'Check this out!');
    $style = $config['icon_style'];
    $iconPath = XOOPS_URL . "/modules/smartshare/images/icons/" . $style . "/";
    $alignment = $config['alignment'] ?? 'center';
    $counts = SmartshareCounts::getCounts($urlRaw);
    $showCounts = !empty($config['show_share_counts']);
    $maxDefaultIcons = (int)($config['visible_icons'] ?? 6);
    $label = $config['label_text'] ?? 'Share the knowledge!';

    $defaultOrder = [
        'facebook', 'x', 'telegram', 'threads', 'snapchat', 'bluesky','linkedin', 'reddit', 'whatsapp',
        'pinterest', 'email', 'link', 'mastodon', 'gab', 'truth', 'mewe', 'vk', 'tumblr',
        'flipboard', 'blogger', 'messenger', 'gmail', 'line', 'instagram', 'youtube', 'tiktok'
    ];

    $iconOrder = trim($config['icon_order'] ?? '');
    if (!empty($iconOrder)) {
        $ordered = array_map('trim', explode(',', strtolower($iconOrder)));
        $ordered = array_filter($ordered, fn($v) => in_array($v, $defaultOrder));
        foreach ($defaultOrder as $item) {
            if (!in_array($item, $ordered)) {
                $ordered[] = $item;
            }
        }
        $defaultOrder = $ordered;
    }

   $platforms = [
    'facebook'  => "https://www.facebook.com/sharer/sharer.php?u=$url",
    'x'         => "https://twitter.com/intent/tweet?url=$url&text=$title",
    'telegram'  => "https://t.me/share/url?url=$url&text=$title",
    'threads'   => "https://www.threads.net/intent/post?text=$title%20$url",
    'truth'     => "https://truthsocial.com/compose?text=$title%20$url",
    'bluesky'   => "https://bsky.app/intent/compose?text=$title%20$url",
    'snapchat'  => "https://www.snapchat.com/scan?attachmentUrl=$url",
    'linkedin'  => "https://www.linkedin.com/sharing/share-offsite/?url=$url",
    'reddit'    => "https://reddit.com/submit?url=$url&title=$title",
    'whatsapp'  => "https://wa.me/?text=$title%20$url",
    'pinterest' => "https://pinterest.com/pin/create/button/?url=$url",
    'email'     => "mailto:?subject=$title&body=$url",
    'mastodon'  => "https://mastodon.social/share?text=$title%20$url",
    'gab'       => "https://gab.com/compose?text=$title%20$url",
    'mewe'      => "https://mewe.com/share?link=$url",
    'vk'        => "https://vk.com/share.php?url=$url",
    'tumblr'    => "https://www.tumblr.com/widgets/share/tool?canonicalUrl=$url&title=$title",
    'flipboard' => "https://share.flipboard.com/bookmarklet/popout?url=$url&title=$title",
    'blogger'   => "https://www.blogger.com/blog-this.g?u=$url&n=$title",
    'line'      => "https://social-plugins.line.me/lineit/share?url=$url",
    'messenger' => "fb-messenger://share/?link=$url",
    'gmail'     => "https://mail.google.com/mail/?view=cm&fs=1&su=$title&body=$url",
    'link'      => "#"
];


    $total = array_sum($counts);

    $out = '<style>
        .smartshare-wrapper { text-align: ' . htmlspecialchars($alignment) . '; }
        .smartshare-label {
            font-style: italic;
            color: #c44;
            font-size: 1.2em;
            margin-bottom: 8px;
            text-align: ' . htmlspecialchars($alignment) . ';
        }
        .smartshare-icons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: ' . htmlspecialchars($alignment) . ';
            align-items: center;
        }
        .smartshare-icons a { position: relative; }
        .smartshare-icons a img {
            width: 40px;
            height: 40px;
            transition: transform 0.2s;
        }
        .smartshare-icons a:hover img { transform: scale(1.1); }
        .smartshare-icons .count-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background: red;
            color: white;
            font-size: 0.65em;
            width: 18px;
            height: 18px;
            line-height: 18px;
            text-align: center;
            border-radius: 50%;
            padding: 0;
        }
        .smartshare-total-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    font-size: 12px;
    color: #444;
    line-height: 1.2;
    margin: 5px 0;
}
.smartshare-total-info div:first-child {
    font-size: 11px;
    font-style: italic;
}
.smartshare-total-info div:last-child {
    font-size: 14px;
    font-weight: bold;
}
        .hidden-icon { display: none !important; }
    </style>';

    $out .= '<div class="smartshare-wrapper">';
    $out .= '<div class="smartshare-label">' . htmlspecialchars($label) . '</div>';
    $out .= '<div class="smartshare-icons" id="smartshareIcons">';
    $out .= '<div class="smartshare-total-info">
                <div>Shares:</div>
                <div style="font-weight:bold">' . $total . '</div>
            </div>';

    $i = 0;
    foreach ($defaultOrder as $key) {
        if (!empty($config['enable_' . $key]) && isset($platforms[$key])) {
            $link = $platforms[$key];
            $class = ($i >= $maxDefaultIcons) ? ' class="smartshare-btn hidden-icon"' : ' class="smartshare-btn"';
            $out .= '<a href="' . $link . '" target="_blank" rel="noopener"' . $class . ' onclick="smartshareTrack(\'' . $key . '\')" title="Share on ' . ucfirst($key) . '">';
            $out .= '<img src="' . $iconPath . $key . '.png" alt="' . ucfirst($key) . '">';
            if ($showCounts && isset($counts[$key])) {
                $out .= '<span class="count-badge">' . $counts[$key] . '</span>';
            }
            $out .= '</a>';
            $i++;
        }
    }

    $out .= '<a href="#" onclick="toggleIcons(); return false;" title="Show more/less">
                <img src="' . $iconPath . 'more.png" alt="Toggle">
            </a>';
    $out .= '</div></div>';

    // popup rekkefølge fra follow_order
    $popupOrder = array_map('trim', explode(',', strtolower($config['follow_order'] ?? '')));
    $popupPlatforms = array_filter($popupOrder, fn($p) => !empty($config['follow_' . $p]));
    $popupJS = [];
    foreach ($popupPlatforms as $p) {
        $popupJS[] = "                $p: '" . addslashes(trim($config['follow_' . $p])) . "'";
    }

    $out .= '<script>
        function smartshareTrack(platform) {
            const url = encodeURIComponent(window.location.href);
            const img = new Image();
            img.src = "' . XOOPS_URL . '/modules/smartshare/track.php?platform=" + platform + "&url=" + url;
            showSharePopup();
        }

        function toggleIcons() {
            const hidden = document.querySelectorAll(".smartshare-btn.hidden-icon");
            const visible = document.querySelectorAll(".smartshare-btn:not(.hidden-icon)");
            if (hidden.length > 0) {
                hidden.forEach(el => el.classList.remove("hidden-icon"));
            } else {
                visible.forEach((el, i) => {
                    if (i >= ' . $maxDefaultIcons . ') el.classList.add("hidden-icon");
                });
            }
        }

        function showSharePopup() {
            const config = {
' . implode(",\n", $popupJS) . '
            };

            const overlay = document.createElement("div");
            overlay.id = "smartshare-overlay";
            overlay.style.cssText = `
                position: fixed;
                top: 0; left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.5);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 9999;
            `;

            const box = document.createElement("div");
            box.style.cssText = `
                background: white;
                border-radius: 10px;
                max-width: 500px;
                width: 90%;
                text-align: center;
                overflow: hidden;
                box-shadow: 0 0 20px rgba(0,0,0,0.3);
                position: relative;
                font-family: sans-serif;
            `;

            const header = document.createElement("div");
            header.textContent = "Thanks for sharing!";
            header.style.cssText = "background: #4CAF50; color: white; font-size: 1.3em; padding: 20px;";

            const close = document.createElement("div");
            close.textContent = "\u2715";
            close.style.cssText = `
                position: absolute;
                top: 10px;
                right: 15px;
                font-size: 1.2em;
                color: white;
                cursor: pointer;
            `;
            close.onclick = () => overlay.remove();

            const content = document.createElement("div");
            let anyLinks = false;
            let iconsHTML = "";

            for (const platform in config) {
                const link = config[platform];
                if (link) {
                    anyLinks = true;
                    iconsHTML += `
                        <a href="${link}" target="_blank" rel="noopener">
                            <img src="' . XOOPS_URL . '/modules/smartshare/images/icons/square/${platform}.png" alt="${platform}" style="width: 40px;">
                        </a>
                    `;
                }
            }

            if (anyLinks) {
                content.innerHTML = `
                    <p style="margin: 20px 0 10px;">Follow us</p>
                    <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 15px; margin-bottom: 20px;">
                        ${iconsHTML}
                    </div>
                `;
            } else {
                content.innerHTML = `<p style="margin: 20px;">We appreciate your support!</p>`;
            }

            box.appendChild(header);
            box.appendChild(close);
            box.appendChild(content);
            overlay.appendChild(box);
            document.body.appendChild(overlay);
        }
    </script>';

    return $out;
}
