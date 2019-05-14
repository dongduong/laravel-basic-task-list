# laravel-basic-task-list

## Tutorial:

https://blog.nojaf.com/2016/08/19/laradock-on-windows-10/

- laravel-basic-task
https://laravel.com/docs/5.2/quickstart#prepping-the-database

## ISSUES:

- *PDOException::("PDO::__construct(): The server requested authentication method unknown to the client [caching_sha2_password]")*

ROOT CAUSE: PHP is still not support authentication login as `caching_sha2_password` to Mysql 8

How to fix:
Create another user with `mysql_native_password` and change on .env
```
CREATE USER 'new_user'@'%' IDENTIFIED WITH mysql_native_password BY 'new_password';
GRANT ALL PRIVILEGES ON *.* TO 'new_user'@'%';
SHOW GRANTS FOR 'new_user'@'%';
FLUSH PRIVILEGES;
```
