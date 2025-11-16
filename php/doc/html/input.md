# inputタグ

- `input`: タグ(または要素)
- `type="text"`: 属性(attribute)
- `"text"` : 属性値(attribute value)

## type属性

| 属性値                                        | 用途                     |
|-----------------------------------------------|--------------------------|
| `input type="text"`                           | 1行テキスト              |
| `input type="email"`                          | スマホではキーボード出る |
| `input type="password"`                       | ●●●のように隠れる        |
| `input type="number" min="0" max="100"`       | 数字                     |
| `input type="submit" value="送信"`            | フォーム送信             |
| `input type="button" value="クリック"`        | 何もしないボタン         |
| `input type="checkbox"`                       | チェックボックス         |
| `input type="radio" name=gender` value="male" | 選択肢から1つ選ぶ        |
| `input type="file"`                           | ファイルアップロード     |
| `input type="hidden"`                         | 見えない値を送る         |

### submitとbutton

| 要素                  | デフォルト動作               |
|-----------------------|------------------------------|
| `input type="submit"` | フォーム送信する(submitする) |
| `input type="button"` | 何もしない(ただのボタン)     |

`submit`はそのボタンが含まれる`<form>`をサーバーに送信する。

`button`はデフォルトでは何も起こらないので、動作させるためにはJSを書く。

