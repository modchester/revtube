# Revista Documentation
## Section 1 - How to install & basic setup
To setup Revista:
- Clone the <a href="https://github.com/cosmixcode/revtube">GitHub Repo</a> into your webservers public_html or htdocs folder (on Linux, it's /var/www/html)
- Make a new SQL database
- Import the SQL file located at `sql/db.sql` into your database
- Edit the file `assets/mod/db.php` to include your database credentials
 
If all these steps were followed correctly, your instance should look like this:
<img src="https://cdn.discordapp.com/attachments/922921777909342228/1076222537815560292/image.png" width="720px">
## Section 2 - Prepare for production environment
Now that your instance is setup, you might want to make some changes to your configuration file. To disable the debugging statistics header:
Open the file `assets/mod/db.php` and set `$debug` to false in the file.
<h1>THIS DOCUMENTATION IS NOT YET FINISHED</h1>
