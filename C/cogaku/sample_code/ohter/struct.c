// 構造体
#include <stdio.h>

int main(){
  struct Dog{
    char name[50];
    int age;
    float power;
  };

  struct Dog dog1 ={"john", 2, 4.5};

  printf("name: %s\n", dog1.name);
  printf("age: %d\n", dog1.age);
  printf("power: %.1f\n", dog1.power);
  
}
