# 入力された数値から合計値と平均値を求める

```
// 入力された数値から合計値と平均値を求める

#include <iostream>
#include <vector>

int main() {
    int n; // 入力する数値の個数
    std::cout << "数値の個数を入力してください: ";
    std::cin >> n;

    // 数値を格納するためのstd::vectorを宣言
    std::vector<int> numbers(n);
    int sum = 0; // 合計を保存する変数
    double average; // 平均を保存する変数

    // 数値の入力を受け付け
    std::cout << "数値を " << n << " 個入力してください:\n";
    for (int i = 0; i < n; ++i) {
        std::cout << (i + 1) << " 番目の数値: ";
        std::cin >> numbers[i];
        sum += numbers[i]; // 合計を計算
    }

    // 平均を計算
    if (n > 0) {
        average = static_cast<double>(sum) / n;
    }
    else {
        average = 0.0;
    }

    // 結果を表示
    std::cout << "合計: " << sum << std::endl;
    std::cout << "平均: " << average << std::endl;

    return 0;
}
```

## include <iostraem>

iostreamは`input output stream`の略 => 標準入出力の機能

`std::cout`や`std::cin`などの入出力が使用できる

std::cout : 配列やコンテナの特定の要素がいくつ含まれているかを返すテンプレート関数

std::cin : 標準入力からデータを読み取る為のストリームオブジェクト

## include <vector>

動的な配列(要素の数が可変)を扱う為のヘッダーファイルをインクルード

## int n

整数型の変数`n`を宣言(今回は入力された数値の個数を格納する変数)

## std::cout << "文字列"

`<<`演算子で文字列を流し込み、`std::cout`でコンソールに文字列を表示する

## std::cin >> n

コンソールから入力された値を受取り、`>>`演算子で変数`n`に代入する

## std::vector<int> numbers(n)

整数型の要素を持つ動的配列を宣言しサイズ`n`で初期化 => `numbers`が動的配列

`numbers`配列は`n`個の要素を格納できる配列として用意される

## int sum = 0

整数型変数`sum`を宣言し、初期値を0に設定(合計値を保存する為の変数)

## double average

浮動小数点型変数`average`を宣言 => 初期化は行っていない(平均値を保存する為の変数)

`double`はintと異なり小数を含む実数を扱うことができる

## std::cout << "数値を " << n << " 個入力してください:\n";

`n`個の数値を入力するようにコンソールへメッセージを表示

## for (int i = 0; i < n; ++i) { ～ }


