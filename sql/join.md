# JOIN

- INNER JOIN (内部結合) : 両方のテーブルに存在するデータだけ表示
- LEFT JOIN (左外部結合) : 左側(最初のテーブル)の全部のデータを表示して、右に一致するものがあれば付けて、なければNULL

```sql
john=# select * from users;
 id |   name    
----+-----------
  1 | jim
  2 | john
  3 | pyonkichi
  4 | mocomoca
  5 | minijohn
  6 | john2
(6 rows)

john=# select * from animals;
 id |  name   
----+---------
  1 | dog
  2 | cat
  3 | rabbit
  4 | bear
  5 | doragon
(5 rows)
```

--- INNER JOIN の場合
john=# select * from users inner join animals on users.id = animals.id;
 id |   name    | id |  name   
----+-----------+----+---------
  1 | jim       |  1 | dog
  2 | john      |  2 | cat
  3 | pyonkichi |  3 | rabbit
  4 | mocomoca  |  4 | bear
  5 | minijohn  |  5 | doragon
(5 rows)


--- LEFT JOIN の場合
john=# select * from users left join animals on users.id = animals.id;
 id |   name    | id |  name   
----+-----------+----+---------
  1 | jim       |  1 | dog
  2 | john      |  2 | cat
  3 | pyonkichi |  3 | rabbit
  4 | mocomoca  |  4 | bear
  5 | minijohn  |  5 | doragon
  6 | john2     |    | 
(6 rows)
```
