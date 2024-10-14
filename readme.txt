=== Link Shield ===
Contributors: j.conti
Author URI: http://wangguard.com
Tags: linkshield, link shield, block links, hide links, Tasa Google, Google Tax, AEDE, Canon AEDE, CEDRO, buddypress, bbpress, WordPress Multisite, hide text, hide block text, hide videos
Requires at least: 3.0
Tested up to: 4.1
Stable tag: 0.6.0
License: GPLv2

This plugin hide links to articles published by members of Spain's newspaper association with AEDE and CEDRO. Link Shield is a Must-have plugin


== Description ==

Attention: In a near future, we will add a lot of tools for manage any link to anywhere on your website.

Recently Spain passed a law that taxes any site that links to articles published by members of Spain's newspaper association with association with AEDE and CEDRO.

The law has been nicknamed the "Google Tax" because it specifically targets Google News, as well as other news aggregation systems.

If you have links to that newspapers, a user add a link on your comments, on your BuddyPress or bbPress, you are a candidate for having to pay the tax. If you have links to that website, and you are not paying that tax, you can be fined from 3,000€ to 30,000€ for every link found on your website.

This plugin hide links from all your post, comments, BuddyPress activity and bbPress forum to CEDRO and AEDE members.

This plugin don't make database modifications, so is it is deactivated, all links appear again.

On september, AEDE and CEDRO will start to look for backlinks to their associates, so now is the moment to install this plugins for remove the links from your website, community or forum.

There are 86 important newspapers associated with AEDE and CEDRO, so is very easy that you have some links to the newspapers.

You can learn about this on this sites:

 - [IFA MAGAZINE](http://www.ifamagazine.com/news/spain-s-google-tax-could-kill-facebook-and-twitter-update-303398)
 - [BUSSINESS INSIDER](http://www.businessinsider.com/spain-google-tax-2014-7)
 - [TECHDIRT](https://www.techdirt.com/articles/20140728/06561628035/spain-likely-to-pass-google-tax-makes-paying-news-snippets-inalienable-right-new-bureaucracy-to-collect-it.shtml)
 - [THE GUARDIAN](http://www.theguardian.com/media/greenslade/2014/jul/29/google-spain)
 - [INTERNATIONAL BUSINESS TIMES](http://www.ibtimes.com/spains-google-tax-law-reaction-silicon-valleys-international-tax-evasion-1642112)
 - [QUARTZ]( http://qz.com/241005/nobody-seems-quite-sure-how-spains-new-google-tax-will-work/)
 - [THE SIDNEY MORNING HERALD]( http://www.smh.com.au/technology/technology-news/under-spains-google-fee-law-news-aggregators-must-pay-publishers-20140728-zxhv1.html)


Features:
--------

 * Valid HTML
 * I18n language translation support
 * Custom text for hidden links

Requirements/Restrictions:
-------------------------
 * Works with Wordpress 2.0+, WPMU 2.0+, and BuddyPress 2.0+ (Wordpress 3.9.1+ is highly recommended)
 * PHP 4.3 or above. (PHP 5+ is highly recommended)


== Installation ==

1. Upload the "link-shield folder to the "/wp-content/plugins/" directory, or download through the "Plugins" menu in WordPress

2. Activate the plugin through the "Plugins" menu in WordPress

3. Updates are automatic. Click on "Upgrade Automatically" if prompted from the admin menu. If you ever have to manually upgrade, simply deactivate, uninstall, and repeat the installation steps with the new version.



== Screenshots ==

1. **Settings** - Lnk Shield Settings.


== Configuration ==

If you want, you can customize the hidden link text.

== Usage ==


== Changelog ==

= 0.6.0 - October 14, 2024 =

- Security bug: Fixed a Cross Site Request Forgery (CSRF)
- Code is Poetry

= 0.5.4 - March 22, 2015 =

- Added the ability to add custom text to show with shordcode when the user is not logged in.
- Added compatibility with WPML and Polylang (Non WordPress Multisite).

= 0.5.3.1 - March 22, 2015 =

- Compatibility update

= 0.5.3 - March 22, 2015 =

- Fic a problem when there is 2 AEDE links in the same '<p>' tag.

= 0.5.2 - 5 Aug 2014 =
- Now subdomains are blocked.

= 0.5.1 - 4 Aug 2014 =
- reuploaded. There was a problem with 0.5.0

= 0.5.0 - 4 Aug 2014 =
- Now links are removed from "the_excerpt".
- Now links are removed from RSS feeds.
- Now links are removed from BuddyPress RSS feeds.
- Now links are removed from BuddyPress group description.
- Now links from BuddyPress activity comments are removed.
- Fixed a problem where was blocked domains that have incomplete domain string, ex: blocking foo.com was blocked foofoo.com

= 0.4.1 - 3 Aug 2014 =
- Added Link Shield options remove when Link Shield is removed from WordPress Plugins Screen.

= 0.4.0 - 2 Aug 2014 =
- Added ability to add rel='nofollow' to reply comments link.
- fixed setting page design.

= 0.3.0 - 1 Aug 2014 =
- Added ability to select how to hide links
- Added Shordcode for hide text, text blocks, links, videos, etc. The shordcode name can be customized.

= 0.2.0 - 31 Jul 2014 =
- Added the ability of custimize text for hidden links (WordPress Settings Menu)

= 0.1.0 - 31 Jul 2014 =
- Initial Release

