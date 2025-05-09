# grep

ファイルや標準入力から検索パターンにマッチする文字列を`含む`行を抽出するコマンド。

```
grep [オプション] 検索パターン [ファイル]
```

## オプション

| オプション | 機能                                     |
|------------|------------------------------------------|
| -c         | マッチした行の行数のみを表示             |
| -f         | 検索パターンをファイルから読込む         |
| -i         | 大文字と小文字を区別しない               |
| -n         | 先頭に行番号をつけて、マッチした行を表示 |
| -v         | マッチしなかった行を表示                 |
| -E         | 拡張正規表現を使用(=`egrep`)             |
| -F         | 固定文字列とする(=`fgrep`)               |

---

# 正規表現

正規表現とは、文字列の特定のパターンを認識する為に使用する表現方法。

文字列の検索(`grep`)や、置換(`sed`)などを行う際に利用する。

正規表現には基本正規表現と拡張正規表現がある。

## 基本概念

- 特殊文字 : `|`, `\`のような特殊な意味を持つ文字
- 文字クラス : `[]`内の文字集合
- 数量詞 : `*`, `+`のような直前の文字の繰り返し回数を示す文字
- アンカー : `^`, `$`のような文字列内での位置を示す文字

## シェルのメタキャラクタとの違いに注意

正規表現の`*`と、シェルによって解釈されるメタキャラクタの`*`では意味が異なる。

- 正規表現 : `*`は直前文字の0回以上の繰り返し
- シェル : 0文字以上の文字列

正規表現は明示的に`'`や`"`の引用符で囲むことで、シェルにメタキャラクタとして解釈されなくなる。

## 主な正規表現

| 記号    | 説明                                                         |
|---------|--------------------------------------------------------------|
| `.`     | 任意の1文字                                                  |
| `*`     | 直前文字の0回以上の繰り返し                                  |
| `[]`    | `[]`内のいずれかの1文字                                      |
| `[-]`   | 範囲指定 => `[a-z]`は小文字アルファベット1文字               |
| `[^]`   | 先頭にある場合のみ後続文字以外 => `[^abc]`はa,b,c以外の1文字 |
| `^`     | 行頭                                                         |
| `$`     | 行末                                                         |
| `\`     | 次の1文字をエスケープ(通常の文字として処理)                  |

### サンプル

- `d.g` => dag, ddg, dogなど(dgとかはだめ)
- `dog*` => do, dog, dogg, dogggなど(0回繰り返しなのでdoもマッチ)
- `.*` => 任意の文字列
- `[dog]` => d,o,gのいずれか1文字
- `[1-4]` => 1,2,3,4のいずれか1文字
- `[^dog]` => d,o,g以外のいずれか1文字
- `^d` => dから始まる行
- `^[dog]` => d,o,gのいずれから始まる行
- `d$` => dで終わる行
- `[dog]$` => d,o,gのいずれかで終わる行

## 拡張正規表現

拡張正規表現を使用する際は、`grep -E`や`egrep`を使用する。

| 記号 | 説明                               |
|------|------------------------------------|
| `+`  | 直前文字の1回以上の繰り返し        |
| `?`  | 直前文字の0回もしくは1回の繰り返し |
| `|`  | 左右のいずれかの文字列             |

### サンプル

- `do+g` => dog, doog, dooogなど
- `do?g` => dg, dog
- `john|pyon` => johnまたはpyon
- `[john|pyon]` => `j`,`o`,`h`,`n`,`|`,`p`,`y`,`o`,`n`のいずれか(`|`もただの文字列)

### ? と +

拡張正規表現の`?`と`+`は、基本正規表現では`\?`, `\+`で同様の指定が可能。

