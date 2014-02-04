# Undone Theme

## Wordpress theme plugin dependancies
- [Advanced Ajax Page Loader](http://wordpress.org/plugins/advanced-ajax-page-loader/)
- [Advanced Custom Fields](http://www.advancedcustomfields.com/)
- [json API](http://wordpress.org/plugins/json-api/)

## Minimum Config
You need to have all the above wordpress plugins installed and active in order to run this theme properly. In addition you need to set up the proper custom fields.

Once Advance Custom Fields is installed go to "Custom Fields" in the left hand sidebar (when logged into wordpress admin).

Add a new field group, I called my "Music posts", but I'm pretty sure it can be anything. From there add two fields:

"Artist" -> "Field Name": artist, "Field Type": Text
"MP3" -> "Field Name": mp3, "Field Type": File, "Return Value": File URL

Permalinks should be set to Post name (under Settings > Permalinks).

### Adding posts

To add new tracks to the player make normal posts under "Posts". This should be "Audio" under the "Format" panel on the right side of the post window. They take the "Artist" and "MP3" custom field, and a featured image of 450x450.

Undone theme header

```CSS
/*
Theme Name: Undone
Theme URI: http://underscores.me/
Author: Justin Alm & Grey Vaisius
Author URI: http://underscores.me/
Description: Description
Version: 1.0
License: GNU General Public License
License URI: license.txt
Text Domain: undone
Domain Path: /languages/
Tags: minimal, music

This theme, like WordPress, is licensed under the GPL.
Use it to make something cool, have fun, and share what you've learned with others.

 Undone is based on Underscores http://underscores.me/, (C) 2012-2013 Automattic, Inc.
 */
```


## References

### jPlayer
- [jPlayer quickstart guide](http://www.jplayer.org/latest/quick-start-guide/)
- [jPlayer audioplayer ](http://www.jplayer.org/latest/demo-01/?theme=0)
- [jPlayer with jquery UI](http://www.jplayer.org/latest/demo-07/)
- [jPlayer text based player](http://www.jplayer.org/latest/demo-04/)
- [jPlayer as video playlist player](http://www.jplayer.org/latest/demo-02-video/)
- [jPlayer API reference](http://www.jplayer.org/latest/developer-guide/#jPlayer-play)
- [jPlayer add javascript for audio](http://www.jplayer.org/latest/quick-start-guide/step-7-audio/)
- [jPlayer API reference events](http://jplayer.org/latest/developer-guide/#jPlayer-event-use)
- [jPlayer events](https://gist.github.com/dyaa/6764748)
- [jPlayer setting height and width (didn't work)](http://stackoverflow.com/questions/9248805/how-to-set-width-and-height-to-jplayer)

### Wordpress
- [Wordpress get URL from ID](http://codex.wordpress.org/Function_Reference/get_permalink)
- [Wordpress JSON-API plugin docs](http://wordpress.org/plugins/json-api/other_notes/)
- [Wordpress plugin API actions & filters](http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters)
- [Wordpress API add_filter](http://codex.wordpress.org/Function_Reference/add_filter)
- [Wordpress API post formats](http://codex.wordpress.org/Post_Formats)

### Advanced Custom Fields
- [API documentation for get_field](http://www.advancedcustomfields.com/resources/functions/get_field/)

### Requirejs
- [RequireJS and wordpress jQuery](http://kaidez.com/requirejs-wordpress/#jquery-requirejs-wordpress)

### Wordpress add_filter
- [Wordpress add_filter on themeblvd](http://dev.themeblvd.com/tutorial/incorporating-post-formats/)
- [Yoast on custom post-types](http://yoast.com/custom-post-type-snippets/)
- [Using wordpress add_filter](http://programming-review.com/add_filter-hook/)
- [Getting started with wordpress post-types](http://webdesignledger.com/tips/getting-started-with-wordpress-post-formats)
- [Custom URLS for post-formats](http://justintadlock.com/archives/2012/09/11/custom-post-format-urls)

### Fonts
- [Fallbacks for icon fonts](https://github.com/filamentgroup/a-font-garde)

### Underscore
- [Finding the difference in two arrays](http://stackoverflow.com/questions/13147278/using-underscores-difference-method-on-objects)

### Helpful
- [Localhost JSON-API return URL](http://localhost:8888/undone.ca/api/get_recent_posts/)
