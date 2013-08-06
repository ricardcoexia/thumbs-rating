=== Thumbs Rating ===
Contributors: quicoto
Tags: rating, thumbs, votes
Requires at least: 3.5
Tested up to: 3.6
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Thumbs Rating does what you'd expect. It allows you to add a thumbs up/down to your content (posts, pages, custom post types...).

== Description ==

I needed a simple and light plugin to add Thumbs Rating, I couldn't find any so I built my own.

This plugin allows you to add a thumb up/down rating to your content. It shows the thumbs on any Post, Page or Custom Post Type. Actually it uses the filter the_content to add the buttons.

The output is very basic, no images, no fonts, no fancy CSS. Customize the ouput overriding the CSS classes in your style.css file.

= Features =

*   Stores the votes values for each content.
*	Easy to customize the output using CSS.

= Requests =

Feel free to post a request but let's keep it simple and light. All the plugin functions can be easily overriden from your functions.php file.

= Patches are welcome =

I welcome any contributions to the plugin. At long as we keep it light and simple.

Add some love on Github https://github.com/quicoto/thumbs-rating

== Installation ==

Activate the plugin and enjoy!

== Frequently Asked Questions ==

= Can I customize the colors? =

Absolutely. Check out the CSS within the plugin (thumbs-rating/css/style.css) and override the classes from your theme style.css file.

= Can I chose where to output the Thumbs? =

Yes you can. 

1) First of all override the print function, add this line to your functions.php file:

`function thumbs_rating_print(){}`

2) Use the get function wherever you want:

`<?= thumbs_rating_getlink() ?>`

== Screenshots ==

1. Basic output with the default CSS.

== Changelog ==

= 1.0 =
* First release.

== Upgrade Notice ==

= 1.0 =
First release, you'll love it.
