Briefinglab Sponsor CMS
===============

OK there are a lot of plugin to manage your sponsors. Plugins full of effects and very nice feature, really impressive. But ok when you install it you have tons of features and tons of JS included that yo really need? always?
This plugin give you a CMS section to manage the sponsor content with the usual and very well known WordPress structure. Then it will provide you the possibility to implement
your own HTML and JS in a very structured. It tries to make order between content and views.
you can create a slide like a post. you can organize sponsors categorizing more post with the same category.
then you can print out your sponsor using the default HTML provided (bootrstrap carousel) or make your own HTML overwriting two simple templates:
bl-sponsor-container
bl-sponsor-item

you can then integrate a sponsor in your theme on in your post content using a simple shortcode
[bl-sponsor category="homepage"]

you can override the output also by category using
bl-sponsor-container-category-slug
bl-sponsor-item-category-slug

you can also override the output for a single page
bl-sponsor-container-page-slug
bl-sponsor-item-page-slug

you can also override the output for different sponsor in the same page (you have to add template-slug also in the short code [bl-sponsor category="homepage" template="template-slug"])
bl-sponsor-container-template-slug
bl-sponsor-item-template-slug

overwrite priority
=======
Briefinglab News CMS
===============

This plugin give you a CMS section to manage the news, events and fair content with the usual and very well known WordPress paradigm. Then it will provide you the possibility to implement
your own HTML and JS in a very structured way. It tries to make order between content and views.

You can create a news, event or fair like a post.

Then you can print out your news list using the default HTML provided (bootrstrap carousel) or make your own HTML overwriting two simple templates:
start-news
end-news
item-news

Uou can then integrate a news list in your theme or into your post content using a simple shortcode
[bl-news category="homepage" limit="10"]

You can override the HTML output by category using
start-news-category-slug
end-news-category-slug
item-news-category-slug

You can also override the HTML output for a single page
start-news-page-slug
end-news-page-slug
item-news-page-slug

You can also override the HTML output for different news list in the same page (you have to add template-slug also in the short code [bl-news category="homepage" template="template-slug"])
start-news-template-slug
end-news-template-slug
item-news-template-slug

Overwrite template priority
>>>>>>> 223db611dc7897fa092ae905c6557772dc048331
template-slug
page-slug
category-slug
default