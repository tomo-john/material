# 表

### 基本サンプル

```
<table>
  <thead>
    <tr>
      <th>id</th>
      <th>name</th>
      <th>job</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td>1</td>
      <td>john</td>
      <td>dog</td>
    </tr>
    <tr>
      <td>2</td>
      <td>pyon</td>
      <td>rabbit</td>
    </tr>
    <tr>
      <td>3</td>
      <td>moco</td>
      <td>bear</td>
    </tr>
  </tbody>
</table>
```

### こんな表できる

| id | name | job    |
|----|------|--------|
| 1  | john | dog    |
| 2  | pyon | rabbit |
| 3  | moco | bear   |

期状態では枠線などはないため、CSSを適用させる必要あり。

### CSSサンプル

```
/* table */
table {
  width:100%;
  border-collapse: collapse;
  margin-top: 20px;
}
th, td {
  border: 1px solid #ccc;
  padding: 10px;
  text-align: left;
}
th {
  background-color: #f0f0f0;
}
```

