# laravel-basic-task-list

## Tutorial:

https://blog.nojaf.com/2016/08/19/laradock-on-windows-10/

- laravel-basic-task
https://laravel.com/docs/5.2/quickstart

- laravel-intermediate-task
https://laravel.com/docs/5.2/quickstart-intermediate

- laraecom
https://www.avored.com/
https://www.avored.com/docs/user/installation
https://www.youtube.com/watch?v=IbR1xJWFOLI

- laravel-myshop-aimeos
https://aimeos.org/laravel-ecommerce-package
https://github.com/aimeos/aimeos-laravel

- laravel-ecom-bagisto
https://webkul.com/blog/laravel-ecommerce-website
https://bagisto.com
https://github.com/bagisto/bagisto

- laravel-mylearningms
https://www.youtube.com/watch?v=a0lNnV3DG1o


## How to run:

Modify `APP_CODE_PATH_HOST` in laradock/.env to point to the path of your applications code on your host, example
```
APP_CODE_PATH_HOST=../laravel-basic-task
```

Update database configurations, nginx port...

Run docker compose:
```
docker-compose up -d nginx mysql
```

Create new Laravel project, run this command after docker compose up
```
docker exec -it laradock_workspace_1 bash
```

Now we can run bash commands inside the workspace container. We’ll use Composer to create our new Laravel project
```
root@81acfe2e1e76:/var/www/# composer create-project laravel/laravel .
```

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

- Error when build nginx:  *adduser: group 'www-data' in use*

ROOT CAUSE: The newest nginx:alpine image already has the www-data group

How to fix: change the https://github.com/laradock/laradock/blob/HEAD/nginx/Dockerfile#L20 to 
`adduser -D -H -u 1000 -s /bin/bash -Gwww-data www-data`
