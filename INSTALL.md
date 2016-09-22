# Install bash script

:' This script is a valid Markdown document and bash script in its raw form. Script should be run partly (in paragraphs) to add occasional keyboard input and handle errors that may come up due to different server configuration.'

:' This is a dev install, please ask your server admin to set it up securely.'

    git clone https://github.com/cdtcrnagora/konfliktiinteresa.git
    cd konfliktiinteresa
    
    sudo apt-get mysql-server mysql-client apache2 apache2 php5 php5-mysql
    
    mysql -u root -p
    # CREATE DATABASE ki CHARACTER SET = 'utf8';
    # CREATE USER 'ki'@'localhost' IDENTIFIED BY 'ki';
    # GRANT ALL PRIVILEGES ON ki.* TO 'ki'@'localhost';
    # FLUSH PRIVILEGES;
    # \q
    
    mysql ki -u ki -p < DB/konfliktiinteresa_me.sql
    # you need MySql 5.6 if you got error Unknown collation: 'utf8mb4_unicode_520_ci'
    
    vim WP/wp-config.php
    # and set the config (database details mainly)
    
    # setup web server
    
    # TODO how to login?
