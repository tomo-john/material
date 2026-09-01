# ubuntu-lab

ConoHa VPS で契約したUbuntu 24.04(x86_84) サーバー

## 目的

サーバー操作学習・Laravel Appデプロイテストなど

## 契約

2026/7/12 ~ (6ヶ月)

## スペック

- サービス: VPS
- OS: Ubuntu 24.04(x86_64)
- 料金タイプ: 6ヶ月
- プラン: 2GB
- ネームタグ: ubuntu-lab

---

# 初回デプロイで詰まったポイント

- composer.lockとPHPバージョン
- Symfony 8(PHP8.4問題)
- storage権限
- database.sqlite権限
- Vite manifest.json
- Node.js / npm
- php-fpm
- nginx root

---

## SSH接続強制切断

tmuxなど固まっているペインで

```
Enter -> ~ -> .
```

と入力。

SSH接続が反応しなくなったときのエスケープシーケンス。

