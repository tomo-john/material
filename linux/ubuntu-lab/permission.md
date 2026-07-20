# HTTP 500 Internal Server Error

## PHP-FPMはどのユーザー？

```bash
[VPS] john@[pawverse]$ ps -ef | grep php-fpm
root      133882       1  0 Jul19 ?        00:00:07 php-fpm: master process (/etc/php/8.3/fpm/php-fpm.conf)
www-data  133883  133882  0 Jul19 ?        00:00:00 php-fpm: pool www
www-data  133884  133882  0 Jul19 ?        00:00:00 php-fpm: pool www
john      141673  141195  0 15:41 pts/0    00:00:00 grep --color=auto php-fpm

[VPS] john@[pawverse]$ grep '^user\|^group' /etc/php/8.3/fpm/pool.d/www.conf
user = www-data
group = www-data
```

LaravelはPHP-FPM(www-data)が`storage/`や`bootstrap/cache/`へ書き込めないと500エラーになることが多い。

権限変更:
```bash
[VPS] john@[pawverse]$ sudo chgrp -R www-data storage bootstrap/cache
[VPS] john@[pawverse]$ sudo chmod -R 775 storage bootstrap/cache
[VPS] john@[pawverse]$ ls -ld storage bootstrap/cache
drwxrwxr-x 2 john www-data 4096 Jul 20 13:12 bootstrap/cache
drwxrwxr-x 5 john www-data 4096 Jul 19 17:38 storage
```

# SQLite readonlyエラー

## SQLiteの権限

```bash
[VPS] john@[pawverse]$ ls -l database/
total 152
-rw-rw-r-- 1 john john 139264 Jul 20 13:37 database.sqlite
drwxrwxr-x 2 john john   4096 Jul 19 17:38 factories
drwxrwxr-x 2 john john   4096 Jul 19 17:38 migrations
drwxrwxr-x 2 john john   4096 Jul 19 17:38 seeders
```

こちらもPHP-FPM(www-data)が書き込みできないと、

`General error: 8 attempt to write a readonly database`が発生する。

権限変更:
```bash
[VPS] john@[pawverse]$ sudo chgrp -R www-data database
[VPS] john@[pawverse]$ sudo chmod -R 775 database
[VPS] john@[pawverse]$ ls -l database/
total 152
-rwxrwxr-x 1 john www-data 139264 Jul 20 15:53 database.sqlite
drwxrwxr-x 2 john www-data   4096 Jul 19 17:38 factories
drwxrwxr-x 2 john www-data   4096 Jul 19 17:38 migrations
drwxrwxr-x 2 john www-data   4096 Jul 19 17:38 seeders
```

# manifest.jsonありませんエラー

