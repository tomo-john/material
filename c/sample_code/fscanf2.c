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
