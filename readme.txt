=== Briefinglab Sponsor CMS ===
Contributors: Briefinglab, Luca Maroni
Donate link: http://briefinglab.com
Tags: Wordpress, Sponsor, Manage Slide Content, Simply Sponsor CMS
Requires at least: 3.9.1
Tested up to: 4.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin to manage content of your sponsor/s. No mix between content and view. just manage the content and then optimize your output. only for developers that are not interested to integrate complex and heavy adn not performat sponsors.

== Description ==
OK there are a lot of plugins to manage your sponsors. Plugins full of effects and very nice features, really impressive. But when you install them you have tons of features and tons of JS included that you really need? always?
and what about performance?

This plugin give you a CMS section to manage the sponsor content with the usual and very well known WordPress paradigm. Then it will provide you the possibility to implement
your own HTML and JS in a very structured way. It tries to make order between content and views.

You can create a slide like a post. you can organize sponsors categorizing more post with the same category.

Then you can print out your sponsor using the default HTML provided (bootrstrap carousel) or make your own HTML overwriting two simple templates:
start-sponsor
end-sponsor
item-sponsor

Uou can then integrate a sponsor in your theme or into your post content using a simple shortcode
[bl-sponsor category="homepage" limit="10"]

You can override the HTML output by category using
start-sponsor-category-slug
end-sponsor-category-slug
item-sponsor-category-slug

You can also override the HTML output for a single page
start-sponsor-page-slug
end-sponsor-page-slug
item-sponsor-page-slug

You can also override the HTML output for different sponsor in the same page (you have to add template-slug also in the short code [bl-sponsor category="homepage" template="template-slug"])
start-sponsor-template-slug
end-sponsor-template-slug
item-sponsor-template-slug

Overwrite template priority
template-slug
page-slug
category-slug
default