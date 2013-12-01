=== Visual Editor Biography ===
Contributors: kevinlearynet
Tags: profile, biography, bio, rich, text, editor, wysiwyg, tinymce, wpeditor, visual, editor, biographic, info, description, profile biography, profile description, rich text, TinyMCE, user, user profile, users, author
Requires at least: 3.3.0
Tested up to: 3.3.1
Stable tag: trunk

Replaces the author "Biographical Info" profile field with a TinyMCE visual editor. 

== Description ==

Replaces the *Biographical Info* profile field with the WordPress visual editor, TinyMCE, allowing you to editor an author's biography using rich text.

Please note that this plugins modifies the output of `get_the_author_meta('description')` and `the_author_meta('description')`, apply the same filters used to format content in the main editor.

= Multisite Compatibility =

The *Visual Editor Biography* plugin is compatibly with WordPress Multisite, just use the [Network Activate](http://codex.wordpress.org/Create_A_Network#WordPress_Plugins) feature to enable a visual editor on every site. If you only want a visual editor for a specific site then activate the plugin for that site only.

== Installation ==

1. Install easily with the WordPress plugin control panel or manually download the plugin and upload the folder `visual-editor-biography` to the `/wp-content/plugins/` directory 
2. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. The TinyMCE visual editor added to the *Users > Profile* page
2. The formatted front end view for `get_the_author_meta('description')` and `the_author_meta('description')`

== Changelog ==

= 1.4 =
* Check for 'edit_posts' capability instead of 'contributor' for accurate role checks
* Remove 'the_content' filters from get_the_author_description() function and instead add filters individually to avoid future conflicts with other plugins: `wptexturize()`, `wpautop()` and `convert_chars()`. Thanks to [Matt Wiebe](http://somadesign.ca/) for making this great suggestion.

= 1.3 =
* Restrict the rich text editing profile switch to contributor level users or higher for security
* Add current_user_can() restrictions for added security throughout plugin

= 1.2 =
* Fix issue with JS loading on user-edit.php; when administrators edit other people's bio's

= 1.1 =
* Updates and bug fixes for older WordPress versions
* Add plugin Banner to /assets/ folder for WordPress repository

= 1.0 =
* Initial public release to the WordPress plugin repository