# Red Hat
Red Hatディストリビューションは、Red Hat社が開発したLinuxディストリビューションの1つ

特に商業環境での利用を前提としたエンタープライズ向けのLinux

## 代表的なディストリビューション

- Red Hat Enterprise Linux(RHEL)

  エンタープライズに特化したLinuxで、企業のサーバー環境やデータセンターなどに広く利用されている

  サポート契約により長期的な安定性と保守が提供され、セキュリティアップデートやバグ修正が保証される

- CentOS(Community Enterprise Operating System)

  RHELに基づいたオープンソースのLinuxディストリビューション

  RHELの商用エンタープライズ版と同等の機能やパッケージを提供しつつ無料で利用が可能

  コミュニティによって開発されたおり、ユーザー同士の助け合いなどがある、商用サポートはない

  CentOS8以降、`CentOS Stream`という形にシフトしている

  RHEL同様にRPMパッケージ管理システムが使用できる

- Fedora

  Red Hat社が支援するオープンソースのLinuxディストリビューション

  RHELの実験的な機能や最新技術が最初に導入されるディストリビューション

  Fedoraの成果は後にRHELへと取り込まれることが多い

## Enterprise
企業や大規模組織向けの用途を指し、特に業務システムやデータベース、サーバーなど

商業・産業向けに安定性・信頼性・セキュリティが求められる環境での使用が重視されている

## パッケージ管理ツール
`RPM(Red Hat Package Manager)`, `YUM(Yellowdog Updater Modified)`, `DNF(Dandified YUM)`が使用される

パッケージファイルの拡張子は`.rpm`

- RPM

  `.rpm`ファイルを扱い、個別にインストール・削除・アップグレードを行う

  依存関係の自動解決はしない

  `sudo rpm -ihv package.rpm`

-  YUM

  RPMの上位に位置するパッケージ管理ツール

  インターネット上のリポジトリからパッケージを直接取得するため、一般的なインストールが用意

  `sudo yum install package_name`

- DNF

  YUMの次世代バージョンとして開発され、Red Hat系の最新ディストリビューションで使用されている

  YUM同様に依存関係を自動解決し、RPMの上位に位置するがより高速で効率的に動作する

  `sudo dnf install package_name`


