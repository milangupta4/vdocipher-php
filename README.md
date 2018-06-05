Sample Code for VdoCipher in PHP

There are 2 PHP files. `index.php` is the main file, and calls the 1 functions, vdo_embed_code, which returns the embed code.

In `index.php` user has to only send video ID as argument to vdo_embed_code

In `vdo_embed.php` user has to configure the client secret key. The time-to-live parameter is set to 300s here.

The idea of this file is to create a single embed code, as given in index.php, which user can use as part of their PHP view.

I have not yet added customizations such as watermark, IP-geo restrictions and URL whitelisting as part of this yet.
