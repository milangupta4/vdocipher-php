Sample Code for VdoCipher in PHP

There are 4 PHP files. `index.php` is the main file, and calls the 3 functions in the remaining files.

`vdo_init.php` contains all details such as VideoId, Client Secret Key and Annotation code. This is the only file that users have to edit.

`vdo_otp.php` uses this information to generate OTP

`vdo_play.php` uses OTP response to create embed code
