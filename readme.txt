=== Plugin Name ===
Contributors: adam.ainsworth
Donate link: http://mesklin.net/
Tags: google tag manager, analytics, pixel
Requires at least: 3.0.1
Tested up to: 4.2.2
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This is a simple plugin that allows you to insert the Google Tag Manager container into your site.

== Description ==

Rather than manually inserting the scary code that Google Tag Manager provides, this plugin does it properly and puts it into the page in the correct Wordpress manner, and in the way that GTM expects.

Of course, you'll still need to put your tags and pixels into the container, via the GTM interface. You can use Tag Assistant(Chrome plugin) to check that everything looks how it should.

== Installation ==

1. Upload the `wp-tagman` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. An option will appear under Settings, allowing you to put your GTM container code in. The plugin won't run unless this is there.

== Frequently Asked Questions ==

= Where do I find my GTM code? =

In the list of containers, it is listed in the ID column, and will have the format GTM-XXXXXX

== Screenshots ==

1. The WP TagMan options screen
2. An example output from Google Tag Assitant (Chrome plugin)

== Changelog ==

= 0.1 =
Initial launch