#include <stdio.h>

struct Animal {
    char type; // 'd' for dog, 'c' for cat
    union {
        int dogAge;  // For dogs, we store age
        int catLives; // For cats, we store remaining lives
    } info;
};

int main() {
    struct Animal myPet;

    // 犬を設定
    myPet.type = 'd';
    myPet.info.dogAge = 5; // 犬の年齢を5歳に設定
    printf("Animal type: %c, Age: %d\n", myPet.type, myPet.info.dogAge);

    // 同じメモリ領域を使用して猫の情報を設定
    myPet.type = 'c';
    myPet.info.catLives = 9; // 猫の残りの命を9に設定
    printf("Animal type: %c, Lives: %d\n", myPet.type, myPet.info.catLives);

    return 0;
}

