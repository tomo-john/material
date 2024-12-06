# metacharacter

### シェルと正規表現での違い

| meta | shell                   | regex                           |
|------|-------------------------|---------------------------------|
| `*`  | 任意の文字列(0文字以上) | 直前の文字が0回以上繰り返される | 


### *

shell: `ls file*.txt`は、file.txt, file1.txt, fileAAA.txtなど

regex: `grep 'fi*e' file.txt`は、 fe, fie, fiie, fiiiieなど


