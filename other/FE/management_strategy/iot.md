# 組み込みシステム・IoTシステム

## 組み込みシステム

組み込みシステムとは、特定の機能を実行するシステム。

通常は`マイクロコンピュータ`のことを指す。

ここでは、`特定`とは`汎用`と対比される言葉。

あらかじめ決められた用途のみに使われるシステム。(ご飯を炊く・モノを温めるなど)

### 民生機器と産業機器

- 民生機器 : 一般家庭で使われる家電製品(家電) => 炊飯器・電子レンジなど
- 産業機器 : 産業用に使われる機器 => 産業用ロボット・自動倉庫・自動販売機など

これらに組み込みシステムが使用(内臓)されている。

### 組み込みソフトウェア

組み込みシステム(マイクロコンピュータ)の中の、読み出し専用の記憶装置(ROM)にインストールされたソフトウェアのとを`組み込みソフトウェア(ファームウェア)`と呼ぶ。

ユーザーが誤ってソフトウェアを上書きしてしまうのを防ぐために読み出し専用の記憶装置が使われている。

## IoT

IoT(Internet of Things : モノのインターネット)とは、自動車や家電などの`モノ`が直接インターネットにつながって、お互いに情報をやり取りすること。

例 : 外出先からスマホでエアコンの電源を入れるなど

### 閉域網

IoTの対象はインターネットにつながっているモノだけではない。

閉域網と呼ばれるネットワークにつながっているモノも対象となる。

閉域網とは、インターネットに接続していないネットワークのこと。

インターネットは開かれたネットワークで、不特定多数がアクセスできるのでセキュリティが低い。

閉域網は閉じたネットワークのため、特定の人しか利用できずセキュリティが高い。

### BLE

BLE(Bluetooth Low Energy)とは、Bluetoothの仕様の1つで省電力の通信規格。

従来のBluetoothよりも通信速度が遅い分、省電力であるため、Iot機器での利用に適している。

BLEはボタン電池1個で、数年稼働すると言われている。

その分BLEはLTE(4G)よりも通信距離が短い。

### LPWA

LPWA(Low Power Wide Area)とは、省電力で広範囲の通信ができる無線通信。

数十kmの通信距離を持つ。LTE(4G)よりも省電力で、BLEよりも通信距離が長い。

=> スマートメーターとかに使用されている

### LTE(4G)

LTE(Long Term Evokution)とは、第3世代移動通信システム(4G)から第4世代移動通信システム(4G)へ移行期に登場した技術。

通信速度も速く・大容量通信が可能で通信距離も広範囲(数km～数十km)、スマホとかに採用されていて消費電力はもちろん高い。

| :dog: | 消費電力 | 通信距離 |
|-------|----------|----------|
| Wi-Fi | 高       | 近       |
| LTE   | 高       | 遠       |
| BLE   | 低       | 近       |
| LPWA  | 低       | 遠       |

## エッジコンピューティング

エッジコンピューティングとは、IoT機器の近くにサーバーを配置することで応答時間を高める技術。

主に、工場に設置されたセンサーなどのIot機器との通信で使用される。

従来のクラウドコンピューティングでは、サーバーがどこか遠い位置にあるので通信に時間がかかっていた。

エッジコンピューティングではサーバーを工場の近くに配置し、センサーとの通信を高速に行うことができ、処理のリアルタイム性を高めることができる。

=> 必要なデータだけをクラウドコンピューティングと通信する

