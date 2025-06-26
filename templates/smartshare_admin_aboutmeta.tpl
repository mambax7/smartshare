<h2>About Meta Tags</h2>

<p>
SmartShare automatically retrieves <strong>Open Graph</strong> and <strong>Twitter Card</strong> metadata from the <code>&lt;head&gt;</code> section of your XOOPS theme. This allows sharing on social media to work seamlessly — but only if the correct meta tags are in place.
</p>

<h3>Recommended setup for the Publisher module:</h3>

<pre>
&lt;{if $xoops_dirname == "publisher"}&gt;
    &lt;title&gt;&lt;{$item.title}&gt;&lt;/title&gt;
    &lt;meta name="keywords" content="&lt;{$xoops_meta_keywords}&gt;" /&gt;
    &lt;meta name="description" content="&lt;{$xoops_meta_description}&gt;" /&gt;
    &lt;meta property="og:title" content="&lt;{$item.title}&gt;" /&gt;
    &lt;meta property="og:description" content="&lt;{$xoops_meta_description}&gt;" /&gt;
    &lt;meta property="og:image" content="&lt;{$item.image_path}&gt;" /&gt;
    &lt;meta property="og:image:type" content="image/jpeg"&gt;
    &lt;meta property="og:image:width" content="&lt;{$item.image_width}&gt;" /&gt;
    &lt;meta property="og:image:height" content="&lt;{$item.image_height}&gt;" /&gt;
    &lt;meta property="og:url" content="&lt;{$item.itemurl}&gt;" /&gt;
    &lt;meta property="og:type" content="website" /&gt;
    &lt;meta property="twitter:domain" content="YourDomain.com"&gt;
    &lt;meta property="twitter:url" content="&lt;{$item.itemurl}&gt;" /&gt;
    &lt;meta name="twitter:title" content="&lt;{$item.title}&gt;" /&gt;
    &lt;meta name="twitter:description" content="&lt;{$xoops_meta_description}&gt;" /&gt;
    &lt;meta name="twitter:image:src" content="&lt;{$item.image_path}&gt;" /&gt;
    &lt;meta name="twitter:card" content="summary_large_image" /&gt;
&lt;{/if}&gt;
</pre>

<p>
<strong>Note:</strong> Remember to replace <code>YourDomain.com</code> with your actual domain name.
</p>

<h3>Example meta tag setup for a custom module</h3>

<p>Insert the following code inside the <code>&lt;head&gt;&lt;/head&gt;</code> section of your theme template to enable social media sharing previews:</p>

<pre>
&lt;{if $xoops_dirname == "modulename"}&gt;
    &lt;title&gt;The title you want to show when sharing&lt;/title&gt;
    &lt;meta name="keywords" content="&lt;{$xoops_meta_keywords}&gt;" /&gt;
    &lt;meta name="description" content="The description you want to show when sharing" /&gt;
    &lt;meta property="og:title" content="The title you want to show when sharing" /&gt;
    &lt;meta property="og:description" content="The description you want to show when sharing" /&gt;
    &lt;meta property="og:image" content="https://yourdomain.com/modules/modulename/images/someimage.jpg" /&gt;
    &lt;meta property="og:image:type" content="image/jpeg"&gt;
    &lt;meta property="og:image:width" content="1200" /&gt;
    &lt;meta property="og:image:height" content="628" /&gt;
    &lt;meta property="og:url" content="https://yourdomain/modules/modulename/" /&gt;
    &lt;meta property="og:type" content="website" /&gt;
    &lt;meta property="twitter:domain" content="yourdomain.com"&gt;
    &lt;meta property="twitter:url" content="https://yourdomain/modules/modulename/" /&gt;
    &lt;meta name="twitter:title" content="The title you want to show when sharing" /&gt;
    &lt;meta name="twitter:description" content="The description you want to show when sharing" /&gt;
    &lt;meta name="twitter:image" content="https://yourdomain.com/modules/modulename/images/someimage.jpg" /&gt;
    &lt;meta name="twitter:card" content="summary_large_image" /&gt;
&lt;{/if}&gt;
</pre>

<p><strong>Note:</strong> Replace <code>modulename</code> with the actual module folder name, and <code>yourdomain.com</code> with your site's domain. Also remember to change the sizes of the image in the code to the size of the image you want to use.</p>

<h3>Tips:</h3>
<ul>
  <li>Add similar meta tags to any module where you want to enable sharing buttons.</li>
  <li>Test your meta tags using the <a href="https://developers.facebook.com/tools/debug/" target="_blank">Facebook Debugger</a> and the <a href="https://cards-dev.twitter.com/validator" target="_blank">Twitter Card Validator</a>.</li>
</ul>
