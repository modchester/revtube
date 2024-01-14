# RevTube Documentation
## Section 1 - How to install & basic setup
To setup RevTube:
- Clone the [Github Repo](https://github.com/ars0nstudios/revtube) into your webservers public_html or htdocs folder (on Linux, it's usually /var/www/html, but it could be something different)
- Make a new SQL database
- Import the SQL file located at `sql/db.sql` into your database
- Edit the file `assets/mod/db.sample.php` to include your database credentials, ffmpeg/ffprobe path, and Discord webhook (optional), then rename it to `db.php`
- Edit the file `assets/mod/branding.sample.php` and set the site name and logo variables, then rename it to `branding.php`
 
If all these steps were followed correctly, your instance should look like this:
![RevTube: Empty instance](https://user-images.githubusercontent.com/124375533/219940862-bfaf7a1e-46c2-4bbd-bdd3-655f424cfe29.png)
## Section 2 - Prepare for production environment
Now that your instance is setup, you might want to make some changes to your configuration file. To disable the debugging statistics header:
Open the file `assets/mod/db.php` and set `$debug` to false in the file. Now, for uploading things to work, you'll need to make a few directories. At the root of the folder you extracted the source to in the first step, make a folder called `content`. Now, navigate to that folder and create the following directories: `background`, `pfp`, `thumb`, `tmp`, `unprocessed`, and `video`. If you do not make these directories, things like profile pictures, channel backgrounds, thumbnails, and video uploading will not work.
# THIS DOCUMENTATION IS NOT YET FINISHED!
It is not recommended to follow this at the moment as steps might change.

