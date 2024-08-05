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

## include <iostrem>

