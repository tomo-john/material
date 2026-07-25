# nginxインストール

インストール:

```bash
sudo apt install nginx
```

起動確認:

```bash
systemctl status nginx
```

ポート確認:

```bash
sudo ss -tlnp
```

プロセス確認:

```bash
ps aux | grep nginx
```

## この時点でブラウザからアクセスできなかった

```bash
sudo ufw status
```

```bash
Status: active

To                         Action      From
--                         ------      ----
OpenSSH                    ALLOW       Anywhere                  
OpenSSH (v6)               ALLOW       Anywhere (v6)   
```

=> SSHしか許可されていない

Nginxを許可する:

```bash
sudo ufw allow 'Nginx Full'
```

