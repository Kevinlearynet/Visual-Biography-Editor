=== Visual Editor Biography ===
Contributors: kevinlearynet
Tags: profile, biography, bio, rich, text, editor, wysiwyg, tinymce, wpeditor, visual, editor, biographic, info, description, profile biography, profile description, rich text, TinyMCE, user, user profile, users
Requires at least: 3.3.0
Tested up to: 3.3.1
Stable tag: trunk

Replaces the author "Biographical Info" profile field with a TinyMCE visual editor. 

== Description ==

Replaces the *Biographical Info* profile field with a TinyMCE visual editor, allowing you to editor an author's biography using rich text. 

Please note that this plugins modifies the output of `the_author_description()` and `get_the_author_description()`, apply the same filters used to format content in the main editor.

== Installation ==

1. Install easily with the WordPress plugin control panel or manually download the plugin and upload the folder `visual-editor-biography` to the `/wp-content/plugins/` directory 
1. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. The TinyMCE visual editor added to the *Users > Profile* page
2. The formatted front end view for `the_author_description()` and `get_the_author_description()`

== Changelog ==

= 1.2 =
* Fix issue with JS loading on user-edit.php; when administrators edit other people's bio's

= 1.1 =
* Updates and bug fixes for older WordPress versions
* Add plugin Banner to /assets/ folder for WordPress repository

= 1.0 =
* Initial public release to the WordPress plugin repository