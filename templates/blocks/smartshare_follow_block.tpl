<link rel="stylesheet" href="<{$xoops_url}>/modules/smartshare/style/smartshare-style.css">

<{if $block.icons}>
  <div class="smartshare-follow-container">
    <h3 class="smartshare-follow-title">Follow us!</h3>
    <div class="smartshare-follow-icons">
      <{foreach from=$block.icons item=icon}>
        <a href="<{$icon.url}>" target="_blank" rel="noopener" style="margin-bottom: 5px; display: inline-block;">

          <img src="<{$icon.icon}>" alt="<{$icon.name}>" class="smartshare-follow-icon">
        </a>
      <{/foreach}>
    </div>
  </div>
<{else}>
  <div>No social profiles configured.</div>
<{/if}>
