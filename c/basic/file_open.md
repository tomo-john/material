# ファイルポインタ
C言語でファイルを扱うためには、ファイルポインタと呼ばれる構造体(FILE型)を使用する

使用するには`<stdio.h>`のインクルードが必要

`FILE *変数名`のように定義し、オープンするファイル1つ1つに対して定義する必要がある

ファイルに対するさまざまな操作(読み書きなど)を行う情報を保持している

# ファイルオープン
```c
FILE *fopen(const char *filename, const char *mode);
```
- filename: オープンするファイルの名前(パス)
- mode: ファイルをどのように開くか指定する文字列

オープン成功時は、そのファイルに関連付けられた`FILE`型のポインタを返し

失敗した場合は`NULL`を返す

`mode`の主な値
- `r` : 読み込み専用・ファイルがないとエラー
- `w` : 書き込み専用・ファイルがないと新規作成・あれば上書き
- `a` : 追加モード・ファイルがないと新規作成・あれば末尾に追加
- `r+`: 読み書き両用・ファイルがないとエラー
- `w+`: 読み書き両用・ファイルがないと新規作成・あれば上書き
- `a+`: 読み書き両用・ファイルがないと新規作成・あれば末尾に追加

# ファイルクローズ
```c
int fclose(FILE *stream);
```
- stream: fopenで返されたファイルポインタ

`fclose`が成功した場合は`0`、失敗した場合はEOF(`-1`)を返す

### sample
```c
#include <stdio.h>

int main(){
  FILE *file;

  file = fopen("example.txt", "r");

  if(file == NULL){
    perror("Error opening file");
    return -1;
  }

  // ファイル操作など行う

  fclose(file);

  return 0;
}
```

# ファイル読み書き

- `fgetc`  : 現在のファイル位置から一文字読込む
- `fputc`  : 現在のファイル位置に一文字書込む
- `fgets`  : 現在のファイル位置から一行読込む
- `fputs`  : 文字列をファイルに書込む
- `fscanf` : フォーマット付きでファイルからデータを読込む
- `fprintf`: フォーマット付きでファイルに書込む
- `fread`  : バイナリデータをファイルから読込む
- `fwrite` : バイナリデータをファイルに書込む

## fgetc
- 用途: 1文字をファイルから読込む
- 定義: `int fgetc(FILE *stream);`
- 戻り値: 読み取った文字(整数型)を返す。ファイルの終わりに達した場合は`EOF`を返す
- 使用例:
  ```c
  FILE *file = fopen("sample.txt", "r");
  int ch = fgetc(file);
  while(ch != EOF){
    putchar(ch);
  }
  ```

## fgets
- 用途: 1行をファイルから読込む
- 定義: `char *fgets(char *str, int n, FILE *stream);`
- 引数:
  - `str`: 読込んだ文字列を格納するバッファ
  - `n`: 読込む最大文字数(ヌル終端を含む)
- 戻り値: 読込んだ文字列のポインタ。エラーやEOFの場合`NULL`
- 使用例:
  ```c
  char buffer[100];
  fgets(buffer, sizeof(buffer), file);
  ```
- 使用例2:
  ```c
  #include <stdio.h>

  int main(){
    char name[50];

    printf("Enter your name.: ");

    if(fgets(name, sizeof(name), stdin) != NULL){
      printf("Hello, %s", name);
    } else {
      printf("Error reading input.\n");
    }

    return 0;
  }
  ```
  - `name`: 入力値を格納するためのバッファ
  - `sizeof(name)`: 読込む最大文字数、ここでは50バイトまで読込むことが可能
  - `stdin`: 標準出力を指定

## fscanf
- 用途: フォーマット付きでファイルからデータを読込む
- 定義: `int fscanf(FILE *stream, const char *format, ...);`
- 引数:
  - `stram`: 読込み対象のファイルポインタ
  - `format`: 読込むデータのフォーマット
  - `...`: 読込んだデータを格納するためのポインタ変数が続く(可変長引数)
- 戻り値: 成功した項目の数。エラーの場合は`EOF`
- 使用例:
  ```c
  int age;
  fscanf(file, "%d", &age);
  ```
可変長引数の使用例
```c
#include <stdio.h>

int main(){
  FILE *file = fopen("sample.txt", "r");

  int age;
  float height;
  char name[50];
  
  // sample.txtの内容が、"25, 2.8 John" の場合
  int itemsRead = fscanf(file, "%d %f %s", &age, &height, name);
  
  if(itemsRead == 3){
    printf("Age: %d\n", age);
    printf("Height: %.1f\n", height);
    printf("Name: %s\n", name);
  }

  fclose(file);
  return 0;
}

```
`fscanf`はデフォルトで半角スペース(空白文字)、タブ、改行を区切り文字として扱う

`name`は文字列を格納するための配列(`char name[50];`)

C言語では、配列名はその配列の先頭要素のアドレスを指すため、`name`という名前で`&name[0]`(最初の文字のアドレス)と同じ意味

