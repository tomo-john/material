# X

`X`とは`X Windows System(X11)`のことを指す。

XはGUIを提供する仕組みのことで、`クライアント/サーバー方式`を採用している。

- Xサーバ : モニターやキーボードなどのハードウェアの管理
- Xクライアント : ユーザーアプリケーション(Webブラウザなど)

Xサーバは`X.Org`が主流となっている。

## /etc/X11/xorg.conf

X.Orgの設定ファイル。(現在は手動で設定する必要はほとんどない)

X.Orgの設定は`/etc/X11/xorg.conf`のほか、`/etc/X11/xorg.conf.d`以下に複数の`.conf`ファイルとして配置されることもある。

=> デフォルトの設定ファイルは`/usr/share/X11/xorg.conf.d`に配置されている

`xorg.conf`は複数のセクションから構成されている。

=> セクションは`Section "セクション名"`から`EndSection`までの範囲にそれぞれのセクション用途ごとに設定が記述される

| セクション   | 説明                                             |
|--------------|--------------------------------------------------|
| Files        | フォントやカラーデーターベースファイルのパス名   |
| Module       | ダイナミックモジュールの設定                     |
| InputDevice  | キーボードやマウスなどの入力装置の設定           |
| InputClass   | 入力装置の`クラス`に適用される設定               |
| Device       | ビデオカードの設定                               |
| Monitor      | モニターの設定                                   |
| Modes        | ビデオモードの設定                               |
| Screen       | ディスプレイの色深度(表示色数)や画面サイズの設定 |
| ServerLayout | 入出力デバイスとスクリーンの指定                 |

```
# /etc/X11/xorg.confの例
Section "ServerLayout"
  Identidier      "X.org Configured"
  Screen       0  "Screen0" 0 0
  InputDevice     "Mouse0" "CorePointer"
  InputDevice     "Keyboard0" "CoreKeyboard"
EndSection
```

フォントをネットワーク経由で利用できるよう、フォントサーバxfs(X FONT Server)が使用されることがある。

xfsを使用する環境では、`xorg.conf`の`Files`セクションで接続先サーバとポート番号を指定する。

---

## ログファイル

- `/var/log/Xorg.0.log` : Xのログファイル
- `~/.xsession-errors` : デスクトップアプリケーションのログファイル

---

## Xサーバーの起動

`startx` => `xinit` => `~/.xinitrc` or `/etc/X11/xinit/xinitrc` => `ウィンドウマネージャー`が起動

