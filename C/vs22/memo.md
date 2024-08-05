# memo

## Visual Studio 2022

Microsoftが提供する総合開発環境(IDE)

## Hello World

1: 新しいプロジェクトの作成
- C++`で` コンソールアプリ`を選択し、次へ
- 任意のプロジェクト名を決め、作成(source/reposで重複しない名称)

2: コード記述
- 'プロジェクト名'.cpp ファイルにコードを記述
- 今回は既にあるコードは一度全て削除し、下記を記述

```
#include <stdio.h>

int main() {
    printf("Hello, John!\n");
    return 0;
}
```
3: ビルド
- ビルド(B) → ソリューションのビルド(Ctrl+Shift+B)
- 「ビルド: 成功 1」が出力されていればok

4: 実行
- デバッグ(D) → デバッグの開始(F5) もしくは デバッグなしで開始(Ctrl+F5)

