# davidsonlands-theme
WP theme for the Davidson Lands Conservancy

Uses [understrap](https://github.com/understrap/understrap/)
Based on [underStrap-child](https://github.com/understrap/understrap-child)


### Instructions for local Wordpress development

1. Install Apache/PHP/MySQL

* [Mac](https://coolestguidesontheplanet.com/?s=php+mysql+mac)
* [Win](https://www.google.com/search?q=php+mysql+windows)
* [Linux](https://www.google.com/search?q=install+php+mysql+linux+desktop)

Then, [edit your Apache configuration file](https://stackoverflow.com/a/9625465/441878) so your user is the default server user.


2. [Install Wordpress](https://codex.wordpress.org/Installing_WordPress) in `Sites/davidsonlands.org/`

3. Import sql data (get this from Owen)

4. Install understrap main theme (get this from Owen) in `~/Sites/davidsonlands.org/wp-content/themes/`

5. Clone this repo into ``

```
cd ~/Sites/davidsonlands.org/wp-content/themes/
git clone https://github.com/understrap/understrap-child.git
```
