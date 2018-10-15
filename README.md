# davidsonlands-theme
WP theme for the Davidson Lands Conservancy

Uses [understrap](https://github.com/understrap/understrap/), based on [underStrap-child](https://github.com/understrap/understrap-child)


### Instructions for local Wordpress development

1. Install Apache/PHP/MySQL

* [Mac](https://coolestguidesontheplanet.com/?s=php+mysql+mac)
* [Win](https://www.google.com/search?q=php+mysql+windows)
* [Linux](https://www.google.com/search?q=install+php+mysql+linux+desktop)

2. [Edit your Apache configuration file](https://stackoverflow.com/a/9625465/441878) so your user is the default server user.

3. [Install Wordpress](https://codex.wordpress.org/Installing_WordPress) in `Sites/davidsonlands.org/`

4. [Install Wordpress importer plugin](https://wordpress.org/plugins/wordpress-importer/)

5. Import data from current site (get this from Owen)

5. Install understrap main theme (get this from Owen) in `~/Sites/davidsonlands.org/wp-content/themes/`

6. Clone this repo

```
cd ~/Sites/davidsonlands.org/wp-content/themes/
git clone https://github.com/omundy/davidsonlands-theme.git
```
