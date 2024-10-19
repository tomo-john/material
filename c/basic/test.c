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
