# MARIADB INSTALLATION ON FEDORA

```
sudo yum remove mariadb mariadb-server
sudo rm -rf /var/lib/mysql
```

```
yum install mariadb mariadb-server
```

```
systemctl start mariadb.service
systemctl status mariadb.service
```

```
sudo mysql -u root
CREATE USER 'portfolio'@'localhost' IDENTIFIED BY 'portfolio';
CREATE DATABASE portfolio;
GRANT ALL PRIVILEGES ON portfolio.* TO 'portfolio'@'localhost';
```