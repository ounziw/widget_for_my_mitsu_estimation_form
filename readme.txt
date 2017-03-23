=== Widget for My Mitsu Estimation Form ===
Contributors: ounziw
Donate link: http://pledgie.com/campaigns/8706
Description: You can put an estimation(calculation) form in a widget area, provided by a webservice in Japan called My Mitsu.
Tags: widget, estimation, calculation
Requires at least: 2.8
Tested up to: 4.7.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin allows users to put a My Mitsu form in your website's widget area.

== Description ==

My Mitsu, is a webservice in Japan, allows users to create an estimation(calculation) form. A powerful form allows you to create a conditional form with calculation, and outputs a PDF file. It is suited for business persons.
https://my-mitsu.com/ (written in Japanese.)

This plugin allows you to output an iframe html tag which displays a my mitsu form in your website's widge area.

* Note * In order to create an estimation form, you need to register My Mitsu https://my-mitsu.jp/register .


Filter Sample

This plugin allows you to set your default values for URL, ID, width, and height. You can alter them by hooking the "mymitsu_widget_default_***" filter. Here is a sample code.

`add_filter( 'mymitsu_widget_default_width', 'my_widget_default_width' );
 function my_widget_default_width() {
     return 400;
 }`

== Installation ==

1. Install a plugin and activate it
1. Upload `shortcode_for_my_mitsu_estimation_form' to the `/wp-content/plugins/` directory

== Changelog ==

= 1.0 =
* initial release