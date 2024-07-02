# compfest
README: 

This project uses a local database with MySQL.
So first, need to download the database named seasalon.sql in the GitHub link. And then export it to http://localhost/phpmyadmin
Then the website should work, it can be opened at http://localhost/compfest/Index.PHP

If the PHP is not working, try to check httpd.conf file on xampp/apache/conf. Then change 
DocumentRoot "C:/xampp/htdocs"
<Directory "C:/xampp/htdocs">

into the folder name where the file is.

If the file in the Github folder, like my file, can replace the document root and directory into 
DocumentRoot "C:/GitHub"
<Directory "C:/GitHub">

Hope this project can work well on the other computer. Thank you
