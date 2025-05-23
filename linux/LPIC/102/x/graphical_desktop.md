# ディスプレイマネージャー

X Window Systemプログラムの1つで、ランレベルが5のときにグラフィカルログイン画面(GUI画面)を提供する。

ログイン認証、ログイン後のデスクトップ環境の準備も行う。

- SysVinitの場合 : initが起動する`prefdm`が環境変数`DISPLAYMANAGER`を読み取って必要なディスプレイマネージャーが起動
- Systemdの場合 : `display-manager.service`として起動(使用するディスプレイマネージャーのシンボリックリンク)

## XDM(Xディスプレイマネージャー)

X.Org標準のディスプレイマネージャー。

XDMCPプロトコルを使用して、ネットワーク上にあるX端末にもグラフィカルログイン画面を提供。

XDMの設定ファイルは`/etc/X11/xdm`ディレクトリに格納。

| ファイル名 | 説明                                                                        |
|------------|-----------------------------------------------------------------------------|
| xdm-config | XDMの全体的な設定を行うファイル(XDMが読込むファイルなどが記載されてい)      |
| Xresources | XDMログイン画面のデザイン設定                                               |
| Xaccess    | ホストからXDMへのアクセス許可の設定                                         |
| Xsetup_0   | XDMログイン画面表示前に実行されるスクリプト => カラー設定や背景(壁紙)の指定 |
| Xsession   | XDMログイン後に実行されるスクリプト                                         |

## GDM(GNOMEディスプレイマネージャー)

GNOME標準のディスプレイマネージャー。

設定ファイルは`/etc/X11/gdm`ディレクトリに格納。

## KDM(KDEディスプレイマネージャー)

KDE標準のディスプレイマネージャー。

設定ファイルは`/etc/X11/kdm`ディレクトリに格納。

## LightDM(Lightディスプレイマネージャー)

Ubuntu標準のディスプレイマネージャー。

デスクトップ環境に合わせたGreeter(ユーザーインターフェース定義)を指定することで、様々なデスクトップ環境に対応する軽量(Light)なディスプレイマネージャー。

GreeterにはKDE用の`light-kde-greeter`やUbuntuのUnityに対応した`unity-greeter`などがある。

---

# ウィンドウマネージャー

ウィンドウの外観、アイコンやカーソル、メニューなどを提供するXクライアントのアプリケーション。

### 代表的なウィンドウマネージャー

| ウィンドウマネージャー | 説明                                               |
|------------------------|----------------------------------------------------|
| twm                    | 最小限の機能を備えた基本的なウィンドウマネージャー |
| FVWN                   | 軽快でシンプルなウィンドウマネージャー             |
| Enlightenment          | 高度なカスタマイズが可能なウィンドウマネージャー   |
| Metacity               | GNOME2の標準ウィンドウマネージャー                 |
| Mutter                 | GNOME3の標準ウィンドウマネージャー                 |
| Fluxbox                | 軽快でカスタマイズ性の高いウィンドウマネージャー   |
| WindowMaker            | 簡素で軽量なウィンドウマネージャー                 |
| Compiz                 | 立体的な画面効果が華々しいウィンドウマネージャー   |
| KWin                   | KDE標準のウィンドウマネージャー                    |

---

# 総合デスクトップ環境

ディスプレイマネージャーやウィンドウマネージャーのGUI環境とアプリケーションをまとめて統一的な操作を提供する。

## GNOME(グノーム)

`GTK+`というGUIツールキットをベースとして開発された。

=> ディスプレイマネージャー : `GDM` / 標準ウィンドウマネージャー : `Mutter`

Red Hat Enterprise Linux, CentOS, Fedora, Ubuntuなどで標準のデスクトップ環境として採用されている。

## KDE

`Qt`というGUIツールキットをベースとして開発された。

openSUSE, Slackware, Kubuntuなどで標準のデスクトップ環境。

## Xfce

メモリやCPUの消費が少ない軽量のデスクトップ環境。

=> GNOMEやKDEはそれなりのメモリとCPUを消費する

