=== Web Testimonials ===
Contributors: plumwd
Donate link: http://www.plumeriawebdesign.com
Tags: testimonials, shortcodes, reviews, ratings
Requires at least: 2.0.2
Tested up to: 3.4.1
Stable Tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Web Testimonials is a plugin for managing testimonials placed on your WordPress site. 

== Description ==

Testimonials is a plugin for managing testimonials placed on your WordPress site. It has full features and shortcode ability for display in posts, widgets, pages, and other areas of your site. The plugin also has several features that allow for customization of the display.

== Installation ==

1. Download and unzip the file.
2. Place the entire contents of the directory into your `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. Add a testimonial screenshot-1.jpg
2. Edit a testimonial screenshot-2.jpg
3. Example Usage 1 - Full page listing screenshot-3.jpg
4. Example Usage 2 - Single testimonial in a rotating box screenshot-4.jpg


== Shortcode Usage ==

1. To add testimonials to your posts, pages, or widgets use the following code:
    [plumwd-testimonials]
2. To add the testimonials plugin to your WordPress theme use the following code inside your template: `echo do_shortcode('[plumwd-testimonials]');`

The plugin also supports several attributes for the shortcode, below is a listing of the attributes and what their purpose is: 

1.  size -> this allows you to limit the number of characters returned using the plugin. It will display the first nth number that you specify. Usage:
    [plumwd-testimonials size="100"]
    
2.  ending -> this allows you to specify an ending for your testimonial. This comes in handy when limiting the number of characters returned. Usage:
    [plumwd-testimonials ending="..."]
    
3.  num -> this allows you to limit the number of testimonials returned, leave blank to retrieve them all. Usage:
    [plumwd-testimonials num="3"]
    
4.  type -> allows you to specify how you want the list to be displayed. The available options are: list, para, span, div. By default testimonials will display as an unordered list. Usage:
    [plumwd-testimonials type="list"]
    
5.  class -> this allows you to apply a class to the item container so that you can apply custom styles. Usage:
    [plumwd-testimonials class="test"]
    
6.  id -> this allows you to apply an id to the item container. Usage:
    [plumwd-testimonials id="testimonials"] 

7.  childclass -> this applies only to the list item. Setting childclass will place a class on the li element. Usage:
    [plumwd-testimonials childclass="slides"]


== Frequently Asked Questions ==

For help please visit http://www.plumeriawebdesign.com
