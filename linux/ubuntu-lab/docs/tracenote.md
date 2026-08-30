# Trace Noteデプロイ時(2回目)

160.251.234.145

## 作業前確認

```bash
df -h
Filesystem      Size  Used Avail Use% Mounted on
tmpfs           197M  1.1M  196M   1% /run
/dev/vda2        99G  6.1G   88G   7% /
...
```

=> Disk容量問題なし

## サーバー準備

- git clone(`/var/www/apps/TraceNote`)

## Laravel

- composer install
- .env
- APP_KEY
- migrate

## Front

- nmp install
- npm run build

## Nginx

- root変更
- nginx reload

