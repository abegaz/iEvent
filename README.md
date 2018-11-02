# iEvent
Project objective: To develop a secure and usable online event management system to enable users post events and invite participants. 

  Local Installation Via Xampp
|-------------------------------|

1) Download and install Xampp

2) In C:\Xampp\htdocs (Or wherever you installed it) DELETE everything inside of the htdocs folder.

3) Pull the latest master branch from github

4) Copy the two folders inside of src\public_html directly into the now empty htdocs folder

5) Start up Xampp's Apache and MySQL

6) Go into the MySQL phpmyadmin page (by clicking on admin)

7) In the base server page click import
    **You'll know you're in the base server page if at the top left it only says "Server:127.0.0.1"
    
8) Click Choose File and navigate to the 127.0.0.1.sql file you just downloaded from the gihub repository
    Then click Go towards the bottom left to import the current database
    
9) Now in your browser go to localhost/ievent


Please let me know what errors come up. I initially had a lot of errors pop up when transfering it to the local side.
Some easy ones to fix: 
  If an image is not loading, it's probably because the server doesn't like the ../ notation. to fix it you'll   
  have to find the page that it is being loaded from and change all of the ../ to <php echo site_url() ?>/images/

  If a page displays straight php text, go to the view that is loaded and anywhere you see <? change it to <?php

That took care of the majority of my errors.
