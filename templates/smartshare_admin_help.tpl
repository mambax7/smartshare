

<div class="help-section">
  <h2>SmartShare – Help & Tips</h2>
  
  <{literal}>
Smartshare is very easy to implement. Just place the following code in a template where you want the share icons to show: <b><{$smartshare_icons}></b>
<{/literal}>


  <p><strong>Facebook Sharing:</strong><br>
  Facebook's <code>sharer.php</code> link only works reliably for personal profiles. It does <strong>not</strong> open the share dialog correctly for Facebook Pages or Business accounts unless you have a published Facebook App and advanced permissions via the Facebook Graph API.</p>

  <p>For simplicity and reliability, we use:<br>
  <code>https://www.facebook.com/sharer/sharer.php?u=...</code></p>

  <p>If users report issues where "nothing happens" when clicking the share icon, it may be due to:</p>
  <ul>
    <li>Trying to share as a Facebook Page</li>
    <li>Browser settings or popup blockers</li>
    <li>Lack of a published Facebook App with required permissions</li>
  </ul>

  <hr>

  <p><strong>Snapchat:</strong><br>
  Snapchat sharing may require the Snapchat mobile app or desktop installation. On desktop, support is limited.</p>

  <p><strong>Other Tips:</strong></p>
  <ul>
    <li>Icons can be reordered in module preferences</li>
    <li>You can add profile URLs for the popup/follow section</li>
    <li>Some platforms require HTTPS for sharing to work</li>
  </ul>

  <p>Thanks for using SmartShare!</p>
</div>


