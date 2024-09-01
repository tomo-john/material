#include <stdio.h>

// 構造体の定義
struct DOG {
    char name[50];
    int age;
};

int main() {
    struct DOG myDog = {"john", 10};       // 構造体変数の宣言と初期化
    struct DOG *myDogPtr = &myDog;         // 構造体ポインタの宣言と初期化

    // 直接アクセス
    printf("名前: %s\n", myDog.name); // john
    printf("年齢: %d\n", myDog.age);  // 10

    // ポインタを使ったアクセス
    printf("名前: %s\n", myDogPtr->name); // john
    printf("年齢: %d\n", myDogPtr->age);  // 10

    return 0;
}
