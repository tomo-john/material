# SQLの副問い合わせ(サブクエリ)

- SELECT文の中で別のSELECT文を使うこと
- 内側のSELECTをサブクエリ、外側をメインクエリと呼ぶ
- サブクエリの結果を利用して外側の処理を行う

## スカラサブクエリ

1つの値(単一行・単一列)を返す

```
SELECT name FROM Employee WHERE alary > (SELECT AVG(salary) FROM Employee);
```

=> 全社員の平均給与より高い人を抽出

## 行サブクエリ

1行(複数列)を返す

```
SELECT name FROM Employee WHERE (department_id, salary) = (SELECT department_id, MAX(salary) FROM Employee);
```

=> 各部署で最高給与をもらっている社員を抽出

## 表サブクエリ

複数行を返す(IN, ANY, ALLと組み合わせる)

```
SELECT name FROM Employee WHERE department_id IN
                                (SELECT id FROM Department Where location = 'Kyoto');
```

=> 京都にある部署の社員を抽出

## 相関サブクエリ

- 外側のクエリの値を参照するサブクエリ
- 行ごとにサブクエリが実行される

```
SELECT name FROM Employee e WHERE salary > (
                              SELECT AVG(salary) FROM Employee WHERE department_id = e.department_id);
```

=> 自分の部署の平均給与より高い社員を抽出

---

```
SELECT DISTINCT 部署コード
FROM 社員 s1
WHERE 5 > (
  SELECT COUNT(s2.社員番号)
  FROM 社員 s2
  WHERE s1.部署コード = s2.部署コード
    AND s2.職務 = 'プログラマ'
);
```

### 外側のSELECT(メインクエリ)

```
SELECT DISTINCT 部署コード
FROM 社員 s1
WHERE ...
```

- 社員表から部署コードを重複なく取り出す
- ただし、WHERE条件を満たす部署だけ

### 内側のSELECT(サブクエリ)

```
SELECT COUNT(s2.社員番号)
FROM 社員 s2
WHERE s1.部署コード = s2.部署コード
  AND s2.職務 = 'プログラマ'
```

- これは相関サブクエリ
- 外側の`s1.部署コードを参照している`
- このサブクエリは部署ごとに実行される
  
  => 同じ部署にいる`プログラマ`の人数を数える

### WHERE条件の意味

```
WHERE 5 > (サブクエリの結果)
```

- 部署ごとにプログラマの人数を数える
- それた`5未満`のときに、その部署を取り出す

### 結果として

このSQLでは、プログラマが5人未満しかいない部署コードを抽出するSQL。

