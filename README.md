# SmartShare for XOOPS CMS

**SmartShare** is a flexible XOOPS module that adds social sharing buttons and meta tag integration to your website. It supports a wide range of platforms and includes an admin interface for customization.

## Features

- Social media sharing buttons for 25+ platforms
- Local share count tracking (optional)
- Choose between round or square icon styles
- Configurable icon order and number of visible buttons
- Easy template integration using `<{$smartshare_icons}>`
- Post-share popup with follow links
- Admin panel for full control over settings
- Includes a "Follow Us" block
- Help system with guidance on sharing and meta tags

## Installation

1. Upload the `smartshare/` folder to your XOOPS `modules/` directory.
2. Log in to the XOOPS administration area.
3. Install the module via the Modules admin.
4. Go to Preferences to configure platforms, appearance, and popup behavior.

## Usage

To display share icons on your site, place this in any XOOPS template:

```html
<{$smartshare_icons}>
