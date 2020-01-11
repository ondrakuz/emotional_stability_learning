1. Clone to /var/www/ (in windows [wamp_directory]/www/)
   git clone https://github.com/ondrakuz/emotional_stability_learning.git

2. Create and import database (emotional_stability_learning/emotions.sql)
   (from https://www.fullstackpython.com/blog/install-mysql-ubuntu-1604.html)
   sudo apt-get install mysql-server
   sudo mysql_secure_installation

   mysql -u root -p
   mysql> GRANT ALL PRIVILEGES ON * . * TO 'emotions'@'localhost';
   mysql> FLUSH PRIVILEGES;
   exit

   (from https://www.quora.com/How-can-I-run-SQL-file-in-Ubuntu)
   mysql -u emotions -p
   mysql> CREATE DATABASE emotions;
   mysql> use emotions;
   mysql> source /var/www/emotional_stability_learning/emotions.sql

3. Set DB connection(emotional_stability_learning/administrator/cfg/sql.php)

4. Add the line to /etc/hosts (in windows windows/system32/drivers/etc/hosts as administrator)

5. Configure virtualhost

6. Restart apache
