# OR・IE

- OR(Operations Research) : 現実の問題を科学的な方法や道具を使って解決しようとする研究
- IE(Industrial Engineering) : 生産高額

FE試験では分析ツールを使った計算問題が出題される :dog:

## パレート図とABC分析

パレート図とは、棒グラフと折れ線グラフを組み合わせたグラフ。

- 棒グラフ : データを大きい順に左から並べる
- 折れ線グラフ : 各データの累積比率(%)を表す

パレート図では、最も重要なデータ(件数が多いデータ)を一目で確認することができる。

ABC分析は、データをパレート図で表し、データの重要度のに応じて、データを3つのグループにランク付けする分析手法。

=> 一般的には個数に応じて、製品をA・B・Cの3つのグループに分ける

- A群 : 0～70%
- B群 : 70～90%
- C群 : 90～100%

=> これが目安だけど各企業で適切な割合を決める

:dog: [参考URL: ABC分析とは？](https://data-viz-lab.com/abc-analysis) :dog:

## 散布図と回帰分析

### 散布図

2種類のデータの関係性を表す図。2つのデータにどのような関係性があるか(相対関係)を確認できる。

相対関係には、正の相関、負の相関、相関なしの3つの種類がある。

### 回帰分析

回帰直線(散布図内の点が多く集まっているところに引いた直線)を使う。

過去のデータがどのような原因によって引き起こされているのかを分析し、将来を予測する手法。

2種類のデータに相対関係があれば、将来、高い確率でその相対関係が当てはまるだろうと予測できる。

:dog: [参考URL: なるほど統計学園](https://www.stat.go.jp/naruhodo/10_tokucho/hukusu.html) :dog: 

## 特性要因図(フィッシュボーンチャート)

問題を引き起こしている原因を分析するための図。

図の形が魚の骨に似ていることからフィッシュボーンチャートとも呼ばれる。

問題(特性)を4つの原因(要因)に分けて分析する。

各要因はさらに小さい要因に分けて分析することができる。

複数の要因から伸びる矢印が合流した先に問題を書く。

:dog: [参考URL: フィッシュボーンチャートとは？](https://studyhacker.net/fishbone-diagram) :dog:

## 線形計画法(せんけいけいかくほう)

英語では、linear programmingでLPと略されることもある。(linear : リニア : 直線的な、線形の)

線形計画法は、与えれた条件から最大の効果を得るための解を求める手法。

=> 最大の効果を得るための解を求める問題のことを、最適化問題という

線形計画法の問題は解くのに時間がかかるので後回しのするのもあり :dog:

### 解き方

- 1 : 問題を数式で表す
- 2 : 連立方程式
- 3 : 解を求める

### 例題

製品X, Yを生産するためには2種類の原料A,Bが必要。

製品X, Yの1個当たりの販売利益が、100円、150円。

最大利益は？

| 原料 | X1個当たり必要量 | Y1個当たり必要量 | 調達可能数 |
|------|------------------|------------------|------------|
| A    | 2                | 1                | 100        |
| B    | 1                | 2                | 80         |


問題を数式で表すために、設問の内容を制限条件と目的関数の2つで表す。

- 制限条件 : 解が満たされなければならない条件
- 目的関数 : 最大化・最小化したい関数

```
# 制限条件
原料A : 2X + Y <= 100
原料B : X + 2Y <= 80
```

```
# 目的関数
Z = 100X + 150Y
```

=> この関数(ここではZの値)を最大化するXとYの値を見つけるのが線形計画法の目的 :dog:

```
2X + Y = 100
X +2Y = 80
```

この連立方程式を解くと、`X = 40, Y = 20`になる。

これを目的関数 `Z = 100X + 150Y`に代入すると、`Z = 7000`となり、これが最大値。

## 重み付け総合評価法

すべての評価項目を平等に扱うのではなく、あらかじめ個別に重要性を決めておく評価方法。

### 例題

| 評価項目 | 重み | 案1 | 案2 | 案3 | 案4 |
|----------|------|-----|-----|-----|-----|
| A        | 4    | 6   | 8   | 2   | 5   |
| B        | 3    | 5   | 5   | 9   | 5   |
| C        | 3    | 6   | 4   | 7   | 6   |

重み付け総合評価法では、重みと案の点数を掛け算して合計、それを総合点とする。

総合点が最も高い案が優先すべき案となる。

- 案1 : (4 x 6) + (3 x 5) + (3 x 6) = 57
- 案2 : (4 x 8) + (3 x 5) + (3 x 4) = 59
- 案3 : (4 x 2) + (3 x 9) + (3 x 7) = 56
- 案4 : (4 x 5) + (3 x 5) + (3 x 6) = 53

=> この場合だと案2が優先すべき改善案

## 期待値

| サイコロの目 | 1   | 2   | 3   | 4   | 5   | 6   |
|--------------|-----|-----|-----|-----|-----|-----|
| 確率         | 1/6 | 1/6 | 1/6 | 1/6 | 1/6 | 1/6 |

(1 x 1/6) + (2 x 1/6) + (3 x 1/6) + (4 X 1/6) + (5 x 1/6) + (6 x 1/6) = 3.5

サイコロの目の期待値は3.5。

