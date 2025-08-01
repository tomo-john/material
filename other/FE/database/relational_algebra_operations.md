# 関係代数演算

リレーショナルデータベースにおけるデータ操作の体系を表す言葉。

データをどう扱うか(抽出・結合・加工)を数学的に表す演算。

SQLの元になっている考え方とも言える :dog:

| 種類 | 説明                                   | SQLでの対応         |
|------|----------------------------------------|---------------------|
| 選択 | 条件に合う行(タプル)を取り出す         | WHERE句             |
| 射影 | 特定の列(属性)だけを取り出す           | SELECT句            |
| 結合 | 関連する表(リレーション)同士をつなげる | JOIN                |
| 直積 | 表と表とをすべての組み合わせて結合     | FROM A, B(条件なし) |
| 和   | 2つの表をまとめて重複を除く            | UNION               |
| 差   | 表Aから表Bに含まれるものを除く         | EXCEPTやMINUS       |

- 和集合 : `SELECT * FROM A UNION B;`
- 差集合 : `SELECT * FROM A EXCEPT B;`
- 直積 : `SELECT * FROM A, B;`
- 共通集合: `SELECT * FROM A INTERSECT B;`

